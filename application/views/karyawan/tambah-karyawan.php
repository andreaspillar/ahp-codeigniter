<?php
 	require_once(APPPATH.'views/include/header.php');
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
            // $xpl = explode("A",$idK->id_karyawan);
            // $ret = $xpl[1]+1;
            // $rename = "A".($ret);
            ?>
          <table class="table table-hover table-striped">
            <tr>
              <td><label class="control-label" for="id_kriteria">ID Kriteria</label></td>
              <td><input class="form-control" type="text" id="id_karyawan" name="id_karyawan" value="<?php echo $idK->id_karyawan+1; ?>" readonly></td>
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
            </tr>
              <tr>
                <td><label class="control-label" for="jabatan">Jabatan</label></td>
                <td><select id="jabatan" class="form-control jabatan" name="jabatan">
                  <?php
                  $table = 'jabatan';
                	$othtab = 'bagian_divisi';
                  $this->db->from($table);
                  $query=$this->db->get();
                  $re=$query->result();
                  foreach ($re as $jB): ?>
                  <option value="<?php echo $jB->unique_jabatan; ?>"><?php echo $jB->alias_jabatan; ?></option>
                  <?php endforeach; ?>
                </select> </td>
              </tr>
            <tr>
              <td><label class="control-label" for="divisi">Bagian</label></td>
              <td><select class="form-control divisi" id="divisi" name="divisi">
                <?php
                $this->db->from($othtab);
                $query=$this->db->get();
                $res=$query->result();
                foreach ($res as $bG): ?>
                <option value="<?php echo $bG->unique_bagian; ?>"><?php echo $bG->unique_bagian; ?></option>
                <?php endforeach; ?>
              </select></td>
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
