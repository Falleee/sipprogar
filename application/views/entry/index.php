<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?php echo $title ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="<?php echo base_url().$this->uri->segment(1) ?>">Data Entry</a></div>
        <div class="breadcrumb-item"><?php echo $title ?></div>
      </div>
    </div>

    <div class="section-body">
      <p class="section-lead">
        <?php
        $error = $this->session->flashdata('error');
        if($error)
        {
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
        if($success)
        {
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
      </p>
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">              
              <a href="<?php echo base_url().$this->uri->segment(1) ?>/create" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tr>
                    <th>#</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Keterangan</th>
                    <th>Actons</th>
                  </tr>

                  <?php if ($data): ?>

                    <?php
                    $no=0;
                    foreach ($data as $record):
                      $no++;
                      ?>


                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $record->name ?></td>
                        <td><?php echo $record->email ?></td>
                        <td><?php echo $record->mobile ?></td>
                        <td><?php echo $record->role ?></td>
                        <td><?php echo date("d-m-Y", strtotime($record->createdDtm)) ?></td>
                        <td><a href="#" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a><a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a></td>
                      </tr>
                    <?php endforeach ?>
                  <?php endif ?>
                </table>
              </div>
            </div>
            <!-- <div class="card-footer text-right">
              <nav class="d-inline-block">
                <ul class="pagination mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                  </li>
                </ul>
              </nav>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </section>
</div>