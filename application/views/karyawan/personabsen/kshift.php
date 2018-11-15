<form action="<?php echo base_url('welcome/updateFiAb'); ?>" method="post">
<div id="clm" class="card card-plain canvas_div_pdf">
  <div class="content table-responsive table-full-width">
    <table class="table">
      <td><input type="submit" class="btn btn-fill btn-info" name="" value="Simpan Ke Database" onmouseover="demo.showNotification('top','center')"></td>
    </table>
    <?php foreach ($raK as $rK):
      $mainkt = explode("C",$rK->id_absen);
      $mkt = $rK->id_absen;
      ?>
      <div class="header">
        <h4 class="title">Tabel <?php echo $rK->nama_absen; ?></h4>
        <p class="category"><?php echo round($rK->jumlah_absen,5); ?></p>
      </div>
      <table class="table table-hover table-striped">
      <thead>
      <?php
      $this->db->where('jabatan','Kashift');
      $this->db->from('karyawan');
      $query=$this->db->get();
      $listKar=$query->result();
       ?>
      <tr>
        <th>Karyawan</th>
        <?php $couk = count($listKar); ?>
        <?php foreach ($listKar as $lK):
        // $ca = explode("",$lK->id_karyawan);
        $da = $lK->id_karyawan;
        $this->db->where('id_absen', $rK->id_absen);
        $this->db->where('id_karyawan', $lK->id_karyawan);
        $this->db->from('absen_karyawan');
        $query=$this->db->get();
        $dKa=$query->result(); ?>
        <?php foreach ($dKa as $dK):
          // $kt = explode("C",$dK->id_kriteria);
          // $ka = explode("A",$dK->id_karyawan);
          $rt = $dK->id_absen;
          $ra = $dK->id_karyawan;
        ?>
          <th hidden><?php echo $lK->nama_karyawan; ?></th>
          <th hidden class="cal" id="R<?php echo $mkt.$rt.'x'.$da; ?>"><?php echo $dK->nilai_absen; ?></th>
        <?php endforeach; ?>
        <?php endforeach; ?>
        <th class="bg-danger">Eigen Value: <?php if ($couk==0) {
          echo 0;
        } else {
          echo 1/$couk;
        } ?></th>
        <th class="bg-info">Bobot Alternatif</th>
        <th hidden class="bg-info" id="boal"></th>
        <th class="bg-success col-sm-2">Hasil Final Kriteria</th>
      </tr>
      </thead>
  <tbody>
    <?php
    $this->db->where('jabatan','Kashift');
    $this->db->from('karyawan');
    $query=$this->db->get();
    $listKar=$query->result();
     ?>
      <?php foreach ($listKar as $lK):
      // $ba = explode("A",$lK->id_karyawan);
      $za = $lK->id_karyawan;
      $this->db->where('id_absen', $rK->id_absen);
      $this->db->where('id_karyawan', $lK->id_karyawan);
      $this->db->from('absen_karyawan');
      $query=$this->db->get();
      $dKa=$query->result(); ?>
      <?php foreach ($dKa as $dK):
        // $kt = explode("C",$dK->id_kriteria);
        // $ka = explode("A",$dK->id_karyawan);
        $rt = $dK->id_absen;
        $ra = $lK->id_karyawan;
        ?>
    <tr>
        <td><?php echo $lK->nama_karyawan; ?></td>
        <td hidden class="calculate" id="X<?php echo $mkt.$rt.$ra; ?>"><?php echo $dK->nilai_absen; ?></td>
        <?php foreach ($listKar as $lK1):
          $aa = explode("A",$lK1->id_karyawan);
          $ab = $lK1->id_karyawan; ?>
            <td hidden id="P<?php echo $mkt.$ra.'x'.$ab ; ?>" class="vlu<?php echo $mkt.$za; ?>" ></td>
            <script type="text/javascript">
            var r = parseInt($('#R<?php echo $mkt.$rt.'x'.$ab; ?>').html());
            var x = parseInt($('#X<?php echo $mkt.$rt.$ra; ?>').html());
            var juks = x/r;
            $('#P<?php echo $mkt.$ra.'x'.$ab; ?>').html(juks.toFixed(3));
            </script>
        <?php endforeach; ?>
        <td class="bg-danger coa<?php echo $mkt;?>" id="cot<?php echo $mkt.$za; ?>"></td>
        <script type="text/javascript">
        $(document).ready(function(){
          var sum = 1;
          $('.vlu<?php echo $mkt.$za; ?>').each(function(index,item){
            var val = parseFloat($(item).html());
            if (!isNaN(val)) {
              sum = sum * val;
            }
          });
          var abisdbg = (sum)**(<?php echo 1/$couk; ?>);
          $('#cot<?php echo $mkt.$za; ?>').html(abisdbg.toFixed(3));
        });
        </script>
        <td class="bg-info bat<?php echo $mkt.$za;  ?>" id="bal<?php echo $mkt.$za; ?>"></td>
        <script type="text/javascript">
        $(document).ready(function(){
        var sumB = 0;
        $('.coa<?php echo $mkt; ?>').each(function(e){
              sumB += parseFloat($(this).text());
        });
        $('#toj<?php echo $mkt; ?>').html(sumB.toFixed(3));
        });
        </script>
        <td class="bg-success col-sm-2 per<?php echo $za; ?>" id="krH<?php echo $mkt.$za; ?>">
          <!-- <input readonly type="text" class="form-control" id="bokr<?php echo $mkt.$za; ?>" name="" value=""> -->
        </td>
    </tr>
  <?php endforeach; ?>
<?php endforeach; ?>
<tr>
  <?php $couj = count($listKar); ?>
  <td>Jumlah</td>
  <td class="bg-danger toju<?php echo $mkt; ?>" id="toj<?php echo $mkt; ?>"></td>
  <?php foreach ($listKar as $lK):
    // $fa = explode("A",$lK->id_karyawan);
    $ga = $lK->id_karyawan; ?>
    <script type="text/javascript">
    $(document).ready(function(){
      var xA = parseFloat($('#toj<?php echo $mkt; ?>').text());
      var yA = parseFloat($('#cot<?php echo $mkt.$ga; ?>').text());
      var ntp = yA/xA;
      var bokr = <?php echo round($rK->jumlah_absen,5); ?>;
      var prkr = ntp*bokr;
      $('#bal<?php echo $mkt.$ga;?>').html(ntp.toFixed(3));
      $('#bokr<?php echo $mkt.$ga; ?>').val(prkr.toFixed(5));
      $('#krH<?php echo $mkt.$ga; ?>').html(prkr.toFixed(5));
    });
    </script>
  <?php endforeach; ?>
</tr>
  </tbody>
    </table>
  <?php endforeach; ?>
  <?php
  $this->db->where('jabatan','Kashift');
  $this->db->from('karyawan');
  $query=$this->db->get();
  $fiRes=$query->result();
  ?>
      <div id="realprint" class="card card-plain canvas_div_pdf">
        <div class="header">
          <h4 class="title">Tabel Hasil</h4>
          <p class="category"></p>
        </div>
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>Nama Karyawan</th>
              <th hidden>Nilai Kriteria</th>
              <th>Nilai Absen</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($fiRes as $fR): ?>
              <tr>
                <td hidden><input type="text" name="idK[<?php echo $fR->id_karyawan ?>]" value="<?php echo $fR->id_karyawan ?>"> </td>
                <td><?php echo $fR->nama_karyawan; ?></td>
                <td><input class="form-control totA<?php echo $fR->id_karyawan ?>" id="finRes<?php echo $fR->id_karyawan; ?>" name="totalabsen[<?php echo $fR->id_karyawan; ?>]" type="text" name="" value="" readonly></td>
              </tr>
              <script type="text/javascript">
              $(document).ready(function(){
                var sumC = 0;
                $('.per<?php echo $fR->id_karyawan; ?>').each(function(e){
                  sumC += parseFloat($(this).text());
                });
                $('#finRes<?php echo $fR->id_karyawan; ?>').val(sumC.toFixed(3));
              });
              </script>
            <?php endforeach; ?>
            <tr>
              <td><input type="submit" class="btn btn-fill btn-info" name="" value="Simpan Ke Database" onmouseover="demo.showNotification('bottom','center')"></td>
            </tr>
          </tbody>
        </table>
      </div>
  </div>
</div>
</form>
