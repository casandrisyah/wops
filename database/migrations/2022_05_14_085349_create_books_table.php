<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('author');
            $table->string('publisher');
            $table->string('cover');
            $table->string('year', 4);
            $table->string('price', 10);
            $table->string('stock', 3);
            $table->text('description');
            $table->enum('status', ['available', 'unavailable'])->default('available');
            $table->enum('category', ['novel', 'cerpen', 'komik', 'ensiklopedia', 'biografi', 'dongeng']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
