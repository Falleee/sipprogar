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
        <div class="breadcrumb-item"><a href="<?php echo base_url() . $this->uri->segment(1) ?>">User</a></div>
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
            <div class="card-header">
              <a href="<?php echo base_url() ?>user/create" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah User</a>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md" id="table-3">
                  <tr>
                    <th>#</th>
                    <th>Nrp/Nip</th>
                    <th>Nama</th>
                    <th>Pangkat</th>
                    <th>Jabatan</th>
                    <th>Bagian</th>
                    <th>Role</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th></th>
                  </tr>
                  <?php
                  $no = 0;
                  foreach ($userRecords as $record) :
                    $no++;
                  ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $record->nrp ?></td>
                      <td><?php echo $record->nama ?></td>
                      <td><?php echo $record->pangkat ?></td>
                      <td><?php echo $record->jabatan ?></td>
                      <td><?= $record->nama_jabatan?></td>
                      <td><?php echo $record->role ?></td>
                      <td><?php echo $record->mobile ?></td>
                      <td><?php echo $record->email ?></td>
                      <td>
                        <?php if ($this->uri->segment(2) == 'konfirmasi_user') : ?>
                          <a href="<?php echo base_url() . 'user/kon_action/' . $record->nip ?>" class="btn btn-icon btn-primary">Konfirmasi</a>
                        <?php else : ?>
                          <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Opsi</a>
                            <div class="dropdown-menu">
                              <a href="<?php echo base_url() . 'user/edit/' . $record->nip ?>" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                              <button data-confirm="Realy?|Do you want to continue?" data-confirm-yes="window.location.href ='<?php echo base_url() . 'user/delete/' . $record->nip ?>'" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i> Delete</button>
                            </div>
                          </div>
                        <?php endif ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery(document).on("click", ".deleteUser", function() {
      var userId = $(this).data("userid"),
        hitURL = baseURL + "deleteUser",
        currentRow = $(this);

      var confirmation = confirm("Are you sure to delete this user ?");

      if (confirmation) {
        jQuery.ajax({
          type: "POST",
          dataType: "json",
          url: hitURL,
          data: {
            userId: userId
          }
        }).done(function(data) {
          console.log(data);
          currentRow.parents('tr').remove();
          if (data.status = true) {
            alert("User successfully deleted");
          } else if (data.status = false) {
            alert("User deletion failed");
          } else {
            alert("Access denied..!");
          }
        });
      }
    });
    jQuery(document).on("click", ".searchList", function() {

    });
    jQuery('ul.pagination li a').click(function(e) {
      e.preventDefault();
      var link = jQuery(this).get(0).href;
      var value = link.substring(link.lastIndexOf('/') + 1);
      jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
      jQuery("#searchList").submit();
    });
  });
</script>