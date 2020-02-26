<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/detailp.css">
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
<br>
<div class='container'>
    <div class='row'>
        <div class='col-md-6' id='judulPage'>Detail By Person</div>
    </div> <br>
    <div class='row mainPerson'>
        <div class='col-md-2'>
            <div class='text-center'>
                <img id='gbr' src='<?php echo Yii::app()->request->baseUrl;?>/images/person.jpg' width='60%'>
            </div>
        </div>
        <div class='col-md-10'>
            <p>
                <b class="namaKaryawan"><?php echo $model['personname']?> / <?php echo $model['personid']?></b> <br>
                Pekerjaan <br>
                Tanggal Pensiun <br>
                Periode 1  <br>
                Periode 2 <br>
                Rp. 1000000
            </p>
        </div>
    </div>
    <br><br>
    <div class='row rJabatan'>
        <div class='col-md-6 baris2 border-right'>
            <p>
                Rangkap Jabatan 1 <br>
                <img id='gbr' src='<?php echo Yii::app()->request->baseUrl;?>/images/telkomsel.png' width='40%'> <br>
                Komisaris Utama PT Telkomsel
            </p>
        </div>
        <div class='col-md-6'>
            <p>
                Rangkap Jabatan 2 <br>
                <img id='gbr' src='<?php echo Yii::app()->request->baseUrl;?>/images/telkomsel.png' width='40%'> <br>
                Komisaris Utama PT Telkom Sigma
            </p>
        </div>
    </div>
    <br> <br>
    <div class='col-md-12 border-top'>
        <br>
        <p>
            Riwayat Jabatan<br>
            <ol>   
                <li>Director of Human Capital PT. Telkomsel <nobr class='periode'>12 Januari 2019 s.d 12 Januari 2021</nobr> </li>
                <li>Director of Human Capital PT. Telkomsel <nobr class='periode'>12 Januari 2019 s.d 12 Januari 2021</nobr></li>
                <li>Director of Human Capital PT. Telkomsel <nobr class='periode'>12 Januari 2019 s.d 12 Januari 2021</nobr></li>
            </ol>

        </p>

    </div>
</div>