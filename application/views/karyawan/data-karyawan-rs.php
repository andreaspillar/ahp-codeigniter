<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<?php if ($this->session->userdata('logged')['level']==='2'): ?>
  <div class="col-md-12">
    <div class="card">
      <div class="card card-plain">
        <div class="content table-responsive table-full-width">
          <div class="header">
            <h4 class="title">Halaman Data Karyawan</h4>
            <p class="category">Cari Menggunakan Kriteria Di Bawah Ini</p>
          </div>
          <div class="content">
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label for="sorkar">Pilih Jabatan</label>
                  <select class="form-control sorkar" id="sorkar">
                    <option value="" disabled selected>Pilih Jabatan</option>
                    <?php if ($this->session->userdata('logged')['level']==='2'){ ?>
                      <?php
                      $role = $this->session->userdata('logged')['level'];
                      $this->db->from('jabatan');
                      $this->db->where('id_jabatan >',$role);
                      $query=$this->db->get();
                      $jab=$query->result();
                      foreach ($jab as $jB): ?>
                      <option value="<?php echo $jB->unique_jabatan ?>"><?php echo $jB->alias_jabatan ?></option>
                    <?php endforeach; ?>
                  <?php } else { ?>
                    <?php
                    $role = $this->session->userdata('logged')['level'];
                    $this->db->from('jabatan');
                    $this->db->where('id_jabatan =',$role+1);
                    $query=$this->db->get();
                    $jab=$query->result();
                    foreach ($jab as $jB): ?>
                    <option value="<?php echo $jB->unique_jabatan ?>"><?php echo $jB->alias_jabatan ?></option>
                  <?php endforeach; ?>
                <?php } ?>
              </select><br>
              <button class="btn btn-fill btn-info btnsend" type="button" id="btnsend" name="button">Cari</button>&nbsp&nbsp&nbsp
              <span class="text-danger" id="warn"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#clk').load("<?php echo site_url('assessors/dataKDMan'); ?>");
    $('.btnsend').click(function(event){
      event.preventDefault();
      var sk = $('.sorkar').val(); //Jbatan
      <?php foreach ($jab as $J): ?>
        if (sk=='<?php echo $J->unique_jabatan; ?>') {
          $('#warn').html("");
          $('#clk').load("<?php echo site_url('assessors/dataKDJ/'.$J->unique_jabatan); ?>");
        }
      <?php endforeach; ?>
      else if(!sk) {
        $('#warn').html("Silahkan Pilih Jabatan dan Tekan Cari");
      }
    });
  });
</script>
</div>
<div id="clk" class="card">
</div>
</div>
<?php endif; ?>
<?php if($this->session->userdata('logged')['level']==='1'): ?>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#clk').load("<?php echo site_url('assessors/dataKDKbid'); ?>");
  });
</script>
<div id="clk" class="card">
</div>
<?php endif; ?>
<?php
 	require_once(APPPATH.'views/include/footer.php');
?>
