<?php
 	require_once(APPPATH.'views/include/header.php');
?>
	<form method="POST" action="">
	<table border="1">
	<?php foreach($manager as $key){?>
			<tr>
			<td><?php echo $key->no;?></td>
			<td><?php echo $key->nama;?></td>
			<td><a href="<?php echo site_url('welcome/ubahm/'.$key->no);?>" role="button">Nilai</a></td>
			</tr>
	<?php }?>
	</table>
	</form>
</body>
</html>
