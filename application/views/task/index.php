<section class="section">
  <!-- Main Content -->
  <div class="main-content">
    <div class="section-header">
      <?php if ($role == 1) : ?>
        <h1>Konfirmasi Kegiatan</h1>
      <?php else : ?>
        <h1>Kegiatan <?= $jabat_text ?></h1>
      <?php endif ?>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Kegiatan</a></div>
        <div class="breadcrumb-item">Konfirmasi Kegiatan</div>
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
              <?php if ($role == 1) : ?>
                <h4>Semua Data Yang Belum Dikonfirmasi</h4>
              <?php else : ?>
                <h4>Semua Kegiatan Untuk <?= $jabat_text ?></h4>
              <?php endif ?>
            </div>
            <div class="card-body">
              <!-- Ini Table Index -->
              <?php if ($this->uri->segment(2) == 'confirm') : ?>
                <!-- Batas Table Index -->
                <!-- Table Confirm  -->
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center">
                          #
                        </th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal Pengambilan</th>
                        <th>Dana Yang Diambil</th>
                        <th>Progres</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($task)) : ?>
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
                            <td><?= $data->tanggal ?></td>
                            <td><?= "Rp." . number_format($data->dana, 0, ".", ".");  ?></td>
                            <td><?= $data->progress ?>%</td>
                            <td>
                              <a href="<?php echo base_url() . 'task/valid/' . $data->id . '/' . $data->id_task ?>" class="btn btn-icon btn-primary">Valid</a>
                              <a href="<?php echo base_url() . 'task/unvalid/' . $data->id ?>" class="btn btn-icon btn-danger">Tidak Valid</a>
                            </td>
                          </tr>
                        <?php endforeach ?>
                    </tbody>
                  <?php endif ?>
                  </table>
                </div>
              <?php else : ?>
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
                        <th>Progres</th>
                        <th>Daya Serap</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($task)) : ?>
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
                            <td><?= "Rp." . number_format($data->biaya, 0, ".", ".");  ?></td>
                            <td>
                              <?= $data->progress ?>%
                            </td>
                            <td><?= "Rp." . number_format($data->digunakan, 0, ".", ".");  ?></td>
                            <td>
                              <?php if ($data->progress == 100) : ?>
                              <?php else : ?>
                                <?php
                                $this->db->where('isValid !=', 2);
                                $this->db->where('id_task',$data->id_task);
                                $cek = $this->db->get('tbl_progress')->row();
                                ?>
                                <?php if (isset($cek)) : ?>
                                  <p>Tunggu Konfirmasi Dari Admin</p>
                                <?php else : ?>
                                  <a href="<?php echo base_url() . 'task/update/' . $data->id_task ?>" class="btn btn-light"><i class="far fa-edit"></i>Update Progress</a>
                                <?php endif ?>
                              <?php endif ?>
                            </td>
                          </tr>
                        <?php endforeach ?>
                      <?php else : ?>
                        <p>Tidak ada Kegiatan</p>
                      <?php endif ?>
                    </tbody>
                  </table>
                </div>
              <?php endif ?>
              <!-- Batas Table Confirm -->
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
</div>