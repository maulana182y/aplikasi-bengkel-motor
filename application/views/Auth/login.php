<?php $this->load->view('template/header');?>
  <!-- <body themebg-pattern="theme1" style="background-image: url('assets/img/background.jpg');background-size: cover;"> -->

<body class="bg-dark" style="background-image: url('image/bg.jpg');background-size: cover;">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header" align="center">Login</div>
      <div class="card-body">
        <form action="<?php echo base_url() . 'Auth' ?>" method="post">
          <div class="form-group">
            <label for="Username">Username</label>
            <input class="form-control" id="username" name="username" type="text"  placeholder="Enter username" required>
            <?php echo form_error('username'); ?>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
            <?php echo form_error('password'); ?>
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
            </div>
          </div>
          <button type="submit" name="login" value="login" class="btn btn-primary btn-block">Login</button>
        </form>
      </div>
    </div>
  </div>
  <?php 
    $this->load->view('template/footer');?>
</body>

</html>