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
              <li class="breadcrumb-item active">Data Barang Keluar</li>
          </ol>

          <div class="car-mb-3">
            <div class="card-header">
                <h3>Data Barang Keluar</h3>
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
                            <label for="varchar">Kode Barang <?php echo form_error('kode_barang') ?> </label>
                            <select name="kode_barang" class="form-control">
                                <option value="<?php echo $kode_barang ?>"><?php echo $kode_barang ?></option>
                                <?php 
                                $sql = $this->db->get('barang');
                                foreach ($sql->result() as $row) {
                                   ?>
                                   <option value="<?php echo $row->kode_barang ?>"><?php echo $row->nama_barang ?></option>
                               <?php } ?>
                           </select>
                       </div>
                  <div class="form-group">
                    <label for="date">Tanggal Keluar <?php echo form_error('tgl_keluar') ?></label>
                    <input type="date" class="form-control" name="tgl_keluar" id="tgl_keluar" placeholder="tgl_keluar" value="<?php echo $tgl_keluar; ?>" />
                  </div>
                  <div class="form-group">
                      <label for="int">Jumlah <?php echo form_error('jumlah') ?></label>
                      <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="jumlah" value="<?php echo $jumlah; ?>" />
                  </div>
                  <div class="card-footer clearfix">
                      <input type="hidden" name="id_barang_keluar" value="<?php echo $id_barang_keluar; ?>" /> 
                      <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                      <a href="<?php echo site_url('Barang_keluar') ?>" class="btn btn-default">Cancel</a>
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