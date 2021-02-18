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
                <div class="breadcrumb-item"><a href="<?php echo base_url() . $this->uri->segment(1) ?>">Program</a></div>
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
            <?php if ($this->uri->segment(2) == "edit") : ?>
                <h2 class="section-title">Ubah Program</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <?php else : ?>
                            <h2 class="section-title">Tambahkan Program Baru</h2>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Tulis Program</h4>
                                        </div>
                                    <?php endif ?>
                                    <?php $this->load->helper("form"); ?>
                                    <?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") : ?>
                                        <form action="<?php echo base_url() ?>project/create_action" role="form" method="POST">
                                        <?php else : ?>
                                            <form action="<?php echo base_url() ?>project/edit_action" role="form" method="POST">
                                            <?php endif ?>
                                            <div class="card-body">
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Program</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" name="nama_project" value="<?php echo isset($data->nama_project) ? $data->nama_project : set_value('nama_project'); ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <textarea name="deskripsi" class="form-control"><?php echo isset($data->deskripsi) ? $data->deskripsi : set_value('deskripsi'); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input type="text" value="<?php echo isset($data->tanggal) ? $data->tanggal : '' ?>" name="tanggal" class="form-control datepicker">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <button class="btn btn-primary">Create Post</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control required" value="<?= isset($data->id_project) ? $data->id_project : set_value('id_project'); ?>" id="id_project" name="id_project" hidden>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
    </section>
</div>