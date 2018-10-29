<div id="clm" class="card card-plain canvas_div_pdf">
  <div class="content table-responsive table-full-width">
    <div class="header">
      <h4 class="title">Tabel Ranking</h4>
      <p class="category"></p>
    </div>
    <table class="table table-hover table-striped" id="printTAB">
      <thead>
        <tr>
          <th>Karyawan</th>
          <th>Nilai Kriteria</th>
          <th>Nilai Absen</th>
          <th>Nilai Total</th>
          <th>Departemen</th>
          <th>Ranking</th>
        </tr>
      </thead>
      <tbody>
    <?php
    $jumlahKaryawan = count($finKa);
    $rank = 1;
    foreach ($finKa as $fI):
      ?>
        <?php if (($fI->final_nilai==0.000000)||($fI->final_absen==0.000000)) { ?>
          <tr>
            <td><?php echo $fI->nama_karyawan; ?></td>
            <td><?php echo 'Belum Dianalisa'; ?></td>
            <td><?php echo 'Belum Dianalisa'; ?></td>
            <td><?php echo 'Belum Selesai'; ?></td>
            <td><?php echo $fI->divisi; ?></td>
            <td><?php echo 'N/A'; ?></td>
          </tr>
        <?php } else { ?>
          <tr>
            <td><?php echo $fI->nama_karyawan; ?></td>
            <td id="htun"><?php echo $fI->final_nilai; ?></td>
            <td id="htua"><?php echo $fI->final_absen; ?></td>
            <td id="total"><?php echo $fI->final_total; ?></td>
            <td><?php echo $fI->divisi; ?></td>
            <td><?php echo $rank; ?></td>
          </tr>
        <?php } ?>

    <?php
      $rank++;
      endforeach; ?>
    </tbody>
  </table>
  </div>
</div>
