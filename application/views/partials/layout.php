<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php
$this->db->where('id_jabatan', $jabat);
$this->db->where('isValid', 1);
$query = $this->db->get('tbl_progress');
$notif = $query->num_rows();
$this->db->reset_query();

?>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg" style="background-color: #1c6c5f;">
      </div>
      <nav class="navbar navbar-expand-lg main-navbar" style="background-color: #1c6c5f;">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <?php if ($role == 3) : ?>
            <?php if (isset($notif)) : ?>
              <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><?= $notif ?><i class="far fa-bell"></i></a>
              <?php else : ?>
              <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle"><i class="far fa-bell"></i></a>
              <?php endif ?>
              <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifikasi
                  <div class="float-right">
                    <!-- <a href="#">Mark All As Read</a> -->
                  </div>
                </div>
                <?php
                $this->db->select('tbl_progress.*, tbl_task.nama_task');
                $this->db->from('tbl_progress');
                $this->db->join('tbl_task', 'tbl_task.id_task = tbl_progress.id_task');
                $this->db->where('tbl_progress.id_jabatan', $jabat);
                $this->db->where('isValid', 1);
                $gagal = $this->db->get()->result(); ?>
                <div class="dropdown-list-content dropdown-list-icons">
                  <?php foreach ($gagal as $data) : ?>
                    <a href="<?php echo base_url() . 'task/updat/' . $data->id_task . '/' . $data->id ?>" class="dropdown-item dropdown-item-unread">
                      <div class="dropdown-item-icon bg-danger text-white">
                        <i class="fas fa-exclamation-triangle"></i>
                      </div>
                      <div class="dropdown-item-desc">
                        Update Progress <?= $data->nama_task ?> Ditolak
                        <div class="time text-primary"></div>
                      </div>
                    </a>
                  <?php endforeach ?>
                </div>
              </div>
              </li>
            <?php else : ?>
            <?php endif ?>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block"><?php echo $nama; ?></div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title"><?= $role_text; ?></div>
                <a href="<?php echo base_url() . 'user/edit/' . $nip ?>" class="dropdown-item has-icon">
                  <i class="far fa-user"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?php echo base_url(); ?>dashboard/logout" class="dropdown-item has-icon text-danger">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </div>
            </li>
        </ul>
      </nav>