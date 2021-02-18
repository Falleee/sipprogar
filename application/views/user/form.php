<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?php echo $title ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <?php if ($role == 1) : ?>
          <div class="breadcrumb-item"><a href="<?php echo base_url() ?>user">Users</a></div>
        <?php endif ?>
        <div class="breadcrumb-item"><?php echo $title ?></div>
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
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <?php $this->load->helper("form"); ?>
            <?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") : ?>
              <form role="form" id="addUser" action="<?php echo base_url() ?>user/create_action" method="post" autocomplete="off">
              <?php else : ?>
                <form role="form" id="addUser" action="<?php echo base_url() ?>user/edit_action" method="post" autocomplete="off">
                <?php endif ?>
                <div class="card-body">
                  <div class="row">
                    <?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") : ?>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="name">Nama Lengkap</label>
                          <input type="text" class="form-control required" value="<?= isset($data->nama) ? $data->nama : set_value('nama'); ?>" id="nama" name="nama">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nip">Nrp/Nip</label>
                          <input type="text" class="form-control required" value="<?php echo isset($data->nip) ? $data->nip : set_value('nip'); ?>" id="nip" name="nip">
                          <?= form_error('nip', '<small class="text-danger">', '</small>') ?>
                        </div>
                      </div>
                    <?php else : ?>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nip">Nrp/Nip</label>
                          <input type="text" class="form-control required" value="<?= isset($data->nip) ? $data->nip : set_value('nip'); ?>" id="nip" name="nip" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nama">Nama Lengkap</label>
                          <input type="text" class="form-control required" value="<?= isset($data->nama) ? $data->nama : set_value('nama'); ?>" id="nama" name="nama">
                        </div>
                      </div>
                    <?php endif ?>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="pangkat">Pangkat / Golongan</label>
                        <input type="text" class="form-control required" id="pangkat" value="<?= isset($data->pangkat) ? $data->pangkat : set_value('pangkat') ?>" name="pangkat" ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control required" id="jabatan" value="<?= isset($data->jabatan) ? $data->jabatan : set_value('jabatan') ?>" name="jabatan">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control required email" value="<?php echo isset($data->email) ? $data->email : set_value('email'); ?>" id="email" name="email">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="mobie">No Handphone</label>
                        <input type="text" class="form-control required" id="mobile" value="<?php echo isset($data->mobile) ? $data->mobile : set_value('mobile'); ?>" name="mobile">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control required" id="password" name="password" maxlength="20">
                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control required equalTo" id="cpassword" name="cpassword" maxlength="20">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="bagian">Bagian</label>
                        <select name="bagian" class="form-control">
                        <?php
                            if (!empty($jabat)) {
                              foreach ($jabat as $bagian) {
                            ?>
                                <?php if ($data->id_jabatan) : ?>
                                  <option value="<?php echo $bagian->id_jabatan ?>" <?php if ($bagian->id_jabatan == $data->id_jabatan) {
                                                                              echo "selected";
                                                                            } ?>><?php echo $bagian->nama_jabatan ?></option>
                                <?php else : ?>
                                  <option value="<?php echo $bagian->id_jabatan ?>" <?php if ($bagian->id_jabatan == set_value('nama_jabatan')) {
                                                                              echo "selected=selected";
                                                                            } ?>><?php echo $bagian->nama_jabatan ?></option>
                                <?php endif ?>
                            <?php
                              }
                            }
                            ?>
                        </select>
                      </div>
                    </div>
                    <?php if ($role == 1) : ?>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="role">Role</label>
                          <select class="form-control required" id="role" name="role" onclick="pilih();">
                            <?php
                            if (!empty($roles)) {
                              foreach ($roles as $rl) {
                            ?>
                                <?php if ($data->roleId) : ?>
                                  <option value="<?php echo $rl->roleId ?>" <?php if ($rl->roleId == $data->roleId) {
                                                                              echo "selected";
                                                                            } ?>><?php echo $rl->role ?></option>
                                <?php else : ?>
                                  <option value="<?php echo $rl->roleId ?>" <?php if ($rl->roleId == set_value('role')) {
                                                                              echo "selected=selected";
                                                                            } ?>><?php echo $rl->role ?></option>
                                <?php endif ?>
                            <?php
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    <?php endif ?>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Submit</button>
                </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  $(document).ready(function() {

    var addUserForm = $("#addUser");

    var validator = addUserForm.validate({

      rules: {
        nama: {
          required: true
        },
        nip: {
          required: true
        },
        pangkat: {
          required: true
        },
        jabatan: {
          required: true
        },
        email: {
          required: true,
          email: true,
          remote: {
            url: baseURL + "checkEmailExists",
            type: "post"
          }
        },
        password: {
          required: true
        },
        cpassword: {
          required: true,
          equalTo: "#password"
        },
        mobile: {
          required: true,
          digits: true
        },
        role: {
          required: true,
          selected: true
        }
      },
      messages: {
        nama: {
          required: "This field is required"
        },
        nip: {
          required: "This field is required"
        },
        pangkat: {
          required: "This field is required"
        },
        jabatan: {
          required: "This field is required"
        },
        email: {
          required: "This field is required",
          email: "Please enter valid email address",
          remote: "Email already taken"
        },
        password: {
          required: "This field is required"
        },
        cpassword: {
          required: "This field is required",
          equalTo: "Please enter same password"
        },
        mobile: {
          required: "This field is required",
          digits: "Please enter numbers only"
        },
        role: {
          required: "This field is required",
          selected: "Please select atleast one option"
        }
      }
    });
  });
</script>