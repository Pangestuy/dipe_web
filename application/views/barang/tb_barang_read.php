<!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Halaman Barang </h1>
            
        </section><!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="box box-info">


                        <div class="box-header with-border">
                            <h3 class="box-title">Barang</h3>
                        </div><!-- /.box-header -->
                        
                        <!-- form start -->
                        <div class="box-body">
                            <h2 style="margin-top:0px">Detail <?php echo $NAMA_BARANG; ?></h2>
							<table class="table">
							    <tr><td>NAMA BARANG</td><td><?php echo $NAMA_BARANG; ?></td></tr>
							    <tr><td>MERK BARANG</td><td><?php echo $MERK_BARANG; ?></td></tr>
							    <tr><td>DESKRIPSI BARANG</td><td><?php echo $DESKRIPSI_BARANG; ?></td></tr>
							    <tr><td>TAHUN BARANG</td><td><?php echo $TAHUN_BARANG; ?></td></tr>
							    <tr><td>HARGA BARANG</td><td>Rp. <?php echo number_format($HARGA_BARANG) ?></td></tr>
							    <tr><td>WARNA BARANG</td><td><?php echo $WARNA_BARANG; ?></td></tr>
                                <tr><td>STATUS SEWA</td><td><?php if ($STATUS_SEWA==1) echo "Disewa"; else echo "Tidak Disewa"; ?></td></tr>
							    <tr><td>STATUS BARANG</td><td><?php if ($STATUS_BARANG==1) echo "Aktif"; else echo "Tidak Aktif"; ?></td></tr>
							    <tr><td>CREATED BARANG</td><td><?php echo $CREATED_BARANG; ?></td></tr>
                                <tr><td>IMAGE</td><td><img src="<?php echo base_url('upload/barang/'.$IMAGE); ?>" width="450px"></td></tr>

							    <tr><td></td><td><a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a></td></tr>
							</table>
                        </div>                        
                    </div>
                </div><!--/.col (right) -->
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
