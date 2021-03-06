<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisTiketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_tikets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tiket')->nullable();
            $table->integer('harga')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('foto_tiket')->nullable();
            $table->foreignId('event_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_tikets');
    }
}
