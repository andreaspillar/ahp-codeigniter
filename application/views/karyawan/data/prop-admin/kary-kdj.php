  <table class="table" border="0">
    <tr>
      <td>
        <a class="btn-fill btn-info btn" href="<?php echo site_url('welcome/adperson_pg')?>" type="button"><i class="pe-7s-plus"></i>   Tambah</a>
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
            <td class="text-center"><b>Aksi</b></td>
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
                <td class="bg-success" >Sudah Dinilai</td>
              <?php } else{ ?>
                <td class="bg-danger" >Belum Dinilai</td>
              <?php } ?>
              <?php if ($qar->absen != 0){ ?>
                <td class="bg-success" ><a href="#" id="hasilK<?php echo $qar->id_karyawan ?>">Sudah Dinilai</a></td>
                <td>
                  <a class="btn-fill btn-warning btn btn-block btUB" data-href="<?php echo site_url('welcome/chperson_pg/'.base64_encode($qar->id_karyawan)); ?>" title="Ubah Data Karyawan" type="button"><i class="pe-7s-config"></i> Ubah</a>
                  <a class="btn btn-fill btn-danger btn-block" href="<?php echo site_url('welcome/delKary/'.$qar->id_karyawan); ?>" title="Hapus Data Karyawan" type="button"><i class="pe-7s-close"></i> Hapus</a>
                </td>
              <?php } else{ ?>
                <td class="bg-danger" >Belum Dinilai</td>
                <td hidden><?php echo $qar->tanggal_masuk; ?></td>
                <td hidden><?php echo $qar->pendidikan; ?></td>
                <td>
                  <a class="btn-fill btn-warning btn btn-block btUB" data-href="<?php echo site_url('welcome/chperson_pg/'.base64_encode($qar->id_karyawan)); ?>" title="Ubah Data Karyawan" type="button"><i class="pe-7s-config"></i> Ubah</a>
                  <a class="btn btn-fill btn-danger btn-block" href="<?php echo site_url('welcome/delKary/'.$qar->id_karyawan); ?>" title="Hapus Data Karyawan" type="button"><i class="pe-7s-close"></i> Hapus</a>
                  <a class="btn btn-block btn-fill btn-success btUB" data-href="<?php echo site_url('welcome/rksen_kdj/'.base64_encode($qar->no_karyawan)); ?>" title="Nilai Absen Karyawan" type="button"><i class="pe-7s-graph1"></i> Nilai Absen</a>
                </td>
              <?php } ?>
            </tr>
            <tr id="infonil<?php echo $qar->id_karyawan ?>" hidden>
              <td colspan="2">
                <?php
                $this->db->where('id_karyawan',$qar->id_karyawan);
                $this->db->from('absen_karyawan');
                $deta = $this->db->get();
                $resD = $deta->result();
                foreach ($resD as $deK): ?>
                <?php
                $this->db->where('id_absen',$deK->id_absen);
                $this->db->from('absen');
                $kri = $this->db->get();
                $hasK = $kri->result();
                foreach ($hasK as $hK): ?>
                  <?php echo $hK->nama_absen; ?><br>
                <?php endforeach; ?>
                <?php endforeach; ?>
              </td>
              <td colspan="4">
                <?php
                $this->db->where('id_karyawan',$qar->id_karyawan);
                $this->db->from('absen_karyawan');
                $deta = $this->db->get();
                $resD = $deta->result();
                foreach ($resD as $deK): ?>
                <?php
                $this->db->where('id_absen',$deK->id_absen);
                $this->db->from('absen');
                $kri = $this->db->get();
                $hasK = $kri->result();
                foreach ($hasK as $hK): ?>
                  <?php echo $deK->nilai_absen; ?><br>
                <?php endforeach; ?>
                <?php endforeach; ?>
              </td>
              <td colspan="2">
                <!-- <a class="btn btn-info btn-fill btn-block btUB" href="<?php echo site_url('welcome/rank/'.base64_encode($qar->id_karyawan)) ?>" data-toggle="modal" data-target="#ubahModal">Ubah</a> -->
                <a class="btn btn-info btn-fill btn-block btUB" data-href="<?php echo site_url('welcome/rankkdj/'.base64_encode($qar->id_karyawan)) ?>" >Ubah</a>
                <!-- <a class="btn btn-info btn-fill btn-block " >Ubah</a> -->
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
<script type="text/javascript">
$(document).ready(function(){
  $(".btUB").click(function(){
    var link = $(this).data("href");
    $('#ubahModal').modal("show");
    $("#ubahModal .modal-body").load(link);
  });
});
</script>
