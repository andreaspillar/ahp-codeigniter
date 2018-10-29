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
    $jumlahKaryawan = count($NalKa);
    $rank = 1;
    echo $jumlahKaryawan;
    foreach ($NalKa as $fI):
      ?>

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
        $totalrow = $jumlahKaryawan/4;
        $prokb1 = $totalrow*0.5;
        $prokb2 = $totalrow*1.5;
        $prokb3 = $totalrow*3.5;
        $prokb4 = $totalrow*4;
        $roundK1 = round($prokb1);
        $roundK2 = round($prokb2);
        $roundK3 = round($prokb3);
        $roundK4 = round($prokb4);
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
        <?php elseif($rank <= $roundK4):?>
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
      <?php if ($fI->jabatan == 'Staff'):
        $totalrow = $jumlahKaryawan/5;
        $prooth1 = $totalrow*0.40;
        $prooth2 = $totalrow*1.30;
        $prooth3 = $totalrow*3.40;
        $prooth4 = $totalrow*4.40;
        $prooth5 = $totalrow*5;
        $roundK1 = round($prooth1);
        $roundK2 = round($prooth2);
        $roundK3 = round($prooth3);
        $roundK4 = round($prooth4);
        $roundK5 = round($prooth5);
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
        <?php elseif($rank <= $roundK4):?>
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
        <?php elseif($rank <= $roundK5):?>
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
              <td><?php echo 'Kurang Sekali'; ?></td>
            </tr>
          <?php } ?>
        <?php endif;//selesai permisalan selain Kabid dan Manajer?>
        <?php endif; ?>
      <?php if ($fI->jabatan == 'Pengawas'):
        $totalrow = $jumlahKaryawan/5;
        $prooth1 = $totalrow*0.40;
        $prooth2 = $totalrow*1.30;
        $prooth3 = $totalrow*3.40;
        $prooth4 = $totalrow*4.40;
        $prooth5 = $totalrow*5;
        $roundK1 = round($prooth1);
        $roundK2 = round($prooth2);
        $roundK3 = round($prooth3);
        $roundK4 = round($prooth4);
        $roundK5 = round($prooth5);
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
        <?php elseif($rank <= $roundK4):?>
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
        <?php elseif($rank <= $roundK5):?>
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
              <td><?php echo 'Kurang Sekali'; ?></td>
            </tr>
          <?php } ?>
        <?php endif;//selesai permisalan selain Kabid dan Manajer?>
        <?php endif; ?>
      <?php if ($fI->jabatan == 'Kashift'):
        $totalrow = $jumlahKaryawan/5;
        $prooth1 = $totalrow*0.40;
        $prooth2 = $totalrow*1.30;
        $prooth3 = $totalrow*3.40;
        $prooth4 = $totalrow*4.40;
        $prooth5 = $totalrow*5;
        $roundK1 = round($prooth1);
        $roundK2 = round($prooth2);
        $roundK3 = round($prooth3);
        $roundK4 = round($prooth4);
        $roundK5 = round($prooth5);
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
        <?php elseif($rank <= $roundK4):?>
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
        <?php elseif($rank <= $roundK5):?>
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
              <td><?php echo 'Kurang Sekali'; ?></td>
            </tr>
          <?php } ?>
        <?php endif;//selesai permisalan selain Kabid dan Manajer?>
        <?php endif; ?>
      <?php if ($fI->jabatan == 'Operator'):
        $totalrow = $jumlahKaryawan/5;
        $prooth1 = $totalrow*0.40;
        $prooth2 = $totalrow*1.30;
        $prooth3 = $totalrow*3.40;
        $prooth4 = $totalrow*4.40;
        $prooth5 = $totalrow*5;
        $roundK1 = round($prooth1);
        $roundK2 = round($prooth2);
        $roundK3 = round($prooth3);
        $roundK4 = round($prooth4);
        $roundK5 = round($prooth5);
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
        <?php elseif($rank <= $roundK4):?>
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
        <?php elseif($rank <= $roundK5):?>
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
              <td><?php echo 'Kurang Sekali'; ?></td>
            </tr>
          <?php } ?>
          <?php endif;//selesai permisalan selain Kabid dan Manajer?>
          <?php endif; ?>

    <?php
      $rank++;
      endforeach; ?>
    </tbody>
  </table>
  </div>
</div>
