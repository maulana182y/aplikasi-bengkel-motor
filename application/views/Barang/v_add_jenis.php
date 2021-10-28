<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/navigation'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Tables</li>
          </ol>

          <div class="car-mb-3">
            <div class="card-header">
                <h3>Tambah Jenis Barang</h3>
            </div>
        </div>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="varchar">Jenis Barang <?php echo form_error('jenis_barang') ?></label>
                            <input type="text" class="form-control" name="jenis_barang" id="jenis_barang" placeholder="Jenis Barang" value="<?php echo $jenis_barang; ?>" />
                        </div>
                        
            <div class="card-footer clearfix">
                <input type="hidden" name="id_jenis" value="<?php echo $id_jenis; ?>" /> 
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                <a href="<?php echo site_url('Jenis_barang') ?>" class="btn btn-default">Cancel</a>
            </div>
        </form> 
    </div>
</div>
</div>
</div>
</section>
</div>

<?php $this->load->view('template/footer'); ?>

</body>

</html>