<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
          <div class="content">
            <div class="row">
              <div class="col-md-7">
                <div class="form-group">
                  <label>Pilihan Menu</label><br/>
                  <button class="btn btn-info btn-fill" onclick="getPDF();" onmouseover="demo.showDownload('top','center')" name="button"><i class="pe-7s-print"></i>&nbsp&nbsp Unduh Tabel</button>
                  <button id="printY" class="btn btn-info btn-fill" onclick="printData();" onmouseover="demo.showPrint('top','center');" name="button"><i class="pe-7s-print"></i>&nbsp&nbsp Print</button>
                  <a class="btn btn-warning btn-fill" onmouseover="demo.showBack('top','center');" name="button"><i class="pe-7s-back"></i>&nbsp&nbsp Kembali</a>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div id="cetk" class="content table-responsive table-full-width canvas_div_pdf">
        <?php
        $this->db->from('kriteria_kbid');
        $query=$this->db->get();
        $listKrit=$query->result();
        ?>
<!-- Analisa -->
        <div class="header">
          <h4 class="title">Tabel Analisa Kriteria</h4>
          <p class="category">Berikut ini adalah tabel hasil inputan prioritas kriteria</p>
        </div>
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>Kriteria</th>
              <?php
              foreach ($listKrit as $kr){ ?>
                <th><?php echo $kr->nama_kriteria; ?></th>
              <?php }?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($listKrit as $bc):
              ?>
              <tr>
                  <?php
                  $this->db->from('anls_krit_kb');
                  $this->db->where('kriteria_x',$bc->id_kriteria);
                  $query=$this->db->get();
                  $anK=$query->result();
                  ?>
                  <td><b><?php echo $bc->nama_kriteria; ?></b></td>
                  <?php foreach ($anK as $at):
                    // $pt = explode("C",$at->kriteria_x);
                    // $ps = explode("C",$at->kriteria_y);
                    $re = $at->kriteria_y;
                    $rf = $at->kriteria_x;
                  ?>
                    <td class="calculate<?php echo $re; ?>" id="R<?php echo $re.$rf; ?>"><?php echo $at->nilai_krit; ?></td>
                  <?php endforeach; ?>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td class="bg-info"><b>Jumlah</b></td>
              <?php
              foreach ($listKrit as $tt):
                $pt = explode("C",$tt->id_kriteria);
                $re = $tt->id_kriteria;
                ?>
                <td class="bg-info" id="sumR<?php echo $re; ?>"></td>
                <script type="text/javascript">
                $(document).ready(function(){
                var sumR = 0;
                $('.calculate<?php echo $re; ?>').each(function(e){
                      sumR += parseFloat($(this).text());
                });
                $('#sumR<?php echo $re; ?>').html(sumR.toFixed(5));
                });
                </script>
              <?php endforeach; ?>
            </tr>
          </tbody>
        </table>
<!-- Perbandingan -->
        <div class="header">
          <h4 class="title">Tabel Perbandingan Analisa</h4>
          <p class="category">Tabel ini merupakan tabel hasil penjumlahan prioritas kriteria</p>
        </div>
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>Kriteria</th>
              <?php
              foreach ($listKrit as $kr){ ?>
                <th><?php echo $kr->nama_kriteria; ?></th>
              <?php }?>
              <th class="bg-info">Jumlah</th>
              <th class="bg-success">Prioritas</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($listKrit as $bc):
              // $pt = explode("C",$bc->id_kriteria);
              $rx = $bc->id_kriteria;
              ?>
              <tr>
                  <?php
                  $this->db->from('anls_krit_kb');
                  $this->db->where('kriteria_x',$bc->id_kriteria);
                  $query=$this->db->get();
                  $anK=$query->result();
                  ?>
                  <td><b><?php echo $bc->nama_kriteria; ?></b></td>
                  <?php foreach ($anK as $at):
                    // $pt = explode("C",$at->kriteria_x);
                    // $ps = explode("C",$at->kriteria_y);
                    $re = $at->kriteria_y;
                    $rf = $at->kriteria_x;
                  ?>
                    <td class="calmul<?php echo $rf; ?>" id="ml<?php echo $re.$rf; ?>"><?php echo $at->nilai_krit; ?></td>
                    <script type="text/javascript">
                    $(document).ready(function(){
                    var mlty = 0;
                          mlty += parseFloat($('#R<?php echo $re.$rf; ?>').text())/parseFloat($('#sumR<?php echo $re ; ?>').text());
                    $('#ml<?php echo $re.$rf; ?>').html(mlty.toFixed(5));
                    });
                    </script>
                  <?php endforeach; ?>
                  <script type="text/javascript">
                  $(document).ready(function(){
                    var sumAX = 0;
                    $('.calmul<?php echo $rx; ?>').each(function(e){
                      sumAX += parseFloat($(this).text());
                    });
                    $('#to<?php echo $rx; ?>').html(sumAX.toFixed(5));
                    avgAX = parseFloat($('#to<?php echo $rx; ?>').text())/<?php echo sizeof($listKrit); ?>;
                    $('#tav<?php echo $rx; ?>').html(avgAX.toFixed(5));
                    $('#trap<?php echo $rx; ?>').html(avgAX.toFixed(5));
                  });
                  </script>
                  <td class="bg-info" id="to<?php echo $rx;?>"></td>
                  <td class="bg-success" id="tav<?php echo $rx;?>"></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
<!-- Penjumlahan -->
        <div class="header">
            <h4 class="title">Tabel Analisa Prioritas</h4>
            <p class="category">Tabel hasil penjumlahan matriks</p>
        </div>
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>Kriteria</th>
              <?php
              foreach ($listKrit as $kr){ ?>
                <th><?php echo $kr->nama_kriteria; ?></th>
              <?php }?>
              <th class="bg-info">Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($listKrit as $bc):
              // $pt = explode("C",$bc->id_kriteria);
              $rx = $bc->id_kriteria;
              ?>
              <tr>
                  <?php
                  $this->db->from('anls_krit_kb');
                  $this->db->where('kriteria_x',$bc->id_kriteria);
                  $query=$this->db->get();
                  $anK=$query->result();
                  ?>
                  <td><b><?php echo $bc->nama_kriteria; ?></b></td>
                  <?php foreach ($anK as $at):
                    // $pt = explode("C",$at->kriteria_x);
                    // $ps = explode("C",$at->kriteria_y);
                    $re = $at->kriteria_y;
                    $rf = $at->kriteria_x;
                  ?>
                    <td class="mtrx<?php echo $rf; ?>" id="mt<?php echo $re.$rf; ?>"><?php echo $at->nilai_krit; ?></td>

                    <script type="text/javascript">
                    $(document).ready(function(){
                    var mml = 0;
                          mml += parseFloat($('#R<?php echo $re.$rf; ?>').text())*parseFloat($('#tav<?php echo $re ; ?>').text());
                    $('#mt<?php echo $re.$rf; ?>').html(mml.toFixed(5));
                    });
                    </script>
                  <?php endforeach; ?>
                  <script type="text/javascript">
                  $(document).ready(function(){
                    var tolMX = 0;
                    $('.mtrx<?php echo $rx; ?>').each(function(e){
                      tolMX += parseFloat($(this).text());
                    });
                    $('#tpri<?php echo $rx; ?>').html(tolMX.toFixed(5));
                    $('#traj<?php echo $rx; ?>').html(tolMX.toFixed(5));
                  });
                  </script>
                  <td class="bg-info" id="tpri<?php echo $rx;?>"></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
<!-- Rasio Konsistensi -->
        <form class="" action="<?php echo base_url('HR/updateNiKrB'); ?>" method="post" onsubmit="return check()">
          <div class="header">
              <h4 class="title">Tabel Rasio Konsistensi</h4>
              <p class="category">Tabel Rasio Konsistensi, dibandingkan dengan tabel alternatif</p>
          </div>
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Rasio Konsistensi</th>
                <th class="bg-info">Jumlah</th>
                <th class="bg-success">Prioritas</th>
                <th class="bg-warning">Hasil</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listKrit as $bc):
                // $pt = explode("C",$bc->id_kriteria);
                $rx = $bc->id_kriteria;
                ?>
                <tr>
                    <td><b><?php echo $bc->nama_kriteria; ?></b></td>
                    <td class="bg-info col-xs-2" id="traj<?php echo $rx; ?>"></td>
                    <td class="bg-success col-xs-2" id="trap<?php echo $rx; ?>"></td>
                    <script type="text/javascript">
                    $(document).ready(function(){
                    var hsl = 0;
                          hsl += parseFloat($('#traj<?php echo $rx; ?>').text())+parseFloat($('#trap<?php echo $rx ; ?>').text());
                    $('#taha<?php echo $rx; ?>').val(hsl.toFixed(5));
                    $('#yo<?php echo $rx; ?>').html(hsl.toFixed(5));
                    });
                    </script>
                    <td hidden><input id="id_kriteria" type="text" name="id_kriteria[<?php echo $rx; ?>]" value="<?php echo $bc->id_kriteria; ?>"></td>
                    <td class="bg-warning col-xs-2"><input readonly class="form-control" type="text" name="hasil[<?php echo $rx; ?>]" id="taha<?php echo $rx; ?>" value=""></td>
                </tr>
              <?php endforeach; ?>
              <table class="table">
                <tr>
                  <td colspan="4"><input type="submit" class="btn btn-fill btn-info" name="" value="Simpan Ke Database" onmouseover="demo.showNotification('bottom','center')"> </td>
                </tr>
              </table>
            </form>
            </tbody>
          </table>
<!-- finish -->
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function getPDF(){

 var HTML_Width = $(".canvas_div_pdf").width();
 var HTML_Height = $(".canvas_div_pdf").height();
 var top_left_margin = 15;
 var PDF_Width = HTML_Width+(top_left_margin*2);
 var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
 var canvas_image_width = HTML_Width;
 var canvas_image_height = HTML_Height;

 var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;


 html2canvas($(".canvas_div_pdf")[0],{allowTaint:true}).then(function(canvas) {
 canvas.getContext('2d');

 console.log(canvas.height+"  "+canvas.width);


 var imgData = canvas.toDataURL("image/jpeg", 1.0);
 var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
     pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);


 for (var i = 1; i <= totalPDFPages; i++) {
 pdf.addPage(PDF_Width, PDF_Height);
 pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
 }

     pdf.save("analisa-kriteria.pdf");
        });
 };
 function printData()
{
   var divToPrint=document.getElementById("cetk");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
};
</script>
<?php
 	require_once(APPPATH.'views/include/footer.php');
?>
