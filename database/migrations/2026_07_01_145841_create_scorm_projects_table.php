<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('scorm_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('scorm_file_path')->nullable();
            $table->string('extracted_path')->nullable();
            $table->string('launch_file')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('url')->nullable();
            $table->string('client_name')->nullable();
            $table->string('industry')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->integer('views')->default(0);
            $table->integer('completions')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('scorm_projects');
    }
};
