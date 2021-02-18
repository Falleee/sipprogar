

      
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <?php $this->load->helper("form"); ?>
            <form  role="form" id="addUser" action="<?php echo base_url() ?>user/create_action" method="post">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal</label>
                      <input type="text" class="form-control datepicker">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Nama Barang</label>
                      <input type="text" class="form-control" name="nama">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Judul</label>
                      <input type="text" class="form-control" name="judul">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Pencipta</label>
                      <input type="text" class="form-control" name="pencipta">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="role">Asal Usul</label>
                      <select class="form-control" name="asal_usul">
                        <option>Pembelian</option>
                        <option>Hibah</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="role">Kondisi</label>
                      <select class="form-control" name="kondisi">
                        <option>Baik</option>
                        <option>Kurang Baik</option>
                        <option>Rusak Berat</option>
                      </select>
                    </div>
                  </div>    
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kuantitas</label>
                      <input type="text" class="form-control" name="kuantitas" placeholder="Jumlah Barang">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Harga Satuan</label>
                      <input type="text" class="form-control" name="harga_satuan">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jumlah Harga</label>
                      <input type="text" class="form-control" name="jumlah_harga">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input type="text" class="form-control" name="keterangan">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>Foto/Dok.Pendukung</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama Foto</label>
                      <input type="text" class="form-control" name="nama_foto">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Keterangan Foto</label>
                      <input type="text" class="form-control" name="keterangan_foto">
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
