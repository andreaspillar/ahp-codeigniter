<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
          <table class="table table-hover table-striped">
            <div class="header">
              <h4 class="title">Indikator Manajer/ Kepala Departemen</h4>
            </div>
          <tr>
            <td><b>Nama Indikator</b></td>
            <td><b>Nilai</b></td>
            <td><b>Prioritas Indikator</b></td>
            <td><b>Aksi</b></td>
          </tr>
          <?php if ($data_kriteria>0): ?>
          <?php
          $num = 1;
          foreach ($data_kriteria as $dk){
            ?>
              <tr>
                <td hidden><?php echo $dk->id_kriteria; ?></td>
                <td><?php echo $dk->nama_kriteria; ?></td>
                <td><?php echo round($dk->jumlah_kriteria,3); ?></td>
                <td><?php echo $num; ?></td>
                <td><a class="btn-fill btn-warning btn pe-7s-config" href="<?php echo site_url('HR/chkrit_pg/'.$dk->id_kriteria); ?>" title="Ubah"></a>&nbsp<a class="btn-fill btn-danger btn pe-7s-close" href="<?php echo site_url('welcome/delKrit/'.$dk->id_kriteria); ?>" title="Hapus"></a></td>
              </tr>
              <?php $num++;
            }?>
          </table>
            <?php else: ?>
              <tr>
                <td colspan="4"><center>NO DATA DEFAULT, Buat Kriteria Baru <a href="<?php echo site_url('HR/plusid/'); ?>">Disini</a></center></td>
              </tr>
            <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php
  $this->db->from('kriteria_kbid');
	$this->db->order_by("jumlah_kriteria","desc");
  $query = $this->db->get();
  $kK = $query->result();
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
        <div class="header">
          <h4 class="title">Indikator Kepala Bidang/ Staff/ Pengawas</h4>
        </div>
          <table class="table table-hover table-striped">
          <tr>
            <td><b>Nama Indikator</b></td>
            <td><b>Nilai</b></td>
            <td><b>Prioritas Indikator</b></td>
          </tr>
          <?php if ($kK>0): ?>
          <?php
          $num = 1;
          foreach ($kK as $dk){
            ?>
              <tr>
                <td hidden><?php echo $dk->id_kriteria; ?></td>
                <td><?php echo $dk->nama_kriteria; ?></td>
                <td><?php echo round($dk->jumlah_kriteria,3); ?></td>
                <td><?php echo $num; ?></td>
              </tr>
              <?php $num++;
            }?>
          </table>
            <?php else: ?>
              <tr>
                <td colspan="4"><center>NO DATA DEFAULT, Buat Kriteria Baru <a href="<?php echo site_url('HR/plusid/'); ?>">Disini</a></center></td>
              </tr>
            <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php
  $this->db->from('kriteria_oper');
	$this->db->order_by("jumlah_kriteria","desc");
  $query2 = $this->db->get();
  $kO = $query2->result();
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
        <div class="header">
          <h4 class="title">Indikator Kepala Shift/ Operator</h4>
        </div>
          <table class="table table-hover table-striped">
          <tr>
            <td><b>Nama Indikator</b></td>
            <td><b>Nilai</b></td>
            <td><b>Prioritas Indikator</b></td>
          </tr>
          <?php if ($kO>0): ?>
          <?php
          $num = 1;
          foreach ($kO as $dk){
            ?>
              <tr>
                <td hidden><?php echo $dk->id_kriteria; ?></td>
                <td><?php echo $dk->nama_kriteria; ?></td>
                <td><?php echo round($dk->jumlah_kriteria,3); ?></td>
                <td><?php echo $num; ?></td>
              </tr>
              <?php $num++;
            }?>
          </table>
            <?php else: ?>
              <tr>
                <td colspan="4"><center>NO DATA DEFAULT, Buat Kriteria Baru <a href="<?php echo site_url('HR/plusid/'); ?>">Disini</a></center></td>
              </tr>
            <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
          <tr>
            <td>
              <a class="btn btn-info btn-fill" href="<?php echo site_url('HR/addkrit_pg')?>" type="button"><i class="pe-7s-plus"><b>   Tambah</b></i></a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
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
