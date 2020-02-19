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
	<button id="order1" class="orderbyNA" onclick="bycompany()"><i class="fa fa-building-o"></i> By Company</button> 
	<button id="order2" class="orderbyAktif" onclick="byperson()"><i class="fa fa-user"></i> By Person</button>
</div>

<div id="orderbyperson">
	<div class="container">
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
	</div>
	<p id="jumData">Total 201 Data</p>
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