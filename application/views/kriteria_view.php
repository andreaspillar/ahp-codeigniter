<?php
 	require_once(APPPATH.'views/include/header.php');
?>
	<form method="POST" action="<?php echo site_url('welcome/adcrit')?>">
    <table>
      <tr><td colspan="3"><b>Faktor Kerjasama</b></td></tr>
      <tr>
      <td>Kerjasama</td>
      <td>
        <select class="divide" name="a2" id="a2">
          <?php foreach ($options as $key){ ?>
          <option value="<?php echo $key->jum_nilai;?>"><?php echo $key->ket_nilai;?></option>
        <?php } ?>
        </select></td>
        <td>Sikap Kerja</td>
      </tr>
      <tr>
        <td>Kerjasama</td>
        <td>
          <select  class="divide" name="a3" id="a3">
            <?php foreach ($options as $key){ ?>
            <option value="<?php echo $key->jum_nilai;?>"><?php echo $key->ket_nilai;?></option>
          <?php } ?>
        </select></td>
        <td>Keselamatan/ Kesehatan</td>
      </tr>
      <tr>
        <td>Kerjasama</td>
        <td>
          <select class="divide" name="a4" id="a4">
            <?php foreach ($options as $key){ ?>
            <option value="<?php echo $key->jum_nilai;?>"><?php echo $key->ket_nilai;?></option>
          <?php } ?>
        </select></td>
        <td>Inisiatif</td>
      </tr>
      <tr>
        <td>Kerjasama</td>
        <td>
          <select class="divide" name="a5" id="a5">
            <?php foreach ($options as $key){ ?>
            <option value="<?php echo $key->jum_nilai;?>"><?php echo $key->ket_nilai;?></option>
          <?php } ?>
        </select></td>
        <td>Kehadiran</td>
      </tr>
      <!-- sikap kerja -->
      <tr><td colspan="3"><b>Faktor Sikap Kerja</b></td></tr>
      <tr>
        <td>Sikap Kerja</td>
        <td><select name="b3" class="divide" id="b3">
          <?php foreach ($options as $key){ ?>
          <option value="<?php echo $key->jum_nilai;?>"><?php echo $key->ket_nilai;?></option>
        <?php } ?>
        </select></td>
        <td>Keselamatan/ Kehadiran</td>
      </tr>
      <tr>
        <td>Sikap Kerja</td>
        <td><select name="b4" class="divide" id="b4">
          <?php foreach ($options as $key){ ?>
          <option value="<?php echo $key->jum_nilai;?>"><?php echo $key->ket_nilai;?></option>
        <?php } ?>
        </select></td>
        <td>Inisiatif</td>
      </tr>
      <tr>
        <td>Sikap Kerja</td>
        <td><select name="b5" class="divide" id="b5">
          <?php foreach ($options as $key){ ?>
          <option value="<?php echo $key->jum_nilai;?>"><?php echo $key->ket_nilai;?></option>
        <?php } ?>
        </select></td>
        <td>Kehadiran</td>
      </tr>
      <!-- Keselamatan/ Kesehatan -->
      <tr><td colspan="3"><b>Faktor Keselamatan/ Kesehatan</b></td></tr>
      <tr>
        <td>Keselamatan/ Kesehatan</td>
        <td><select name="c4" class="divide" id="c4">
          <?php foreach ($options as $key){ ?>
          <option value="<?php echo $key->jum_nilai;?>"><?php echo $key->ket_nilai;?></option>
        <?php } ?>
        </select></td>
        <td>Inisiatif</td>
      </tr>
      <tr>
        <td>Keselamatan/ Kesehatan</td>
        <td><select name="c5" class="divide" id="c5">
          <?php foreach ($options as $key){ ?>
          <option value="<?php echo $key->jum_nilai;?>"><?php echo $key->ket_nilai;?></option>
        <?php } ?>
        </select></td>
        <td>Kehadiran</td>
      </tr>
      <!-- Inisiatif -->
      <tr><td colspan="3"><b>Faktor Inisiatif</b></td></tr>
      <tr>
        <td>Inisiatif</td>
        <td><select name="d5" class="divide" id="d5">
          <?php foreach ($options as $key){ ?>
          <option value="<?php echo $key->jum_nilai;?>"><?php echo $key->ket_nilai;?></option>
        <?php } ?>
        </select></td>
        <td>Kehadiran</td>
      </tr>
    </table></br>
    Matrix Perbandingan Berpasangan
    <table border="1">
      <thead>
        <tr>
          <td><b>Kriteria</b></td>
          <td><b>Kerjasama</b></td>
          <td><b>Sikap Kerja</b></td>
          <td><b>Keselamatan/ Kesehatan</b></td>
          <td><b>Inisiatif</b></td>
          <td><b>Kehadiran</b></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><b>Kerjasama</b></td>
          <td><input name="a1" id="a1" value="1" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>Sikap Kerja</b></td>
          <td><input name="b1" id="b1" value="" type="text" readonly ></td>
          <td><input name="b2" id="b2" value="1" type="text" readonly ></td>
        </tr>
        <tr>
          <td><b>Keselamatan dan Kesehatan</b></td>
          <td><input name="c1" id="c1" value="" type="text" readonly></td>
          <td><input name="c2" id="c2" value="" type="text" readonly></td>
          <td><input name="c3" id="c3" value="1" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>Inisiatif</b></td>
          <td><input name="d1" id="d1" value="" type="text" readonly></td>
          <td><input name="d2" id="d2" value="" type="text" readonly ></td>
          <td><input name="d3" id="d3" value="" type="text" readonly></td>
          <td><input name="d4" id="d4" value="1" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>Kehadiran</b></td>
          <td><input name="e1" id="e1" value="" type="text" readonly></td>
          <td><input name="e2" id="e2" value="" type="text" readonly></td>
          <td><input name="e3" id="e3" value="" type="text" readonly></td>
          <td><input name="e4" id="e4" value="" type="text" readonly></td>
          <td><input name="e5" id="e5" value="1" type="text" readonly></td>
        </tr>
				<tr>
          <td><b>Jumlah</b></td>
          <td><input name="sum1" id="sum1" value="" type="text" readonly></td>
          <td><input name="sum2" id="sum2" value="" type="text" readonly></td>
          <td><input name="sum3" id="sum3" value="" type="text" readonly></td>
          <td><input name="sum4" id="sum4" value="" type="text" readonly></td>
          <td><input name="sum5" id="sum5" value="1" type="text" readonly></td>
        </tr>
      </tbody>
    </table></br>
    Matrix Nilai Kriteria
    <table border="1">
      <thead>
        <tr>
          <td><b>Kriteria</b></td>
          <td><b>Kerjasama</b></td>
          <td><b>Sikap Kerja</b></td>
          <td><b>Keselamatan/ Kesehatan</b></td>
          <td><b>Inisiatif</b></td>
          <td><b>Kehadiran</b></td>
          <td><b>Jumlah</b></td>
          <td><b>Prioritas</b></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><b>Kerjasama</b></td>
          <td><input name="f1" id="f1" value="" type="text" readonly></td>
          <td><input name="f2" id="f2" value="" type="text" readonly></td>
          <td><input name="f3" id="f3" value="" type="text" readonly></td>
          <td><input name="f4" id="f4" value="" type="text" readonly></td>
          <td><input name="f5" id="f5" value="" type="text" readonly></td>
          <td><input name="nk1" id="nk1" value="" type="text" readonly></td>
          <td><input name="pr1" id="pr1" value="" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>Sikap Kerja</b></td>
          <td><input name="g1" id="g1" value="" type="text" readonly ></td>
          <td><input name="g2" id="g2" value="" type="text" readonly ></td>
          <td><input name="g3" id="g3" value="" type="text" readonly ></td>
          <td><input name="g4" id="g4" value="" type="text" readonly ></td>
          <td><input name="g5" id="g5" value="" type="text" readonly ></td>
          <td><input name="nk2" id="nk2" value="" type="text" readonly></td>
          <td><input name="pr2" id="pr2" value="" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>Keselamatan dan Kesehatan</b></td>
          <td><input name="h1" id="h1" value="" type="text" readonly></td>
          <td><input name="h2" id="h2" value="" type="text" readonly></td>
          <td><input name="h3" id="h3" value="" type="text" readonly></td>
          <td><input name="h4" id="h4" value="" type="text" readonly></td>
          <td><input name="h5" id="h5" value="" type="text" readonly></td>
          <td><input name="nk3" id="nk3" value="" type="text" readonly></td>
          <td><input name="pr3" id="pr3" value="" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>Inisiatif</b></td>
          <td><input name="i1" id="i1" value="" type="text" readonly></td>
          <td><input name="i2" id="i2" value="" type="text" readonly ></td>
          <td><input name="i3" id="i3" value="" type="text" readonly></td>
          <td><input name="i4" id="i4" value="" type="text" readonly></td>
          <td><input name="i5" id="i5" value="" type="text" readonly></td>
          <td><input name="nk4" id="nk4" value="" type="text" readonly></td>
          <td><input name="pr4" id="pr4" value="" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>Kehadiran</b></td>
          <td><input name="j1" id="j1" value="" type="text" readonly></td>
          <td><input name="j2" id="j2" value="" type="text" readonly></td>
          <td><input name="j3" id="j3" value="" type="text" readonly></td>
          <td><input name="j4" id="j4" value="" type="text" readonly></td>
          <td><input name="j5" id="j5" value="" type="text" readonly></td>
          <td><input name="nk5" id="nk5" value="" type="text" readonly></td>
          <td><input name="pr5" id="pr5" value="" type="text" readonly></td>
        </tr>
      </tbody>
    </table></br>
    Matrix Penjumlahan Tiap Baris
    <table border="1">
      <thead>
        <tr>
          <td><b>Kriteria</b></td>
          <td><b>Kerjasama</b></td>
          <td><b>Sikap Kerja</b></td>
          <td><b>Keselamatan/ Kesehatan</b></td>
          <td><b>Inisiatif</b></td>
          <td><b>Kehadiran</b></td>
          <td><b>Jumlah Per Baris</b></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><b>Kerjasama</b></td>
          <td><input name="k1" id="k1" value="" type="text" readonly></td>
          <td><input name="k2" id="k2" value="" type="text" readonly></td>
          <td><input name="k3" id="k3" value="" type="text" readonly></td>
          <td><input name="k4" id="k4" value="" type="text" readonly></td>
          <td><input name="k5" id="k5" value="" type="text" readonly></td>
          <td><input name="mt1" id="mt1" value="" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>Sikap Kerja</b></td>
          <td><input name="l1" id="l1" value="" type="text" readonly ></td>
          <td><input name="l2" id="l2" value="" type="text" readonly ></td>
          <td><input name="l3" id="l3" value="" type="text" readonly ></td>
          <td><input name="l4" id="l4" value="" type="text" readonly ></td>
          <td><input name="l5" id="l5" value="" type="text" readonly ></td>
          <td><input name="mt2" id="mt2" value="" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>Keselamatan dan Kesehatan</b></td>
          <td><input name="m1" id="m1" value="" type="text" readonly></td>
          <td><input name="m2" id="m2" value="" type="text" readonly></td>
          <td><input name="m3" id="m3" value="" type="text" readonly></td>
          <td><input name="m4" id="m4" value="" type="text" readonly></td>
          <td><input name="m5" id="m5" value="" type="text" readonly></td>
          <td><input name="mt3" id="mt3" value="" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>Inisiatif</b></td>
          <td><input name="n1" id="n1" value="" type="text" readonly></td>
          <td><input name="n2" id="n2" value="" type="text" readonly ></td>
          <td><input name="n3" id="n3" value="" type="text" readonly></td>
          <td><input name="n4" id="n4" value="" type="text" readonly></td>
          <td><input name="n5" id="n5" value="" type="text" readonly></td>
          <td><input name="mt4" id="mt4" value="" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>Kehadiran</b></td>
          <td><input name="o1" id="o1" value="" type="text" readonly></td>
          <td><input name="o2" id="o2" value="" type="text" readonly></td>
          <td><input name="o3" id="o3" value="" type="text" readonly></td>
          <td><input name="o4" id="o4" value="" type="text" readonly></td>
          <td><input name="o5" id="o5" value="" type="text" readonly></td>
          <td><input name="mt5" id="mt5" value="" type="text" readonly></td>
        </tr>
      </tbody>
    </table></br>
    Rasio Konsistensi
    <table border="1">
      <thead>
        <tr>
          <td><b>Kriteria</b></td>
          <td><b>Per Baris</b></td>
          <td><b>Prioritas</b></td>
          <td><b>Hasil</b></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><b>Kerjasama</b></td>
          <td><input name="mt1" id="mt1" value="" type="text" readonly></td>
          <td><input name="pmt1" id="pmt1" value="" type="text" readonly></td>
          <td><input name="rk1" id="rk1" value="" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>Sikap Kerja</b></td>
          <td><input name="mt2" id="mt2" value="" type="text" readonly></td>
          <td><input name="pmt2" id="pmt2" value="" type="text" readonly></td>
          <td><input name="rk2" id="rk2" value="" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>Keselamatan dan Kesehatan</b></td>
          <td><input name="mt3" id="mt3" value="" type="text" readonly></td>
          <td><input name="pmt3" id="pmt3" value="" type="text" readonly></td>
          <td><input name="rk3" id="rk3" value="" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>Inisiatif</b></td>
          <td><input name="mt4" id="mt4" value="" type="text" readonly></td>
          <td><input name="pmt4" id="pmt4" value="" type="text" readonly></td>
          <td><input name="rk4" id="rk4" value="" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>Kehadiran</b></td>
          <td><input name="mt5" id="mt5" value="" type="text" readonly></td>
          <td><input name="pmt5" id="pmt5" value="" type="text" readonly></td>
          <td><input name="rk5" id="rk5" value="" type="text" readonly></td>
        </tr>
        <tr>
          <td colspan="3"><b>Jumlah</b></td>
          <td><input name="smrk" id="smrk" value="" type="text" readonly></td>
        </tr>
      </tbody>
    </table></br>
    Misc.
    <table border="1">
      <tbody>
        <tr>
          <td><b>Jumlah</b></td>
          <td><input name="smrk" id="smrk" value="" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>Jumlah Kriteria</b></td>
          <td><input name="nkrit" id="nkrit" value="5" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>Lamda Max</b></td>
          <td><input name="lm" id="lm" value="" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>CI</b></td>
          <td><input name="ci" id="ci" value="" type="text" readonly></td>
        </tr>
        <tr>
          <td><b>CR</b></td>
          <td><input name="cr" id="cr" value="" type="text" readonly></td>
        </tr>
      </tbody>
    </table>
      <button type="submit">Terapkan</button>
	</form>
  <script type="text/javascript">
  $(document).ready(function() {
  $('.divide').bind("keyup change", function(e) {
        var ab = parseFloat($('#a2').val()) || 0; //ab
        var value = 1 / ab;
        if (!isNaN(value) && value !== Infinity) {
            $('#b1').val(value);
        }
        var ac = parseFloat($('#a3').val()) || 0; //ac
        var value = 1 / ac;
        if (!isNaN(value) && value !== Infinity) {
            $('#c1').val(value);
        }
        var ad = parseFloat($('#a4').val()) || 0; //ad
        var value = 1 / ad;
        if (!isNaN(value) && value !== Infinity) {
            $('#d1').val(value);
        }
        var ae = parseFloat($('#a5').val()) || 0; //ae
        var value = 1 / ae;
        if (!isNaN(value) && value !== Infinity) {
            $('#e1').val(value);
        }
        var bc = parseFloat($('#b3').val()) || 0; //bc
        var value = 1 / bc;
        if (!isNaN(value) && value !== Infinity) {
            $('#c2').val(value);
        }
        var bd = parseFloat($('#b4').val()) || 0; //bd
        var value = 1 / bd;
        if (!isNaN(value) && value !== Infinity) {
            $('#d2').val(value);
        }
        var be = parseFloat($('#b5').val()) || 0; //be
        var value = 1 / be;
        if (!isNaN(value) && value !== Infinity) {
            $('#e2').val(value);
        }
        var cd = parseFloat($('#c4').val()) || 0; //cd
        var value = 1 / cd;
        if (!isNaN(value) && value !== Infinity) {
            $('#d3').val(value);
        }
        var ce = parseFloat($('#c5').val()) || 0; //ce
        var value = 1 / ce;
        if (!isNaN(value) && value !== Infinity) {
            $('#e3').val(value);
        }
        var de = parseFloat($('#d5').val()) || 0; //de
        var value = 1 / de;
        if (!isNaN(value) && value !== Infinity) {
            $('#e4').val(value);
        }
				var ba = parseFloat($('#b1').val()) || 0;
				var ca = parseFloat($('#c1').val()) || 0;
				var da = parseFloat($('#d1').val()) || 0;
				var ea = parseFloat($('#e1').val()) || 0;
				var cb = parseFloat($('#c2').val()) || 0;
				var db = parseFloat($('#d2').val()) || 0;
				var eb = parseFloat($('#e2').val()) || 0;
				var dc = parseFloat($('#d3').val()) || 0;
				var ec = parseFloat($('#e3').val()) || 0;
				var ed = parseFloat($('#e4').val()) || 0;
				var aa = parseFloat($('#a1').val()) || 0;
				var bb = parseFloat($('#b2').val()) || 0;
				var cc = parseFloat($('#c3').val()) || 0;
				var dd = parseFloat($('#d4').val()) || 0;
				var ee = parseFloat($('#e5').val()) || 0;
				var jma = (aa+ba+ca+da+ea);
				if (!isNaN(jma) && jma !== Infinity) {
            $('#sum1').val(jma);
        }
				var jmb = (ab+bb+cb+db+eb);
				if (!isNaN(jmb) && jmb !== Infinity) {
            $('#sum2').val(jmb);
        }
				var jmc = (ac+bc+cc+dc+ec);
				if (!isNaN(jmc) && jmc !== Infinity) {
            $('#sum3').val(jmc);
        }
				var jmd = (ad+bd+cd+dd+ed);
				if (!isNaN(jmd) && jmd !== Infinity) {
            $('#sum4').val(jmd);
        }
				var jme = (ae+be+ce+de+ee);
				if (!isNaN(jme) && jme !== Infinity) {
            $('#sum5').val(jme);
        }
        //matrixnilkrit
        var fa=aa/jma;
        var fb=ab/jmb;
        var fc=ac/jmc;
        var fd=ad/jmd;
        var fe=ae/jme;
        var ga=ba/jma;
        var gb=bb/jmb;
        var gc=bc/jmc;
        var gd=bd/jmd;
        var ge=be/jme;
        var ha=ca/jma;
        var hb=cb/jmb;
        var hc=cc/jmc;
        var hd=cd/jmd;
        var he=ce/jme;
        var ia=da/jma;
        var ib=db/jmb;
        var ic=dc/jmc;
        var id=dd/jmd;
        var ie=de/jme;
        var ja=da/jma;
        var jb=db/jmb;
        var jc=dc/jmc;
        var jd=dd/jmd;
        var je=de/jme;
        var nka=(fa+fb+fc+fd+fe);
        var nkb=(ga+gb+gc+gd+ge);
        var nkc=(ha+hb+hc+hd+he);
        var nkd=(ia+ib+ic+id+ie);
        var nke=(ja+jb+jc+jd+je);
        var pra=nka/5;
        var prb=nkb/5;
        var prc=nkc/5;
        var prd=nkd/5;
        var pre=nke/5;
        var ka=pra*aa;
        var kb=prb*ab;
        var kc=prc*ac;
        var kd=prd*ad;
        var ke=pre*ae;
        var la=pra*ba;
        var lb=prb*bb;
        var lc=prc*bc;
        var ld=prd*bd;
        var le=pre*be;
        var ma=pra*ca;
        var mb=prb*cb;
        var mc=prc*cc;
        var md=prd*cd;
        var me=pre*ce;
        var na=pra*da;
        var nb=prb*db;
        var nc=prc*dc;
        var nd=prd*dd;
        var ne=pre*de;
        var oa=pra*ea;
        var ob=prb*eb;
        var oc=prc*ec;
        var od=prd*ed;
        var oe=pre*ee;
        var mta=(ka+kb+kc+kd+ke);
        var mtb=(la+lb+lc+ld+le);
        var mtc=(ma+mb+mc+md+me);
        var mtd=(na+nb+nc+nd+ne);
        var mte=(oa+ob+oc+od+oe);
        var pmta=mta/5;
        var pmtb=mtb/5;
        var pmtc=mtc/5;
        var pmtd=mtd/5;
        var pmte=mte/5;
        var rka=pmta/mta;
        var rkb=pmtb/mtb;
        var rkc=pmtc/mtc;
        var rkd=pmtd/mtd;
        var rke=pmte/mte;
        var smrk=(rka+rkb+rkc+rkd+rke);
        var nkrit = parseFloat($('#nkrit').val()) || 0;
        var lm =smrk/nkrit;
        var ci = (lm-nkrit)/(nkrit-1);
        var ri =1.12;
        var cr = ci/ri;
        $('#f1').val(fa);
        $('#f2').val(fb);
        $('#f3').val(fc);
        $('#f4').val(fd);
        $('#f5').val(fe);
        $('#g1').val(ga);
        $('#g2').val(gb);
        $('#g3').val(gc);
        $('#g4').val(gd);
        $('#g5').val(ge);
        $('#h1').val(ha);
        $('#h2').val(hb);
        $('#h3').val(hc);
        $('#h4').val(hd);
        $('#h5').val(he);
        $('#i1').val(ia);
        $('#i2').val(ib);
        $('#i3').val(ic);
        $('#i4').val(id);
        $('#i5').val(ie);
        $('#j1').val(ja);
        $('#j2').val(jb);
        $('#j3').val(jc);
        $('#j4').val(jd);
        $('#j5').val(je);
        $('#nk1').val(nka);
        $('#nk2').val(nkb);
        $('#nk3').val(nkc);
        $('#nk4').val(nkd);
        $('#nk5').val(nke);
        $('#pr1').val(pra);
        $('#pr2').val(prb);
        $('#pr3').val(prc);
        $('#pr4').val(prd);
        $('#pr5').val(pre);
        $('#k1').val(ka);
        $('#k2').val(kb);
        $('#k3').val(kc);
        $('#k4').val(kd);
        $('#k5').val(ke);
        $('#l1').val(la);
        $('#l2').val(lb);
        $('#l3').val(lc);
        $('#l4').val(ld);
        $('#l5').val(le);
        $('#m1').val(ma);
        $('#m2').val(mb);
        $('#m3').val(mc);
        $('#m4').val(md);
        $('#m5').val(me);
        $('#n1').val(na);
        $('#n2').val(nb);
        $('#n3').val(nc);
        $('#n4').val(nd);
        $('#n5').val(ne);
        $('#o1').val(oa);
        $('#o2').val(ob);
        $('#o3').val(oc);
        $('#o4').val(od);
        $('#o5').val(oe);
        $("input[id*='mt1']").val(mta);
        $("input[id*='mt2']").val(mtb);
        $("input[id*='mt3']").val(mtc);
        $("input[id*='mt4']").val(mtd);
        $("input[id*='mt5']").val(mte);
        $('#pmt1').val(pmta);
        $('#pmt2').val(pmtb);
        $('#pmt3').val(pmtc);
        $('#pmt4').val(pmtd);
        $('#pmt5').val(pmte);
        $('#rk1').val(rka);
        $('#rk2').val(rkb);
        $('#rk3').val(rkc);
        $('#rk4').val(rkd);
        $('#rk5').val(rke);
        $("input[id*='smrk']").val(smrk);
        $('#lm').val(lm);
        $('#ci').val(ci);
        $('#cr').val(cr);
    });
	//buatapply
	// $("form").on('submit', function(event) {
	// 	event.preventDefault();
	//         var ab = $('#a2').val(); //ab
	//         var ac = $('#a3').val(); //ac
	//         var ad = $('#a4').val(); //ad
	// 				var ae = $('#a5').val(); //ae
	// 				var bc = $('#b3').val(); //bc
	//         var bd = $('#b4').val(); //bd
	//         var be = $('#b5').val(); //be
	//         var cd = $('#c4').val(); //cd
	//         var ce = $('#c5').val(); //ce
	//         var de = $('#d5').val(); //de
	//         var ba = $('#b1').val();
	// 				var ca = $('#c1').val();
	// 				var da = $('#d1').val();
	// 				var ea = $('#e1').val();
	// 				var cb = $('#c2').val();
	// 				var db = $('#d2').val();
	// 				var eb = $('#e2').val();
	// 				var dc = $('#d3').val();
	// 				var ec = $('#e3').val();
	// 				var ed = $('#e4').val();
	// 				var aa = $('#a1').val();
	// 				var bb = $('#b2').val();
	// 				var cc = $('#c3').val();
	// 				var dd = $('#d4').val();
	// 				var ee = $('#e5').val();
	// 				var sum1 = $('#sum1').val();
	// 				var sum2 = $('#sum2').val();
	// 				var sum3 = $('#sum3').val();
	// 				var sum4 = $('#sum4').val();
	// 				var sum5 = $('#sum5').val();
	// 				$.ajax({
	// 					type: "POST";
	// 					url: "<?php echo base_url();?>index.php/welcome/send_db";
	// 					data: {
	// 						aa:aa,ab:ab,ac:ac,ad:ad,ae:ae,
	// 						ba:ba,bb:bb,bc:bc,bd:bd,be:be,
	// 						ca:ca,cb:cb,cc:cc,cd:cd,ce:ce,
	// 						da:da,db:db,dc:dc,dd:dd,de:de,
	// 						ea:ea,eb:eb,ec:ec,ed:ed,ee:ee,
	// 						sum1:sum1,sum2:sum2,sum3:sum3,sum4:sum4,sum5:sum5,
	// 					},success: function(data){
	// 					}
	// 				});
	//     });
  });
  </script>
</body>
</html>
