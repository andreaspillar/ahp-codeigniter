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
      <?php if ($jumlahKaryawan <= 10): ?>
        <?php if ($fI->jabatan=='Manajer')://if MANAJER
          $proma1 = $jumlahKaryawan*0.35;
          $roundKaryawan = round($proma1);?>
          <?php if ($rank <= $roundKaryawan): ?>
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
                <td><?php echo $jumlahKaryawan; ?></td>
                <td><?php echo $fI->nama_karyawan; ?></td>
                <td id="htun"><?php echo $fI->final_nilai; ?></td>
                <td id="htua"><?php echo $fI->final_absen; ?></td>
                <td id="total"><?php echo $fI->final_total; ?></td>
                <td><?php echo $fI->divisi; ?></td>
                <td><?php echo $rank; ?></td>
                <td><?php echo 'Baik Sekali'; ?></td>
              </tr>
            <?php } ?>
          <?php else:?>
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
                <td><?php echo $jumlahKaryawan; ?></td>
                <td><?php echo $fI->nama_karyawan; ?></td>
                <td id="htun"><?php echo $fI->final_nilai; ?></td>
                <td id="htua"><?php echo $fI->final_absen; ?></td>
                <td id="total"><?php echo $fI->final_total; ?></td>
                <td><?php echo $fI->divisi; ?></td>
                <td><?php echo $rank; ?></td>
                <td><?php echo 'Baik'; ?></td>
              </tr>
            <?php } ?>
          <?php endif;?>
        <?php endif;//end MANAJER ?>
        <?php if($fI->jabatan=='Kabid'): //dimulai dari KABID
          $prokb1 = $jumlahKaryawan*0.15;
          $prokb2 = $jumlahKaryawan*0.35;
          $prokb3 = $jumlahKaryawan*0.40;
          $roundK1 = round($prokb1);
          $roundK2 = round($prokb1);
          $roundK3 = round($prokb1);
          ?>
          <?php if ($rank <= $roundK1): ?>
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
                <td><?php echo 'Baik Sekali'; ?></td>
              </tr>
            <?php } ?>
          <?php elseif($rank <= $roundK2):?>
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
                <td><?php echo 'Baik'; ?></td>
              </tr>
            <?php } ?>
          <?php elseif($rank <= $roundK3):?>
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
                <td><?php echo 'Cukup'; ?></td>
              </tr>
            <?php } ?>
          <?php else:?>
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
                <td><?php echo 'Kurang'; ?></td>
              </tr>
            <?php } ?>
          <?php endif;//selesai permisalan KABID?>
        <?php endif;?>

      <?php else: ?>

        <?php if ($fI->jabatan == 'Staff'||$fI->jabatan == 'Pengawas'||$fI->jabatan == 'Kashift'||$fI->jabatan == 'Operator'):
          $prooth1 = $jumlahKaryawan*0.15;
          $prooth2 = $jumlahKaryawan*0.35;
          $prooth3 = $jumlahKaryawan*0.40;
          $roundK1 = round($prooth1);
          $roundK2 = round($prooth2);
          $roundK3 = round($prooth3);
          ?>
          <?php if ($rank <= $roundK1): ?>
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
                <td><?php echo 'Baik Sekali'; ?></td>
              </tr>
            <?php } ?>
          <?php elseif($rank <= $roundK2):?>
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
                <td><?php echo 'Baik'; ?></td>
              </tr>
            <?php } ?>
          <?php elseif($rank <= $roundK3):?>
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
                <td><?php echo 'Cukup'; ?></td>
              </tr>
            <?php } ?>
          <?php else:?>
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
                <td><?php echo 'Kurang'; ?></td>
              </tr>
            <?php } ?>
          <?php endif;//selesai permisalan KABID?>
        <?php endif; ?>
      <?php endif; ?>

    <?php
      $rank++;
      endforeach; ?>
    </tbody>
  </table>
  </div>
</div>
