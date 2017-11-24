<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Sofa\Eloquence\Eloquence;

class Company extends Model
{
    use Eloquence;

    protected $fillable = ['title', 'slug', 'description', 'contact', 'code','email','logo', 'backdrop', 'gateway', 'key', 'secret'];
    protected $searchableColumns = ['title', 'description', 'code', 'email'];

    public function keywords(){
    	return $this->hasMany(Keyword::class);
    }

    public function campaigns(){
    	return $this->hasMany(Campaign::class);
    }

    public function subscribers(){
    	return $this->belongsToMany(Subscriber::class)->withTimestamps();
    }

    public function messages(){
    	return $this->hasMany(Message::class);
    }

    public static function makeSlugFromTitle($title)
    {
       $slug = Str::slug($title);

       $count = Company::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

       return $count ? "{$slug}-{$count}" : $slug;
   }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function getLogo(){
        return '/logos/' . $this->logo;
    }

    public function getBackdrop(){
        return '/backdrops/' . $this->backdrop;
    }

    public static function generateKey(){
        $key = self::random_text('alnum', 32);
        $count = Company::whereRaw("`key` RLIKE '^{$key}(-[0-9]+)?$'")->count();
        return $count ? "{$key}-{$count}" : $key;
    } 

    public static function generateSecret(){
        $secret = self::random_text('alnum', 8);
        $count = Company::whereRaw("`secret` RLIKE '^{$secret}(-[0-9]+)?$'")->count();
        return $count ? "{$secret}-{$count}" : $secret;
    }

    public static function random_text( $type = 'alnum', $length = 8 )
    {
        switch ( $type ) {
            case 'alnum':
                $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'alpha':
                $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'hexdec':
                $pool = '0123456789abcdef';
                break;
            case 'numeric':
                $pool = '0123456789';
                break;
            case 'nozero':
                $pool = '123456789';
                break;
            case 'distinct':
                $pool = '2345679ACDEFHJKLMNPRSTUVWXYZ';
                break;
            default:
                $pool = (string) $type;
                break;
        }


        $crypto_rand_secure = function ( $min, $max ) {
            $range = $max - $min;
            if ( $range < 0 ) return $min; // not so random...
            $log    = log( $range, 2 );
            $bytes  = (int) ( $log / 8 ) + 1; // length in bytes
            $bits   = (int) $log + 1; // length in bits
            $filter = (int) ( 1 << $bits ) - 1; // set all lower bits to 1
            do {
                $rnd = hexdec( bin2hex( openssl_random_pseudo_bytes( $bytes ) ) );
                $rnd = $rnd & $filter; // discard irrelevant bits
            } while ( $rnd >= $range );
            return $min + $rnd;
        };

        $token = "";
        $max   = strlen( $pool );
        for ( $i = 0; $i < $length; $i++ ) {
            $token .= $pool[$crypto_rand_secure( 0, $max )];
        }
        return $token;
    }
}
