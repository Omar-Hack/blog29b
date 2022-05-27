<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['1','2'])->default('2');
            $table->string('title',50);
            $table->string('slug',255);
            $table->string('image',255);
            $table->string('video',255)->nullable();
            $table->string('document',255)->nullable();
            $table->unsignedBigInteger('category');
            $table->text('description');
            $table->longtext('content',150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
