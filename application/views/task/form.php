<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?php echo base_url('divisi') ?>"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo base_url() . $this->uri->segment(1) ?>">Kegiatan</a></div>
                <div class="breadcrumb-item"><?= $title ?></div>
            </div>
        </div>
        <div class="section-body">
            <p class="section-lead">
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
            </p>
            <?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") : ?>
                <h2 class="section-title">Tambahkan Kegiatan Baru</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tulis Kegiatan</h4>
                            </div>
                        <?php else : ?>
                            <h2 class="section-title">Ubah Kegiatan "<?= $data->nama_task ?>"</h2>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Edit</h4>
                                        </div>
                                    <?php endif ?>
                                    <?php $this->load->helper("form"); ?>
                                    <?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") : ?>
                                        <form action="<?php echo base_url() ?>task/create_action" role="form" method="POST">
                                            <input hidden type="text" name="id" class="form-control" value="<?= isset($data->id_jabatan) ? $data->id_jabatan : set_value('id_jabatan'); ?>">
                                        <?php else : ?>
                                            <form action="<?php echo base_url() ?>task/edit_action" role="form" method="POST">
                                                <input type="hidden" name="id_task" value="<?php echo isset($data->id_task) ? $data->id_task : set_value('id_task'); ?>">
                                            <?php endif ?>
                                            <div class="card-body">
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kegiatan</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" name="nama_task" value="<?php echo isset($data->nama_task) ? $data->nama_task : set_value('nama_task'); ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mulai</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" name="mulai" value="<?php echo isset($data->mulai) ? $data->mulai :  set_value('mulai'); ?>" class="form-control datepicker">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hingga</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" name="selesai" value="<?php echo isset($data->selesai) ? $data->selesai : set_value('selesai'); ?>" class="form-control datepicker">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pagu Anggaran</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" name="biaya" value="<?php echo isset($data->biaya) ? $data->biaya :  set_value('biaya'); ?>" id="rupiah1" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <button class="btn btn-primary">Tambah Kegiatan</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
    </section>
</div>