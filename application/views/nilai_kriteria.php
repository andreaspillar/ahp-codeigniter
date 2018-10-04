<?php
 	require_once(APPPATH.'views/include/header.php');
?></br>
Matrix Perbandingan Pasangan
<table border="1">
  <thead>
    <tr>
      <td><b>Kriteria</b></td>
      <td><b>Kerjasama</b></td>
      <td><b>Sikap Kerja</b></td>
      <td><b>Keselamatan dan Kesehatan</b></td>
      <td><b>Inisiatif</b></td>
      <td><b>Kehadiran</b></td>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($nilkrit as $key) {?>
      <tr>
        <td><?php echo $key->matriks_bwh;?></td>
        <td><?php echo $key->a1; ?></td>
        <td><?php echo $key->a2; ?></td>
        <td><?php echo $key->a3; ?></td>
        <td><?php echo $key->a4; ?></td>
        <td><?php echo $key->a5; ?></td>
      </tr>
    <?php }?>
  </tbody>
</table><br/><br/><br/>
Matrix Nilai Kriteria
<table border="1">
  <thead>
    <tr>
      <td><b>Kriteria</b></td>
      <td><b>Kerjasama</b></td>
      <td><b>Sikap Kerja</b></td>
      <td><b>Keselamatan dan Kesehatan</b></td>
      <td><b>Inisiatif</b></td>
      <td><b>Kehadiran</b></td>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($nilkrit as $key) {?>
      <tr>
        <td><?php echo $key->matriks_bwh;?></td>
        <td><?php echo $key->a1; ?></td>
        <td><?php echo $key->a2; ?></td>
        <td><?php echo $key->a3; ?></td>
        <td><?php echo $key->a4; ?></td>
        <td><?php echo $key->a5; ?></td>
      </tr>
    <?php }?>
  </tbody>
</table>
