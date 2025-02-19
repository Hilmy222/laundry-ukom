<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        {
            // Tabel Outlet
            Schema::create('outlets', function (Blueprint $table) {
                $table->id();
                $table->string('nama_outlet');
                $table->text('alamat_outlet');
                $table->string('telp_outlet', 15);
                $table->timestamps();
            });
    
            // Tabel User
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('nama', 100);
                $table->string('username', 30)->unique();
                $table->text('password');
                $table->unsignedBigInteger('id_outlet');
                $table->enum('role', ['admin', 'kasir', 'owner']);
                $table->timestamps();
    
                $table->foreign('id_outlet')->references('id')->on('outlets')->onDelete('cascade');
            });
    
            // Tabel Member
            Schema::create('customers_table', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('alamat');
                $table->enum('jenis_kelamin',['laki-laki','perempuan']);
                $table->string('tlp');
                $table->timestamps();
            });
    
            // Tabel Paket
            Schema::create('packages', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('outlet_id');
                $table->foreign('outlet_id')->references('id')->on('outlets')->onDelete('cascade');
                $table->string('jenis');
                $table->string('nama_paket');
                $table->double('harga');
                $table->timestamps();
            });
    
            // Tabel Transaksi
            Schema::create('transaction', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_outlet');
                $table->string('kode_invoice')->unique();
                $table->unsignedBigInteger('id_member');
                $table->datetime('tgl');
                $table->datetime('batas_waktu');
                $table->datetime('tgl_bayar')->nullable();
                $table->integer('biaya_tambahan');
                $table->double('diskon');
                $table->double('pajak');
                $table->enum('status', ['baru', 'proses', 'selesai', 'diambil']);
                $table->enum('dibayar', ['dibayar', 'belum_dibayar']);
                $table->unsignedBigInteger('id_user');
                $table->timestamps();
    
                $table->foreign('id_outlet')->references('id')->on('outlets')->onDelete('cascade');
                $table->foreign('id_member')->references('id')->on('customers_table')->onDelete('cascade');
                $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            });
    
            // Tabel Detail Transaksi
            Schema::create('tb_detail_transaction', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_transaksi');
                $table->unsignedBigInteger('id_paket');
                $table->double('qty');
                $table->text('keterangan')->nullable();
                $table->timestamps();
    
                $table->foreign('id_transaksi')->references('id')->on('transaction')->onDelete('cascade');
                $table->foreign('id_paket')->references('id')->on('packages')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loundry2');
    }
};
