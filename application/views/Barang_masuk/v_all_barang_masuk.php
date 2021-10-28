<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/navigation'); ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Barang Masuk</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Barang Masuk</div>
          <a class="btn btn-info" ; href="<?php echo base_url() . 'Barang_masuk/create' ?>" class="nav-link"><i class="fa fa-plus"></i>
                            Tambah Data
                        </a>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Kode Supplier</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Kode Supplier</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                </tr><?php
                $n = 1;
            foreach ($bmsk as $a)
            {
                ?>
                <tr>
            <td width="80px"><?php echo $n; ?></td>
            <td><?php echo $a->kode_barang ?></td>
            <td><?php echo $a->kode_supplier ?></td>
            <td><?php echo $a->jumlah ?></td>
            <td><?php echo $a->harga ?></td>
            <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('Barang_masuk/update/'.$a->id_barang_masuk),'Update'); 
                echo ' | '; 
                echo anchor(site_url('Barang_masuk/delete/'.$a->id_barang_masuk),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php $n++;
            }
            ?>
              </tbody>
            </table>
          </div>
          
        </div>
      </div>
    </div>
  </div>
   <?php $this->load->view('template/footer'); ?>
   <script type="text/javascript">
            $('#dataTable').DataTable();
    </script>
</body>

</html>