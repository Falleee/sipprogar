<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url(); ?>">SIPProGar</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url(); ?>"><i class="fas fa-fire"></i></a>
    </div>
    <ul class="sidebar-menu">
      <li class="<?php echo $this->uri->segment(1) == '' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
      <li class="<?php echo $this->uri->segment(1) == 'divisi' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>divisi"><i class="fas ion-android-clipboard" data-pack="android"></i> <span>Program</span></a></li>
      <li class="dropdown <?= $this->uri->segment(2) == 'confirm' || $this->uri->segment(1) == 'task' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-tasks"></i><span>Kegiatan</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(1) == 'task' && $this->uri->segment(2) != 'confirm' && $this->uri->segment(2) != 'detail' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url(); ?>task">Data Kegiatan</a></li>
          <?php if ($role == 1) : ?>
            <li class="<?php echo $this->uri->segment(2) == 'confirm' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url(); ?>task/confirm">Konfirmasi Kegiatan</a></li>
          <?php endif ?>
        </ul>
      </li>
      <?php if ($role == 1) : ?>
        <li class="dropdown <?= $this->uri->segment(2) == 'konfirmasi_user' || $this->uri->segment(1) == 'user' ? 'active' : ''; ?>">
          <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i><span>User</span></a>
          <ul class="dropdown-menu">
            <li class="<?php echo $this->uri->segment(1) == 'user' && $this->uri->segment(2) != 'konfirmasi_user' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url(); ?>user">Data User</a></li>
            <li class="<?php echo $this->uri->segment(2) == 'konfirmasi_user' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url(); ?>user/konfirmasi_user">Konfirmasi User</a></li>
          </ul>
        </li>
      <?php endif ?>
    </ul>
  </aside>
</div>