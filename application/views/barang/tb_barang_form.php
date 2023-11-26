<!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Halaman Barang <small>form data barang</small></h1>
            
        </section><!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="box box-info">


                        <div class="box-header with-border">
                            <h3 class="box-title">Form Barang</h3>
                        </div><!-- /.box-header -->
                        
                        <!-- form start -->
                        <div class="box-body">
                            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="varchar">NAMA BARANG <?php echo form_error('NAMA_BARANG') ?></label>
                                <input type="text" class="form-control" name="NAMA_BARANG" id="NAMA_BARANG" placeholder="NAMA BARANG" value="<?php echo $NAMA_BARANG; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">MERK BARANG <?php echo form_error('MERK_BARANG') ?></label>
                                <input type="text" class="form-control" name="MERK_BARANG" id="MERK_BARANG" placeholder="MERK BARANG" value="<?php echo $MERK_BARANG; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="DESKRIPSI_BARANG">DESKRIPSI BARANG <?php echo form_error('DESKRIPSI_BARANG') ?></label>
                                <textarea class="form-control" rows="3" name="DESKRIPSI_BARANG" id="DESKRIPSI_BARANG" placeholder="DESKRIPSI BARANG"><?php echo $DESKRIPSI_BARANG; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="varchar">TAHUN BARANG <?php echo form_error('TAHUN_BARANG') ?></label>
                                <input type="number" class="form-control" name="TAHUN_BARANG" id="TAHUN_BARANG" placeholder="TAHUN BARANG" value="<?php echo $TAHUN_BARANG; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="decimal">HARGA BARANG <?php echo form_error('HARGA_BARANG') ?></label>
                                <input type="number" class="form-control" name="HARGA_BARANG" id="HARGA_BARANG" placeholder="HARGA BARANG" value="<?php echo $HARGA_BARANG; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">WARNA BARANG <?php echo form_error('WARNA_BARANG') ?></label>
                                <input type="text" class="form-control" name="WARNA_BARANG" id="WARNA_BARANG" placeholder="WARNA BARANG" value="<?php echo $WARNA_BARANG; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="int">STATUS SEWA <?php echo form_error('STATUS_SEWA') ?></label>
                                <select class="form-control" name="STATUS_SEWA" id="STATUS_SEWA">
                                    <option value="0" <?php if ($STATUS_SEWA==0) echo "selected" ?> >Tidak Disewa</option>
                                    <option value="1" <?php if ($STATUS_SEWA==1) echo "selected" ?> >Disewa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="int">STATUS BARANG <?php echo form_error('STATUS_BARANG') ?></label>
                                <select class="form-control" name="STATUS_BARANG" id="STATUS_BARANG">
                                    <option value="0" <?php if ($STATUS_BARANG==0) echo "selected" ?> >Tidak Aktif</option>
                                    <option value="1" <?php if ($STATUS_BARANG==1) echo "selected" ?> >Aktif</option>
                                </select> 
                            </div>
                            
                            <div class="form-group">
                                <label for="int">IMAGE BARANG</label>
                                <input class="form-control" type="file" name="PHOTO" id="PHOTO">
                            </div>

                            <input type="hidden" name="ID_BARANG" value="<?php echo $ID_BARANG; ?>" /> 
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            <a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a>
                        </form>
                        </div>                        
                    </div>
                </div><!--/.col (right) -->
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


