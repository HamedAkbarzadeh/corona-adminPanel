<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrivateInPublicMailFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('public_mail_files', function (Blueprint $table) { 
            $table->tinyInteger('private')->default(0)->after('status')->comment('0 => unPrivate , 1=>private'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('public_mail_files', function (Blueprint $table) {
            //
        });
    }
}
