<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Program</h1>
            <div class="section-header-button">
                <?php if ($role == 1) : ?>
                    <a href="<?php echo base_url(); ?>project/create" class="btn btn-primary">Tambah Program Baru</a>
                <?php endif ?>
            </div>
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
            
            <div id="all" class="row mt-4 tab-pane fade show active">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Hasil Penginputan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama Acara</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($project as $data) :
                                            $no++;
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $no ?>
                                                </td>
                                                <td><?= $data->nama_project ?></td>
                                                <td><?= $data->deskripsi ?>
                                                </td>
                                                <td><?= date("d-m-y", strtotime($data->tanggal)) ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown" class="btn btn-light dropdown-toggle">Options</a>
                                                        <div class="dropdown-menu">
                                                            <a href="<?php echo base_url() . 'project/detail/' . $data->id_project ?>" class="dropdown-item has-icon"><i class="fas fa-eye"></i> Detail</a>
                                                            <?php if ($role == 1) : ?>
                                                                <a href="<?php echo base_url() . 'project/edit/' . $data->id_project ?>" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                                                <button data-confirm="Realy?|Do you want to continue?" data-confirm-yes="window.location.href ='<?php echo base_url() . 'project/deleted/' . $data->id_project ?>'" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i> Delete</button>
                                                            <?php endif ?>
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
    </section>
</div>