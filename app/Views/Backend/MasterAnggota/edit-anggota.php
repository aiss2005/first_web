<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li>Master Data Anggota</li>
            <li class="active">Edit Data Anggota</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Edit Anggota</h3>
                    <hr />
                    <form action ="<?php echo base_url('anggota/update-anggota'); ?>" method="post">
                        <div class="form-group col-md-6">
                            <label>Nama Anggota</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Admin" value="<?php echo $data_anggota['nama_anggota'];?>" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Email Anggota</label>
                            <input type="text" class="form-control" value="<?php echo $data_anggota['email'];?>" readonly="readonly" onKeyPress="return goodchars(event,
                            'abcdefghijklmnopqrstuvwxyz_ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', this)" name="username" placeholder="Masukan Username Admin" required="required">
                        </div>
                        <div style="clear:both;"></div>  
                        
                        <div class="form-group col-md-6">
                            <label>Nomor Telepon</label>
                            <input type="text" class="form-control" onKeyPress="return goodchars(event,
                            '0123456789', this)" name="telp" placeholder="Masukan Nomor Telepon Anggota" value="<?php echo $data_anggota['no_tlp'];?>" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Alamat Anggota</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat Anggota" value="<?php echo $data_anggota['alamat'];?>" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?php echo base_url('admin/master-data-admin');?> "><button type="button" class="btn btn-danger">Batal</button></a>
                        </div>
                        <div style="clear:both;"></div>
                    </form>
                </div>
            </div>
        </div>                        

    </div>

</div>