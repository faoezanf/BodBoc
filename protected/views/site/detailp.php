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
            <?php 
                $sql1= "select YEAR(ENDDA) as endda, YEAR(BEGDA) as begda, position_name, company_id from BOARD_ASSIGNMENT WHERE person_id=".$model['personid'];
                $command=Yii::app()->db->createCommand($sql1)->queryAll();
                $i = 0;

                foreach($command as $commands){
                    if($i==0){
                        $begda = $commands['begda'];
                        $enda = $commands['endda'];
                        // $periode = str($begda).str($endda);
                        $position = $commands['position_name'];
                        $idcom = $commands['company_id'];
                        $i = $i+1;
                    }
                    else {
                        if($commands['begda']<$commands['endda']){
                            $begda = $commands['begda'];
                            $enda = $commands['endda'];
                            // $periode = str($begda).str($endda);
                            $position = $commands['position_name'];
                            $idcom = $commands['company_id'];
                        }
                        $i = $i+1;
                    }
                }
                $sql2 = "select company_name_short from BOARD_COMPANY where company_id=".$idcom;
                $company =Yii::app()->db->createCommand($sql2)->queryScalar();
            ?>
            <p>
                <b class="namaKaryawan"><?php echo $model['personname']?> / <?php echo $model['personid']?></b> <br>
                <?php echo $position." PT. ".$company?><br>
                Tanggal Pensiun : <?php echo $model['retireddates']?> <br>
                Periode : <br>
                Rp. xxxxx
            </p>
        </div>
    </div>
    <br><br>
    <!-- <div class='row rJabatan'>
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
    </div> -->

    <div id="DemoCarousel" class="carousel slide" data-interval="2000" data-ride="carousel">

            <ol class="carousel-indicators">
                <li data-target="#DemoCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#DemoCarousel" data-slide-to="1"></li>
                <li data-target="#DemoCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <h2>Slide 1</h2>
                    <div class="carousel-caption">
                        <h3>This is the First Label</h3>
                        <p>The Content of the First Slide goes in here</p>
                    </div>
                </div>
                <div class="item">
                    <h2>Slide 2</h2>
                    <div class="carousel-caption">
                        <h3>This is the Second Label</h3>
                        <p>The Content of the second Slide goes in here</p>
                    </div>
                </div>
                <div class="item">
                    <h2>Slide 3</h2>
                    <div class="carousel-caption">
                        <h3>This is the Third Label</h3>
                        <p>The Content of the Third Slide goes in here</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control left" href="#DemoCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="carousel-control right" href="#DemoCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>



    <br> <br>
    <div class='col-md-12 border-top'>
        <br>
        <?php 
            $sql3 = "select * from BOARD_ASSIGNMENT where year(endda)<year(begda) and person_id=".$model['personid'];
            $row=Yii::app()->db->createCommand($sql3)->queryAll();

            $sql4 = "select count(*) from BOARD_ASSIGNMENT where year(endda)<year(begda) and person_id=".$model['personid'];
            $jumRiwayat=Yii::app()->db->createCommand($sql4)->queryScalar();

            $stat=1;
            foreach($row as $rows){
                if($stat==1){
                    echo "<p> Riwayat Jabatan <br>";
                    echo "<ol id='riwJab'>";
                }
                $sql5= "select company_name_short from board_company where company_id=".$rows['COMPANY_ID'];
                $cName=Yii::app()->db->createCommand($sql5)->queryScalar();

                $sql6= "select period_start from board_period where assignment_id=".$rows['ASSIGNMENT_ID'];
                $pStart=Yii::app()->db->createCommand($sql6)->queryScalar();

                $sql7= "select period_end from board_period where assignment_id=".$rows['ASSIGNMENT_ID'];
                $pEnd=Yii::app()->db->createCommand($sql7)->queryScalar();

                $period = $pStart." - ". $pEnd;

                echo "<li>".$rows['POSITION_NAME']." PT. ".$cName."<nobr class='periode'> ".$period."</nobr></li>";
                $stat=$stat+1;
                if ($stat==$jumRiwayat+1){
                    echo "</ol> </p>";
                } elseif ($jumRiwayat==1){
                    echo "</ol> </p>";
                }
            }
        ?>
        <!-- <p>
            Riwayat Jabatan<br>
            <ol id="riwJab">   
                <li>Director of Human Capital PT. Telkomsel <nobr class='periode'>12 Januari 2019 s.d 12 Januari 2021</nobr> </li>
                <li>Director of Human Capital PT. Telkomsel <nobr class='periode'>12 Januari 2019 s.d 12 Januari 2021</nobr></li>
                <li>Director of Human Capital PT. Telkomsel <nobr class='periode'>12 Januari 2019 s.d 12 Januari 2021</nobr></li>
            </ol>

        </p> -->

    </div>
</div>