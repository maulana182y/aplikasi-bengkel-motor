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
              <li class="breadcrumb-item active">Tambah Supplier</li>
          </ol>

          <div class="car-mb-3">
            <div class="card-header">
                <h3>Tambah Supplier</h3>
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
                            <label for="varchar">Kode Supplier <?php echo form_error('kode_supplier') ?></label>
                            <input type="text" class="form-control" name="kode_supplier" id="kode_supplier" placeholder="Kode Supplier" value="<?php echo $kode_supplier; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Nama Supplier <?php echo form_error('nama_supplier') ?></label>
                            <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" placeholder="Nama Supplier" value="<?php echo $nama_supplier; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Username <?php echo form_error('username') ?></label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Password <?php echo form_error('password') ?></label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                        </div>
            <div class="card-footer clearfix">
                <input type="hidden" name="id_supplier" value="<?php echo $id_supplier; ?>" /> 
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                <a href="<?php echo site_url('Supplier') ?>" class="btn btn-default">Cancel</a>
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