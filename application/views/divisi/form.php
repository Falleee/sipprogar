<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?php echo base_url('project/detail/') . $this->uri->segment(3) ?>"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo base_url('project/detail/') . $this->uri->segment(3) ?>">Project</a></div>
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
            <h2 class="section-title">Tambahkan Divisi Baru</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <?php $this->load->helper("form"); ?>
                        <form action="<?php echo base_url() ?>divisi/create_action" role="form" method="POST">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Divisi</label>
                                    <input type="text" class="form-control col-sm-12 col-md-7" name="nama_divisi" required>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penanggung Jawab</label>
                                    <select name="users" id="inputStatus" class="form-control col-sm-12 col-md-7" required>
                                        <?php
                                        foreach ($users as $data) : ?>
                                            <option value="<?= $data->nip ?>"><?= $data->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan</label>
                                    <select name="jabatan" id="inputStatus" class="form-control col-sm-12 col-md-7" required>
                                        <?php
                                        foreach ($jabatan as $data) : ?>
                                            <option value="<?= $data->id_jabatan ?>"><?= $data->nama_jabatan ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Tambah Divisi</button>
                                    </div>
                                </div>
                            </div>
                            <input type="text" class="form-control required" value="<?= isset($acara->id_project) ? $acara->id_project : set_value('id_project'); ?>" id="id_project" name="id_project" hidden>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>