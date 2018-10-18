<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
        <form action="<?php echo site_url('welcome/updateKriteria'); ?>" method="post">
          <?php foreach ($ubah as $ub){ ?>
          <div class="header">
            <h4 class="title">Ubah Kriteria <?php echo $ub->nama_kriteria; ?></h4>
          </div>
          <table class="table table-hover table-striped">
          <tr>
            <td><label class="control-label" for="id_kriteria">ID Kriteria</label></td>
            <td><input class="form-control" id="id_kriteria" name="id_kriteria" type="text" value="<?php echo $ub->id_kriteria; ?>" readonly></td>
          </tr>
          <tr>
            <td><label class="control-label" for="id_kriteria">Nama Kriteria</label></td>
            <td><input class="form-control" id="id_kriteria" name="nama_kriteria" type="text" value="<?php echo $ub->nama_kriteria; ?>"></td>
          </tr>
          <tr>
            <td><label class="control-label" for="id_kriteria">Keterangan Nilai: Kurang Sekali</label></td>
            <td><input class="form-control" id="id_kriteria" name="kurang_sekali" type="text" value="<?php echo $ub->ket_nil1; ?>" placeholder="Masukan Keterangan"></td>
          </tr>
          <tr>
            <td><label class="control-label" for="id_kriteria">Keterangan Nilai: Kurang</label></td>
            <td><input class="form-control" id="id_kriteria" name="kurang" type="text" value="<?php echo $ub->ket_nil2; ?>" placeholder="Masukan Keterangan"></td>
          </tr>
          <tr>
            <td><label class="control-label" for="id_kriteria">Keterangan Nilai: Cukup</label></td>
            <td><input class="form-control" id="id_kriteria" name="cukup" type="text" value="<?php echo $ub->ket_nil3; ?>" placeholder="Masukan Keterangan"></td>
          </tr>
          <tr>
            <td><label class="control-label" for="id_kriteria">Keterangan Nilai: Baik</label></td>
            <td><input class="form-control" id="id_kriteria" name="baik" type="text" value="<?php echo $ub->ket_nil4; ?>" placeholder="Masukan Keterangan"></td>
          </tr>
          <tr>
            <td><label class="control-label" for="id_kriteria">Keterangan Nilai: Baik Sekali</label></td>
            <td><input class="form-control" id="id_kriteria" name="baik_sekali" type="text" value="<?php echo $ub->ket_nil5; ?>" placeholder="Masukan Keterangan"></td>
          </tr>
        </table>
        <table class="table">
          <tr>
            <td colspan="2"><button class="btn-fill btn btn-info" type="submit">Simpan</button></td>
          </tr>
        </table>
        <?php }?>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
 	require_once(APPPATH.'views/include/footer.php');
?>
