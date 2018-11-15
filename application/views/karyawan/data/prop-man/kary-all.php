<?php if ($this->session->userdata('logged')['level']==='1'): ?>
  <table class="table" border="0">
    <tr>
      <td>
        <a class="btn-fill btn-danger btn" onmouseover="demo.showReset('top','center');" href="<?php echo site_url('HR/resetall')?>" type="button"><i class="pe-7s-plus"></i>   Reset Semua Nilai</a>
      </td>
    </tr>
  </table>
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
            <td class="text-center"><b>Nilai Kriteria</b></td>
            <td class="text-center"><b>Nilai Absen</b></td>
            <td hidden><b>Tanggal Masuk</b></td>
            <td hidden><b>Pendidikan</b></td>
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
                  <td class="bg-success" ><a href="#" id="hasilK<?php echo $qar->id_karyawan ?>">Sudah Dinilai</a></td>
                <?php } else{ ?>
                  <td class="bg-danger" >Belum Dinilai</td>
                <?php } ?>
                <?php if ($qar->absen != 0){ ?>
                  <td class="bg-success" >Sudah Dinilai</td>
                <?php } else{ ?>
                  <td class="bg-danger" >Belum Dinilai</td>
                <?php } ?>
                <td hidden><?php echo $qar->tanggal_masuk; ?></td>
                <td hidden><?php echo $qar->pendidikan; ?></td>
              </tr>
              <tr id="infonil<?php echo $qar->id_karyawan ?>" hidden>
                <td colspan="2">
                  <?php
                  $this->db->where('id_karyawan',$qar->id_karyawan);
                  $this->db->from('detail_karyawan');
                  $deta = $this->db->get();
                  $resD = $deta->result();
                  foreach ($resD as $deK): ?>
                  <?php
                  $this->db->where('id_kriteria',$deK->id_kriteria);
                  $this->db->from('kriteria');
                  $kri = $this->db->get();
                  $hasK = $kri->result();
                  foreach ($hasK as $hK): ?>
                  <?php echo $hK->nama_kriteria; ?><br>
                <?php endforeach; ?>
              <?php endforeach; ?>
            </td>
            <td colspan="3">
              <?php
              $this->db->where('id_karyawan',$qar->id_karyawan);
              $this->db->from('detail_karyawan');
              $deta = $this->db->get();
              $resD = $deta->result();
              foreach ($resD as $deK): ?>
              <?php
              $this->db->where('id_kriteria',$deK->id_kriteria);
              $this->db->from('kriteria');
              $kri = $this->db->get();
              $hasK = $kri->result();
              foreach ($hasK as $hK): ?>
              <?php echo $deK->nilai_kriteria; ?><br>
            <?php endforeach; ?>
          <?php endforeach; ?>
        </td>
        <td>
          <a class="btn btn-info btn-fill btn-block btUB" data-href="<?php echo site_url('HR/rank/'.$qar->id_karyawan) ?>" >Ubah</a>
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
<script type="text/javascript">
  $(document).ready(function(){
    <?php foreach ($karyawan as $b): ?>
      $("#hasilK<?php echo $b->id_karyawan; ?>").click(function(event){
        event.preventDefault();
        $("#infonil<?php echo $b->id_karyawan; ?>").toggle();
      });
    <?php endforeach; ?>
  });
</script>
<?php elseif($this->session->userdata('logged')['level']==='-1'): ?>
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
            <td class="text-center"><b>Nilai Kriteria</b></td>
            <td hidden><b>Tanggal Masuk</b></td>
            <td hidden><b>Pendidikan</b></td>
            <td><b>Aksi</b></td>
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
                  <td class="bg-success" ><a href="#" id="hasilK<?php echo $qar->id_karyawan ?>">Sudah Dinilai</a></td>
                  <td></td>
                <?php } else{ ?>
                  <td class="bg-danger" >Belum Dinilai</td>
                  <td>
                    <a class="btn btn-primary btn-fill btn-block" id="" href="<?php echo site_url('PU/rank/'.$qar->id_karyawan) ?>">Nilai</a>
                  </td>
                <?php } ?>
                <td hidden><?php echo $qar->tanggal_masuk; ?></td>
                <td hidden><?php echo $qar->pendidikan; ?></td>
              </tr>
              <tr id="infonil<?php echo $qar->id_karyawan ?>" hidden>
                <td colspan="2">
                  <?php
                  $this->db->where('id_karyawan',$qar->id_karyawan);
                  $this->db->from('detail_karyawan');
                  $deta = $this->db->get();
                  $resD = $deta->result();
                  foreach ($resD as $deK): ?>
                  <?php
                  $this->db->where('id_kriteria',$deK->id_kriteria);
                  $this->db->from('kriteria');
                  $kri = $this->db->get();
                  $hasK = $kri->result();
                  foreach ($hasK as $hK): ?>
                  <?php echo $hK->nama_kriteria; ?><br>
                <?php endforeach; ?>
              <?php endforeach; ?>
            </td>
            <td colspan="3">
              <?php
              $this->db->where('id_karyawan',$qar->id_karyawan);
              $this->db->from('detail_karyawan');
              $deta = $this->db->get();
              $resD = $deta->result();
              foreach ($resD as $deK): ?>
              <?php
              $this->db->where('id_kriteria',$deK->id_kriteria);
              $this->db->from('kriteria');
              $kri = $this->db->get();
              $hasK = $kri->result();
              foreach ($hasK as $hK): ?>
              <?php echo $deK->nilai_kriteria; ?><br>
            <?php endforeach; ?>
          <?php endforeach; ?>
        </td>
        <td>
          <a class="btn btn-info btn-fill btn-block" id="" href="<?php echo site_url('PU/rankupdate/'.$qar->id_karyawan) ?>">Ubah</a>
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
<script type="text/javascript">
  $(document).ready(function(){
    <?php foreach ($karyawan as $b): ?>
      $("#hasilK<?php echo $b->id_karyawan; ?>").click(function(event){
        event.preventDefault();
        $("#infonil<?php echo $b->id_karyawan; ?>").toggle();
      });
    <?php endforeach; ?>
  });
</script>
<?php endif; ?>
<script type="text/javascript">
$(document).ready(function(){
  $(".btUB").click(function(){
    var link = $(this).data("href");
    $('#ubahModal').modal("show");
    $("#ubahModal .modal-body").load(link);
  });
});
</script>
<script type="text/javascript">
demo = {
showReset: function(from, align){
    $.notify({
        icon: "pe-7s-close",
        message: "<b>Peringatan: </b> Menekan tombol ini akan mengembalikan semua status nilai ke 'Belum Dinilai'"

      },{
          type: 'danger',
          timer: 30,
          placement: {
            from: from,
            align: align
          }
      });
},
}
</script>
