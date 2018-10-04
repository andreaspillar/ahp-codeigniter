<?php
 	require_once(APPPATH.'views/include/header.php');
?>
	<form method="POST" action="<?php echo site_url('welcome/udmg')?>">
    <table>
	<?php foreach($manager as $key){?>
    <tr>
      <td>NO</td><td><input value="<?php echo $key->no;?>" name='no' type="text" id="inputNo" required></td>
    </tr><tr>
      <td>Nama</td><td><input value="<?php echo $key->nama;?>" name='nama' type="text" id="inputNama" required></td>
    </tr><tr>
      <td>Kerjasama Tim</td><td><input value="<?php echo $key->value1;?>" name='val1' type="text" id="inputVal1" required></td>
    </tr><tr>
      <td>Sikap Kerja</td><td><input value="<?php echo $key->value2;?>" name='val2' type="text" id="inputVal2" required></td>
    </tr><tr>
      <td>Keselamatan dan Kesehatan</td><td><input value="<?php echo $key->value3;?>" name='val3' type="text" id="inputVal3" required></td>
    </tr><tr>
      <td>Inisiatif</td><td><input value="<?php echo $key->value4;?>" name='val4' type="text" id="inputVal4" required></td>
    </tr><tr>
      <td>Kehadiran</td><td><input value="<?php echo $key->value5;?>" name='val5' type="text" id="inputVal5" required></td>
    </tr>
	<?php }?>
  </table>
      <button type="submit">Terapkan</button>
	</form>
</body>
</html>
