<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
          <form action="<?php echo site_url('welcome/insertKriteria')?>" method="post">
          <?php foreach($data as $idK){
            $xpl = explode("C",$idK->id_kriteria);
            $rename = "C".($xpl[1]+1);
            ?>
          <table class="table table-hover table-striped">
            <tr>
              <td class="col-md-3"><label class="control-label" for="id_kriteria">ID Kriteria</label></td>
              <td class="col-md-6"><input class="form-control" type="text" id="id_kriteria" name="id_kriteria" value="<?php echo $rename; ?>" readonly></td>
            </tr>
            <tr>
              <td class="col-md-3"><label class="control-label" for="nama_kriteria">Nama Kriteria</label></td>
              <td class="col-md-6"><input class="form-control" type="text" id="nama_kriteria" name="nama_kriteria" value=""></td>
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
