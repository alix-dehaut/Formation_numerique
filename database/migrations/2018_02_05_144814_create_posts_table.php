<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->enum('post_type', ['formation', 'stage']);
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->dateTime('started_at');//->nullable(); // enlever nullable !!!!
            $table->dateTime('ended_at');//->nullable(); // enlever nullable !!!!
            $table->decimal('price');
            $table->integer('students_max');
            $table->enum('status', ['published', 'unpublished'])->default('unpublished');
            $table->unsignedInteger('category_id')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
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
