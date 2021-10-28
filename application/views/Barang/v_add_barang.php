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
                <h3>Tambah Barang</h3>
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
                    <form role="form" action="<?php echo base_url() . 'Barang/add_barang'; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="varchar">Kode Barang <?php echo form_error('kode_barang') ?></label>
                            <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode Barang" value="<?php echo $kode_barang; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="int">Harga <?php echo form_error('harga') ?></label>
                            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="int">Foto Barang </label>
                            <input type="file" class="form-control" name="foto_barang" />
                        </div>
                        <div class="form-group">
                            <label for="int">Jenis Barang </label>
                            <select name="id_jenis" class="form-control">
                                <option value="<?php echo $id_jenis ?>"><?php echo $id_jenis ?></option>
                                <?php 
                                $sql = $this->db->get('jenis_barang');
                                foreach ($sql->result() as $row) {
                                 ?>
                                 <option value="<?php echo $row->id_jenis ?>"><?php echo $row->jenis_barang ?></option>
                             <?php } ?>
                         </select>
                     </div>

                     <div class="form-group">
                        <label for="int">Merk Barang </label>
                        <select name="id_merk" class="form-control">
                            <option value="<?php echo $id_merk ?>"><?php echo $id_merk ?></option>
                            <?php 
                            $sql = $this->db->get('merk_barang');
                            foreach ($sql->result() as $row) {
                             ?>
                             <option value="<?php echo $row->id_merk ?>"><?php echo $row->merk_barang ?></option>
                         <?php } ?>
                     </select>
                 </div>

                 <div class="form-group">
                    <label for="int">Supplier </label>
                    <select name="kode_supplier" class="form-control">
                        <option value="<?php echo $kode_supplier ?>"><?php echo $kode_supplier ?></option>
                        <?php 
                        $sql = $this->db->get('supplier');
                        foreach ($sql->result() as $row) {
                         ?>
                         <option value="<?php echo $row->kode_supplier ?>"><?php echo $row->nama_supplier ?></option>
                     <?php } ?>
                 </select>
             </div>

             <div class="form-group">
                <label for="int">Stok <?php echo form_error('stok') ?></label>
                <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?php echo $stok; ?>" />
            </div>
            <div class="card-footer clearfix">
                <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" /> 
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                <a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a>
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