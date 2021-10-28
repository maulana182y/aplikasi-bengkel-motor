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
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Edit User</h3>
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
                        <form role="form" action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="hidden" name="id" value="<?php echo $data[0]->id ?>">
                                    <input type="username" class="form-control" name="username" placeholder="Masukkan Username" value="<?php echo $data[0]->username ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="nama" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?php echo $data[0]->nama ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select type="role" class="form-control" name="role">
                                        <?php
                                        if ($data[0]->role == "admin") {
                                            echo "<option selected>admin</option>;
                                            <option>manager</option>;
                                            <option>purchasing</option>;
                                            <option>warehouse</option>";
                                        } else if ($data[0]->role == "warehouse") {
                                            echo "<option>admin</option>;
                                            <option>purchasing</option>;
                                            <option>manager</option>;
                                            <option selected>warehouse</option>";
                                        } else if ($data[0]->role == "purchasing") {
                                            echo "<option>admin</option>;
                                            <option>warehouse</option>;
                                            <option>manager</option>;
                                            <option selected>purchasing</option>";
                                        } else if ($data[0]->role == "manager") {
                                            echo "<option>admin</option>;
                                            <option>warehouse</option>;
                                            <option selected>manager</option>;
                                            <option>purchasing</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password" value="<?php echo $data[0]->password ?>" required>
                                </div>

                            </div>
                    </div>
                    <div class="card-footer clearfix">
                        <button type="submit" id="submit" name="submit" value="submkt" class="btn btn-info float-right" style="background-color:#273b7a; border-color:#273b7a" ;>Save</button>
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