<!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Halaman Barang</h1>
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
                            <div class="row">
                                <div class="col-md-12 text-center">
                                        <div style="margin-top: 4px"  id="message">
                                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                        </div>
                                </div>
                                <div class="col-md-12 text-right">
                                        <?php echo anchor(site_url('barang/create'), 'Create', 'class="btn btn-primary"'); ?>
                                </div>                  
                            </div>
                            <br><br>
                            <table class="table table-bordered table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th width="80px">No</th>
                                <th>NAMA BARANG</th>
                                <th>MERK BARANG</th>
                                <!-- <th>DESKRIPSI BARANG</th> -->
                                <th>TAHUN BARANG</th>
                                <th>HARGA BARANG</th>
                                <!-- <th>WARNA BARANG</th> -->
                                <!-- <th>IMAGE</th> -->
                                <th>STATUS SEWA</th>
                                <th>STATUS BARANG</th>
                                <th>CREATED BARANG</th>
                                <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <?php var_dump($data) ?> -->
                                    <?php foreach ($data as $key => $val): ?>
                                        <tr>
                                            <td><?php echo $key+1 ?></td>
                                            <td><?php echo $val->NAMA_BARANG; ?></td>
                                            <td><?php echo $val->MERK_BARANG ?></td>
                                            <!-- <td><?php echo $val->DESKRIPSI_BARANG ?></td> -->
                                            <td><?php echo $val->TAHUN_BARANG ?></td>
                                            <td>Rp. <?php echo number_format($val->HARGA_BARANG)?></td>
                                            <!-- <td><?php echo $val->WARNA_BARANG ?></td> -->
                                            <!-- <td><img src="<?php echo base_url('upload/m/'.$val->PHOTO) ?>"></td> -->
                                            <td><?php if ($val->STATUS_SEWA==1) echo "Disewa"; else echo "Tidak Disewa"; ?></td>
                                            <td><?php if ($val->STATUS_BARANG==1) echo "Aktif"; else echo "Tidak Aktif";  ?></td>
                                            <td><?php echo $val->CREATED_BARANG ?></td>
                                            <td class="text-center"><a href="<?php echo base_url('barang/update').'/'.$val->ID_BARANG ?>">Edit</a>&nbsp;||&nbsp;<a href="<?php echo base_url('barang/read').'/'.$val->ID_BARANG ?>">Detail</a>&nbsp;||&nbsp;<a href="<?php echo base_url('barang/delete').'/'.$val->ID_BARANG ?>">Delete</a></td>
                                        </tr>    
                                    <?php endforeach ?>
                                    
                                </tbody>
                            </table>
                        </div>                        
                    </div>
                </div><!--/.col (right) -->
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->




        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var t = $("#mytable").dataTable({});
            });
        </script>
