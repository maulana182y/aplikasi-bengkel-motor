<?php $this->load->view('template/header'); ?>
<title>Home Admin</title>
<?php $this->load->view('template/navigation'); ?>

<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Pemesanan Supplier</li>
      </ol>
     
    <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid"><h1 class="m-0 text-dark">Home</h1>
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <!-- <img src="<?php echo base_url();?>assets/admin.png" style="width:25%; margin: 7% 38% 1% 38%;"/> -->
            <p><h1 align="center" >Selamat Datang <?php echo $this->session->userdata('username')?>!</h1>
          </section>
        </div>
      </div>
    </section>
  </div>

    <?php $this->load->view('template/footer'); ?>
  </div>
</body>

</html>