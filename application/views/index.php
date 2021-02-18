<style>
  .preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background-color: #fff;
  }

  .preloader .loading {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    font: 14px arial;
  }
</style>
<?php
$success = $this->session->flashdata('success');
if ($success) {
?>
  <div class="preloader">
    <div class="loading">
      <img src="<?php echo base_url(); ?>assets/img/logo1.png" width="120">
    </div>
  </div>
<?php } ?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">

    <div class="section-header">
      <?php if ($role == 1) : ?>
        <h1>Semua Data Program Kegiatan</h1>
      <?php else : ?>
        <h1><?= $jabat_text ?></h1>
      <?php endif ?>
    </div>
    <?php if ($role == 3) : ?>
      <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h6>Total Kegiatan <br> <?= $jabat_text ?></h6>
              </div>
              <div class="card-body">
                <?= $taskusers ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php else : ?>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Users</h4>
              </div>
              <div class="card-body">
                <?= $users ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Kegiatan</h4>
              </div>
              <div class="card-body">
                <?= $task ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Konfirmasi Kegiatan</h4>
              </div>
              <div class="card-body">
                <?= $progress ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Konfirmasi User</h4>
              </div>
              <div class="card-body">
                <?= $unusers ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif ?>
  </section>
</div>
<script>
  $(document).ready(function() {
    $(".preloader").delay(2000).fadeOut();
  })
</script>