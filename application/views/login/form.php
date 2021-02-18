<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('partials/header');
?>

<body  background="<?php echo base_url(); ?>assets/img/cek.jpg">
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="<?php echo base_url(); ?>assets/img/logo1.png" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Daftar</h4>
                            </div>
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
                            <div class="card-body">
                                <?php $this->load->helper("form"); ?>
                                <form method="post" role="form" action="<?= base_url() ?>login/register_action" id="addUser">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input id="nama" value="<?= isset($data->nama) ? $data->nama : set_value('nama'); ?>" type="text" class="form-control" name="nama" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="nip">NRP/NIP</label>
                                        <input type="text" value="<?= isset($data->nip) ? $data->nip : set_value('nip'); ?>" id="nip" class="form-control" name="nip" autofocus>
                                        <?= form_error('nip', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="pangkat">Pangkat</label>
                                        <input type="text" value="<?= isset($data->pangkat) ? $data->pangkat : set_value('pangkat'); ?>" class="form-control" name="pangkat" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" value="<?= isset($data->jabatan) ? $data->jabatan : set_value('jabatan'); ?>" class="form-control" name="jabatan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Bagian</label>
                                        <select name="bagian" class="form-control" required>
                                            <?php
                                            foreach($jabatan as $data) :?>
                                            <option value="<?= $data->id_jabatan?>"><?= $data->nama_jabatan?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" value="<?= isset($data->email) ? $data->email : set_value('email'); ?>" type="email" class="form-control" name="email">
                                        <div class="invalid-feedback">
                                        </div>
                                        <small>*Optional</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor">Nomor Handphone</label>
                                        <input type="text" value="<?= isset($data->mobile) ? $data->mobile : set_value('mobile'); ?>" id="nomor" class="form-control" name="mobile" autofocus>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Kata Sandi</label>
                                            <input id="password" type="password" class="form-control pwstrength" name="password">
                                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="cpassword" class="d-block">Konfirmasi KataSandi</label>
                                            <input id="cpassword" type="password" class="form-control" name="cpassword">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Daftar
                                        </button>
                                    </div>
                                </form>
                                <div class="form-group">
                                    <div class="mt-5 text-muted text-center">
                                        Sudah Punya Akun? <a href="<?php echo base_url() ?>login">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Sistem Informasi Pelaporan & Anggaran (SIPProGar) 2020
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
                    }
                }
            });
        });
    </script>

    <?php $this->load->view('partials/js'); ?>