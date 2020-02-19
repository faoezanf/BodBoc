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
	$sql="select * from BOARD_COMPANY";
	$command=Yii::app()->db->createCommand($sql)->queryAll();
	$numRows = 0;
    foreach($command as $commands){
		$numRows = $numRows+1;
	}
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
	<button id="order1" class="orderbyAktif" onclick="bycompany()"><i class="fa fa-building-o"></i> By Company</button> 
	<button type="submit" id="order2" class="orderbyNA" onclick="byperson()"><i class="fa fa-user"></i> By Person</button>
</div>

<div id="orderbycompany">
	<div class="container">
		<?php 
			$statusData=1;
			$i = 0;
			foreach($command as $commands){
				if ($statusData==1){
					echo "<div class='row'>";
				}
				echo "
				<div class='col-md-4'> 
					<div class='isiKonten' id='kol2'>
						<div class='text-center'>
							<img id='logo' class='text-center' src='";echo $commands['LOGO']; echo"' width='70%'>
						</div>
						<p id='cName' > <b>"; echo $commands['COMPANY_NAME_SHORT']; echo "</b></p>
						<ul id='cDetail'>
							<li>Tier "; echo $commands['TIER']; echo "</li>
							<li>CFU "; echo $commands['CFU_FU']; echo "</li>
							<li>Saham "; echo $commands['KEPEMILIKAN_SAHAM']; echo "</li>
							<li>Tipe "; echo $commands['BIDANG_USAHA']; echo "</li>
						</ul>
					</div>
			
				</div>
				";
				// echo $commands['COMPANY_NAME_SHORT']; 
				$i = $i+1;
				$statusData=$statusData+1;
				if($statusData==4 || $i == $numRows){
					echo "</div>";
					$statusData=1;
				}
			}
		?>

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

<!-- <script>
	function bycompany() {
		document.getElementById("order2").className = "orderbyNA";
		document.getElementById("order1").className = "orderbyAktif";
		document.getElementById("orderbycompany").style.display = "block";
		document.getElementById("orderbyperson").style.display = "none";
	}

	function byperson() {
		document.getElementById("order1").className = "orderbyNA";
		document.getElementById("order2").className = "orderbyAktif";
		document.getElementById("orderbycompany").style.display = "none";
		document.getElementById("orderbyperson").style.display = "block";
	}
</script> -->


<!--<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="itemKonten">

			
			<div> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/telkomsel.png" width="75%"></div>
			<p> <b>PT Telkomsel</b></p>
			<ul>
				<li>Tier 1</li>
				<li>CFU Mobile</li>
				<li>Tipe AP</li>
				<li>Wewenang Dwiwarna</li>
				<li>Saham 51% TLKM 49%</li>
				<li>Singtel</li>
			</ul>
			</div>
    </div>
    <div class="col-md-4">
	<div class="itemKonten">

			
<div class=""> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/telkomsel.png" width="75%"></div>
<p> <b>PT Telkomsel</b></p>
<ul>
	<li>Tier 1</li>
	<li>CFU Mobile</li>
	<li>Tipe AP</li>
	<li>Wewenang Dwiwarna</li>
	<li>Saham 51% TLKM 49%</li>
	<li>Singtel</li>
</ul>
</div>
    </div>
    <div class="col-md-4">
	<div class="itemKonten">

			
<div class="text-center"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/telkomsel.png" width="75%"></div>
<p> <b>PT Telkomsel</b></p>
<ul>
	<li>Tier 1</li>
	<li>CFU Mobile</li>
	<li>Tipe AP</li>
	<li>Wewenang Dwiwarna</li>
	<li>Saham 51% TLKM 49%</li>
	<li>Singtel</li>
</ul>
</div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
	<div class="itemKonten">

			
<div class="text-center"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/telkomsel.png" width="75%"></div>
<p> <b>PT Telkomsel</b></p>
<ul>
	<li>Tier 1</li>
	<li>CFU Mobile</li>
	<li>Tipe AP</li>
	<li>Wewenang Dwiwarna</li>
	<li>Saham 51% TLKM 49%</li>
	<li>Singtel</li>
</ul>
</div>
    </div>
    <div class="col-md-4">
	<div class="itemKonten">

			
<div class="text-center"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/telkomsel.png" width="75%"></div>
<p> <b>PT Telkomsel</b></p>
<ul>
	<li>Tier 1</li>
	<li>CFU Mobile</li>
	<li>Tipe AP</li>
	<li>Wewenang Dwiwarna</li>
	<li>Saham 51% TLKM 49%</li>
	<li>Singtel</li>
</ul>
</div>
    </div>
    <div class="col-md-4">
	<div class="itemKonten">

			
<div class="text-center"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/telkomsel.png" width="75%"></div>
<p> <b>PT Telkomsel</b></p>
<ul>
	<li>Tier 1</li>
	<li>CFU Mobile</li>
	<li>Tipe AP</li>
	<li>Wewenang Dwiwarna</li>
	<li>Saham 51% TLKM 49%</li>
	<li>Singtel</li>
</ul>
</div>
    </div>
  </div>
</div>

	<!-- <div class="hasilKonten"> 
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/telkomsel.png" width="15%">
	</div?> -->