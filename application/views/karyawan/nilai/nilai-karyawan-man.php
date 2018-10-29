  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
        <form class="" action="<?php echo site_url('HR/updNiQa'); ?>" method="post">
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
              $this->db->from('kriteria');
              $query=$this->db->get();
              $listNil=$query->result();
              $this->db->from('detail_karyawan');
              $this->db->where('id_karyawan',$a->id_karyawan);
              $this->db->join('kriteria', 'kriteria.id_kriteria = detail_karyawan.id_kriteria');
              $query=$this->db->get();
              $dQ=$query->result();
              ?>
              <?php foreach ($listNil as $b){
                // $xpc = explode("C",$b->id_kriteria);
                $rc = $b->id_kriteria;
                ?>
                <tr>
                  <td hidden><input type="text" name="C[<?php echo $rc; ?>]" value="<?php echo $b->id_kriteria; ?>"></td>
                  <td>
                    <?php echo $b->nama_kriteria; ?>&nbsp&nbsp&nbsp&nbsp<a href="#" id="shwIn<?php echo $rc ?>" onmouseover="demo.showHelp('top','center');" data-toogle="tooltip" data-placement="top" title="Klik Untuk Bantuan Menilai">?</a>
                  </td>
                  <td>
                    <select class="form-control calculate" name="KR[<?php echo $rc; ?>]" id="<?php echo $b->id_kriteria; ?>" required>
                      <option value="" disabled selected>Nilai Kirteria</option>
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
                  $("#shwIn<?php echo $b->id_kriteria; ?>").click(function(){
                    $("#cell<?php echo $b->id_kriteria; ?>").toggle();
                  });
                <?php endforeach; ?>
              });
            </script>
            <tr>
              <td>Total</td>
              <td><input readonly class="form-control TOT" type="text" name="total" value=""></td>
            </tr>
            <tr>
              <td colspan="2"><a class="btn btn-warning btn-fill" href="<?php echo site_url('HR/page3/'); ?>" onmouseover="demo.showBack('top','center');" name="button"><i class="pe-7s-back"></i>&nbsp&nbsp Kembali</a>
                <button class="btn btn-fill btn-info" type="submit">Nilai Karyawan</button></td>
              </tr>
            <?php } ?>
          </table>
        </form>
        <script type="text/javascript">
          demo = {
            showHelp: function(from, align){
              $.notify({
                icon: "pe-7s-way",
                message: "<b>Info: </b> Klik tombol untuk Bantuan."

              },{
                type: 'info',
                timer: 30,
                placement: {
                  from: from,
                  align: align
                }
              });
            },
          }
        </script>
      </div>
    </div>
  </div>
