<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_posts', function (Blueprint $table) {
            /*
             * This is the recomended way on production
             * for updating the table(s)'s column(s)
             * */

            /* This code below is not working for SQLite*/
//            $table->string('title');

            /*
             * This code below is specially used for SQLite
             * */
            $table->string('title')->default("");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_posts', function (Blueprint $table) {
            //
            $table->dropColumn('title');
        });
    }
}
