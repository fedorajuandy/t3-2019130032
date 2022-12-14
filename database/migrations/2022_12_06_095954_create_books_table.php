<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * id: char(13), primary key
     * judul: varchar
     * halaman: integer
     * kategori: varchar
     * penerbit: varchar
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->char('id', 13)->primary();
            $table->string('judul');
            $table->integer('halaman');
            $table->string('kategori');
            $table->string('penerbit');
            $table->char('author_id', 13);
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
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
