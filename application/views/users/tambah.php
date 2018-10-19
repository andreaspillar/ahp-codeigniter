<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
        <form class="" action="<?php echo base_url('HR/usr_add'); ?>" method="post">
          <table class="table table-hover">
            <tbody>
              <tr>
                <td><label class="control-label">Username</label></td>
                <td><input class="form-control" type="text" id="username" name="username" value="" placeholder="contoh: kabidproduksi"></td>
              </tr>
              <tr>
                <td><label class="control-label">Kata Sandi</label></td>
                <td><input class="form-control" type="password" id="nama_pengguna" name="password" value=""></td>
              </tr>
              <tr>
                <td><label class="control-label" for="jabatan">Jabatan</label></td>
                <td><select required id="jabatan" class="form-control jabatan" name="jabatan">
                  <option value="" selected disabled>--</option>
                  <?php
                  $table = 'jabatan';
                  $othtab = 'bagian_divisi';
                  $this->db->from($table);
                  $this->db->where('id_jabatan','1')->or_where('id_jabatan','2');
                  $query=$this->db->get();
                  $re=$query->result();
                  foreach ($re as $jB): ?>
                  <option value="<?php echo $jB->id_jabatan; ?>"><?php echo $jB->alias_jabatan; ?></option>
                <?php endforeach; ?>
              </select> </td>
            </tr>
            <tr>
              <td><label class="control-label" for="divisi">Bagian</label></td>
              <td><select required class="form-control divisi" id="divisi" name="divisi">
                <option value="" selected disabled>--</option>
                <?php
                $this->db->from($othtab);
                $query=$this->db->get();
                $res=$query->result();
                foreach ($res as $bG): ?>
                <option value="<?php echo $bG->unique_bagian; ?>"><?php echo $bG->unique_bagian; ?></option>
              <?php endforeach; ?>
            </select></td>
          </tr>
            </tbody>
            <tbody>
              <tr>
                <td colspan="2"><input type="submit" class="btn btn-fill btn-info" name="" value="Simpan User" onmouseover="demo.showNotification('bottom','center')"></td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
 	require_once(APPPATH.'views/include/footer.php');
?>
