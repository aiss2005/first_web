<?php

namespace App\Controllers;

use App\Models\M_Rak;

class Rak extends BaseController
{
    public function master_data_rak(){
        if(session()->get('ses_id')=="" or session()->get('ses_user')=="" or session()->get('ses_level')==""){
            session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
            ?>
            <script>
                document.location = "<?= base_url('admin/login-admin'); ?>";
            </script>
            <?php
        }
        else{
            $modelRak = new M_Rak;
            $uri = service('uri');
            $pages = $uri->getSegment(2);
            $dataUser = $modelRak->getDataRak(['is_delete_rak' => '0'])->getResultArray();
            $data['pages'] = $pages;
            $data['data_user'] = $dataUser;

            echo view('Backend/Template/header', $data);
            echo view('Backend/Template/sidebar',$data);
            echo view('Backend/MasterRak/master-data-rak', $data);
            echo view('Backend/Template/footer', $data);
        }
    }

    public function input_data_rak(){
        if(session()->get('ses_id')=="" or session()->get('ses_user')=="" or session()->get('ses_level')==""){
            session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
            
            return redirect()->to(base_url('admin/login-admin'));
        }
        else{
            echo view('Backend/Template/header');
            echo view('Backend/Template/sidebar');
            echo view('Backend/MasterRak/input-rak');
            echo view('Backend/Template/footer');
        }
    }

    public function simpan_data_rak(){
        if(session()->get('ses_id')=="" or session()->get('ses_user')=="" or session()->get('ses_level')==""){
            session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
            ?>
            <script>
                document.location = "<?= base_url('admin/login-admin'); ?>";
            </script>
            <?php
        }
        else{
            $modelRak = new M_Rak; 
            $nama     = $this->request->getPost('nama');                
            $cekUname = $modelRak->getDataRak(['nama_rak' => $nama])->getNumRows();
            if($cekUname > 0){
                session()->setFlashdata('error', 'Username sudah digunakan!!');
                return redirect()->to(base_url('rak/input-data-rak'));
            }
            else{
                $hasil = $modelRak->autoNumber()->getRowArray();
                if(!$hasil){
                    $id = "RAK001";
                }
                else{
                    $kode = $hasil['id_rak'];
                    $noUrut = (int) substr($kode, -3);
                    $noUrut++;
                    $id = "RAK".sprintf("%03s", $noUrut);
                }
            
                $dataSimpan = [
                    'id_rak'        => $id,
                    'nama_rak'      => $nama,                    
                    'is_delete_rak' => '0',
                    'created_at'      => date('Y-m-d H:i:s'),
                    'updated_at'      => date('Y-m-d H:i:s')
                ];
            
                $modelRak->saveDataRak($dataSimpan);
                session()->setFlashdata('success', 'Data Rak Berhasil Ditambahkan!!');
                ?>
                <script>
                    document.location = "<?= base_url('rak/master-data-rak'); ?>";
                </script>
                <?php
            }            
        }        
    }

    public function edit_data_rak(){
        $uri = service('uri');
        $idEdit = $uri ->getSegment(3);
        $modelRak = new M_Rak;
        $dataRak = $modelRak->getDataRak(['sha1(id_rak)' => $idEdit])->getRowArray();
        session()->set('idUpdate', $dataRak['id_rak']);

        $page = $uri->getSegment(2);
        $data['page'] = $page;
        $data['web_title'] = "Edit Data Rak";
        $data['data_rak'] = $dataRak;

        echo view('Backend/Template/header', $data);
        echo view('Backend/Template/sidebar', $data);
        echo view('Backend/MasterRak/edit-rak', $data);
        echo view('Backend/Template/footer', $data);
    }

    public function update_rak(){
        $modelRak = new M_Rak;

        $idUpdate = session()->get('idUpdate');
        $nama = $this->request->getPost('nama');        

        if($nama==""){
            session()->setFlashdata('error', 'Data tidak boleh kosong!!');
            ?>
            <script>
                history.go(-1);
            </script>
            <?php
        }
        else{
            $dataUpdate = [
                'nama_rak' => $nama,                
                'updated_at' => date('Y-m-d H:i:s')
            ];
    
            $whereUpdate = ['id_rak' => $idUpdate];
            $modelRak->updateDataRak($dataUpdate, $whereUpdate);
            session()->remove('idUpdate');
            session()->setFlashdata('success', 'Data Rak Berhasil Diupdate!!');
            ?>
            <script>
                document.location = "<?= base_url('rak/master-data-rak'); ?>";
            </script>
            <?php
        }
    }

    public function hapus_data_rak(){
        $modelRak = new M_Rak;
        $uri = service('uri');
        $idHapus = $uri->getSegment(3);
        $dataUpdate = [
            'is_delete_rak' => '1',
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $whereUpdate = ['sha1(id_rak)' => $idHapus];
        $modelRak->updateDataRak($dataUpdate, $whereUpdate);
        session()->setFlashdata('success', 'Data Rak Berhasil Dihapus!!');
        return redirect()->to(base_url('rak/master-data-rak'));
    }
}