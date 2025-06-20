<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Transaksi Peminjaman Buku</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Transaksi Peminjaman Buku
                        <a href="<?= base_url('anggota/input-data-anggota'); ?>"><button type="button" class="btn btn-sm btn-primary pull-right">Input Data Anggota</button></a>
                    </h3>
                    <hr />
                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-sortable="true">No Peminjaman</th>
                                <th data-sortable="true">Nama Anggota</th>
                                <th data-sortable="true">Tanggal Peminjaman</th>
                                <th data-sortable="true">Total Buku Yang Dipinjam</th>
                                <th data-sortable="true">Status Transaksi</th>
                                <th data-sortable="true">Status Ambil Buku</th>
                                <th data-sortable="true">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_peminjaman as $data) {
                            ?>
                            <tr>
                                <td data-sortable="true"><?= $data['no_peminjaman']; ?></td>
                                <td data-sortable="true"><?= $data['nama_anggota']; ?></td>
                                <td data-sortable="true"><?= $data['tgl_pinjam']; ?></td>
                                <td data-sortable="true"><?= $data['total_pinjam']; ?></td>
                                <td data-sortable="true"><?= $data['status_transaksi']; ?></td>
                                <td data-sortable="true">
                                    <?php if($data['status_ambil_buku'] == 'Sudah diambil'){ ?>
                                        <span class="label label-success"><?= $data['status_ambil_buku']; ?></span>
                                    <?php } else { ?>
                                        <span class="label label-danger"><?= $data['status_ambil_buku']; ?></span>
                                    <?php } ?>                                                                            
                                </td>
                                <td>
                                    opsi
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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