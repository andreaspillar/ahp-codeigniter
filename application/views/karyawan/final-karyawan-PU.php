<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
        <div class="header">
          <h4 class="title">Halaman Peringkat</h4>
          <p class="category">Silahkan Pilih Departemen dan Jabatan Yang Diinginkan</p>
        </div>
        <div class="content">
          <div class="row">
            <div class="col-md-7">
              <div class="form-group">
                <label for="sordiv">Pilih Departemen</label>
                <select class="form-control sordiv" id="sordiv">
                  <option selected value="">Semua Departemen</option>
                  <?php
                  $this->db->from('jabatan');
                  $query=$this->db->get();
                  $jab=$query->result();
                  $this->db->from('bagian_divisi');
                  $query=$this->db->get();
                  $divi=$query->result();
                  foreach ($divi as $D): ?>
                  <option value="<?php echo $D->id_bagian; ?>"><?php echo $D->unique_bagian ?></option>
                <?php endforeach; ?>
                </select>
                <label for="sorkar">Pilih Jabatan</label>
                <select class="form-control sorkar" id="sorkar">
                  <option disabled selected value="">--</option>
                  <?php foreach ($jab as $jB): ?>
                    <option value="<?php echo $jB->unique_jabatan ?>"><?php echo $jB->alias_jabatan ?></option>
                  <?php endforeach; ?>
                </select><br>
                <button class="btn btn-fill btn-info btnsend" type="button" id="btnsend" name="button">Cari</button>&nbsp&nbsp&nbsp
                <span class="text-danger" id="warn"></span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Pilihan Menu</label><br/>
                <button class="btn btn-info btn-fill btn-block" onclick="getPDF();" onmouseover="demo.showDownload('top','center');" name="button"><i class="pe-7s-diskette"></i>&nbsp&nbsp Unduh Data</button>
                <button id="printY" class="btn btn-info btn-fill btn-block" onclick="printData();" onmouseover="demo.showPrint('top','center');" name="button"><i class="pe-7s-print"></i>&nbsp&nbsp Print</button>
              </div>
            </div>
          </div>
        </div>
          <script type="text/javascript">
          $(document).ready(function(){
            $('.btnsend').click(function(event){
              event.preventDefault();
              var sk = $('.sorkar').val();
              var sm = $('.sordiv').val();
              <?php foreach ($divi as $dI): ?>
              <?php foreach ($jab as $J): ?>
              if ((sm=='<?php echo $dI->id_bagian ?>')&&(sk=='<?php echo $J->unique_jabatan; ?>')) {
                $('#warn').html('');
                $('#clk').load("<?php echo site_url('PU/rka/'.$J->unique_jabatan.'/'.$dI->unique_bagian); ?>");
              }
              else if((sk=='<?php echo $J->unique_jabatan ?>')&&(sm=='')) {
                $('#warn').html('');
                $('#clk').load("<?php echo site_url('PU/rkj/'.$J->unique_jabatan); ?>");
              }
              <?php endforeach; ?>
              else if ((sk=='')&&(sm==<?php echo $dI->id_bagian ?>)) {
                $('#warn').html('');
                $('#clk').load("<?php echo site_url('PU/rkd/'.$dI->unique_bagian); ?>");
              }
              <?php endforeach; ?>
              else if (!sk && !sm) {
                $('#warn').html('Perhatian: Pilih Jabatan Untuk Melihat Hasil');
              }
            });
          });
          </script>
      </div>
    </div>
  </div>
    <div id="clk" class="card">
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
 var pdf = new jsPDF('p','pt',  [PDF_Width, PDF_Height]);
     pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);


 for (var i = 1; i <= totalPDFPages; i++) {
 pdf.addPage(PDF_Width, PDF_Height);
 pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
 }

     pdf.save("analisa-manajer.pdf");
        });
 };
 function printData()
{
  var divToPrint=document.getElementById("printTAB");
  var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
        '}' +
        'table {' +
        'border:1px solid #000;' +
        '}' +
        '</style>';
   htmlToPrint += divToPrint.outerHTML;
   newWin = window.open("");
   newWin.document.write(htmlToPrint);
   newWin.print();
   newWin.close();
};
</script>
<?php require_once(APPPATH.'views/include/footer.php'); ?>
