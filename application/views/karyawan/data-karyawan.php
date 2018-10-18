<?php
 	require_once(APPPATH.'views/include/header.php');
?>
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
                <label for="sordiv">Pilih Departemen</label>
                <select class="form-control sordiv" id="sordiv">
                  <option selected value="">Semua Departemen</option>
                  <?php
                  $this->db->from('jabatan');
                  $query=$this->db->get();
                  $jab=$query->result();
                  $this->db->from('bagian_divisi');
                  $query=$this->db->get();
                  $divi=$query->result();
                  foreach ($divi as $D): ?>
                  <option value="<?php echo $D->id_bagian; ?>"><?php echo $D->unique_bagian ?></option>
                <?php endforeach; ?>
                </select>
                <label for="sorkar">Pilih Jabatan</label>
                <select class="form-control sorkar" id="sorkar">
                  <option value="" selected>Semua Jabatan</option>
                  <?php foreach ($jab as $jB): ?>
                    <option value="<?php echo $jB->unique_jabatan ?>"><?php echo $jB->alias_jabatan ?></option>
                  <?php endforeach; ?>
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
      $('#clk').load("<?php echo site_url('welcome/dataK'); ?>");
      $('.btnsend').click(function(event){
        event.preventDefault();
        var sk = $('.sorkar').val(); //Jbatan
        var sm = $('.sordiv').val(); //Departemen
        <?php foreach ($jab as $J): ?>
        <?php foreach ($divi as $dI): ?>
        if ((sm=='<?php echo $dI->id_bagian ?>')&&(sk=='<?php echo $J->unique_jabatan; ?>')) {
          $('#clk').load("<?php echo site_url('welcome/dataKDJ/'.$J->unique_jabatan.'/'.$dI->unique_bagian); ?>");
        }
        else if((!sk)&&(sm=='<?php echo $dI->id_bagian ?>')) {
          $('#clk').load("<?php echo site_url('welcome/dataKD/'.$dI->unique_bagian); ?>");
        }
        <?php endforeach; ?>
        else if((sk=='<?php echo $J->unique_jabatan ?>')&&(!sm)) {
          $('#clk').load("<?php echo site_url('welcome/dataKJ/'.$J->unique_jabatan); ?>");
        }
        <?php endforeach; ?>
        else if((!sk)&&(!sm)) {
          $('#clk').load("<?php echo site_url('welcome/dataK'); ?>");
        }
      });
    });
    </script>
  </div>
  <div id="clk" class="card">
  </div><br>
  <a class="btn-fill btn-info btn" href="<?php echo site_url('welcome/adperson_pg')?>" type="button"><i class="pe-7s-plus"><b>   Tambah</b></i></a>
</div>
<?php
 	require_once(APPPATH.'views/include/footer.php');
?>
