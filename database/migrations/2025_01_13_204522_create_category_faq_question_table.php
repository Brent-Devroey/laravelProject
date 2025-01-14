<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('category_faq_question', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id'); 
            $table->unsignedBigInteger('question_id'); 

            
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('faq_questions')->onDelete('cascade');

            $table->timestamps();
            $table->primary(['category_id', 'question_id']); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_faq_question'); 
    }
};
