<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Detail Peminjaman Buku</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Detail Peminjaman Buku
                        
                    </h3>
                    <hr />
                    <style>
                    .data-peminjaman p {
                      margin: 4px 0;
                    }
                    .label {
                      display: inline-block;
                      width: 200px; /* atur sesuai kebutuhan */
                      font-weight: bold;
                    color: #000;
                    text-align: left;
                    font-size: 13px;
                    }
                    </style>
                    
                    <div class="data-peminjaman">
                      <?php
                        $no = 0;
                        foreach ($data_peminjaman as $data) {
                      ?>
                        <p><span class="label">No Peminjaman</span>: <?= $data['no_peminjaman']; ?></p>
                        <p><span class="label">ID Anggota</span>: <?= $data['id_anggota']; ?></p>
                        <p><span class="label">Nama Anggota</span>: <?= $data['nama_anggota']; ?></p>
                        <p><span class="label">Tanggal Peminjaman</span>: <?= $data['tgl_pinjam']; ?></p>
                        <p><span class="label">Total Buku Yang Dipinjam</span>: <?= $data['total_pinjam']; ?></p>
                        <p><span class="label">Status Transaksi</span>: <?= $data['status_transaksi']; ?></p>
                        <p><span class="label">Status Ambil Buku</span>:
                          <?php if($data['status_ambil_buku'] == 'Sudah diambil'){ ?>
                            <span class="label label-success"><?= $data['status_ambil_buku']; ?></span>
                          <?php } else { ?>
                            <span class="label label-danger"><?= $data['status_ambil_buku']; ?></span>
                          <?php } ?>
                        </p>
                        <p><?php if($data['status_transaksi'] == 'Berjalan'){ ?>
                            <span class="btn btn-succes"><a href="<?= base_url('/peminjaman/selesai-transaksi-peminjaman/') .$data['no_peminjaman']; ?>">Tandai Selesai</a></span>
                          <?php } else { ?>
                            
                          <?php } ?></p>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function doDelete(idDelete){
        swal({
            title: "Hapus Data Anggota?",
            text: "Data yang sudah dihapus tidak dapat dikembalikan lagi!",
            icon: "warning",
            buttons : true,
            dangerMode: false,
        })
        .then(ok => {
            if(ok){
                window.location.href = "<?= base_url('anggota/hapus-data-anggota/'); ?>" + idDelete;
            }
            else{
                $(this).removeAttr('disabled');
            }
        })
    }
</script>