<div id="clm" class="card card-plain">
  <div class="content table-responsive table-full-width">
    <?php foreach ($raK as $rK):
      $mainkt = explode("C",$rK->id_kriteria);
      $mkt = $mainkt[1];
      ?>
      <div class="header">
        <h4 class="title">Tabel <?php echo $rK->nama_kriteria; ?></h4>
      </div>
      <table class="table table-hover table-striped">
      <thead>
      <?php
      $this->db->where('jabatan','Pengawas');
      $this->db->from('karyawan');
      $query=$this->db->get();
      $listKar=$query->result();
       ?>
      <tr>
        <th>Karyawan</th>
        <?php $couk = count($listKar); ?>
        <?php foreach ($listKar as $lK):
        $ca = explode("A",$lK->id_karyawan);
        $da = $ca[1];
        $this->db->where('id_kriteria', $rK->id_kriteria);
        $this->db->where('id_karyawan', $lK->id_karyawan);
        $this->db->from('detail_karyawan');
        $query=$this->db->get();
        $dKa=$query->result(); ?>
        <?php foreach ($dKa as $dK):
          $kt = explode("C",$dK->id_kriteria);
          $ka = explode("A",$dK->id_karyawan);
          $rt = $kt[1];
          $ra = $ka[1];
        ?>
          <th><?php echo $lK->nama_karyawan; ?></th>
          <th hidden class="cal" id="R<?php echo $mkt.$rt.$da; ?>"><?php echo $dK->nilai_kriteria; ?></th>
        <?php endforeach; ?>
        <?php endforeach; ?>
        <th class="bg-danger">Eigen Value: <?php if ($couk==0) {
          echo 0;
        } else {
          echo 1/$couk;
        } ?></th>
        <th class="bg-info">Bobot Alternatif</th>
        <th class="bg-info" id="boal"></th>
      </tr>
      </thead>
  <tbody>
    <?php
    $this->db->where('jabatan','Pengawas');
    $this->db->from('karyawan');
    $query=$this->db->get();
    $listKar=$query->result();
     ?>
      <?php foreach ($listKar as $lK):
      $ba = explode("A",$lK->id_karyawan);
      $za = $ba[1];
      $this->db->where('id_kriteria', $rK->id_kriteria);
      $this->db->where('id_karyawan', $lK->id_karyawan);
      $this->db->from('detail_karyawan');
      $query=$this->db->get();
      $dKa=$query->result(); ?>
      <?php foreach ($dKa as $dK):
        $kt = explode("C",$dK->id_kriteria);
        $ka = explode("A",$dK->id_karyawan);
        $rt = $kt[1];
        $ra = $ka[1];
        ?>
    <tr>
        <td><?php echo $lK->nama_karyawan; ?></td>
        <td hidden class="calculate" id="X<?php echo $mkt.$rt.$ra; ?>"><?php echo $dK->nilai_kriteria; ?></td>
        <?php foreach ($listKar as $lK1):
          $aa = explode("A",$lK1->id_karyawan);
          $ab = $aa[1]; ?>
            <td id="P<?php echo $mkt.$ra.$ab ; ?>" class="vlu<?php echo $mkt.$za; ?>" ></td>
            <script type="text/javascript">
            var r = parseInt($('#R<?php echo $mkt.$rt.$ab; ?>').html());
            var x = parseInt($('#X<?php echo $mkt.$rt.$ra; ?>').html());
            var juks = x/r;
            $('#P<?php echo $mkt.$ra.$ab; ?>').html(juks.toFixed(3));
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
    </tr>
  <?php endforeach; ?>
<?php endforeach; ?>
<tr>
  <?php $couj = count($listKar); ?>
  <td colspan="<?php echo $couj+1; ?>">Jumlah</td>
  <td class="bg-danger toju<?php echo $mkt; ?>" id="toj<?php echo $mkt; ?>"></td>
  <?php foreach ($listKar as $lK):
    $fa = explode("A",$lK->id_karyawan);
    $ga = $fa[1]; ?>
    <script type="text/javascript">
    $(document).ready(function(){
      var xA = parseFloat($('#toj<?php echo $mkt; ?>').text());
      var yA = parseFloat($('#cot<?php echo $mkt.$ga; ?>').text());
      var ntp = yA/xA;
      $('#bal<?php echo $mkt.$ga;?>').html(ntp.toFixed(3));
    });
    </script>
  <?php endforeach; ?>
</tr>
  </tbody>
    </table>
    <?php endforeach; ?>

  </div>
</div>
