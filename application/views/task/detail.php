<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?php echo base_url('divisi/') ?>"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Kembali</h1>
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
            <h2 class="section-title"> Kegiatan <?= $data->nama_task ?></h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>Nama Kegiatan</th>
                                        <th>Mulai</th>
                                        <th>Selesai</th>
                                        <th>Pagu Anggaran</th>
                                        <th>Progres</th>
                                        <th>Daya Serap</th>
                                        <th>Sisa Anggaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $data->nama_task ?></td>
                                        <td><?= date("d-m-Y", strtotime($data->mulai)) ?></td>
                                        <td><?= date("d-m-Y", strtotime($data->selesai)) ?></td>
                                        <td><?= "Rp." . number_format($data->biaya, 0, ".", ".");  ?></td>
                                        <td>
                                            <?=$data->progress?>%
                                        </td>
                                        <td><?= "Rp." . number_format($data->digunakan, 0, ".", ".");  ?></td>
                                        <td>
                                            <?= "Rp." . number_format($data->sisa, 0, ".", "."); ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-header">
                            <h4>Progres Kegiatan <?= $data->nama_task?></h4>
                        </div>
                        <table id="example1" class="table table-striped projects">
                            <thead>
                                <tr>
                                    <!-- <th style="width: 40%">
                                        Nama Kegiatan
                                    </th> -->
                                    <th>
                                        Anggaran Yang Diambil
                                    </th>
                                    <th>
                                        Progress
                                    </th>
                                    <th>
                                        Tanggal
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($prog as $result) : ?>
                                    <tr>
                                        <!-- <td>

                                        </td> -->
                                        <td>
                                        <?= "Rp." . number_format($result->dana, 0, ".", ".");  ?>
                                        </td>
                                        <td>
                                            <?= $result->progress ?>%
                                        </td>
                                        <td>
                                            <?= $result->tanggal ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>