<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tags', function (Blueprint $table) {
            //tag_nameへ変更、uniqueキー追加
            $table->renameColumn('tag', 'tag_name')->unique();
        });

        Schema::table('articles', function (Blueprint $table) {
            //複合uniqueキー追加
            $table->unique(['title', 'user_id']);
        });

    }

    /**
     * Reverse the migrations.
     * 念の為逆順で書いてる
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropUnique(['title', 'user_id']);
        });

        Schema::table('tags', function (Blueprint $table) {
            $table->renameColumn('tag_name', 'tag')->dropUnique();
        });
    }
}
