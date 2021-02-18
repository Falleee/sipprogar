<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('partials/header');
?>

<body background="<?php echo base_url(); ?>assets/img/cek.jpg">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?php echo base_url(); ?>assets/img/logo1.png" alt="logo" width="150" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <?php
              $error = $this->session->flashdata('error');
              if ($error) {
              ?>
                <div class="alert alert-danger alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    <?php echo $this->session->flashdata('error'); ?>
                  </div>
                </div>

              <?php } ?>
              <?php
              $success = $this->session->flashdata('success');
              if ($success) {
              ?>
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    <?php echo $this->session->flashdata('success'); ?>
                  </div>
                </div>
              <?php } ?>
              <div class="card-body">
                <?php $this->load->helper('form'); ?>
                <form action="<?php echo base_url(); ?>login/loginMe" method="post" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="nip">NRP/NIP</label>
                    <input id="nip" type="text" class="form-control" name="nip" placeholder="NRP" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your nip
                    </div>
                    <small>*8 Angka Awal NRP</small>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Belum Punya Akun? <a href="<?php echo base_url() ?>login/register">Daftar Sekarang</a>
            </div>
            <div class="simple-footer text-white">
              Copyright &copy; SIPProGar 2020
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php $this->load->view('partials/js'); ?>