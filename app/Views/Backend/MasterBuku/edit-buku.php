
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li>Master Data Buku</li>
            <li class="active">Edit Data Buku</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Edit Buku</h3>
                    <hr />
                    <form action ="<?php echo base_url('buku/update-buku'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group col-md-6">
                            <label>Judul Buku</label>
                            <input type="text" class="form-control" name="judul_buku" placeholder="Masukan Judul Buku" value="<?php echo $data_buku['judul_buku'];?>" required="required">
                        </div>
                        <div style="clear:both;"></div> 

                        <div class="form-group col-md-6">
                            <label>Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" placeholder="Masukan Nama Pengarang" value="<?php echo $data_buku['pengarang'];?>" required="required">
                        </div>
                        <div style="clear:both;"></div>     
                        
                        <div class="form-group col-md-6">
                            <label>Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" placeholder="Masukan Nama Penerbit" value="<?php echo $data_buku['penerbit'];?>" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Tahun</label>
                            <input type="text" class="form-control" onKeyPress="return goodchars(event,
                            '0123456789', this)" name="tahun" placeholder="Masukan Tahun" value="<?php echo $data_buku['tahun'];?>" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Jumlah Eksemplar</label>
                            <input type="text" class="form-control" onKeyPress="return goodchars(event,
                            '0123456789', this)" name="jumlah_eksemplar" placeholder="Masukan Jumlah Eksemplar" value="<?php echo $data_buku['jumlah_eksemplar'];?>" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                        <label for="kategori">Pilih Kategori:</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['id_kategori']; ?>"><?= esc($k['nama_kategori']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan" value="<?php echo $data_buku['keterangan'];?>" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                        <label for="rak">Pilih Rak:</label>
                        <select name="rak" id="rak" class="form-control">
                            <option value="">-- Pilih Rak --</option>
                            <?php foreach ($rak as $r): ?>
                                <option value="<?= $r['id_rak']; ?>"><?= esc($r['nama_rak']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                        <div style="clear:both;"></div>
                        
                        <div class="form-group col-md-6">
                            <label for="foto">Upload Cover Buku (Max 1MB):</label><br>
                            
                            <iframe src="<?= base_url('Assets/CoverBuku/' . $data_buku['cover_buku']); ?>" frameborder="0"></iframe>
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label for="foto">Upload E-book (Max 10MB):</label><br>
                            
                            <iframe src="<?= base_url('Assets/E-Book/' . $data_buku['e_book']); ?>" frameborder="0"></iframe>
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