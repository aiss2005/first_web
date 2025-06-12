<?php

namespace App\Controllers;

use App\Models\M_Buku;
use App\Models\M_Kategori;
use App\Models\M_Rak;

class Buku extends BaseController
{
    public function master_data_buku(){
        
        $modelBuku = new M_Buku;
        $uri = service('uri');
        $page = $uri->getSegment(2);
        $dataBuku = $modelBuku->getDataBuku(['tbl_buku.is_delete_buku' => '0'])->getResultArray();
        $kategoriModel = new M_Kategori();
        $kategori = $kategoriModel->getAllKategori();
        $data['kategori'] = $kategori;
        $data['page'] = $page;
        $data['web_title'] = "Master Data Buku";
        $data['dataBuku'] = $dataBuku;
        echo view('Backend/Template/header', $data);
        echo view('Backend/Template/sidebar',$data);
        echo view('Backend/MasterBuku/master-data-buku', $data);
        echo view('Backend/Template/footer', $data);
        
    }

    public function input_data_buku(){
        if(session()->get('ses_id')=="" or session()->get('ses_user')=="" or session()->get('ses_level')==""){
            session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
            
            return redirect()->to(base_url('admin/login-admin'));
        }
        else{

            $kategoriModel = new M_Kategori();
            $kategori = $kategoriModel->getAllKategori();
            $data['kategori'] = $kategori;

            $rakModel = new M_Rak();
            $rak = $rakModel->getAllRak();
            $data['rak'] = $rak;

            echo view('Backend/Template/header', $data);
            echo view('Backend/Template/sidebar', $data);
            echo view('Backend/MasterBuku/input-buku', $data);
            echo view('Backend/Template/footer', $data);
        }
    }

    public function simpan_data_buku(){
        if(session()->get('ses_id')=="" or session()->get('ses_user')=="" or session()->get('ses_level')==""){
            session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
            ?>
            <script>
                document.location = "<?= base_url('admin/login-admin'); ?>";
            </script>
            <?php
        }
        else{
            $modelRak = new M_Buku; 
            $judulBuku     = $this->request->getPost('judul_buku');      
            $pengarang     = $this->request->getPost('pengarang');
            $penerbit      = $this->request->getPost('penerbit');
            $kategoriBuku      = $this->request->getPost('kategori');
            $rak           = $this->request->getPost('rak');
            $keterangan    = $this->request->getPost('keterangan');
            $jumlahEksemplar = $this->request->getPost('jumlah_eksemplar');
            $tahun    = $this->request->getPost('tahun');

            if(!$this->validate([
                'cover_buku' => 'uploaded[cover_buku]|max_size[cover_buku, 1024]|ext_in[cover_buku,jpg,jpeg,png]',
            ])){
                session()->setFlashdata('error', 'Format file yang diizinkan : jpg, jpeg, png dengan maksimal 1MB');
                return redirect()->to('buku/input-data-buku')->withInput();
            }

            if(!$this->validate([
                'e_book' => 'uploaded[e_book]|max_size[e_book, 10240]|ext_in[e_book,pdf]',
            ])){
                session()->setFlashdata('error', 'Format file yang diizinkan : pdf dengan maksimal 10MB');
                return redirect()->to('buku/input-data-buku')->withInput();
            }
            
            $coverBuku = $this->request->getFile('cover_buku');
            $ext1 = $coverBuku->getClientExtension();
            $namaFile1 = "Cover-Buku-".date('Ymdhis').".".$ext1;
            $coverBuku->move('Assets/CoverBuku/', $namaFile1);

            $eBook = $this->request->getFile('e_book');
            $ext2 = $eBook->getClientExtension();
            $namaFile2 = "E-Book-".date('Ymdhis').".".$ext2;
            $eBook->move('Assets/E-Book/', $namaFile2);
            $modelBuku = new M_Buku;
            $hasil = $modelBuku->autoNumber()->getRowArray();

            if(!$hasil){
                $id = "BKU001";
            }
            else{
                
                $kode = $hasil['id_buku'];
                $noUrut = (int) substr($kode, -3);
                $noUrut++;
                $id = "BKU".sprintf("%03s", $noUrut);
            }
            
            $dataSimpan = [
                'id_buku'       => $id,
                'judul_buku'    => ucwords($judulBuku),
                'pengarang'     => ucwords($pengarang),
                'penerbit'      => ucwords($penerbit),
                'id_kategori'      => $kategoriBuku,
                'id_rak'           => $rak,
                'keterangan'    => $keterangan,
                'cover_buku'    => $namaFile1,
                'e_book'        => $namaFile2,
                'jumlah_eksemplar' => $jumlahEksemplar,
                'tahun'         => $tahun,
                'is_delete_buku' => '0',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ];
        
            $modelBuku->saveDataBuku($dataSimpan);
            session()->setFlashdata('success', 'Data Buku Berhasil Ditambahkan!!');
            ?>
            <script>
                document.location = "<?= base_url('buku/master-data-buku'); ?>";
            </script>
            <?php
                
        }        
    }

    public function edit_data_buku(){
        $uri = service('uri');
        $idEdit = $uri ->getSegment(3);
        $modelBuku = new M_Buku;
        $dataBuku = $modelBuku->getDataBuku(['sha1(id_buku)' => $idEdit])->getRowArray();
        session()->set('idUpdate', $dataBuku['id_buku']);

        $kategoriModel = new M_Kategori();
        $kategori = $kategoriModel->getAllKategori();
        $data['kategori'] = $kategori;
        $rakModel = new M_Rak();
        $rak = $rakModel->getAllRak();
        $data['rak'] = $rak;

        $page = $uri->getSegment(2);
        $data['page'] = $page;
        $data['web_title'] = "Edit Data Buku";
        $data['data_buku'] = $dataBuku;

        echo view('Backend/Template/header', $data);
        echo view('Backend/Template/sidebar', $data);
        echo view('Backend/MasterBuku/edit-buku', $data);
        echo view('Backend/Template/footer', $data);
    }

    public function update_buku(){
        $modelBuku = new M_Buku;

        $idUpdate = session()->get('idUpdate');
        $judulBuku     = $this->request->getPost('judul_buku');      
        $pengarang     = $this->request->getPost('pengarang');
        $penerbit      = $this->request->getPost('penerbit');
        $kategoriBuku      = $this->request->getPost('kategori');
        $rak           = $this->request->getPost('rak');
        $keterangan    = $this->request->getPost('keterangan');
        $jumlahEksemplar = $this->request->getPost('jumlah_eksemplar');
        $tahun    = $this->request->getPost('tahun');        

        if($judulBuku=="" and $pengarang=="" and $penerbit=="" and $kategoriBuku=="" and $rak=="" and $keterangan=="" and $jumlahEksemplar=="" and $tahun==""){
            session()->setFlashdata('error', 'Data tidak boleh kosong!!');
            ?>
            <script>
                history.go(-1);
            </script>
            <?php
        }
        else{
            $dataUpdate = [
                'judul_buku'    => ucwords($judulBuku),
                'pengarang'     => ucwords($pengarang),
                'penerbit'      => ucwords($penerbit),
                'id_kategori'      => $kategoriBuku,
                'id_rak'           => $rak,
                'keterangan'    => $keterangan,       
                'jumlah_eksemplar' => $jumlahEksemplar,
                'tahun'         => $tahun,         
                'updated_at' => date('Y-m-d H:i:s')
            ];
    
            $whereUpdate = ['id_buku' => $idUpdate];
            $modelBuku->updateDataBuku($dataUpdate, $whereUpdate);
            session()->remove('idUpdate');
            session()->setFlashdata('success', 'Data Rak Berhasil Diupdate!!');
            ?>
            <script>
                document.location = "<?= base_url('buku/master-data-buku'); ?>";
            </script>
            <?php
        }
    }

    public function hapus_data_buku(){
        $modelBuku = new M_Buku;
        $uri = service('uri');
        $idHapus = $uri->getSegment(3);
        $dataUpdate = [
            'is_delete_buku' => '1',
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $whereUpdate = ['sha1(id_buku)' => $idHapus];
        $modelBuku->updateDataBuku($dataUpdate, $whereUpdate);
        session()->setFlashdata('success', 'Data Rak Berhasil Dihapus!!');
        return redirect()->to(base_url('buku/master-data-buku'));
    }
}