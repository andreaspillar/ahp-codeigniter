<?php require_once(APPPATH.'views/include/headlogin.php'); ?>
<body>
	<br><br><br><br><br><br>
	<br>
	<div class="container">
	<div>
			<?php echo form_open('login/ath'); ?>
			<h2 class="form-signin-heading">Penilaian Karyawan PM5/6/9</h2><br>
			<div class="form-signin pull-left">
				<input name="username" type="text" class="form-control" placeholder="Nama Pengguna" required autofocus>
				<input type="password" name="password" class="form-control" placeholder="Kata Sandi" required>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
				<span class="text-danger"><?php echo $this->session->flashdata('msg'); ?></span>
			</div>
			<br/><br/><br/>
		</form>
	</div>
	</div>
</body>
</html>
