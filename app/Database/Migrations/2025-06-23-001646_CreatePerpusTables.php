<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePerpusTables extends Migration
{
    public function up()
    {
        // Table Admin
        $this->forge->addField([
            'id_admin' => [
                'type' => 'VARCHAR(6)', 'null' => TRUE
            ],
            'nama_admin' => [
                'type' => 'VARCHAR(50)', 'null' => TRUE
            ],
            'username_admin' => [
                'type' => 'VARCHAR(20)', 'null' => TRUE
            ],
            'password_admin' => [
                'type' => 'VARCHAR(255)', 'null' => TRUE
            ],
            'akses_level' => [
                'type' => "ENUM('1','KEPALA')", 'null' => TRUE
            ],
            'is_delete_admin' => [
                'type' => "ENUM('0','1')", 'null' => FALSE
            ],
            'created_at' => [
                'type' => 'DATETIME', 'null' => FALSE
            ],
            'updated_at' => [
                'type' => 'DATETIME', 'null' => FALSE
            ]
        ]);
        $this->forge->createTable('tbl_admin');

        // Table Anggota
        $this->forge->addField([
            'id_anggota' => [
                'type' => 'VARCHAR(6)', 'null' => TRUE
            ],
            'nama_anggota' => [
                'type' => 'VARCHAR(50)', 'null' => TRUE
            ],
            'jenis_kelamin' => [
                'type' => "ENUM('L','P')", 'null' => TRUE
            ],
            'no_tlp' => [
                'type' => 'VARCHAR(13)', 'null' => TRUE
            ],
            'alamat' => [
                'type' => 'VARCHAR(100)', 'null' => TRUE
            ],
            'email' => [
                'type' => 'VARCHAR(30)', 'null' => TRUE
            ],
            'password_anggota' => [
                'type' => 'VARCHAR(255)', 'null' => TRUE
            ],
            'is_delete_anggota' => [
                'type' => "ENUM('0','1')", 'null' => FALSE
            ],
            'created_at' => [
                'type' => 'DATETIME', 'null' => FALSE
            ],
            'updated_at' => [
                'type' => 'DATETIME', 'null' => FALSE
            ]
        ]);
        $this->forge->createTable('tbl_anggota');

        // Table Buku
        $this->forge->addField([
            'id_buku' => [
                'type' => 'VARCHAR(6)', 'null' => TRUE
            ],
            'judul_buku' => [
                'type' => 'VARCHAR(200)', 'null' => TRUE
            ],
            'pengarang' => [
                'type' => 'VARCHAR(50)', 'null' => TRUE
            ],
            'penerbit' => [
                'type' => 'VARCHAR(50)', 'null' => TRUE
            ],
            'tahun' => [
                'type' => 'VARCHAR(4)', 'null' => TRUE
            ],
            'jumlah_eksemplar' => [
                'type' => 'INT(3)', 'null' => FALSE
            ],
            'id_kategori' => [
                'type' => 'VARCHAR(6)', 'null' => TRUE
            ],
            'keterangan' => [
                'type' => 'VARCHAR(500)', 'null' => TRUE
            ],
            'id_rak' => [
                'type' => 'VARCHAR(6)', 'null' => TRUE
            ],
            'cover_buku' => [
                'type' => 'VARCHAR(255)', 'null' => FALSE
            ],
            'e_book' => [
                'type' => 'VARCHAR(30)', 'null' => FALSE
            ],
            'is_delete_buku' => [
                'type' => "ENUM('0','1')", 'null' => FALSE
            ],
            'created_at' => [
                'type' => 'DATETIME', 'null' => FALSE
            ],
            'updated_at' => [
                'type' => 'DATETIME', 'null' => FALSE
            ]
        ]);
        $this->forge->createTable('tbl_buku');

        // Table Detail_Peminjaman
        $this->forge->addField([
            'no_peminjaman' => [
                'type' => 'VARCHAR(12)', 'null' => FALSE
            ],
            'id_buku' => [
                'type' => 'VARCHAR(6)', 'null' => FALSE
            ],
            'status_pinjam' => [
                'type' => "ENUM('SEDANG')", 'null' => TRUE
            ],
            'perpanjangan' => [
                'type' => 'INT(1)', 'null' => FALSE
            ],
            'tgl_kembali' => [
                'type' => 'DATE', 'null' => FALSE
            ]
        ]);
        $this->forge->createTable('tbl_detail_peminjaman');

        // Table Kategori
        $this->forge->addField([
            'id_kategori' => [
                'type' => 'VARCHAR(6)', 'null' => TRUE
            ],
            'nama_kategori' => [
                'type' => 'VARCHAR(50)', 'null' => TRUE
            ],
            'is_delete_kategori' => [
                'type' => "ENUM('0','1')", 'null' => FALSE
            ],
            'created_at' => [
                'type' => 'DATETIME', 'null' => FALSE
            ],
            'updated_at' => [
                'type' => 'DATETIME', 'null' => FALSE
            ]
        ]);
        $this->forge->createTable('tbl_kategori');

        // Table Peminjaman
        $this->forge->addField([
            'no_peminjaman' => [
                'type' => 'VARCHAR(12)', 'null' => TRUE
            ],
            'id_anggota' => [
                'type' => 'VARCHAR(6)', 'null' => TRUE
            ],
            'tgl_pinjam' => [
                'type' => 'DATE', 'null' => FALSE
            ],
            'id_admin' => [
                'type' => 'VARCHAR(6)', 'null' => FALSE
            ],
            'status_transaksi' => [
                'type' => "ENUM('SELESAI','BERJALAN')", 'null' => FALSE
            ],
            'status_ambil_buku' => [
                'type' => "ENUM('BELUM')", 'null' => TRUE
            ],
            'qr_code' => [
                'type' => 'VARCHAR(30)', 'null' => FALSE
            ],
            'total_pinjam' => [
                'type' => 'INT(3)', 'null' => FALSE
            ]
        ]);
        $this->forge->createTable('tbl_peminjaman');

        // Table Pengembalian
        $this->forge->addField([
            'no_pengembalian' => [
                'type' => 'VARCHAR(12)', 'null' => FALSE
            ],
            'no_peminjaman' => [
                'type' => 'VARCHAR(12)', 'null' => FALSE
            ],
            'id_buku' => [
                'type' => 'VARCHAR(6)', 'null' => FALSE
            ],
            'denda' => [
                'type' => 'DOUBLE', 'null' => FALSE
            ],
            'tgl_pengembalian' => [
                'type' => 'DATE', 'null' => FALSE
            ],
            'id_admin' => [
                'type' => 'VARCHAR(6)', 'null' => FALSE
            ]
        ]);
        $this->forge->createTable('tbl_pengembalian');

        // Table Rak
        $this->forge->addField([
            'id_rak' => [
                'type' => 'VARCHAR(6)', 'null' => TRUE
            ],
            'nama_rak' => [
                'type' => 'VARCHAR(50)', 'null' => TRUE
            ],
            'is_delete_rak' => [
                'type' => "ENUM('0','1')", 'null' => FALSE
            ],
            'created_at' => [
                'type' => 'DATETIME', 'null' => FALSE
            ],
            'updated_at' => [
                'type' => 'DATETIME', 'null' => FALSE
            ]
        ]);
        $this->forge->createTable('tbl_rak');

        // Table Temp_Peminjaman
        $this->forge->addField([
            'id_anggota' => [
                'type' => 'VARCHAR(6)', 'null' => TRUE
            ],
            'id_buku' => [
                'type' => 'VARCHAR(6)', 'null' => TRUE
            ],
            'jumlah_temp' => [
                'type' => 'INT(3)', 'null' => FALSE
            ]
        ]);
        $this->forge->createTable('tbl_temp_peminjaman');

    }

    public function down()
    {
        $this->forge->dropTable('tbl_temp_peminjaman');
        $this->forge->dropTable('tbl_rak');
        $this->forge->dropTable('tbl_pengembalian');
        $this->forge->dropTable('tbl_peminjaman');
        $this->forge->dropTable('tbl_kategori');
        $this->forge->dropTable('tbl_detail_peminjaman');
        $this->forge->dropTable('tbl_buku');
        $this->forge->dropTable('tbl_anggota');
        $this->forge->dropTable('tbl_admin');
    }
}
