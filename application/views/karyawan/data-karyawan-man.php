<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
        <?php if ($this->session->userdata('logged')['level']==='1'): ?>
          <div class="header">
            <h4 class="title">Halaman Data Karyawan</h4>
            <p class="category">Cari Menggunakan Kriteria Di Bawah Ini</p>
          </div>
          <div class="content">
            <div class="row">
              <div class="col-md-5">
                <?php
                $this->db->where('id_jabatan >','1');
                $this->db->from('jabatan');
                $query=$this->db->get();
                $jab=$query->result();

                $this->db->from('bagian_divisi');
                $query=$this->db->get();
                $divi=$query->result();
                ?>
                <div class="form-group">
                  <label for="sordiv">Pilih Departemen</label>
                  <select class="form-control sordiv" id="sordiv">
                    <option selected value="">Semua Departemen</option>
                    <?php foreach ($divi as $D): ?>
                    <option value="<?php echo $D->id_bagian; ?>"><?php echo $D->unique_bagian ?></option>
                  <?php endforeach; ?>
                  </select>
                  <label for="sorkar">Pilih Jabatan</label>
                  <select class="form-control sorkar" id="sorkar">
                    <?php if ($this->session->userdata('logged')['level']==='1'): ?>
                      <option value="" selected>Semua Jabatan</option>
                      <?php foreach ($jab as $jB): ?>
                        <option value="<?php echo $jB->unique_jabatan ?>"><?php echo $jB->alias_jabatan ?></option>
                      <?php endforeach; ?>
                    <?php elseif($this->session->userdata('logged')['level']==='-1'): ?>
                      <?php foreach ($jab as $jB): ?>
                        <option value="<?php echo $jB->unique_jabatan ?>"><?php echo $jB->alias_jabatan ?></option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select><br>
                  <button class="btn btn-fill btn-info btnsend" type="button" id="btnsend" name="button">Cari</button>&nbsp&nbsp&nbsp
                  <span class="text-danger" id="warn"></span>
                </div>
              </div>
            </div>
          </div>
        <?php else: ?>
          <div class="header">
            <h4 class="title">Halaman Data Karyawan</h4>
            <p class="category">Cari Menggunakan Kriteria Di Bawah Ini</p>
          </div>
        <div class="content">
          <div class="row">
            <div class="col-md-5">
              <?php
              $this->db->from('jabatan');
              $query=$this->db->get();
              $jab=$query->result();

              $this->db->from('bagian_divisi');
              $query=$this->db->get();
              $divi=$query->result();
              ?>
              <div class="form-group">
                <label for="sordiv">Pilih Departemen</label>
                <select class="form-control sordiv" id="sordiv">
                  <option selected value="">Semua Departemen</option>
                  <?php foreach ($divi as $D): ?>
                  <option value="<?php echo $D->id_bagian; ?>"><?php echo $D->unique_bagian ?></option>
                <?php endforeach; ?>
                </select>
                <label for="sorkar">Pilih Jabatan</label>
                <select class="form-control sorkar" id="sorkar">
                  <?php if ($this->session->userdata('logged')['level']==='1'): ?>
                    <option value="" selected>Semua Jabatan</option>
                    <?php foreach ($jab as $jB): ?>
                      <option value="<?php echo $jB->unique_jabatan ?>"><?php echo $jB->alias_jabatan ?></option>
                    <?php endforeach; ?>
                  <?php elseif($this->session->userdata('logged')['level']==='-1'): ?>
                    <?php foreach ($jab as $jB): ?>
                      <option value="<?php echo $jB->unique_jabatan ?>"><?php echo $jB->alias_jabatan ?></option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select><br>
                <button class="btn btn-fill btn-info btnsend" type="button" id="btnsend" name="button">Cari</button>&nbsp&nbsp&nbsp
                <span class="text-danger" id="warn"></span>
              </div>
            </div>
          </div>
        </div>
          <?php endif; ?>
      </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#clk').load("<?php echo site_url('HR/dataK'); ?>");
      $('.btnsend').click(function(event){
        event.preventDefault();
        var sk = $('.sorkar').val(); //Jbatan
        var sm = $('.sordiv').val(); //Departemen
        <?php if ($this->session->userdata('logged')['level']==='-1'): ?>
        <?php foreach ($jab as $J): ?>
        <?php foreach ($divi as $dI): ?>
        if ((sm=='<?php echo $dI->id_bagian ?>')&&(sk=='<?php echo $J->unique_jabatan; ?>')) {
          $('#clk').load("<?php echo site_url('PU/dataKDJ/'.$J->unique_jabatan.'/'.$dI->unique_bagian); ?>");
        }
        else if((!sk)&&(sm=='<?php echo $dI->id_bagian ?>')) {
          $('#warn').html("Silahkan Pilih Departemen");
        }
        <?php endforeach; ?>
        else if((sk=='<?php echo $J->unique_jabatan ?>')&&(!sm)) {
          $('#clk').load("<?php echo site_url('PU/dataKJ/'.$J->unique_jabatan); ?>");
        }
        <?php endforeach; ?>
        else if((!sk)&&(!sm)) {
          $('#warn').html("Silahkan Pilih Departemen");
        }
        <?php elseif($this->session->userdata('logged')['level']==='1'): ?>
        <?php foreach ($jab as $J): ?>
        <?php foreach ($divi as $dI): ?>
        if ((sm=='<?php echo $dI->id_bagian ?>')&&(sk=='<?php echo $J->unique_jabatan; ?>')) {
          $('#clk').load("<?php echo site_url('HR/dataKDJ/'.$J->unique_jabatan.'/'.$dI->unique_bagian); ?>");
        }
        else if((!sk)&&(sm=='<?php echo $dI->id_bagian ?>')) {
          $('#clk').load("<?php echo site_url('HR/dataKD/'.$dI->unique_bagian); ?>");
        }
        <?php endforeach; ?>
        else if((sk=='<?php echo $J->unique_jabatan ?>')&&(!sm)) {
          $('#clk').load("<?php echo site_url('HR/dataKJ/'.$J->unique_jabatan); ?>");
        }
        <?php endforeach; ?>
        else if((!sk)&&(!sm)) {
          $('#clk').load("<?php echo site_url('HR/dataK'); ?>");
        }
        <?php endif; ?>
      });
    });
    </script>
  </div>
  <div id="clk" class="card">
  </div>
</div>
<?php
 	require_once(APPPATH.'views/include/footer.php');
?>
