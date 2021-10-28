<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/navigation'); ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Barang Keluar</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Barang Keluar</div>
          <a class="btn btn-info" ; href="<?php echo base_url() . 'Barang_keluar/create' ?>" class="nav-link"><i class="fa fa-plus"></i>
                            Tambah Data Barang
                        </a>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Tanggal Keluar</th>
                  <th>Jumlah</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Tanggal Keluar</th>
                  <th>Jumlah</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                </tr><?php
                $n = 1;
            foreach ($bkl as $barang)
            {
                ?>
                <tr>
            <td width="80px"><?php echo $n; ?></td>
            <td><?php echo $barang->kode_barang ?></td>
            <td><?php echo $barang->tgl_keluar ?></td>
            <td><?php echo $barang->jumlah ?></td>
            <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('Barang_keluar/update/'.$barang->id_barang_keluar),'Update'); 
                echo ' | '; 
                echo anchor(site_url('Barang_keluar/delete/'.$barang->id_barang_keluar),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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