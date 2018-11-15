  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
        <form id="form" action="<?php //echo site_url('welcome/updAbQa'); ?>" method="post">
          <table class="table table-hover table-striped">
            <?php foreach ($nilK as $a){
              $ra = $a->id_karyawan;
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
              $this->db->from('absen');
              $query=$this->db->get();
              $listNil=$query->result();
              $this->db->from('absen_karyawan');
              $this->db->where('id_karyawan',$a->id_karyawan);
              $this->db->join('absen', 'absen.id_absen = absen_karyawan.id_absen');
              $query=$this->db->get();
              $dQ=$query->result();
              ?>
                <?php foreach ($listNil as $b){
                  $rc = $b->id_absen;
                  ?>
                  <tr>
                    <td hidden><input type="text" name="C[<?php echo $rc; ?>]" value="<?php echo $b->id_absen; ?>"></td>
                    <td>
                      <?php echo $b->nama_absen; ?>&nbsp&nbsp&nbsp&nbsp<a href="#" id="shwIn<?php echo $rc ?>" data-toogle="tooltip" data-placement="top" title="Klik Untuk Bantuan Menilai" >?</a>
                    </td>
                    <td>
                      <select class="form-control calculate" name="KR[<?php echo $rc; ?>]" id="<?php echo $b->id_absen; ?>" required>
                        <option value="" disabled selected>Nilai Kriteria</option>
                        <?php
                        $this->db->from('nilai_karyawan');
                        $q=$this->db->get();
                        $resUL=$q->result();
                        foreach ($resUL as $key): ?>
                        <option value="<?php echo $key->valu_nilK; ?>"><?php echo $key->krit_nilK; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                  </tr>
                  <tr id="cell<?php echo $rc ?>" hidden>
                      <td colspan="2">
                        Nilai Sangat Baik: <?php echo $b->ket_nil5; ?><br>
                        Nilai Baik: <?php echo $b->ket_nil4; ?><br>
                        Nilai Cukup: <?php echo $b->ket_nil3; ?><br>
                        Nilai Kurang: <?php echo $b->ket_nil2; ?><br>
                        Nilai Sangat Kurang: <?php echo $b->ket_nil1; ?><br>
                      </td>
                  </tr>
                <?php } ?>
              <script type="text/javascript">
              $(document).ready(function(){
              $('.calculate').change(function(e){
                var sum = 0;
                $('.calculate').each(function(){
                  if ($(this).val()!="") {
                    sum += parseFloat($(this).val());
                  }
                });
                var average = sum/($('.calculate').length);
                if (isNaN(average)) {
                  $('input.TOT').val('Belum Semua Dinilai ');
                }
                else {
                  $('input.TOT').val(average.toFixed(5));
                }
              });
              <?php foreach ($listNil as $b): ?>
              $("#shwIn<?php echo $b->id_absen; ?>").click(function(event){
                event.preventDefault();
                $("#cell<?php echo $b->id_absen; ?>").toggle();
              });
              <?php endforeach; ?>
              });
              </script>
              <tr>
                <td>Total</td>
                <td><input readonly class="form-control TOT" type="text" name="total" value=""></td>
              </tr>
              <tr>
                <td colspan="2"><a class="btn btn-warning btn-fill" href="<?php echo site_url('welcome/page3/'); ?>" onmouseover="demo.showBack('top','center');" name="button"><i class="pe-7s-back"></i>&nbsp&nbsp Kembali</a>
                  <button class="btn btn-fill btn-info" id="btn" type="submit">Nilai Karyawan</button></td>
              </tr>
            <?php } ?>
          </table>
        </form>
        <script type="text/javascript">
          $('#btn').click(function(event) {
             form = $("#form").serialize();

           $.ajax({
             type: "POST",
             url: "<?php  echo site_url('welcome/updAbQa'); ?>",
             data: form,

             success: function(data){
               <?php foreach ($nilK as $a): ?>
               $('#clk').load("<?php echo site_url('welcome/dataKD/'.$a->divisi); ?>");
               <?php endforeach; ?>
                 $('#ubahModal').modal('hide');
             }
           });
           event.preventDefault();
           return false;

          });
        </script>
      </div>
    </div>
  </div>
