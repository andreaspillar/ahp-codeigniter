<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>Username</th>
              <th>Departement</th>
              <th>Levels</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($users as $usr): ?>
            <?php if ($usr->levels==-1): ?>
              <tr>
                <td class="col-xs-3"><?php echo $usr->username; ?></td>
                <td><?php echo $usr->divisi; ?></td>
                <td><?php echo 'Pimpinan Unit'; ?></td>
                <td class="col-xs-3">
                  <a class="btn-block btn-fill btn-warning btn" href="<?php echo site_url('HR/chuser/'.$usr->username); ?>" title="Ubah Data User" type="button"><i class="pe-7s-config"></i> Ubah</a>
                </td>
              </tr>
            <?php elseif ($usr->levels==0): ?>
              <tr>
                <td class="col-xs-3"><?php echo $usr->username; ?></td>
                <td><?php echo 'HR-GA'; ?></td>
                <td><?php echo 'Admin HR'; ?></td>
                <td class="col-xs-3">
                  <a class="btn-block btn-fill btn-warning btn" href="<?php echo site_url('HR/chuser/'.$usr->username); ?>" title="Ubah Data User" type="button"><i class="pe-7s-config"></i> Ubah</a>
                </td>
              </tr>
            <?php else: ?>
              <tr>
                <td class="col-xs-3"><?php echo $usr->username; ?></td>
                <td><?php echo $usr->divisi; ?></td>
                <?php if ($usr->levels == '1'): ?>
                  <td><?php echo 'Manajer'; ?></td>
                <?php elseif($usr->levels == '2'): ?>
                  <td><?php echo 'Kabid'; ?></td>
                <?php endif; ?>
                <td class="col-xs-3">
                  <a class="btn-block btn-fill btn-warning btn" href="<?php echo site_url('HR/chuser/'.$usr->username); ?>" title="Ubah Data User" type="button"><i class="pe-7s-config"></i> Ubah</a>
                  <a class="btn-block btn btn-fill btn-danger" href="<?php echo site_url('HR/dluser/'.$usr->username); ?>" title="Hapus Data User" type="button"><i class="pe-7s-close"></i> Hapus</a>
                </td>
              </tr>
            <?php endif; ?>
          <?php endforeach; ?>
        </tbody>
        <tbody>
          <tr>
            <td colspan="4">
              <a class="btn-fill btn-info btn" href="<?php echo site_url('HR/add_user/'); ?>" title="Tambah Data User" type="button"><i class="pe-7s-config"></i> Tambah</a>
            </td>
          </tr>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php
 	require_once(APPPATH.'views/include/footer.php');
?>
