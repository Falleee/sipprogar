<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?php echo base_url() . $this->uri->segment(1) ?>"><i class="fas fa-arrow-left"></i></a>
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
            <h2 class="section-title">Update Progress Kegiatan "<?= $data->nama_task ?>"</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update</h4>
                        </div>
                        <?php $this->load->helper("form"); ?>
                        <?php if ($this->uri->segment(2) == "update" || $this->uri->segment(2) == "update_act") : ?>
                            <form action="<?php echo base_url() ?>task/update_act" role="form" method="POST">
                                <input hidden name="id_task" value="<?php echo isset($data->id_task) ? $data->id_task : set_value('id_task'); ?>">
                            <?php else : ?>
                                <form action="<?php echo base_url() ?>task/updat_act" role="form" method="POST">
                                    <input hidden name="id_task" value="<?php echo isset($data->id_task) ? $data->id_task : set_value('id_task'); ?>">
                                    <input hidden name="id" value="<?php echo isset($data1->id) ? $data1->id : set_value('id'); ?>">
                                <?php endif ?>
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kegiatan</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="nama_task" value="<?php echo isset($data->nama_task) ? $data->nama_task : set_value('nama_task'); ?>" class="form-control-plaintext" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pagu Anggaran</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" value="<?= "Rp." . number_format($data->biaya, 0, ".", ".");  ?>" class="form-control-plaintext" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Progress Sementara</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" value="<?php echo isset($data->progress) ? $data->progress :  set_value('progress'); ?>%" class="form-control-plaintext" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sisa Anggaran</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" value="<?= "Rp." . number_format($data->sisa, 0, ".", ".");  ?>" class="form-control-plaintext" readonly>
                                            <input type="text" name="sisa" value="<?= $data->sisa ?>" class="form-control-plaintext" hidden>
                                            <input type="text" name="biaya" value="<?= $data->biaya ?>" class="form-control-plaintext" hidden>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Anggaran Yang Akan Diambil</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="dana" min="0" max="<?= $data->sisa ?>" id="rupiah1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4" id="datepicker">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal</label>
                                        <div class="col-sm-12 col-md-7" id="datepicker">
                                            <input type="text" name="tanggal" class="form-control datepicker" id="tanggal">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary">Kirim</button>
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