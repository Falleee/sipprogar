<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?php echo $title ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="<?php echo base_url().$this->uri->segment(1) ?>">Data Entry</a></div>
        <div class="breadcrumb-item"><?php echo $title ?></div>
      </div>
    </div>
    <script> 
      function pilih() {
        var pilih=document.getElementById("kategori").value;
        if (pilih==1) {
          document.getElementById("form1").style.display = 'block';
          document.getElementById("form2").style.display = 'none';
        }else{
          document.getElementById("form1").style.display = 'none';
          document.getElementById("form2").style.display = 'block';
        };
      }
    </script>
    <div class="section-body">
      <p class="section-lead">
        <div class="form-group">
          <label for="role">Kategori</label>
          <select class="form-control" name="kategori" id="kategori" onclick="pilih();">
            <option value="1">Peralatan dan Mesin</option>
            <option value="2">Aset Tetap Lainnya</option>
          </select>
        </div>
      </p>

      <div class="row" id="form1">
        <?php $this->load->view('entry/form_peralatan_dan_mesin'); ?>
      </div>
      <div class="row" id="form2" style="display: none;">
        <?php $this->load->view('entry/form_asset_tetap_lainnya'); ?>
      </div>
    </div>
  </section>
</div>
