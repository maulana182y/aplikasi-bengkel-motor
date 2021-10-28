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
      <div class="card mb-5">
        <div class="card-header">
        <div class="card-body">

          	<?php 
$rs = $data->row();
 ?>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<tr>
				<th>Kode Transaksi</th>
				<th>:</th>
				<td><?php echo $rs->kode_transaksi; ?></td>
				<!-- <th>Nama Pelanggan</th>
				<th>:</th>
				<td><?php echo $rs->nama_pelanggan; ?></td> -->
			</tr>
			<tr>
				<th>Tgl Penjualan</th>
				<th>:</th>
				<td><?php echo $rs->tgl_transaksi; ?></td>
				<th>Total Harga</th>
				<th>:</th>
				<td>Rp. <?php echo number_format($rs->total_harga); ?></td>
			</tr>
			
		</table>
	</div>
	<div class="col-md-12">
		<table class="table table-bordered" style="margin-bottom: 10px" >
			<thead>
				<tr>
					<th>No.</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Harga</th>
					<th>Jumlah</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$sql = $this->db->query("SELECT * FROM detail_transaksi as a,barang as b where a.kode_barang=b.kode_barang and a.kode_transaksi='$rs->kode_transaksi' ");
				$no = 1;
				foreach ($sql->result() as $row) {
				 ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row->kode_barang; ?></td>
					<td><?php echo $row->nama_barang; ?></td>
					
					<td><?php echo $row->harga; ?></td>
					<td><?php echo $row->qty; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
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




