<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li>Transaksi</li>
            <li class="active">Peminjaman</li>
        </ol>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Input Anggota</h3>
                    <hr />
                    <form action="<?= base_url('peminjaman/peminjaman-step-2'); ?>" method="post">
                        <div class="form-group col-md-6">
                            <label>ID Anggota</label>
                            <select name="id_anggota" id="id_anggota" class="form-control">
                            <option value="">-- Pilih ID Anggota --</option>
                            <?php foreach ($dataAnggota as $a): ?>
                                <option value="<?= $a['id_anggota']; ?>"><?= esc($a['id_anggota']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Next</button>
                            <a href="<?= base_url('peminjaman/peminjaman-step-1'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                        </div>
                        <div style="clear:both;"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>