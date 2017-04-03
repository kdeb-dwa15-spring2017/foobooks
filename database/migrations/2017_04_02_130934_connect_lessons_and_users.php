<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectLessonsAndUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('lessons', function (Blueprint $table) {

            # Remove the field associated with the old way we were storing authors
            # Whether you need this or not depends on whether your books table is built with an authors column
            # $table->dropColumn('author');

            # Add a new INT field called `user_id` that has to be unsigned (i.e. positive)
            //$table->integer('author_id')->unsigned();
            $table->integer('user_id')->unsigned();


            # This field `user_id` is a foreign key that connects the user_id fk in lessons to the `id` field in the `users` table
            //$table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('lessons', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            //$table->dropForeign('books_author_id_foreign');
            $table->dropForeign('lessons_user_id_foreign');

            $table->dropColumn('user_id');
        
        });

    }
}
