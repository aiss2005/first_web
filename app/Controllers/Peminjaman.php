<?php

namespace App\Controllers;

use App\Models\M_Anggota;
use App\Models\M_Peminjaman;
use App\Models\M_Buku;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class Peminjaman extends BaseController
{
    public function peminjaman_step1(){
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $data['page'] = $page;
        $data['web_title'] = "Transaksi Peminjaman Buku";

        echo view('Backend/Template/header', $data);
        echo view('Backend/Template/sidebar', $data);
        echo view('Backend/Transaksi/peminjaman-step-1', $data);
        echo view('Backend/Template/footer', $data);
    }

    public function peminjaman_step2(){
        $modelAnggota = new M_Anggota();
        $modelBuku = new M_Buku();
        $modelPeminjaman = new M_Peminjaman();
        $uri = service('uri');
        $page = $uri->getSegment(2);

        if($this->request->getPost('id_anggota')){
            $idAnggota = $this->request->getPost('id_anggota');
            session()->set(['idAgt' => $idAnggota]);
        }
        else{
            $idAnggota = session()->get('idAgt');
        }

        $cekPeminjaman = $modelPeminjaman->getDataPeminjaman(['id_anggota' => $idAnggota, 'status_transaksi' => "Berjalan"])->getNumRows();
        if($cekPeminjaman > 0){
            session()->setFlashdata('error', 'Anggota ini masih memiliki transaksi peminjaman yang belum selesai.');
            return redirect()->to(base_url('peminjaman/peminjaman-step-1'));
        }
        else{
            $dataAnggota = $modelAnggota->getDataAnggota(['id_anggota' => $idAnggota])->getRowArray();
            $dataBuku = $modelBuku->getDataBukuJoin()->getResultArray();
            $jumlahTemp = $modelPeminjaman->getDataTemp(['id_anggota' => $idAnggota])->getNumRows();
            $data['jumlahTemp'] = $jumlahTemp;
            $dataTemp = $modelPeminjaman->getDataTempJoin(['tbl_temp_peminjaman.id_anggota' => $idAnggota])->getResultArray();
            $data['page'] = $page;
            $data['web_title'] = "Transaksi Peminjaman Buku";
            $data['dataAnggota'] = $dataAnggota;
            $data['dataBuku'] = $dataBuku;
            $data['dataTemp'] = $dataTemp;

            echo view('Backend/Template/header', $data);
            echo view('Backend/Template/sidebar', $data);
            echo view('Backend/Transaksi/peminjaman-step-2', $data);
            echo view('Backend/Template/footer', $data);
        }
    }

    public function simpan_temp_peminjaman(){
        $modelPeminjaman = new M_Peminjaman;
        $modelBuku = new M_Buku;
        $uri = service('uri');
        $idBuku = $uri->getSegment(3);
        $dataBuku = $modelBuku->getDataBuku(['sha1(id_buku)'=>$idBuku])->getRowArray();
        $adaTemp = $modelPeminjaman->getDataTemp(['sha1(id_buku)' => $idBuku])->getNumRows();
        $adaBerjalan = $modelPeminjaman->getDataPeminjaman(['id_anggota'=> session()->get('idAgt'),'status_transaksi' => 'Berjalan'])->getNumRows();
        if($adaTemp){
            session()->setFlashdata('error','Satu Anggota hanya boleh meminjam satu buku yang sama pada satu waktu.');
            return redirect()->to(base_url('peminjaman/peminjaman-step-2'));
        }
        elseif($adaBerjalan){
            session()->setFlashdata('error','Anggota ini masih memiliki transaksi peminjaman yang belum selesai.');
            return redirect()->to(base_url('peminjaman/peminjaman-step-2'));
        }
        else{
            $dataSimpanTemp=[
                'id_anggota' => session()->get('idAgt'),
                'id_buku' => $dataBuku['id_buku'],
                'jumlah_temp' => '1'
            ];
            $modelPeminjaman->saveDataTemp($dataSimpanTemp);
            $stok=$dataBuku['jumlah_eksemplar'] - 1;
            $dataUpdate = [
                'jumlah_eksemplar' => $stok
            ];
            $modelBuku->updateDataBuku($dataUpdate,['sha1(id_buku)' => $idBuku]);
            session()->setFlashdata('success', 'Buku berhasil ditambahkan ke keranjang peminjaman.');
            return redirect()->to(base_url('peminjaman/peminjaman-step-2'));
        }
    }

    public function hapus_peminjaman(){
        $modelPeminjaman = new M_Peminjaman;
        $modelBuku = new M_Buku;
        $uri = service('uri');
        $idBuku = $uri->getSegment(3);
        $dataBuku = $modelBuku->getDataBuku(['sha1(id_buku)' => $idBuku])->getRowArray();
        $modelPeminjaman->hapusDataTemp(['sha1(id_buku)' => $idBuku, 'id_anggota' => session()->get('idAgt')]);
        $stok = $dataBuku['jumlah_eksemplar'] + 1;
        $dataUpdate = [
            'jumlah_eksemplar' => $stok
        ];
        $modelBuku->updateDataBuku($dataUpdate, ['sha1(id_buku)' => $idBuku]);
        session()->setFlashdata('success', 'Buku berhasil dihapus dari keranjang peminjaman.');
        return redirect()->to(base_url('peminjaman/peminjaman-step-2'));
    }

    public function simpan_transaksi_peminjaman(){
        $modelPeminjaman = new M_Peminjaman;
        $idPeminjaman = date('YmdHis');
        $time_sekarang=time();
        $kembali=date("Y-m-d",strtotime("+7 days", $time_sekarang));
        $jumlahPinjam = $modelPeminjaman->getDataTemp(['id_anggota' => session()->get('idAgt')])->getNumRows();
        $dataQr = $idPeminjaman;
        $labelQr = $idPeminjaman;
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($dataQr)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(ErrorCorrectionLevel::High)
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
            ->logoPath(FCPATH . 'Assets/logo_bsi.png')
            ->logoResizeToWidth(50)
            ->logoPunchoutBackground(true)
            ->labelText($labelQr)
            ->labelFont(new NotoSans(20))
            ->labelAlignment(LabelAlignment::Center)
            ->validateResult(false)
            ->build();
        header('Content-Type: '.$result->getMimeType());
        $namaQR = "qr_" . $idPeminjaman . ".png";
        $result->saveToFile(FCPATH . 'Assets/qr_code/' . $namaQR);

        $dataSimpan = [
            'no_peminjaman' => $idPeminjaman,
            'id_anggota' => session()->get('idAgt'),
            'tgl_pinjam' => date('Y-m-d'),
            'total_pinjam' => $jumlahPinjam,
            'id_admin' => '-',
            'status_transaksi' => 'Berjalan',
            'status_ambil_buku' => 'Sudah Diambil'
        ];
        $modelPeminjaman->saveDataPeminjaman($dataSimpan);

        $dataTemp = $modelPeminjaman->getDataTemp(['id_anggota' => session()->get('idAgt')])->getResultArray();
        foreach($dataTemp as $sementara){
            $simpanDetail = [
                'no_peminjaman' => $idPeminjaman,
                'id_buku' => $sementara['id_buku'],                
                'status_pinjam' => 'Sedang Dipinjam',    
                'perpanjangan' => '2',          
                'tgl_kembali' => $kembali
            ];
            $modelPeminjaman->saveDataDetail($simpanDetail);
        }

        $modelPeminjaman->hapusDataTemp(['id_anggota' => session()->get('idAgt')]);
        session()->remove('idAgt');
        session()->setFlashdata('success', 'Transaksi peminjaman buku berhasil disimpan.');
        ?>
        <script>
            document.location = "<?= base_url('peminjaman/data-transaksi-peminjaman'); ?>";
        </script>
        <?php
    }
}

?>