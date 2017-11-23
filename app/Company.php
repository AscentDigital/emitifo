<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Sofa\Eloquence\Eloquence;

class Company extends Model
{
    use Eloquence;

    protected $fillable = ['title', 'slug', 'description', 'contact', 'code','email','logo', 'backdrop', 'gateway'];
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
}
