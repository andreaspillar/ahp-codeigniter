<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
          <table class="table table-hover table-striped">
          <tr>
            <td><b>Nama Kriteria</b></td>
            <td><b>Nilai</b></td>
            <td><b>Prioritas Krtiteria</b></td>
            <td><b>Aksi</b></td>
          </tr>
          <?php
          $num = 1;
          foreach ($data_kriteria as $dk){
            ?>
            <tr>
              <td hidden><?php echo $dk->id_kriteria; ?></td>
              <td><?php echo $dk->nama_kriteria; ?></td>
              <td><?php echo round($dk->jumlah_kriteria,3); ?></td>
              <td><?php echo $num; ?></td>
              <td><a class="btn-fill btn-warning btn pe-7s-config" href="<?php echo site_url('welcome/chkrit_pg/'.$dk->id_kriteria); ?>" title="Ubah"></a>&nbsp<a class="btn-fill btn-danger btn pe-7s-close" href="#" title="Hapus"></a></td>
            </tr>
          <?php $num++;
         }?>
        </table>
      </div>
    </div>
  </div>
  <a class="btn btn-info btn-fill" href="<?php echo site_url('welcome/addkrit_pg')?>" type="button"><i class="pe-7s-plus"><b>   Tambah</b></i></a>
</div>
<?php
 	require_once(APPPATH.'views/include/footer.php');
?>

<!-- <script type="text/javascript">
$('#manual-ajax').click(function(event) {
event.preventDefault();
this.blur(); // Manually remove focus from clicked link.
$.get(this.href, function(html) {
  $(html).appendTo('body').modal();
});
});
</script> -->
