<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailAndContactInCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('slug')->unique()->after('title');
            $table->string('email')->after('code');
            $table->string('contact')->after('email');
            $table->string('logo')->after('contact')->default('default.png');
            $table->string('backdrop')->after('logo')->default('default.jpg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn(['slug', 'email', 'contact', 'logo', 'backdrop']);
        });
    }
}
