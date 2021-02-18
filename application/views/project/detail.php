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
                <div class="breadcrumb-item"><a href="<?php echo base_url() . $this->uri->segment(1) ?>">Acara</a></div>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Acara <?= $data->nama_project ?></h4>
                        </div>
                        <?php $this->load->helper("form"); ?>
                        <form role="form">
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Acara</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input readonly type="text" name="nama_project" value="<?php echo isset($data->nama_project) ? $data->nama_project : set_value('nama_project'); ?>" class="form-control-plaintext">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea readonly name="deskripsi" class="form-control-plaintext"><?php echo isset($data->deskripsi) ? $data->deskripsi : set_value('deskripsi'); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input readonly type="date" value="<?php echo isset($data->tanggal) ? $data->tanggal : '' ?>" name="tanggal" class="form-control-plaintext">
                                    </div>
                                </div>
                            </div>
                            <input type="text" class="form-control required" value="<?= isset($data->id_project) ? $data->id_project : set_value('id_project'); ?>" id="id_project" name="id_project" hidden>
                        </form>
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Penanggung Jawab</h4>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-1">
                                            <tr>
                                                <th>#</th>
                                                <th>Penanggung Jawab</th>
                                                <th>Jabatan</th>
                                                <th></th>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><?= isset($tanggung->nama) ? $tanggung->nama : set_value('nama'); ?></td>
                                                <td>
                                                    <?= isset($jabat->nama_jabatan) ? $jabat->nama_jabatan : set_value('nama_jabatan') ?>
                                                </td>
                                                <?php if ($role == 1) : ?>
                                                    <?php if (isset($jabat)) : ?>
                                                        <td>
                                                        </td>
                                                    <?php else : ?>
                                                        <td>
                                                            <a href="<?= base_url() . 'tanggung/create/' . $data->id_project ?>" class="btn btn-primary">Tambah Penanggung Jawab</a>
                                                        </td>
                                                    <?php endif ?>
                                                <?php endif ?>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="section-title">Tambahkan Unit Kerja Baru</h2>
                        <?php if ($role == 2) : ?>
                            <a href="<?php echo base_url() . 'divisi/create/' . $data->id_project ?>" class="btn btn-primary col-2">Tambah Unit Kerja</a>
                        <?php else : ?>
                            <a href="<?php echo base_url() . 'divisi/create/' . $data->id_project ?>" class="btn btn-primary col-2 disabled">Tambah Unit Kerja</a>
                            <p> * Hanya Super User Yang Bisa Tambah Unit Kerja</p>
                        <?php endif ?>
                        <?php
                        $no = 0;
                        foreach ($divisi as $data) : $no++; ?>
                            <div id="all" class="row mt-4 tab-pane fade show active">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4><?= $data->nama_divisi ?></h4>
                                            <?php if ($role == 2) : ?>
                                                <a href="<?php echo base_url() . 'divisi/deleted/' . $data->id_divisi . '/' . $data->id_project ?>" class="btn btn-danger">Hapus Kegiatan</a>
                                                <a href="<?php echo base_url() . 'task/create/' . $data->id_project . '/' . $data->id_divisi ?>" class="btn btn-primary">Tambah Kegiatan</a>
                                            <?php endif ?>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="table-1">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">
                                                                #
                                                            </th>
                                                            <th>Nama Kegiatan</th>
                                                            <th>Mulai</th>
                                                            <th>Selesai</th>
                                                            <th>Biaya</th>
                                                            <th>Progress</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 0;
                                                        $total = 0;
                                                        $task = $this->db->get_where('tbl_task', array('id_divisi' => $data->id_divisi))->result();
                                                        foreach ($task as $data1) : $no++; ?>
                                                            <tr>
                                                                <td><?= $no ?>
                                                                </td>
                                                                <td><?= $data1->nama_task ?></td>
                                                                <td><?= $data1->mulai ?></td>
                                                                <td><?= $data1->selesai ?></td>
                                                                <td><?= "Rp." . number_format($data1->biaya, 0, ".", "."); ?></td>
                                                                <td>
                                                                    <div class="progress-bar" role="progressbar" data-width="<?= $data1->progress ?>%" aria-valuenow="<?= $data1->progress ?>" aria-valuemin="0" aria-valuemax="100"><?= $data1->progress ?>%</div>
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="#" data-toggle="dropdown" class="btn btn-light dropdown-toggle">Options</a>
                                                                        <div class="dropdown-menu">
                                                                            <a href="<?php echo base_url() . 'task/detail/' . $data->id_project . '/' . $data1->id_task ?>" class="dropdown-item has-icon"><i class="fas fa-eye"></i> Detail</a>
                                                                            <a href="<?php echo base_url() . 'task/edit/' . $data->id_project . '/' . $data1->id_divisi . '/' . $data1->id_task ?>" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                                                            <button data-confirm="Realy?|Do you want to continue?" data-confirm-yes="window.location.href ='<?php echo base_url() . 'task/deleted/' . $data->id_project . '/' . $data1->id_task ?>'" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i> Delete</button>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $awal = new DateTime($data1->mulai);
                                                            $akhir = new DateTime($data1->selesai);

                                                            $range = new DatePeriod($awal, new DateInterval('P1D'), $akhir);
                                                            // mendapatkan range antara dua tanggal dan di looping
                                                            $i = 0;
                                                            $x = 0;
                                                            $akhir = 1;

                                                            foreach ($range as $date) {
                                                                $range = $date->format("Y-m-d");
                                                                $datetime = DateTime::createFromFormat('Y-m-d', $range);

                                                                // Convert Tanggal untuk mendapatkan nama hari
                                                                $day = $datetime->format('D');

                                                                // Cek untuk menghitung yang bukan hari sabtu dan minggu
                                                                if ($day != "Sun" && $day != "Sat") {
                                                                    $x += $akhir - $i;
                                                                }
                                                                $akhir++;
                                                                $i++;
                                                                // $awal = $x;
                                                                $total = $total + $x;
                                                                $x = 0;
                                                            }
                                                            ?>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-header">
                                            <h4>Detail Unit Kerja</h4>
                                        </div>
                                        <form role="form">
                                            <div class="card-body">
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ketua</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input readonly type="text" value="<?= $data->nama ?>" class="form-control-plaintext">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <input readonly class="form-control-plaintext" value="<?= $data->nama_jabatan ?>"></input>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total Biaya</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <?php
                                                        $this->db->select('SUM(biaya) as total');
                                                        $this->db->from('tbl_task');
                                                        $this->db->where('id_divisi', $data->id_divisi);
                                                        $biaya = $this->db->get()->row()->total; ?>
                                                        <input readonly type="text" value="<?= "Rp." . number_format($biaya, 0, ".", "."); ?>" class="form-control-plaintext">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Durasi</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <?php

                                                        ?>
                                                        <input readonly type="text" name="x" value="<?= isset($total) ? $total : set_value('total'); ?> Hari" class="form-control-plaintext">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control required" value="<?= isset($data->id_project) ? $data->id_project : set_value('id_project'); ?>" id="id_project" name="id_project" hidden>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>