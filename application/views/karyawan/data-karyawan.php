<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <td><b>No</b></td>
                <td><b>NIK</b></td>
                <td><b>Nama</b></td>
                <td><b>Tempat, Tanggal Lahir</b></td>
                <td><b>Jenis Kelamin</b></td>
                <td><b>Jabatan</b></td>
                <td><b>Divisi</b></td>
                <td><b>Tanggal Masuk</b></td>
                <td><b>Pendidikan</b></td>
                <td><b>Nilai</b></td>
                <td><b>Aksi</b></td>
              </tr>
            </thead>
            <tbody>
              <?php if ($karyawan>0) {
                  foreach ($karyawan as $qar){?>
                <tr>
                  <td><?php echo $qar->id_karyawan; ?></td>
                  <td><?php echo $qar->no_karyawan; ?></td>
                  <td><?php echo $qar->nama_karyawan; ?></td>
                  <td><?php echo $qar->tempat_lahir; ?>, <?php echo $qar->tanggal_lahir; ?></td>
                  <td><?php echo $qar->jenis_kelamin; ?></td>
                  <td><?php echo $qar->jabatan; ?></td>
                  <td><?php echo $qar->divisi; ?></td>
                  <td><?php echo $qar->tanggal_masuk; ?></td>
                  <td><?php echo $qar->pendidikan; ?></td>
                  <td><?php echo $qar->nilai; ?></td>
                  <td><a class="btn-fill btn-warning btn pe-7s-config" href="<?php echo site_url('welcome/chperson_pg/'.$qar->id_karyawan); ?>" title="Ubah"></a>&nbsp<a class="btn-fill btn-danger btn pe-7s-close" href="#" title="Hapus"></a>&nbsp<a class="btn-fill btn-primary btn pe-7s-graph1" href="<?php echo site_url('welcome/rank/'.$qar->id_karyawan); ?>" title="Nilai"></a></td>
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
  </div>
  <a class="btn-fill btn-info btn" href="<?php echo site_url('welcome/adperson_pg')?>" type="button"><i class="pe-7s-plus"><b>   Tambah</b></i></a>
</div>
<?php
 	require_once(APPPATH.'views/include/footer.php');
?>
