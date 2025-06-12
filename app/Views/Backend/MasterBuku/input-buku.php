
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li>Master Data Buku</li>
            <li class="active">Input Data Buku</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Input Buku</h3>
                    <hr />
                    <form action ="<?php echo base_url('buku/simpan-buku'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group col-md-6">
                            <label>Judul Buku</label>
                            <input type="text" class="form-control" name="judul_buku" placeholder="Masukan Judul Buku" required="required">
                        </div>
                        <div style="clear:both;"></div> 

                        <div class="form-group col-md-6">
                            <label>Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" placeholder="Masukan Nama Pengarang" required="required">
                        </div>
                        <div style="clear:both;"></div>     
                        
                        <div class="form-group col-md-6">
                            <label>Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" placeholder="Masukan Nama Penerbit" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Tahun</label>
                            <input type="text" class="form-control" onKeyPress="return goodchars(event,
                            '0123456789', this)" name="tahun" placeholder="Masukan Tahun" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Jumlah Eksemplar</label>
                            <input type="text" class="form-control" onKeyPress="return goodchars(event,
                            '0123456789', this)" name="jumlah_eksemplar" placeholder="Masukan Jumlah Eksemplar" required="required">
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
                            <input type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan" required="required">
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
                            <input type="file" name="cover_buku" accept="image/*" required>
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label for="foto">Upload E-book (Max 10MB):</label><br>
                            <input type="file" name="e_book" accept="application/pdf" required>
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