<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/navigation'); ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tables</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Manajemen User</div>
          <a class="btn btn-info" ; href="<?php echo base_url() . 'User/add_user' ?>" class="nav-link"><i class="fa fa-plus"></i>
                            Tambah User
                        </a>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width='20'>No</th>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th width="200">Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th width='20'>No</th>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th width="200">Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php $n = 1;
                                foreach ($users as $value) {
                                    if ($value->active == '1') $status = 'Active';
                                    else if ($value->active == '0') $status = 'Inactive';
                                ?>
                                    <tr>
                                        <td><?php echo $n; ?></td>
                                        <td><?php echo $value->id; ?></td>
                                        <td><?php echo $value->username; ?></td>
                                        <td><?php echo $value->nama; ?></td>
                                        <td><?php echo $value->role; ?></td>
                                        <td><?php echo $value->active; ?></td>
                                        <td>
                                            <?php if ($value->active == '0') { ?>
                                                <form role="form" action="<?php echo base_url() . 'User/activateUser'; ?>" method="post">
                                                    <a class="btn btn-success btn-sm" style="background-color:#1a9e38; border-color:#1a9e38;" href="<?php echo base_url() . 'User/edit_user/' . $value->id; ?>" class="nav-link"><i class="fas fa-pencil-alt"></i>Edit</a>
                                                    <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                                                    <input type="hidden" name="value" value="1">
                                                    <button class="btn btn-sm btn-danger" type="submit" name="submit"><i class="fa fa-eye"></i> Active</a></button>
                                                </form>
                                            <?php } else if ($value->active == '1') { ?>
                                                <form role="form" action="<?php echo base_url() . 'User/activateUser'; ?>" method="post">
                                                    <a class="btn btn-success btn-sm" style="background-color:#1a9e38; border-color:#1a9e38;" href="<?php echo base_url() . 'User/edit_user/' . $value->id; ?>" class="nav-link"><i class="fas fa-pencil-alt"></i>Edit</a>
                                                    <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                                                    <input type="hidden" name="value" value="0">
                                                    <button class="btn btn-sm btn-danger" type="submit" name="submit" style="background-color:#bd0011; border-color:#bd0011" ;><i class="fa fa-eye-slash"></i> Inactive</a></button>
                                                </form>
                                            <?php } ?>

                                        </td>
                                    </tr>
                                <?php $n++;
                                } ?>
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