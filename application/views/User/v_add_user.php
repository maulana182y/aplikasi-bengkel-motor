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
                    <h3>Tambah User</h3>
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
                        <form role="form" action="<?php echo base_url() . 'User/add_user'; ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="username" class="form-control" name="username" placeholder="Masukkan Username" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="nama" class="form-control" name="nama" placeholder="Masukkan nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select type="role" class="form-control" name="role" required>
                                        <option value="">Pilih Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="warehouse">Warehouse</option>
                                        <option value="purchasing">Purchasing</option>
                                        <option value="manager">Manager</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
                                </div>

                            </div>
                            <div class="card-footer clearfix">
                                <button type="submit" id="submit" name="submit" value="submit" class="btn btn-info float-right" style="background-color:#273b7a; border-color:#273b7a" ;>Save</button>
                                <button type="button" class="btn btn-default float-right" onClick="javascript:history.back()">Back</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('template/footer'); ?>
<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>


</body>

</html>