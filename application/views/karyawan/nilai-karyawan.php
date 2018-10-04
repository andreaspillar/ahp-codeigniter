<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
        <form class="" action="<?php echo site_url('welcome/updNiQa'); ?>" method="post">
          <table class="table table-hover table-striped">
            <?php foreach ($nilK as $a){
              $xpa = explode("A",$a->id_karyawan);
              $ra = $xpa[1];
              ?>
              <div class="header">
                <h4 class="title">Nilai <?php echo $a->nama_karyawan; ?></h4>
                <p class="category"><?php echo $a->jabatan; ?> - <?php echo $a->divisi; ?></p>
              </div>
              <input hidden type="text" name="idqar" value="<?php echo $a->id_karyawan; ?>">
              <thead>
                <tr>
                  <th>Kriteria</th><th>Nilai</th>
                </tr>
              </thead>
              <?php
              $this->db->from('kriteria');
              $query=$this->db->get();
              $listNil=$query->result(); ?>
              <?php foreach ($listNil as $b){
                $xpc = explode("C",$b->id_kriteria);
                $rc = $xpc[1];
                ?>
                <tr>
                  <td hidden><input type="text" name="C[<?php echo $rc; ?>]" value="<?php echo $b->id_kriteria; ?>"></td>
                  <td><?php echo $b->nama_kriteria; ?></td>
                  <td><input class="form-control calculate" type="number" min="0" max="100" step="5" id="<?php echo $b->id_kriteria; ?>" name="KR[<?php echo $rc; ?>]" value=""></td>
                </tr>
              <?php } ?>
              <script type="text/javascript">
              $(document).ready(function(){
              $('.calculate').change(function(e){
                var sum = 0;
                $('.calculate').each(function(){
                  if ($(this).val()!="") {
                    sum += parseInt($(this).val());
                  }
                });
                var average = sum/($('.calculate').length);
                $('input.TOT').val(average.toFixed(5));
              });
              });
              </script>
              <tr>
                <td>Total</td>
                <td><input readonly class="form-control TOT" type="text" name="total" value=""></td>
              </tr>
              <tr>
                <td colspan="2"><button class="btn btn-fill btn-info" type="submit">Nilai Karyawan</button></td>
              </tr>
            <?php } ?>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require_once(APPPATH.'views/include/footer.php'); ?>
