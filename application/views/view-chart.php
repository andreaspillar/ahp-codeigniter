<?php
 	require_once(APPPATH.'views/include/header.php');
?>
		<div id="chart-container" style="position: relative; height:60vh; width:60vw">
			<canvas id="mycanvas"></canvas>
		</div>

		<style type="text/css">
		#chart-container {
			width: 640px;
			height: auto;
		}
		</style>
		<!-- javascript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/Chart.min.js'); ?>" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
          url: "<?php echo base_url('HR/toJSON'); ?>",
          method: "GET",
          success: function(datA) {
						//startajax2nd
						$.ajax({
							url: "<?php echo base_url('HR/toJSONII'); ?>",
		          method: "GET",
		          success: function(datB) {
								$.ajax({
									url: "<?php echo base_url('HR/toJSONIII'); ?>",
									method: "GET",
									success: function(datC){
										$.ajax({
											url: "<?php echo base_url('HR/toJSONIV'); ?>",
											method: "GET",
											success: function(datD){
												$.ajax({
													url: "<?php echo base_url('HR/toJSONV'); ?>",
													method: "GET",
													success: function(datE){
														$.ajax({
															url: "<?php echo base_url('HR/toJSONVI'); ?>",
															method: "GET",
															success: function(datF){
																//console till chart start (dapat di cut dan ditempel ke ajax terakhir digenerate)
																console.log(datA);
																console.log(datB);
																console.log(datC);
																console.log(datD);
																console.log(datE);
																console.log(datF);
																var nilaiStaff = [];
																var nilaiManajer = [];
																var nilaiKabid = [];
																var nilaiPengawas = [];
																var nilaiKashift = [];
																var nilaiOperator = [];
																for (var i in datA) {
																	nilaiStaff.push(datA[i].final_t);
																}
																for (var j in datB) {
																	nilaiManajer.push(datB[j].final_t);
																}
																for (var j in datC) {
																	nilaiKabid.push(datC[j].final_t);
																}
																for (var j in datD) {
																	nilaiPengawas.push(datD[j].final_t);
																}
																for (var j in datE) {
																	nilaiKashift.push(datE[j].final_t);
																}
																for (var j in datF) {
																	nilaiOperator.push(datF[j].final_t);
																}

																// startcreatechart
																var ctx = $("#mycanvas");

																var barGraph = new Chart(ctx, {
																	type: 'line',
																	data: {
																	datasets: [{
																			label: 'Staff',
																			backgroundColor: 'rgba(76, 140, 239, 0)',
																			borderColor: 'rgba(76, 140, 239, 0.90)',
																			data: nilaiStaff,
																			borderWidth:1
																		},{
																			label: 'Manajer/ Kabag',
																			backgroundColor: 'rgba(172, 65, 66, 0)',
																			borderColor: 'rgba(172, 65, 66, 0.90)',
																			data: nilaiManajer,
																			borderWidth:1
																		},{
																			label: 'Kabid',
																			backgroundColor: 'rgba(248, 232, 15, 0)',
																			borderColor: 'rgba(248, 232, 15, 0.90)',
																			data: nilaiKabid,
																			borderWidth:1
																		},{
																			label: 'Pengawas',
																			backgroundColor: 'rgba(17, 217, 182, 0)',
																			borderColor: 'rgba(17, 217, 182, 0.90)',
																			data: nilaiPengawas,
																			borderWidth:1
																		},{
																			label: 'Kepala Shift',
																			backgroundColor: 'rgba(179, 6, 255, 0)',
																			borderColor: 'rgba(179, 6, 255, 0.90)',
																			data: nilaiKashift,
																			borderWidth:1
																		},{
																			label: 'Operator',
																			backgroundColor: 'rgba(243, 124, 0, 0)',
																			borderColor: 'rgba(243, 124, 0, 0.90)',
																			data: nilaiOperator,
																			borderWidth:1
																		}],
																		labels:['1','2','3','4','5','6','7','8','9','10']
																	},

																	options: {
																		scales: {
																				xAxes: [{
																					ticks:{
																						scaleShowLabels: false,
																						// maxRotation: 90,
																						// minRotation: 90,
																						fontSize: 9
																					},
																					scaleLabel: {
																						display: true,
																						labelString: 'Ranking'
																					}
																				}],
																				yAxes: [{
																						ticks: {
																								beginAtZero:true,
																								stepSize:0.1,
																						},
																						scaleLabel: {
																						display: true,
																						labelString: 'Nilai Indikator'}
																				}]
																		}
																}
																});
																// endcreatechart
																//console till chart end (dapat di cut dan ditempel ke ajax terakhir digenerate)
															}
														});
													}
												});
											}
										});
									}
								});
							}
						});
						//endajax2nd
          },
          error: function(data) {
            console.log(data);
          }
        });//endajax1st
        });
    </script>
		<?php
		 	require_once(APPPATH.'views/include/footer.php');
		?>
