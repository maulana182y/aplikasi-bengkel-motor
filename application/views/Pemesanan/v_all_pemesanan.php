<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/navigation'); ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Pemesanan Supplier</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Pemesanan Supplier</div>
          <a class="btn btn-info" ; href="<?php echo base_url() . 'Pemesanan/tambah_penjualan' ?>" class="nav-link"><i class="fa fa-plus"></i>
                            Tambah Data
                        </a>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode Transaksi</th>
                  <th>Tanggal Transaksi</th>
                  <th>Total Bayar</th>
                  <th>Pilihan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Kode Transaksi</th>
                  <th>Tanggal Transaksi</th>
                  <th>Total Bayar</th>
                  <th>Pilihan</th>
                </tr>
              </tfoot>
              <tbody>
                </tr>
                <?php
                
                $n = 1;
            foreach ($sql as $row)
            {
                ?>
                <tr>
            <td width="80px"><?php echo $n; ?></td>
            <td><?php echo $row->kode_transaksi ?></td>
            <td><?php echo $row->tgl_transaksi ?></td>
            <td><?php echo number_format($row->total_harga);  ?></td>
            <td style="text-align:center" width="200px">
                <a href="Pemesanan/detail_penjualan/<?php echo $row->kode_transaksi ?>" class="btn btn-info btn-sm">detail</a>
                <a href="Pemesanan/hapus_penjualan/<?php echo $row->kode_transaksi ?>" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm('Are You Sure ?')">hapus</a>
                <a href="Pemesanan/cetak_penjualan/<?php echo $row->kode_transaksi ?>" target="_blank" class="btn btn-success btn-sm">cetak</a>
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