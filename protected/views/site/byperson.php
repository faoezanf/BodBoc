<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/byperson.css">
<ul class="napbar">
  	<li><a href="#home">Ingenium</a></li>
  	<!-- <li><a href="#news">News</a></li>
  	<li><a href="#contact">Contact</a></li> -->
  	<li style="float:right"><a class="active" href="#about">Log Out</a></li>
	<li style="float:right">
	<div class="input-container">
	<input class="input-field" id="cari" type="text" placeholder="Find Catalogue...">
	<i class="fa fa-search icon"></i>
  	</div></li>
</ul>

<?php 
	// $connection=Yii::app()->db;
	// $sql= 'SELECT * FROM BOARD_COMPANY';
	// $command=$connection->createCommand($sql);
	$sql1 = "select count(DISTINCT PERSON_ID) from BOARD_PERSON WHERE PERSON_ID<>'' and PERSON_ID<>'NON TELKOM'";
	$numRows=Yii::app()->db->createCommand($sql1)->queryScalar();
	$sql="select * from BOARD_PERSON WHERE PERSON_ID<>'' and PERSON_ID<>'NON TELKOM' GROUP BY PERSON_ID ORDER BY PERSON_NAME ASC";
	$command=Yii::app()->db->createCommand($sql)->queryAll();
?>
<div class="menu"> 
	<nobr class="activeMenu">Monitoring BOD / BOC</nobr>
	<a href="#" class="admini"> Administration </a>
</div>

<div class="searchMonitor">
	<input id="cari2" type="text" placeholder="Search...">
	<i class="fa fa-search icon2"></i>
</div>

<div class="orderby">
	<button id="order1" class="orderbyNA" onclick="location.href = 'http://localhost/BodBoc/?r=site/index'"><i class="fa fa-building-o"></i> By Company</button> 
	<button id="order2" class="orderbyAktif"><i class="fa fa-user"></i> By Person</button>
</div>

<div id="orderbyperson">
	<div class="container">
		<?php 
			$statusData=1;
			$i = 0;

			foreach($command as $commands){
				if ($statusData==1){
					echo "<div class='row'>";
				}

				echo "
				<form method='post' action='?r=site/detailp'>
					<div class='col-md-6' onclick='this.parentNode.submit();'>
						<div class='row' style='cursor:pointer'>
							<div class='col-md-2'>
								<img id='gbr' src='"; echo Yii::app()->request->baseUrl; echo "/images/person.jpg' width='120%'>
								<input id='inputid' name='idperson' value='"; echo $commands['PERSON_ID']; echo"'>
							</div>
							<div class='col-md-10' style='line-height:35px;'>
								<p><b class='namaKaryawan'>"; echo $commands['PERSON_NAME']; echo" / "; echo $commands['PERSON_ID']; echo " </b> <br>";
								$sql3 = "select count(*) from BOARD_ASSIGNMENT where person_id='".$commands['PERSON_ID']."'";
								$jumKerja=Yii::app()->db->createCommand($sql3)->queryScalar();
								// echo $jumKerja;
								$sql4 = "select BOARD_ASSIGNMENT.position_name,BOARD_ASSIGNMENT.company_id,BOARD_COMPANY.company_name_short,BOARD_ASSIGNMENT.band from BOARD_ASSIGNMENT INNER JOIN BOARD_COMPANY ON BOARD_COMPANY.company_id=BOARD_ASSIGNMENT.company_id where person_id='".$commands['PERSON_ID']."';";
								$rows=Yii::app()->db->createCommand($sql4)->queryAll();
								if ($jumKerja<=3)
								{
									// for ($x = 1; $x <= $jumKerja; $x+=1) {
									// 	// echo "The number is: $x <br>";
										
									// }
									foreach($rows as $row){
										$in = $row['position_name']." PT. ".$row['company_name_short']." (".$row['band'].")";
										$out = strlen($in) > 50 ? substr($in,0,50)."..." : $in;
										echo $out;
										echo "<br>";
									}
								} else 
								{
									$stat=1;
									foreach($rows as $row){
										if ($stat<=3){
											$in = $row['position_name']." PT. ".$row['company_name_short']." (".$row['band'].")";
											$out = strlen($in) > 50 ? substr($in,0,50)."..." : $in;
											echo $out;
											echo  "<br>";
											$stat=$stat+1;
										}
									}
									//echo "hehehehe";
								}
								
								// Director of HCM PT Telkomsel (I: 2018-2020) <br>
								// Komisaris Utama PT. Telkom Sigma(I: 2018-2020) <br>
								// Komisaris PT. Metranet (I: 2018-2020) 
						echo "	</p>
							</div>
						</div>
					
					</div>
				</form>
				";

				// echo $commands['COMPANY_NAME_SHORT']; 
				$i = $i+1;
				$statusData=$statusData+1;

				if($statusData==3 || $i == $numRows){
					echo "</div>";
					echo "<br> <br>";
					$statusData=1;
				}
			}
		?>
		</div>
		<!-- <div class="row">
			<div class="col-md-6">
				<div class="row" style="cursor:pointer">
					<div class="col-md-2">
						<img id="gbr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/person.jpg" width="120%">
					</div>
					<div class="col-md-10" style="line-height:35px;">
						<p style="font-size:17px"><b>Kurniawan Adina K / 930311 </b> <br>
						Director of HCM PT Telkomsel (I: 2018-2020) <br>
						Komisaris Utama PT. Telkom Sigma(I: 2018-2020) <br>
						Komisaris PT. Metranet (I: 2018-2020) </p>
					</div>
				</div>
				
			</div>
			<div class="col-md-6">
				<div class="row" style="cursor:pointer">
					<div class="col-md-2">
					<img id="gbr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/person.jpg" width="120%">
					</div>
					<div class="col-md-10" style="line-height:35px;">
						<p style="font-size:17px"><b>Kurniawan Adina K / 930311 </b> <br>
						Director of HCM PT Telkomsel (I: 2018-2020) <br>
						Komisaris Utama PT. Telkom Sigma(I: 2018-2020) <br>
						Komisaris PT. Metranet (I: 2018-2020) </p>
					</div>
				</div>
			</div>
		</div>
		<br> <br>
		<div class="row">
			<div class="col-md-6">
				<div class="row" style="cursor:pointer">
					<div class="col-md-2">
					<img id="gbr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/person.jpg" width="120%">
					</div>
					<div class="col-md-10" style="line-height:35px;">
						<p style="font-size:17px"><b>Kurniawan Adina K / 930311 </b> <br>
						Director of HCM PT Telkomsel (I: 2018-2020) <br>
						Komisaris Utama PT. Telkom Sigma(I: 2018-2020) <br>
						Komisaris PT. Metranet (I: 2018-2020) </p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row" style="cursor:pointer">
					<div class="col-md-2">
					<img id="gbr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/person.jpg" width="120%">
					</div>
					<div class="col-md-10" style="line-height:35px;">
						<p style="font-size:17px"><b>Kurniawan Adina K / 930311 </b> <br>
						Director of HCM PT Telkomsel (I: 2018-2020) <br>
						Komisaris Utama PT. Telkom Sigma(I: 2018-2020) <br>
						Komisaris PT. Metranet (I: 2018-2020) </p>
					</div>
				</div>
			</div>
		</div>
		<br> <br>
		<div class="row">
			<div class="col-md-6">
				<div class="row" style="cursor:pointer">
					<div class="col-md-2">
					<img id="gbr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/person.jpg" width="120%">
					</div>
					<div class="col-md-10" style="line-height:35px;">
						<p style="font-size:17px"><b>Kurniawan Adina K / 930311 </b> <br>
						Director of HCM PT Telkomsel (I: 2018-2020) <br>
						Komisaris Utama PT. Telkom Sigma(I: 2018-2020) <br>
						Komisaris PT. Metranet (I: 2018-2020) </p>
					</div>
				</div>
				
			</div>
			<div class="col-md-6">
				<div class="row" style="cursor:pointer">
					<div class="col-md-2">
					<img id="gbr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/person.jpg" width="120%">
					</div>
					<div class="col-md-10" style="line-height:35px;">
						<p style="font-size:17px"><b>Kurniawan Adina K / 930311 </b> <br>
						Director of HCM PT Telkomsel (I: 2018-2020) <br>
						Komisaris Utama PT. Telkom Sigma(I: 2018-2020) <br>
						Komisaris PT. Metranet (I: 2018-2020) </p>
					</div>
				</div>
			</div>
		</div>
		<br> <br>
		<div class="row">
			<div class="col-md-6">
				<div class="row" style="cursor:pointer">
					<div class="col-md-2">
					<img id="gbr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/person.jpg" width="120%">
					</div>
					<div class="col-md-10" style="line-height:35px;">
						<p style="font-size:17px"><b>Kurniawan Adina K / 930311 </b> <br>
						Director of HCM PT Telkomsel (I: 2018-2020) <br>
						Komisaris Utama PT. Telkom Sigma(I: 2018-2020) <br>
						Komisaris PT. Metranet (I: 2018-2020) </p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row" style="cursor:pointer">
					<div class="col-md-2">
					<img id="gbr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/person.jpg" width="120%">
					</div>
					<div class="col-md-10" style="line-height:35px;">
						<p style="font-size:17px"><b>Kurniawan Adina K / 930311 </b> <br>
						Director of HCM PT Telkomsel (I: 2018-2020) <br>
						Komisaris Utama PT. Telkom Sigma(I: 2018-2020) <br>
						Komisaris PT. Metranet (I: 2018-2020) </p>
					</div>
				</div>
			</div>
		</div>
		<br> <br>
		<div class="row">
			<div class="col-md-6">
				<div class="row" style="cursor:pointer">
					<div class="col-md-2">
					<img id="gbr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/person.jpg" width="120%">
					</div>
					<div class="col-md-10" style="line-height:35px;">
						<p style="font-size:17px"><b>Kurniawan Adina K / 930311 </b> <br>
						Director of HCM PT Telkomsel (I: 2018-2020) <br>
						Komisaris Utama PT. Telkom Sigma(I: 2018-2020) <br>
						Komisaris PT. Metranet (I: 2018-2020) </p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row" style="cursor:pointer">
					<div class="col-md-2">
					<img id="gbr" src="<?php echo Yii::app()->request->baseUrl; ?>/images/person.jpg" width="120%">
					</div>
					<div class="col-md-10" style="line-height:35px;">
						<p style="font-size:17px"><b>Kurniawan Adina K / 930311 </b> <br>
						Director of HCM PT Telkomsel (I: 2018-2020) <br>
						Komisaris Utama PT. Telkom Sigma(I: 2018-2020) <br>
						Komisaris PT. Metranet (I: 2018-2020) </p>
					</div>
				</div>
			</div>
		</div> -->
	</div>
	<p id="jumData">Total <?php echo $numRows ?> Data</p>
	<div class="text-center">
	<nav aria-label="Page navigation example">
		<ul class="pagination pagination-lg justify-content-center">
			<li class="page-item disabled">
				<a class="page-link" href="" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
					<span class="sr-only">Previous</span>
				</a>
			</li>
			<li class="page-item active" style="background-color:red"><a class="page-link">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item"><a class="page-link" href="#">4</a></li>
			<li class="page-item"><a class="page-link" href="#">5</a></li>
			<li class="page-item">
				<a class="page-link" href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
					<span class="sr-only">Next</span>
				</a>
			</li>
	</ul>
	</nav>
</div>
</div>