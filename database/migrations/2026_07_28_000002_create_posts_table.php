<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();

            $table->string('message');
            $table->bigInteger('likes');
            $table->bigInteger('dislikes');

            // Foreign keys
            $table->unsignedBigInteger('post_id')->nullable()->index();
            $table->unsignedBigInteger('created_by')->index();
            $table->unsignedBigInteger('theme_id')->nullable()->index();

            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExistis('posts');
    }
};