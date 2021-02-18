<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <?php if ($role == 1) : ?>
                <h1>Semua Data Program Kegiatan</h1>
            <?php else : ?>
                <h1>Program Kerja</h1>
                <div class="section-header-button">
                    <a href="<?php echo base_url() . 'task/create/' . $jabat ?>" class="btn btn-primary">Tambah Program Baru</a>
                    <button data-confirm="Lanjutkan?|Menghapus Semua Tugas?" data-confirm-yes="window.location.href ='<?php echo base_url() . 'task/deleteall/' . $jabat ?>'" class="btn btn-danger">Hapus Semua Program Kegiatan <?= $jabat_text ?></button>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?php echo base_url() . $this->uri->segment(1) ?>">Program</a></div>
                    <div class="breadcrumb-item"><?= $title ?></div>
                </div>
            <?php endif ?>
        </div>
        <?php if ($role == 1) : ?>
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
                <div id="all" class="row mt-4 tab-pane fade show active">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Semua Kegiatan</h4>
                            </div>
                            <div class="card-body">
                                <!-- Ini Table Index -->
                                <div class="table-responsive">
                                    <table id="example1" class="table table-striped projects">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Bagian</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Mulai</th>
                                                <th>Selesai</th>
                                                <th>Pagu Anggaran</th>
                                                <th>Daya Serap</th>
                                                <th>Progres</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($taskall as $data1) :
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $no ?>
                                                    </td>
                                                    <td><?= $data1->nama_jabatan ?></td>
                                                    <td><?= $data1->nama_task ?></td>
                                                    <td><?= date("d-m-Y", strtotime($data1->mulai)) ?></td>
                                                    <td><?= date("d-m-Y", strtotime($data1->selesai)) ?></td>
                                                    <td><?= "Rp." . number_format($data1->biaya, 0, ".", ".");  ?></td>
                                                    <td><?= "Rp." . number_format($data1->digunakan, 0, ".", ".");  ?></td>
                                                    <td><?= $data1->progress ?>%</td>
                                                    <td>
                                                        <a href="<?php echo base_url() . 'task/detail/' . $data1->id_task ?>" class="btn btn-light"><i class="far fa-eye"></i> Detail</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <?php
                                            $this->db->select('SUM(biaya) as total');
                                            $this->db->from('tbl_task');
                                            $biaya = $this->db->get()->row()->total; ?>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Total Pagu Anggaran</th>
                                                <th></th>
                                                <th></th>
                                                <th><?= "Rp." . number_format($biaya, 0, ".", "."); ?></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
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
                <div id="all" class="row mt-4 tab-pane fade show active">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Kegiatan <?= $jabat_text ?></h4>
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
                                                <th>Pagu Anggaran</th>
                                                <th>Daya Serap</th>
                                                <th>Progress</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($task as $data) :
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $no ?>
                                                    </td>
                                                    <td><?= $data->nama_task ?></td>
                                                    <td><?= date("d-m-Y", strtotime($data->mulai)) ?></td>
                                                    <td><?= date("d-m-Y", strtotime($data->selesai)) ?></td>
                                                    <td><?= "Rp." . number_format($data->biaya, 0, ".", "."); ?></td>
                                                    <td><?= "Rp." . number_format($data->digunakan, 0, ".", "."); ?></td>
                                                    <td><?= $data->progress ?>%</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" data-toggle="dropdown" class="btn btn-light dropdown-toggle">Options</a>
                                                            <div class="dropdown-menu">
                                                                <a href="<?php echo base_url() . 'task/detail/' . $data->id_task ?>" class="dropdown-item has-icon"><i class="fas fa-eye"></i> Detail</a>
                                                                <a href="<?php echo base_url() . 'task/edit/' . $data->id_task ?>" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                                                <button data-confirm="Realy?|Do you want to continue?" data-confirm-yes="window.location.href ='<?php echo base_url() . 'task/deleted/' . $data->id_task ?>'" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"> Delete</i></button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </section>
</div>