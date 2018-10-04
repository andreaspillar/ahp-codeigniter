<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
        <div class="content">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="sorkar">Silahkan Pilih Jabatan</label>
                <select class="form-control sorkar" id="sorkar">
                  <option value="Manajer">Manajer</option>
                  <option value="Kepala Bidang">Kepala Bidang</option>
                  <option value="Staff">Staff</option>
                  <option value="Pengawas">Pengawas</option>
                  <option value="Kepala Shift">Kepala Shift</option>
                  <option value="Operator">Operator</option>
                </select>
              </div>
            </div>
            <div class="col-md-7">
              <div class="form-group">
                <label>Pilihan Menu</label><br/>
                <button class="btn btn-info btn-fill" onclick="getPDF();" onmouseover="demo.showDownload('top','center');" name="button"><i class="pe-7s-diskette"></i>&nbsp&nbsp Unduh Data</button>
                <button id="printY" class="btn btn-info btn-fill" onclick="printData();" onmouseover="demo.showPrint('top','center');" name="button"><i class="pe-7s-print"></i>&nbsp&nbsp Print</button>
                <a class="btn btn-warning btn-fill" onmouseover="demo.showBack('top','center');" name="button"><i class="pe-7s-back"></i>&nbsp&nbsp Kembali</a>
              </div>
            </div>
          </div>
        </div>
          <script type="text/javascript">
          $(document).ready(function(){
            $('.sorkar').on("change",function(){
              var sk = $('.sorkar').val();
              if (sk=='Manajer') {
                $('#clk').load("<?php echo base_url().'welcome/man'; ?>");
              }
              else if (sk=='Kepala Bidang') {
                $('#clk').load("<?php echo base_url().'welcome/kbid'; ?>");
              }
              else if (sk=='Staff') {
                $('#clk').load("<?php echo base_url().'welcome/staff'; ?>");
              }
              else if (sk=='Pengawas') {
                $('#clk').load("<?php echo base_url().'welcome/pengawas'; ?>");
              }
              else if (sk=='Kepala Shift') {
                $('#clk').load("<?php echo base_url().'welcome/kshift'; ?>");
              }
              else {
                $('#clk').load("<?php echo base_url().'welcome/shw'; ?>");
              }
            });
          });
          </script>
      </div>
    </div>
  </div>
    <div id="clk" class="card">
    </div>
</div>
<?php require_once(APPPATH.'views/include/footer.php'); ?>
