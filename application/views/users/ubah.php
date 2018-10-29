<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
        <?php foreach ($usub as $uu): ?>
          <?php if (($uu->levels==0)||($uu->levels==-1)): ?>
        <form class="" action="<?php echo base_url('HR/updadpu'); ?>" method="post">
          <table class="table table-hover">
                <tbody>
                  <tr>
                    <td><label class="control-label">id</label></td>
                    <td><input class="form-control" type="text" id="username" name="id_user" value="<?php echo $uu->id_user ?>" readonly></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Username</label></td>
                    <td><input class="form-control" type="text" id="username" name="username" value="<?php echo $uu->username ?>"></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Kata Sandi</label></td>
                    <td><input class="form-control" type="password" id="password" name="password" value=""></td>
                  </tr>
                  <tr>
                    <td colspan="2"><input type="submit" class="btn btn-fill btn-info" name="" value="Simpan User" onmouseover="demo.showNotification('bottom','center')"></td>
                  </tr>
                </tbody>
          </table>
        </form>
              <?php else: ?>
            <form class="" action="<?php echo base_url('HR/updateUSR'); ?>" method="post">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td><label class="control-label">id</label></td>
                    <td><input class="form-control" type="text" id="username" name="id_user" value="<?php echo $uu->id_user ?>" readonly></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Username</label></td>
                    <td><input class="form-control" type="text" id="username" name="username" value="<?php echo $uu->username ?>"></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Kata Sandi</label></td>
                    <td><input class="form-control" type="password" id="password" name="password" value=""></td>
                  </tr>
                  <tr>
                    <td><label class="control-label" for="jabatan">Jabatan</label></td>
                    <td><select id="jabatan" class="form-control jabatan" name="jabatan">
                      <?php
                      $table = 'jabatan';
                      $this->db->from($table);
                      $this->db->where('id_jabatan','1')->or_where('id_jabatan','2');
                      $query=$this->db->get();
                      $re=$query->result();
                      foreach ($re as $jB): ?>
                      <?php if ($jB->id_jabatan == $uu->levels){ ?>
                        <option value="<?php echo $jB->id_jabatan; ?>" selected><?php echo $jB->alias_jabatan; ?></option>
                      <?php } else { ?>
                        <option value="<?php echo $jB->id_jabatan; ?>" ><?php echo $jB->alias_jabatan; ?></option>
                      <?php } endforeach; ?>
                    </select> </td>
                  </tr>
                  <tr>
                    <td><label class="control-label" for="divisi">Bagian</label></td>
                    <td><select class="form-control divisi" id="divisi" name="divisi">
                      <?php
                      $othtab = 'bagian_divisi';
                      $this->db->from($othtab);
                      $query=$this->db->get();
                      $res=$query->result();
                      foreach ($res as $bG): ?>
                      <?php if ($bG->unique_bagian == $uu->divisi){ ?>
                        <option value="<?php echo $bG->unique_bagian; ?>" selected><?php echo $bG->unique_bagian; ?></option>
                      <?php }else{ ?>
                        <option value="<?php echo $bG->unique_bagian; ?>"><?php echo $bG->unique_bagian; ?></option>
                      <?php }endforeach; ?>
                    </select></td>
                  </tr>
                  <tr>
                    <td colspan="2"><input type="submit" class="btn btn-fill btn-info" name="" value="Simpan User" onmouseover="demo.showNotification('bottom','center')"></td>
                  </tr>
                </tbody>
              </table>
            </form>
              <?php endif; ?>
            <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
<?php
 	require_once(APPPATH.'views/include/footer.php');
?>
