<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/detailc.css">
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
        <p id='judulPage'>Detail By Company</p>
    </div>
    <div class='row headInfo'>
        <div class='col-md-4 border-right'>
            <div class='text-center'>
                <img id='gbr' src='<?php echo Yii::app()->request->baseUrl;?>/images/telkomsel.png' width='70%'>
            </div>
        </div>
        <?php 
            $sql1= "select * from BOARD_COMPANY where company_id=".$model['companyid'];
            $command=Yii::app()->db->createCommand($sql1)->queryAll();
        ?>
        <div class='col-md-8'>
            <?php 
                $stat=0;
                foreach($command as $commands){
                    if($stat==0){
                        
                
            ?>
            <div class='tierCompany'>
                <img src='<?php echo Yii::app()->request->baseUrl;?>/images/tier.png' width=100%>
                <div class="tierNote">Tier<?php echo $commands['TIER'] ?></div>
            </div>
            <p>
                <nobr class='namaCompany'>PT. <?php echo $commands['COMPANY_NAME_SHORT'] ?></nobr><br>
                <?php $cName = $commands['COMPANY_NAME_SHORT']; ?>
                <div class='infoCompany'>- Kepemilikan Saham : <?php echo $commands['KEPEMILIKAN_SAHAM'] ?><br>
                - Bidang Usaha      : <?php echo $commands['BIDANG_USAHA'] ?><br>
                - CFU / FU          : <?php echo $commands['CFU_FU'] ?><br>
                - Jumlah Pengurus   : <br> </div>
            </p>
            <?php 
                    $stat=$stat+1;
                    }
                }
            ?>
        </div>
    </div>
    <br> <br>
    <div>
        <?php 
            $sql2= "select * from BOARD_ASSIGNMENT where company_id=".$model['companyid']." and year(endda)=9999";
            $row = Yii::app()->db->createCommand($sql2)->queryAll();

            $sql3 = "select count(*) from BOARD_ASSIGNMENT where company_id=".$model['companyid']." and year(endda)=9999 and assignment_type_id=1";
            $jumAs1 = Yii::app()->db->createCommand($sql3)->queryScalar();

            $sql4 = "select count(*) from BOARD_ASSIGNMENT where company_id=".$model['companyid']." and year(endda)=9999 and assignment_type_id<>1";
            $jumAs2 = Yii::app()->db->createCommand($sql4)->queryScalar();
            
            $i=0;
            $j=0;
            if ($jumAs1 != 0 and $jumAs2 != 0) {
                foreach($row as $rows){
                    if($rows['ASSIGNMENT_TYPE_ID']==1){
                        $data1['nama'][$i] = $rows['PERSON_NAME'];
                        $data1['id'][$i] = $rows['PERSON_ID'];
                        $data1['position_id'][$i] = $rows['POSITION_ID'];
                        $data1['posisi'][$i] = $rows['POSITION_NAME'];
                        $data1['ass_id'][$i] = $rows['ASSIGNMENT_ID'];
                        $i=$i+1;
                    } else {
                        $data2['nama'][$j] = $rows['PERSON_NAME'];
                        $data2['id'][$j] = $rows['PERSON_ID'];
                        $data2['position_id'][$j] = $rows['POSITION_ID'];
                        $data2['posisi'][$j] = $rows['POSITION_NAME'];
                        $data2['ass_id'][$j] = $rows['ASSIGNMENT_ID'];
                        $j=$j+1;
                    }
                }

                if ($data2['posisi'][0]!= 'KOMISARIS UTAMA'){
                    for ($x = 0; $x < count($data2['position_id']); $x++) {
                        if ($data2['posisi'][$x]=='KOMISARIS UTAMA'){
                            $temp1 = $data2['nama'][0];
                            $temp2 = $data2['id'][0];
                            $temp3 = $data2['position_id'][0];
                            $temp4 = $data2['posisi'][0];
                            $temp5 = $data2['ass_id'][0];

                            $data2['nama'][0] = $data2['nama'][$x];
                            $data2['id'][0] = $data2['id'][$x];
                            $data2['position_id'][0] = $data2['position_id'][$x];
                            $data2['posisi'][0] = $data2['posisi'][$x];
                            $data2['ass_id'][0] = $data2['ass_id'][$x];

                            $data2['nama'][$x] = $temp1;
                            $data2['id'][$x] = $temp2;
                            $data2['position_id'][$x] = $temp3;
                            $data2['posisi'][$x] = $temp4;
                            $data2['ass_id'][$x] = $temp5;
                            break;
                        }
                    }
                }
                
                $statusPosisi=0;
                
                $i = 0;
                $j = 0;

                while ($i < count($data1['nama']) and $statusPosisi ==0 ){
                    $sql6= "select period_start from board_period where assignment_id=".$data1['ass_id'][$i];
                    $pStart=Yii::app()->db->createCommand($sql6)->queryScalar();

                    $sql7= "select period_end from board_period where assignment_id=".$data1['ass_id'][$i];
                    $pEnd=Yii::app()->db->createCommand($sql7)->queryScalar();

                    $period = $pStart." - ". $pEnd;
                    echo "
                    <div class='col-md-6'>
                        <div class='row'>
                            <div class='col-md-2'>
                                <img id='gbr' src='"; echo Yii::app()->request->baseUrl;  echo "/images/person.png' width='120%'>
                            </div>
                            <div class='col-md-10' style='line-height:33px;'>
                                <p>
                                    <b>".$data1['posisi'][$i]."</b> <br>
                                    ".$data1['nama'][$i]." / ".$data1['id'][$i]." <br>
                                    ".$data1['posisi'][$i]." PT. ".$cName."<br>
                                    Periode : ".$period."<br>
                                </p>
                            </div>
                        </div>
                    </div>
                    ";

                    $i = $i + 1;
                    if ($j!= count($data2['nama'])) {
                        $statusPosisi = 1;
                    } else if ($j == count($data2['nama'])) {
                        echo "
                        <div class='col-md-6' id='kosong'>
                            <div class='row'>
                                <div class='col-md-2'></div>
                                <div class='col-md-10'></div>
                            </div>
                        </div>
                        ";
                    }

                    while ($j < count($data2['nama']) and $statusPosisi ==1) {
                        if ($data2['posisi'][$j]=='KOMISARIS UTAMA' or $data2['posisi'][$j]=='Komisaris Utama' or $data2['posisi'][$j]=='komisaris utama' or $data2['posisi'][$j]=='Komisaris utama') {
                            $idFu = 'komUtama';
                        } else {
                            $sql5 = "select CFU_FU from BOARD_POSITION where POSITION_ID=".$data2['position_id'][$j];
                            $cfu = Yii::app()->db->createCommand($sql5)->queryScalar();
                            $idFu = $cfu;
                        }
                        if ($j!=count($data2['nama'])) {
                            $sql6= "select period_start from board_period where assignment_id=".$data2['ass_id'][$j];
                            $pStart=Yii::app()->db->createCommand($sql6)->queryScalar();

                            $sql7= "select period_end from board_period where assignment_id=".$data2['ass_id'][$j];
                            $pEnd=Yii::app()->db->createCommand($sql7)->queryScalar();

                            $period = $pStart." - ". $pEnd;
                            echo "
                            <div class='col-md-6'>
                                <div class='row' id=fu".$idFu.">
                                    <div class='col-md-2'>
                                        <img id='gbr' src='"; echo Yii::app()->request->baseUrl;  echo "/images/person.png' width='120%'>
                                    </div>
                                    <div class='col-md-10' style='line-height:33px;'>
                                        <p>
                                            <b>".$data2['posisi'][$j]."</b> <br>
                                            ".$data2['nama'][$j]." / ".$data2['id'][$j]." <br>
                                            ".$data2['posisi'][$j]." PT. ".$cName."<br>
                                            Periode : ".$period."<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            ";
                        } 

                        $j = $j + 1;
                        if ($i!= count($data1['nama'])) {
                            $statusPosisi = 0;
                        } else if ($i == count($data1['nama']) and $j!= count($data2['nama'])) {
                            echo "
                            <div class='col-md-6' id='kosong'>
                                <div class='row'>
                                    <div class='col-md-2'> hahaha</div>
                                    <div class='col-md-10'></div>
                                </div>
                            </div>
                            ";
                        }
                    }
                }
            }
        ?>

        <div class='col-md-12'>
            <p>Legend CFU / FU</p>
            <div class='col-md-4'>
                <div class='kotak' id='fukomUtama'></div> CEO / OFFICE
            </div>
            <div class='col-md-4'>
                <div class='kotak' id='fuDIGITAL'></div> FU Digital
            </div>
            <div class='col-md-4'>
                <div class='kotak' id='fuENTERPRISE'></div> FU Enterprise
            </div>
            <div class='col-md-4' id='newRow'>
                <div class='kotak' id='fuHCM'></div> FU HCM
            </div>
            <div class='col-md-4' id='newRow'>
                <div class='kotak' id='fuMOBILE'></div> FU Mobile
            </div>
            <div class='col-md-4' id='newRow'>
                <div class='kotak' id='fuWIB'></div> FU WIB
            </div>
        </div>    
    </div>
</div>