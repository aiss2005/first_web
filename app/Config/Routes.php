<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/kece','Home::gita');
$routes->get('/oshaoshi/(:alpha)/(:alpha)','Home::tryy/$1/$2');
$routes->get('/home/ganti/(:alpha)/(:num)/(:alphanum)', 'Home::belajar_segment/$1/$2/$3');
$routes->get('/home/pilih/(:any)/(:any)/(:any)','Home::tryy/$1/$2/$3');
$routes->get('/home/apalah/(:any)','Home::tirismang/$1');
$routes->get('/kelarr.com','Home::kelarr');
$routes->get('/home/ya','Home::looping');
$routes->get('/home/haha','Home::percabangan');
$routes->get('/info','Home::info');
$routes->get('/gd','Home::gd');
$routes->get('/gdh','Home::gdh');

//admin
$routes->get('/admin/login-admin','Admin::login');
$routes->get('/admin/dashboard-admin','Admin::dashboard');
$routes->get('/home/anjayy','Home::hashh');
$routes->post('/admin/autentikasi-login','Admin::autentikasi');
$routes->get('/admin/logout','Admin::logout');
$routes->get('/admin/master-data-admin','Admin::master_data_admin');
$routes->get('/admin/input-data-admin','Admin::input_data_admin');
$routes->post('/admin/simpan-admin','Admin::simpan_data_admin');
$routes->get('/admin/edit-data-admin/(:alphanum)','Admin::edit_data_admin/$1');
$routes->post('/admin/update-admin','Admin::update_admin');
$routes->get('/admin/hapus-data-admin/(:alphanum)','Admin::hapus_data_admin/$1');

//anggota
$routes->get('/anggota/master-data-anggota','Anggota::master_data_anggota');
$routes->get('/anggota/login-anggota','Anggota::login_anggota');
$routes->get('/anggota/input-data-anggota','Anggota::input_data_anggota');
$routes->post('/anggota/simpan-anggota','Anggota::simpan_data_anggota');
$routes->get('/anggota/edit-data-anggota/(:alphanum)','Anggota::edit_data_anggota/$1');
$routes->post('/anggota/update-anggota','Anggota::update_anggota');
$routes->get('/anggota/hapus-data-anggota/(:alphanum)','Anggota::hapus_data_anggota/$1');

//kategori
$routes->get('/kategori/master-data-kategori','Kategori::master_data_kategori');
$routes->get('/kategori/input-data-kategori','Kategori::input_data_kategori');
$routes->get('/kategori/edit-data-kategori/(:alphanum)','Kategori::edit_data_kategori/$1');
$routes->post('/kategori/simpan-kategori','Kategori::simpan_data_kategori');
$routes->post('/kategori/update-kategori','Kategori::update_kategori');
$routes->get('/kategori/hapus-data-kategori/(:alphanum)','Kategori::hapus_data_kategori/$1');

//rak
$routes->get('/rak/master-data-rak','Rak::master_data_rak');
$routes->get('/rak/input-data-rak','Rak::input_data_rak');
$routes->post('/rak/simpan-rak','Rak::simpan_data_rak');
$routes->get('/rak/edit-data-rak/(:alphanum)','Rak::edit_data_rak/$1');
$routes->post('/rak/update-rak','Rak::update_rak');
$routes->get('/rak/hapus-data-rak/(:alphanum)','Rak::hapus_data_rak/$1');

//buku
$routes->get('/buku/master-data-buku','Buku::master_data_buku');
$routes->get('/buku/input-data-buku','Buku::input_data_buku');
$routes->post('/buku/simpan-buku','Buku::simpan_data_buku');
$routes->get('/rak/edit-data-rak/(:alphanum)','Rak::edit_data_rak/$1');
$routes->post('/rak/update-rak','Rak::update_rak');
$routes->get('/rak/hapus-data-rak/(:alphanum)','Rak::hapus_data_rak/$1');
$routes->get('/buku/edit-data-buku/(:alphanum)','Buku::edit_data_buku/$1');
$routes->post('/buku/update-buku','Buku::update_buku');
$routes->get('/buku/hapus-data-buku/(:alphanum)','Buku::hapus_data_buku/$1');

//peminjaman

$routes->get('/peminjaman/peminjaman-step-1','Peminjaman::peminjaman_step1');
$routes->post('/peminjaman/peminjaman-step-2','Peminjaman::peminjaman_step2');
$routes->get('/peminjaman/peminjaman-step-2','Peminjaman::peminjaman_step2');
$routes->get('/peminjaman/simpan-temp-pinjam/(:alphanum)','Peminjaman::simpan_temp_peminjaman/$1');
$routes->get('/peminjaman/simpan-transaksi-peminjaman','Peminjaman::simpan_transaksi_peminjaman');
$routes->get('/peminjaman/hapus-temp/(:alphanum)','Peminjaman::hapus_peminjaman/$1');
$routes->get('/peminjaman/simpan-transaksi-peminjaman','Peminjaman::simpan_transaksi_peminjaman');
$routes->get('/peminjaman/data-transaksi-peminjaman','Peminjaman::data_peminjaman');
$routes->get('/peminjaman/detail-transaksi-peminjaman/(:alphanum)','Peminjaman::detail_peminjaman/$1');
