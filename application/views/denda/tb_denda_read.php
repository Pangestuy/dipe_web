<div class="content-wrapper">
    <section class="content-header">
        <h1>Halaman Denda<small>Detail Data</small></h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">


                    <div class="box-header with-border">
                        <h3 class="box-title">Denda</h3>
                    </div>

                    <div class="box-body">

                        <table class="table">
                            <tr>
                                <td>ID DETAIL TRANSAKSI</td>
                                <td><?php echo $ID_DETAIL_TRANSAKSI; ?></td>
                            </tr>
                            <tr>
                                <td>JUMLAH HARI</td>
                                <td><?php echo $JUMLAH_HARI; ?></td>
                            </tr>
                            <tr>
                                <td>TOTAL DENDA</td>
                                <td><?php echo $TOTAL_DENDA; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a href="<?php echo site_url('denda') ?>" class="btn btn-default">Cancel</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div><!--/.col (right) -->
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->