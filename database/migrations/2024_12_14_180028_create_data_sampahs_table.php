<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('data_sampahs', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->string('provinsi');
            $table->string('kabupaten_kota');
            $table->string('nama_fasilitas');
            $table->string('jenis');
            $table->string('status');
            $table->decimal('sampah_masuk_ton_per_thn', 10, 2);
            $table->decimal('sampah_masuk_landfill_ton_per_thn', 10, 2);
            $table->decimal('sampah_organik_terolah_ton_per_thn', 10, 2)->nullable();
            $table->decimal('sampah_anorganik_terolah_ton_per_thn', 10, 2)->nullable();
            $table->decimal('recovery_pemulung_ton_per_thn', 10, 2)->nullable();
            $table->decimal('energi_mw', 10, 2)->nullable();
            $table->string('alamat');
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('pengelola');
            $table->decimal('luas_hektar', 10, 2)->nullable();
            $table->string('sistem_operasional');
            $table->date('tgl_awal_operasi')->nullable();
            $table->date('tgl_akhir_operasi')->nullable();
            $table->decimal('luas_landfill_aktif_m2', 10, 2)->nullable();
            $table->string('pencatatan');
            $table->string('jembatan_timbang');
            $table->string('penutupan_sampah_zona_aktif');
            $table->string('ipl')->nullable();
            $table->integer('jml_uji_lindi')->nullable();
            $table->string('ada_drainase')->nullable();
            $table->string('pemanfaatan_gas_metana')->nullable();
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_sampahs');
    }
};
