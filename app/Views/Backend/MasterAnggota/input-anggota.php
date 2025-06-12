
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li>Master Data Anggota</li>
            <li class="active">Input Data Anggota</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Input Anggota</h3>
                    <hr />
                    <form action ="<?php echo base_url('anggota/simpan-anggota'); ?>" method="post">
                        <div class="form-group col-md-6">
                            <label>Nama Anggota</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Anggota" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" required="required">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Email Anggota</label>
                            <input type="email" class="form-control" onKeyPress="return goodchars(event,
                            'abcdefghijklmnopqrstuvwxyz@._-ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', this)" name="email" placeholder="Masukan Email Anggota" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Nomor Telepon</label>
                            <input type="text" class="form-control" onKeyPress="return goodchars(event,
                            '0123456789', this)" name="telp" placeholder="Masukan Nomor Telepon Anggota" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Alamat Anggota</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat Anggota" required="required">
                        </div>
                        <div style="clear:both;"></div>
                        

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?php echo base_url('anggota/master-data-anggota');?> "><button type="button" class="btn btn-danger">Batal</button></a>
                        </div>
                        <div style="clear:both;"></div>
                    </form>
                </div>
            </div>
        </div>                        

    </div>

</div>