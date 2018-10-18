<div class="card card-plain">
  <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <td class="text-center"><b>NIK</b></td>
            <td class="text-center"><b>Nama</b></td>
            <td hidden><b>Tempat, Tanggal Lahir</b></td>
            <td hidden><b>Jenis Kelamin</b></td>
            <td class="text-center"><b>Jabatan</b></td>
            <td class="text-center"><b>Departemen</b></td>
            <td class="text-center"><b>Status Nilai</b></td>
            <td hidden><b>Tanggal Masuk</b></td>
            <td hidden><b>Pendidikan</b></td>
            <td class="text-center"><b>Aksi</b></td>
          </tr>
        </thead>
        <tbody>
          <?php if ($karyawan>0) {
              foreach ($karyawan as $qar){?>
            <tr>
              <td><?php echo $qar->no_karyawan; ?></td>
              <td><?php echo $qar->nama_karyawan; ?></td>
              <td hidden><?php echo $qar->tempat_lahir; ?>, <?php echo $qar->tanggal_lahir; ?></td>
              <td hidden><?php echo $qar->jenis_kelamin; ?></td>
              <td><?php echo $qar->jabatan; ?></td>
              <td><?php echo $qar->divisi; ?></td>
              <?php if ($qar->nilai != 0){ ?>
                <td class="bg-success" >Sudah Dinilai</td>
              <?php } else{ ?>
                <td class="bg-danger" >Belum Dinilai</td>
              <?php } ?>
              <td hidden><?php echo $qar->tanggal_masuk; ?></td>
              <td hidden><?php echo $qar->pendidikan; ?></td>
              <td>
                <a class="btn btn-block btn-fill btn-primary" href="<?php echo site_url('assessors/rank/'.$qar->id_karyawan); ?>" title="Nilai Karyawan" type="button"><i class="pe-7s-graph1"></i> Nilai</a>
              </td>
            </tr>
          <?php }
        }
          else {?>
            <tr>
              <td colspan="11"><center>NO DATA DEFAULT</center></td>
            </tr>
          <?php }?>
        </tbody>
    </table>
  </div>
</div>
