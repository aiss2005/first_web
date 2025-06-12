<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Master Data Anggota</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Master Data Anggota
                        <a href="<?= base_url('anggota/input-data-anggota'); ?>"><button type="button" class="btn btn-sm btn-primary pull-right">Input Data Anggota</button></a>
                    </h3>
                    <hr />
                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-sortable="true">No</th>
                                <th data-sortable="true">Nama Anggota</th>
                                <th data-sortable="true">Email Anggota</th>
                                <th data-sortable="true">No Telpon</th>
                                <th data-sortable="true">Alamat</th>
                                <th data-sortable="true">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_user as $data) {
                            ?>
                            <tr>
                                <td data-sortable="true"><?= $no = $no + 1; ?></td>
                                <td data-sortable="true"><?= $data['nama_anggota']; ?></td>
                                <td data-sortable="true"><?= $data['email']; ?></td>
                                <td data-sortable="true"><?= $data['no_tlp']; ?></td>
                                <td data-sortable="true"><?= $data['alamat']; ?></td>
                                <td data-sortable="true">
                                    <?php 
                                    if (session()->get('ses_level') == "1") { 
                                    ?>
                                    <a href="<?= base_url('anggota/edit-data-anggota/') . sha1($data['id_anggota']); ?>"><button type="button" class="btn btn-sm btn-success">Edit</button></a>
                                    <a href="#" onclick="doDelete('<?= sha1($data['id_anggota']); ?>')"><button type="button" class="btn btn-sm btn-danger">Hapus</button></a>
                                    <?php } 
                                    else echo "Tidak tersedia";  ?>                                                                                
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