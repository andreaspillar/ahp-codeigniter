<?php
 	require_once(APPPATH.'views/include/head-add.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
        <div class="header">
          <h4 class="title">Tambah Data Karyawan</h4>
        </div>
        <div class="content table-responsive table-full-width">
          <form action="<?php echo site_url('welcome/insertKaryawan')?>" method="post">
          <?php foreach($data as $idK){
            $xpl = explode("A",$idK->id_karyawan);
            $rename = "A".($xpl[1]+1);
            ?>
          <table class="table table-hover table-striped">
            <tr>
              <td><label class="control-label" for="id_kriteria">ID Kriteria</label></td>
              <td><input class="form-control" type="text" id="id_karyawan" name="id_karyawan" value="<?php echo $rename; ?>" readonly></td>
            </tr>
            <tr>
              <td><label class="control-label" for="no_karyawan">NIK</label></td>
              <td><input class="form-control" type="text" id="no_karyawan" name="no_karyawan" value=""></td>
            </tr>
            <tr>
              <td><label class="control-label" for="nama_karyawan">Nama</label></td>
              <td><input class="form-control" type="text" id="nama_karyawan" name="nama_karyawan" value=""></td>
            </tr>
            <tr>
              <td><label class="control-label" for="tempat_lahir">Tempat Lahir</label></td>
              <td><input class="form-control" type="text" id="tempat_lahir" name="tempat_lahir" value=""></td>
            </tr>
            <tr>
              <td><label class="control-label" for="tanggal_lahir">Tanggal Lahir</label></td>
              <td><input id="datelahir" name="tanggal_lahir"></td>
            </tr>
            <tr>
              <td><label class="control-label" for="jenis_kelamin">Jenis Kelamin</label></td>
              <td><select class="form-control jenis_kelamin" id="jenis_kelamin" name="jenis_kelamin">
                <option value="Laki-laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select> </td>
              <tr>
                <td><label class="control-label" for="jabatan">Jabatan</label></td>
                <td><select id="jabatan" class="form-control jabatan" name="jabatan">
                  <option value="Manajer">Manager</option>
                  <option value="Kabid">Kepala Bidang</option>
                  <option value="Staff">Staff</option>
                  <option value="Pengawas">Pengawas</option>
                  <option value="Kepala Shift">Kepala Shift</option>
                  <option value="Operator">Operator</option>
                </select> </td>
              </tr>
            </tr>
            <tr>
              <td><label class="control-label" for="divisi">Divisi</label></td>
              <td><input class="form-control" type="text" id="divisi" name="divisi" value=""></td>
            </tr>
            <tr>
              <td><label class="control-label" for="tanggal_masuk">Tanggal Masuk</label></td>
              <td><input id="datemasuk" name="tanggal_masuk"></td>
            </tr>
            <tr>
              <td><label class="control-label" for="pendidikan">Pendidikan</label></td>
                <td><select id="pendidikan" class="form-control pendidikan" name="pendidikan">
                  <option value="SD">SD</option>
                  <option value="SMP">SMP</option>
                  <option value="SMA">SMA</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
                </select> </td>
            </tr>
            <tr>
              <td colspan="2"><button class="btn btn-fill btn-info" type="submit">Simpan</button></td>
            </tr>
          </table>
          </form>
          <script>
          $(document).ready(function () {
              $('#datelahir').datepicker({
                format: 'yyyy-mm-dd',
              });
              $('#datemasuk').datepicker({
                format: 'yyyy-mm-dd',
                maxDate: 'today',
              });
          });
          </script>
      </div>
    </div>
  </div>
</div>
    <?php } ?>
<?php require_once(APPPATH.'views/include/footer.php'); ?>
