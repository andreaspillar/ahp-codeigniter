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
            <td><input class="form-control" id="id_kriteria" name="id_kriteria" type="text" value="<?php echo $ub->id_kriteria; ?>"></td>
          </tr>
          <tr>
            <td><label class="control-label" for="id_kriteria">Nama Kriteria</label></td>
            <td><input class="form-control" id="id_kriteria" name="id_kriteria" type="text" value="<?php echo $ub->nama_kriteria; ?>"></td>
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
