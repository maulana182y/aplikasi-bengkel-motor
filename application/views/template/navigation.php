<!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?php echo base_url() . 'Home' ?>"><?php echo $this->session->userdata('username') ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <?php
        if ($this->session->role == 'admin') $this->load->view('template/sidebar-admin');
        else if ($this->session->role == 'manager') $this->load->view('template/sidebar-manager');
        else if ($this->session->role == 'warehouse') $this->load->view('template/sidebar-warehouse');
        // else if ($this->session->role == 'purchasing') $this->load->view('template/sidebar-purchasing');
        ?>
    </ul>
  </div>
  </nav>