<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peserta');
            $table->string('asal')->nullable();
            $table->string('kode_tiket')->unique();
            $table->string('bukti_pembayaran')->nullable();
            $table->text('keterangan')->nullable();
            $table->foreignId('jenis_tiket')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('agen_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tikets');
    }
}
