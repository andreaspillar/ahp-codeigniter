<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
          <form action="<?php echo site_url('welcome/insertKriteria')?>" method="post">
          <?php
          $plu=1;
             foreach($data as $idK){
             $id = $idK->id_kriteria;
             $rename = $id+$plu;
            ?>
          <table class="table table-hover table-striped">
            <tr>
              <td class="col-md-3"><label class="control-label" for="id_kriteria">ID Kriteria</label></td>
              <td class="col-md-6"><input class="form-control" type="text" id="id_kriteria" name="id_kriteria" value="<?php echo $rename ?>" readonly></td>
            </tr>
            <tr>
              <td class="col-md-3"><label class="control-label" for="nama_kriteria">Nama Kriteria</label></td>
              <td class="col-md-6"><input class="form-control" type="text" id="nama_kriteria" name="nama_kriteria" value=""></td>
            </tr>
            <tr>
              <td><label class="control-label" for="id_kriteria">Keterangan Nilai: Kurang Sekali</label></td>
              <td><input class="form-control" id="id_kriteria" name="kurang_sekali" type="text" value="" placeholder="Masukan Keterangan"></td>
            </tr>
            <tr>
              <td><label class="control-label" for="id_kriteria">Keterangan Nilai: Kurang</label></td>
              <td><input class="form-control" id="id_kriteria" name="kurang" type="text" value="" placeholder="Masukan Keterangan"></td>
            </tr>
            <tr>
              <td><label class="control-label" for="id_kriteria">Keterangan Nilai: Cukup</label></td>
              <td><input class="form-control" id="id_kriteria" name="cukup" type="text" value="" placeholder="Masukan Keterangan"></td>
            </tr>
            <tr>
              <td><label class="control-label" for="id_kriteria">Keterangan Nilai: Baik</label></td>
              <td><input class="form-control" id="id_kriteria" name="baik" type="text" value="" placeholder="Masukan Keterangan"></td>
            </tr>
            <tr>
              <td><label class="control-label" for="id_kriteria">Keterangan Nilai: Baik Sekali</label></td>
              <td><input class="form-control" id="id_kriteria" name="baik_sekali" type="text" value="" placeholder="Masukan Keterangan"></td>
            </tr>
            <tr>
              <td colspan="2"><button class="btn btn-success btn-fill" type="submit">Simpan</button></td>
            </tr>
          </table>
          <?php } ?>
          </form>
      </div>
    </div>
  </div>
</div>
<?php
 	require_once(APPPATH.'views/include/footer.php');
?>
