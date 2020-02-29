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
	$sql1 = "select count(DISTINCT PERSON_ID) from BOARD_ASSIGNMENT WHERE PERSON_ID<>'' and PERSON_ID<>'NON TELKOM' and year(endda)=9999 and person_id<>'EXTERNAL' and person_id<>'COMPUDYNE' and person_id<>'PELINDO'";
	$numRows=Yii::app()->db->createCommand($sql1)->queryScalar();
	$sql="select * from BOARD_ASSIGNMENT WHERE PERSON_ID<>'' and PERSON_ID<>'NON TELKOM' and year(endda)=9999 and person_id<>'EXTERNAL' and person_id<>'COMPUDYNE' and person_id<>'PELINDO' GROUP BY PERSON_ID ORDER BY PERSON_NAME ASC";
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
	<button id="order1" class="orderbyNA" onclick="location.href = '<?php echo Yii::app()->request->baseUrl?>/?r=site/index'"><i class="fa fa-building-o"></i> By Company</button> 
	<button id="order2" class="orderbyAktif"><i class="fa fa-user"></i> By Person</button>
</div>

<div id="orderbyperson">
	<div class="container" id="page">
		<?php 
			$statusData=1;
			$i = 0;

			foreach($command as $commands){
				if ($statusData==1){
					echo "<div class='row'>";
				}

				echo "
				<form method='post' action='?r=site/detailp'>
					<div class='col-md-6 list-group active' onclick='this.parentNode.submit();'>
						<div class='row' style='cursor:pointer'>
							<div class='col-md-2'>
								<img id='gbr' src='"; echo Yii::app()->request->baseUrl; echo "/images/person.jpg' width='120%'>
								<input id='inputid' name='idperson' value='"; echo $commands['PERSON_ID']; echo"'>
							</div>
							<div class='col-md-10' style='line-height:32px;'>
								<p><b class='namaKaryawan'>"; echo $commands['PERSON_NAME']; echo" / "; echo $commands['PERSON_ID']; echo " </b> <br>";
								$sql3 = "select count(*) from BOARD_ASSIGNMENT where person_id='".$commands['PERSON_ID']."' and year(endda)=9999 and person_id<>'EXTERNAL' and person_id<>'COMPUDYNE' and person_id<>'PELINDO'";
								$jumKerja=Yii::app()->db->createCommand($sql3)->queryScalar();
								// echo $jumKerja;
								$sql4 = "select BOARD_ASSIGNMENT.position_name,BOARD_ASSIGNMENT.company_id,BOARD_COMPANY.company_name_short,BOARD_ASSIGNMENT.band, BOARD_ASSIGNMENT.assignment_id
								from BOARD_ASSIGNMENT INNER JOIN BOARD_COMPANY ON BOARD_COMPANY.company_id=BOARD_ASSIGNMENT.company_id
								where person_id='".$commands['PERSON_ID']."' and year(BOARD_ASSIGNMENT.endda)=9999 and person_id<>'EXTERNAL' and person_id<>'COMPUDYNE' and person_id<>'PELINDO'";
								$rows=Yii::app()->db->createCommand($sql4)->queryAll();
								// if ($jumKerja<=3)
								// {
									// for ($x = 1; $x <= $jumKerja; $x+=1) {
									// 	// echo "The number is: $x <br>";
										
									// }
									echo "<ul class='poin2person'>";
									foreach($rows as $row){

										//echo $row['assignment_id']." ";
										// $sql5="select BOARD_PERIOD.period_start, BOARD_PERIOD.period_end, BOARD_PERIOD.assignment_id from BOARD_PERIOD INNER JOIN BOARD_ASSIGNMENT ON BOARD_ASSIGNMENT.assignment_id=BOARD_PERIOD.assignment_id where BOARD_PERIOD.assignment_id=".$row['assignment_id'];
										// $rows2=Yii::app()->db->createCommand($sql5)->queryAll();
										// // $statt=1;
										// foreach($rows2 as $row2){
										// 	// if($statt=1) {
										// 		$pAwal = $row2['period_start'][0].$row2['period_start'][1].$row2['period_start'][2].$row2['period_start'][3];
										// 		if($row2['period_end'][0]=='R'){
										// 			$pAkhir = $row2['period_end'][strlen($row2['period_end'])-4].$row2['period_end'][strlen($row2['period_end'])-3].$row2['period_end'][strlen($row2['period_end'])-2].$row2['period_end'][strlen($row2['period_end'])-1];
										// 		} else {
										// 			$pAkhir = $row2['period_end'];
										// 		}
										// 		$statt=$statt+1;
										// 	// }
										// }
										// // $pAwal = $row['period_start'][0].$row['period_start'][1].$row['period_start'][2].$row['period_start'][3];
										// // if($row['period_end'][0]=='R'){
										// // 	$pAkhir = $row['period_end'][strlen($row['period_end'])-4].$row['period_end'][strlen($row['period_end'])-3].$row['period_end'][strlen($row['period_end'])-2].$row['period_end'][strlen($row['period_end'])-1];
										// // } else {
										// // 	$pAkhir = $row['period_end'];
										// // }

										$sql5= "select period_start from board_period where assignment_id=".$row['assignment_id'];
										$pStart=Yii::app()->db->createCommand($sql5)->queryScalar();

										if ($pStart!=''){
											$pStart=$pStart[0].$pStart[1].$pStart[2].$pStart[3];
										}

										$sql6= "select period_end from board_period where assignment_id=".$row['assignment_id'];
										$pEnd=Yii::app()->db->createCommand($sql6)->queryScalar();

										if ($pEnd!=''){
											if($pEnd[0]=='R'){
												$pEnd = $pEnd[strlen($pEnd)-4].$pEnd[strlen($pEnd)-3].$pEnd[strlen($pEnd)-2].$pEnd[strlen($pEnd)-1];
											} elseif($pEnd[0]=='2'){
												$pEnd = $pEnd[0].$pEnd[1].$pEnd[2].$pEnd[3];
											}
										}

										$period = $pStart." - ". $pEnd;
										$in = $row['position_name']." PT. ".$row['company_name_short']." (".$row['band']." ".$period.")";
										// $out = strlen($in) > 50 ? substr($in,0,50)."..." : $in;
										// echo $out;
										// echo "<br>";
										echo "<li>".$in."</li>";
									}
									echo "</ul>";
								// } else 
								// {
								// 	$stat=1;
								// 	echo "<ul class='poin2person'>";
								// 	foreach($rows as $row){
								// 		if ($stat<=3){
								// 			$in = $row['position_name']." PT. ".$row['company_name_short']." (".$row['band'].")";
								// 			// $out = strlen($in) > 50 ? substr($in,0,50)."..." : $in;
								// 			// echo $out;
								// 			// echo  "<br>";
								// 			echo "<li>".$in."</li>";
								// 			$stat=$stat+1;
								// 		}
								// 	}
								// 	echo "</ul>";
								// 	//echo "hehehehe";
								// }
								
								// Director of HCM PT Telkomsel (I: 2018-2020) <br>
								// Komisaris Utama PT. Telkom Sigma(I: 2018-2020) <br>
								// Komisaris PT. Metranet (I: 2018-2020) 
						echo "	</p>
							</div>
						</div>
					
					</div>
				</form>
				";
				$i = $i+1;
				$statusData=$statusData+1;

				if($statusData==3 || $i == $numRows){
					echo "</div>";
					// echo "<br> <br>";
					$statusData=1;
				}
				// echo "<br> <br>";
			}
		?>
		</div>
	</div>
	<p id="jumData">Total <?php echo $numRows ?> Data</p>
	<div class="text-center">
	<nav aria-label=...>
      <ul class="pagination pagination-lg">
        <li id="previous-page"><a href="javascript:void(0)" aria-label=Previous><span aria-hidden=true>&laquo;</span></a></li>
      </ul>
    </nav>
	<!-- <nav aria-label="Page navigation example">
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
	</nav> -->
</div>
</div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/paginationscripts2.js"></script>