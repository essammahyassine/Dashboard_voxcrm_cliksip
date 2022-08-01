
<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KGLNIK - Dashboard</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


    
   
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <style type="text/css">
        .chartjs-wrapper canvas {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
    
    </style>
</head>
<body style="zoom:80%">
<?php

    $server = 'localhost';
    $utilisateur ='cliksip';
    $password = 'cliksip2018';
    $database = 'voxcrm';

    $cnx = mysqli_connect($server,$utilisateur,$password,$database);
   

        
    $idcamp = $_GET['id'];

    if (isset($_GET['dt'])) {

        $dt = date("d/m/y", strtotime($_GET['dt']));
    }
    else
    {
        $dt = date('d/m/y');
    }

    
        $totalnp = '2111KG';
        $QueryAgent = "SELECT distinct u.name as Agent,u.id as ID FROM 
                    outgoing_calls o join users u on u.id=o.agent_id 
                    where DATE_FORMAT(o.agent_start , '%d/%m/%y')='".$dt."' and o.cid='".$idcamp."'";



        $QueryAgentREC = "SELECT distinct u.name as Agent,u.id as ID FROM 
                    outgoing_calls o join users u on u.id=o.agent_id 
                    where DATE_FORMAT(o.agent_start , '%d/%m/%y')='".$dt."' and o.cid='".$idcamp."' and o.note='RECEPTION'";

  
        require_once('bdd.php');


            $TTD = $bdd->query('SELECT count(*) as Appel
            FROM outgoing_calls 
            WHERE DATE_FORMAT( agent_start, "%d/%m/%y" )="'.$dt.'" and status!="73" and cid="'.$idcamp.'"')->fetchColumn();
  


       
      
        $totalFC='SELECT count(*) as nb
        FROM outgoing_calls WHERE cid="'.$idcamp.'" AND DATE_FORMAT( agent_start, "%d/%m/%y" )="'.$dt.'"';
        $TTFC = $cnx->query($totalFC);
        $rowTTFC = $TTFC->fetch_assoc();



        $campname='SELECT name from campaigns_2 
        where id="'.$idcamp.'"';
        $CMP = $cnx->query($campname);
        $rowCMP = $CMP->fetch_assoc();
        

        $totalrepondeur='SELECT count(*) as nb
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.text in ("Répondeur","Repondeur") and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"';
        $rept = $cnx->query($totalrepondeur);
        $rowreptotal = $rept->fetch_assoc();

        $totalrepondeurgsm ='SELECT count(*) as nb
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.text in ("Répondeur","Repondeur") and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'" and (o.caller_id like "00337%" or o.caller_id like "00336%")';
        $reptgsm = $cnx->query($totalrepondeurgsm);
        $rowrepgsm = $reptgsm->fetch_assoc();

        $totalrap = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.text in ("A rappeler","Rappel personnel") and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'" and c.RecordFileName=""')->fetchColumn(); 

    
        $totalreste = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.positive="1" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'" and c.RecordFileName=""')->fetchColumn(); 


        $totalC = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.positive="1" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

        $totalCiiib = $bdd->query('SELECT c.COUVERTURE_1,count(*) as nb
                        FROM outgoing_calls o
                        LEFT JOIN users u ON o.agent_id = u.id
                        LEFT JOIN contacts c ON o.contact_id = c.id
                        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
                        LEFT JOIN campaigns_status s ON o.status = s.num
                        WHERE s.text IS NOT NULL 
                        AND camp.id = s.campaign_id and s.positive="1" and camp.id="'.$idcamp.'"  AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'" Group by c.COUVERTURE_1')->fetchAll();;
        $totalCiiibo="<ul style='margin-left : 40px'>";
        foreach($totalCiiib as $row) {
            $cibo = $row['COUVERTURE_1'];
            $aac = $row['nb'];
            $totalCiiibo = $totalCiiibo . '<li>cible '.$cibo.' : '.$aac."</li>";    
        }
        $totalCiiibo .="</ul>";


        $totalCiiibAD = $bdd->query('SELECT c.DATE_SOUSCRIPTION,count(*) as nb
                        FROM outgoing_calls o
                        LEFT JOIN users u ON o.agent_id = u.id
                        LEFT JOIN contacts c ON o.contact_id = c.id
                        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
                        LEFT JOIN campaigns_status s ON o.status = s.num
                        WHERE s.text IS NOT NULL 
                        AND camp.id = s.campaign_id and s.positive="1" and camp.id="'.$idcamp.'"  AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'" Group by c.DATE_SOUSCRIPTION')->fetchAll();;
        $totalCiiiboAD="<ul style='margin-left : 40px'>";
        foreach($totalCiiibAD as $rowAD) {
            $ciboAD = $rowAD['DATE_SOUSCRIPTION'];
            $aacAD = $rowAD['nb'];
            $totalCiiiboAD = $totalCiiiboAD . '<li>cible '.$ciboAD.' : '.$aacAD."</li>";    
        }
        $totalDUOPREV .="</ul>";

           $totalDUO = $bdd->query('SELECT count(*) as nb
                        FROM outgoing_calls o
                        LEFT JOIN users u ON o.agent_id = u.id
                        LEFT JOIN contacts c ON o.contact_id = c.id
                        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
                        LEFT JOIN campaigns_status s ON o.status = s.num
                        WHERE s.text IS NOT NULL 
                        AND camp.id = s.campaign_id and s.positive="1" and c.FormuleADP = "D" and c.NUM_PLAN="'.$totalnp.'" and camp.id="'.$idcamp.'"  AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )!="02/10/16"')->fetchAll();;
        $totalDUOPREV="<ul style='margin-left : 40px'>";
        foreach($totalDUO as $rowDUO) {
            $aacDUO = $rowDUO['nb'];
            $totalDUOPREV = $totalDUOPREV . '<li>Total DUO : '.$aacDUO."</li>";    
        }
        $totalDUOPREV .="</ul>";

        $totalCA = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.argued="1" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();


        $tthcal = 0;


        $resultrec = $cnx->query($QueryAgent);
                    while($rowRec = $resultrec->fetch_assoc())
                    {
            
            $hourcalc = "SELECT c.REFPROSPECT,u.name as HOTESSE, DATE_FORMAT( o.agent_start, '%d/%m/%y' )  as Dateappel,
                                        DATE_FORMAT( o.agent_start, '%T' )  as HeureAppel,o.call_duration as Duree,c.COUVERTURE_1,c.COUVERTURE_5,c.refappel,s.REFQUALIF,c.RecordFileName,s.text as Description,s.MOTIFREFUS,s.Lib_EI,c.phone_1 as Telephone,s.argued
                                        FROM  `outgoing_calls` o
                                        LEFT JOIN  `users` u ON o.agent_id = u.id
                                        LEFT JOIN  `contacts` c ON o.contact_id = c.id
                                        LEFT JOIN  `campaigns_2` camp ON camp.id = c.cid
                                        LEFT JOIN  `campaigns_status` s ON o.status = s.num
                                        WHERE s.text is not null AND camp.id=s.campaign_id  
                                        AND camp.id='".$idcamp."' and u.id='".$rowRec['ID']."' AND DATE_FORMAT( o.agent_start, '%d/%m/%y' )='".$dt."' order by DATE_FORMAT( o.agent_start, '%T' )";

                                     
            
                                        $reso = $cnx->query($hourcalc); 

                                        $last = 0;
                                        $elev = 0;
                                        $calc = 0;

                                        $rows = array();

                                        while($rowt = $reso->fetch_assoc()) 
                                             {
                                                     $rows[]=$rowt;
                                                     $last ++;
                                             }

                                        $calc = strtotime($rows[$last - 1]['HeureAppel']) - strtotime($rows[0]['HeureAppel']);
                                        $h = floor($calc / 3600);
                                        $m = floor($calc / 60 % 60);
                                        $s = floor($calc % 60);
                                        $calcf = sprintf('%02d:%02d:%02d', $h, $m, $s);

                                        for ($i=0; $i < $last; $i++) { 

                                             $difelev = strtotime($rows[$i + 1]['HeureAppel']) - strtotime($rows[$i]['HeureAppel']);

                                             if ($difelev >= 1200) {

                                                      $elev = $elev + $difelev;
                                                    }
                                        }

                                        $hourselev = floor($elev / 3600);
                                        $minselev = floor($elev / 60 % 60);
                                        $secselev = floor($elev % 60);
                                        $timeFormatelev = sprintf('%02d:%02d:%02d', $hourselev, $minselev, $secselev);



                                        $difact = $calc - $elev;
                                        $hoursfact = floor($difact / 3600);
                                        $minsfact = floor($difact / 60 % 60);
                                        $secsfact = floor($difact % 60);
                                        $timeFormatfact = sprintf('%02d:%02d:%02d', $hoursfact, $minsfact, $secsfact);

                                        $tthcal = $tthcal + sprintf ("%.2f", $difact/60/60);

        }


?>


        <!-- Left Panel -->

    <?php
       require_once('menu.php');
    ?><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?=$rowCMP['name']?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Stats</li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>

        <div class="content mt-3">
            <div class="col-sm-12" style="padding: 20px">
                <div class="" style="padding-bottom: 20px">
                    <div class="page-title">

                    <form method="get">
                    <h5>Date : </h5></br>
                    <div class="col-md-4">
                        <input type="date" class="form-control" name="dt">
                        <input type="hidden" name="id" value="<?=$idcamp?>" >
                    </div>  
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success">OK</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>


            <div class="col-sm-12">
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <h2 class=""><?=$totalC.' C+'?></h2>
                        détail : </br>
                            <span class=""><?=$totalCiiibo?></span>
                        détail ADE : </br>
                            <span class=""><?=$totalCiiiboAD?></span>
                        détail DUO : </br>
                        	<span class=""><?=$totalDUOPREV?></span>
                        </h4>
                        <p class="text-light"></p>
                    </div>

                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class=""><?=$totalCA?></span>
                        </h4>
                        <p class="text-light">CA</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class=""><?=number_format(($totalC / $totalCA)*100, 2, '.', '') ?> %</span>
                        </h4>
                        <p class="text-light">Ratio</p>

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class=""><?=number_format($totalCA / $tthcal, 2, '.', '') .' ( '.$tthcal. ' H)'?></span>
                        </h4>
                        <p class="text-light">CA / H</p>
                    </div>
                </div>
            </div>


            <div class="col-xl-12">
                <div class="col-sm-4">
                   <div class="card" >
                        <div class="card">
                            <div class="card-header">

 
                                <strong class="card-title">Flux d'appels <b style="color: red">(Taux décroché : <?=$TTD.' / '.$rowTTFC['nb'].' = '.round(($TTD/$rowTTFC['nb']) * 100)?> %)</b></strong>
                            </div>
                            <div id="chart-container">
                                <canvas id="mycanvastt"></canvas>
                            </div> <!-- .content -->
                    </div>
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="card" >
                                       <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Graphe des C+ ( <?=$dt?> )</strong>
                                    </div>
                    <div id="chart-container">
                        <canvas id="mycanvas"></canvas>

                    </div> <!-- .content -->
                    </div>
                    </div>
                </div>
                <div class="col-sm-4">
                   <div class="card" >
                                       <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Graphe des CA ( <?=$dt?> )</strong>
                                    </div>
                    <div id="chart-container">
                        <canvas id="mycanvasarg"></canvas>
                    </div> <!-- .content -->
                    </div>
                    </div>
                </div>


            </div>


            <div class="col-xl-7" style="min-height: 600px;">
                <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Statistiques Outbound ( <?=$dt?> )</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="HO">
                              <thead>
                                <tr>
                                  <th scope="col">ID Agent</th>
                                  <th scope="col">Agent</th>
                                  <th scope="col">Reçu</th>
                                  <th scope="col">Rappel</th>
                                  <th scope="col">C+</th>
                                  <th scope="col">C-</th>
                                  <?php if($idcamp=='3'){?>
                                  <th scope="col">RR</th>
                                  <?php } ?>
                                  <th scope="col">CA</th>
                                  <th scope="col">H</th>
                                  <th scope="col">CA / H</th>
                                  <?php if($idcamp=='3'){?>
                                  <th scope="col">RR / H</th>
                                  <?php } ?>
                                  <th scope="col">Ratio</th>
                                  <th scope="col">Historique Appels</th>
                                  <th scope="col">Scan CA</th>
                                  <th scope="col">Détail</th>
                                </tr>
                              </thead>
                              <tbody>
                <?php
                                            
                    $resultrec = $cnx->query($QueryAgent);
                    while($rowRec = $resultrec->fetch_assoc()) 
                            {    
                                        $totalCAG = $bdd->query('SELECT count(*)
                                        FROM outgoing_calls o
                                        LEFT JOIN users u ON o.agent_id = u.id
                                        LEFT JOIN contacts c ON o.contact_id = c.id
                                        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
                                        LEFT JOIN campaigns_status s ON o.status = s.num
                                        WHERE s.text IS NOT NULL 
                                        AND camp.id = s.campaign_id and s.positive="1" and camp.id="'.$idcamp.'" and u.id="'.$rowRec['ID'].'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

                                        $totalCAGNEG = $bdd->query('SELECT count(*)
                                        FROM outgoing_calls o
                                        LEFT JOIN users u ON o.agent_id = u.id
                                        LEFT JOIN contacts c ON o.contact_id = c.id
                                        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
                                        LEFT JOIN campaigns_status s ON o.status = s.num
                                        WHERE s.text IS NOT NULL 
                                        AND camp.id = s.campaign_id and s.positive="-1" and camp.id="'.$idcamp.'" and u.id="'.$rowRec['ID'].'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();
                                        
                                        $totalRR= $bdd->query('SELECT count(*)
                                        FROM outgoing_calls o
                                        LEFT JOIN users u ON o.agent_id = u.id
                                        LEFT JOIN contacts c ON o.contact_id = c.id
                                        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
                                        LEFT JOIN campaigns_status s ON o.status = s.num
                                        WHERE s.text IS NOT NULL 
                                        AND camp.id = s.campaign_id and s.text="Refus de répondre" and camp.id="'.$idcamp.'" and u.id="'.$rowRec['ID'].'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();
 
                                        $totalRCU = $bdd->query('SELECT count(*)
                                        FROM outgoing_calls o
                                        LEFT JOIN users u ON o.agent_id = u.id
                                        WHERE o.status!="73" and o.cid="'.$idcamp.'" and u.id="'.$rowRec['ID'].'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn(); 

                                        $totalrapu = $bdd->query('SELECT count(*)
	        FROM outgoing_calls o
	        LEFT JOIN users u ON o.agent_id = u.id
	        LEFT JOIN contacts c ON o.contact_id = c.id
	        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
	        LEFT JOIN campaigns_status s ON o.status = s.num
	        WHERE s.text IS NOT NULL 
	        AND camp.id = s.campaign_id and s.text in ("A rappeler","Rappel personnel") and camp.id="'.$idcamp.'" and u.id="'.$rowRec['ID'].'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'" and c.RecordFileName=""')->fetchColumn(); 
                                         


                                        $totalCAAG = $bdd->query('SELECT count(*)
                                        FROM outgoing_calls o
                                        LEFT JOIN users u ON o.agent_id = u.id
                                        LEFT JOIN contacts c ON o.contact_id = c.id
                                        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
                                        LEFT JOIN campaigns_status s ON o.status = s.num
                                        WHERE s.text IS NOT NULL 
                                        AND camp.id = s.campaign_id and s.argued="1" and camp.id="'.$idcamp.'" and u.id="'.$rowRec['ID'].'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

                                        $hourcalc = "SELECT c.REFPROSPECT,u.name as HOTESSE, DATE_FORMAT( o.agent_start, '%d/%m/%y' )  as Dateappel,
                                        DATE_FORMAT( o.agent_start, '%T' )  as HeureAppel,o.call_duration as Duree,c.COUVERTURE_1,c.COUVERTURE_5,c.refappel,s.REFQUALIF,c.RecordFileName,s.text as Description,s.MOTIFREFUS,s.Lib_EI,c.phone_1 as Telephone,s.argued
                                        FROM  `outgoing_calls` o
                                        LEFT JOIN  `users` u ON o.agent_id = u.id
                                        LEFT JOIN  `contacts` c ON o.contact_id = c.id
                                        LEFT JOIN  `campaigns_2` camp ON camp.id = c.cid
                                        LEFT JOIN  `campaigns_status` s ON o.status = s.num
                                        WHERE s.text is not null AND camp.id=s.campaign_id  
                                        AND camp.id='".$idcamp."' and u.id='".$rowRec['ID']."' AND DATE_FORMAT( o.agent_start, '%d/%m/%y' )='".$dt."' order by DATE_FORMAT( o.agent_start, '%T' )";

                                     
            
                                        $reso = $cnx->query($hourcalc); 

                                        $last = 0;
                                        $elev = 0;
                                        $calc = 0;

                                        $rows = array();

                                        while($rowt = $reso->fetch_assoc()) 
                                             {
                                                     $rows[]=$rowt;
                                                     $last ++;
                                             }

                                        $calc = strtotime($rows[$last - 1]['HeureAppel']) - strtotime($rows[0]['HeureAppel']);
                                        $h = floor($calc / 3600);
                                        $m = floor($calc / 60 % 60);
                                        $s = floor($calc % 60);
                                        $calcf = sprintf('%02d:%02d:%02d', $h, $m, $s);

                                        for ($i=0; $i < $last; $i++) { 

                                             $difelev = strtotime($rows[$i + 1]['HeureAppel']) - strtotime($rows[$i]['HeureAppel']);

                                             if ($difelev >= 1200) {

                                                      $elev = $elev + $difelev;
                                                    }
                                        }

                                        $hourselev = floor($elev / 3600);
                                        $minselev = floor($elev / 60 % 60);
                                        $secselev = floor($elev % 60);
                                        $timeFormatelev = sprintf('%02d:%02d:%02d', $hourselev, $minselev, $secselev);



                                        $difact = $calc - $elev;
                                        $hoursfact = floor($difact / 3600);
                                        $minsfact = floor($difact / 60 % 60);
                                        $secsfact = floor($difact % 60);
                                        $timeFormatfact = sprintf('%02d:%02d:%02d', $hoursfact, $minsfact, $secsfact);

                                    ?>
                                    <tr>
                                      <td><?=$rowRec['ID']?></td>
                                      <td><?=$rowRec['Agent']?></td>
                                      <td><?=$totalRCU?></td>
                                      <td><?=$totalrapu?></td>
                                      <td><?=$totalCAG?></td>
                                      <td><?=$totalCAGNEG?></td>
                                      <?php if($idcamp=='3'){?>
                                      <td><?=$totalRR?></td>
                                      <?php } ?>
                                      <td><?=$totalCAAG?></td>
                                      <td><b style="color:blue"><?=sprintf ("%.2f", $difact/60/60)?></b></td>
                                      <td><?php
                                        if ( number_format($totalCAAG / sprintf ("%.2f", $difact/60/60), 2, '.', '') < 5) {
                                            
                                            echo '<b style="color:red">'.number_format($totalCAAG / sprintf ("%.2f", $difact/60/60), 2, '.', '').'</b>';
                                        }
                                        else
                                        {
                                            echo '<b style="color:green">'.number_format($totalCAAG / sprintf ("%.2f", $difact/60/60), 2, '.', '').'</b>';

                                        }
                                      ?></td>


                                      <?php if($idcamp=='3'){?>
                                      <td><?php
                                            echo '<b style="color:blue">'.number_format($totalRR / sprintf ("%.2f", $difact/60/60), 2, '.', '').'</b>';
                                    
                                      ?></td>
                                      <?php } ?>


                                      <td>
                                      <?php
                                        if ( number_format(($totalCAG / $totalCAAG)*100, 2, '.', '') < 19 ) {
                                            
                                            echo '<b style="color:red">'.number_format(($totalCAG / $totalCAAG)*100, 2, '.', '') .' %</b>';
                                        }
                                        else
                                        {
                                            echo '<b style="color:green">'.number_format(($totalCAG / $totalCAAG)*100, 2, '.', '') .' %</b>';

                                        }
                                      ?>
                                      </td>
                                      <td><a href="Plus.php?idcmp=<?=$idcamp?>&idag=<?=$rowRec['ID']?>" class="btn btn-warning">Plus</a></td>
                                      <td><a href="Plus.php?idcmp=<?=$idcamp?>&idag=<?=$rowRec['ID']?>&CA=1" class="btn btn-warning">Plus</a></td>
                                      <td><a href="Detail.php?idcamp=<?=$idcamp?>&idag=<?=$rowRec['ID']?>" class="btn btn-info">Détail</a></td>

                                    </tr>
                                <?php

                                    }

                                ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>

           
                <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Statistiques Reception ( <?=$dt?> )</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="HO">
                              <thead>
                                <tr>
                                  <th scope="col">Agent</th>
                                  <th scope="col">C+</th>
                                  <th scope="col">CA</th>
<!--                                   <th scope="col">H</th>
                                  <th scope="col">CA / H</th> -->
                                  <th scope="col">Ratio</th>
                                </tr>
                              </thead>
                              <tbody>
                <?php
                                            
                    $resultrec = $cnx->query($QueryAgentREC);
                    while($rowRec = $resultrec->fetch_assoc()) 
                            {    
                                        $totalCAG = $bdd->query('SELECT count(*)
                                        FROM outgoing_calls o
                                        LEFT JOIN users u ON o.agent_id = u.id
                                        LEFT JOIN contacts c ON o.contact_id = c.id
                                        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
                                        LEFT JOIN campaigns_status s ON o.status = s.num
                                        WHERE s.text IS NOT NULL 
                                        AND camp.id = s.campaign_id and o.note="RECEPTION" and s.positive="1" and camp.id="'.$idcamp.'" and u.id="'.$rowRec['ID'].'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();


                                        $totalCAAG = $bdd->query('SELECT count(*)
                                        FROM outgoing_calls o
                                        LEFT JOIN users u ON o.agent_id = u.id
                                        LEFT JOIN contacts c ON o.contact_id = c.id
                                        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
                                        LEFT JOIN campaigns_status s ON o.status = s.num
                                        WHERE s.text IS NOT NULL 
                                        AND camp.id = s.campaign_id and s.argued="1" and o.note="RECEPTION" and camp.id="'.$idcamp.'" and u.id="'.$rowRec['ID'].'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

                                        $hourcalc = "SELECT c.REFPROSPECT,u.name as HOTESSE, DATE_FORMAT( o.agent_start, '%d/%m/%y' )  as Dateappel,
                                        DATE_FORMAT( o.agent_start, '%T' )  as HeureAppel,o.call_duration as Duree,c.COUVERTURE_1,c.COUVERTURE_5,c.refappel,s.REFQUALIF,c.RecordFileName,s.text as Description,s.MOTIFREFUS,s.Lib_EI,c.phone_1 as Telephone,s.argued
                                        FROM  `outgoing_calls` o
                                        LEFT JOIN  `users` u ON o.agent_id = u.id
                                        LEFT JOIN  `contacts` c ON o.contact_id = c.id
                                        LEFT JOIN  `campaigns_2` camp ON camp.id = c.cid
                                        LEFT JOIN  `campaigns_status` s ON o.status = s.num
                                        WHERE s.text is not null AND camp.id=s.campaign_id  
                                        AND camp.id='".$idcamp."' and u.id='".$rowRec['ID']."' and o.note='RECEPTION' and DATE_FORMAT( o.agent_start, '%d/%m/%y' )='".$dt."' order by DATE_FORMAT( o.agent_start, '%T' )";

                                     
            
                                        $reso = $cnx->query($hourcalc); 

                                        $last = 0;
                                        $elev = 0;
                                        $calc = 0;

                                        $rows = array();

                                        while($rowt = $reso->fetch_assoc()) 
                                             {
                                                     $rows[]=$rowt;
                                                     $last ++;
                                             }

                                        $calc = strtotime($rows[$last - 1]['HeureAppel']) - strtotime($rows[0]['HeureAppel']);
                                        $h = floor($calc / 3600);
                                        $m = floor($calc / 60 % 60);
                                        $s = floor($calc % 60);
                                        $calcf = sprintf('%02d:%02d:%02d', $h, $m, $s);

                                        for ($i=0; $i < $last; $i++) { 

                                             $difelev = strtotime($rows[$i + 1]['HeureAppel']) - strtotime($rows[$i]['HeureAppel']);

                                             if ($difelev >= 1200) {

                                                      $elev = $elev + $difelev;
                                                    }
                                        }

                                        $hourselev = floor($elev / 3600);
                                        $minselev = floor($elev / 60 % 60);
                                        $secselev = floor($elev % 60);
                                        $timeFormatelev = sprintf('%02d:%02d:%02d', $hourselev, $minselev, $secselev);



                                        $difact = $calc - $elev;
                                        $hoursfact = floor($difact / 3600);
                                        $minsfact = floor($difact / 60 % 60);
                                        $secsfact = floor($difact % 60);
                                        $timeFormatfact = sprintf('%02d:%02d:%02d', $hoursfact, $minsfact, $secsfact);

                                    ?>
                                    <tr>

                                      <td><?=$rowRec['Agent']?></td>
                                      <td><?=$totalCAG?></td>
                                      <td><?=$totalCAAG?></td>

                                      <td>
                                      <?php
                                        if ( number_format(($totalCAG / $totalCAAG)*100, 2, '.', '') < 19 ) {
                                            
                                            echo '<b style="color:red">'.number_format(($totalCAG / $totalCAAG)*100, 2, '.', '') .' %</b>';
                                        }
                                        else
                                        {
                                            echo '<b style="color:green">'.number_format(($totalCAG / $totalCAAG)*100, 2, '.', '') .' %</b>';

                                        }
                                      ?>
                                      </td>
                                    </tr>
                                <?php

                                    }

                                ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
         
                <!-- /# card -->
            </div>


            <div class="col-xl-5">
                <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Répondeurs ( <?=$dt?> )</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="HO">
                              <thead>
                                <tr>
                                  <th scope="col">Appels Reçu</th>
                                  <th scope="col">Répondeurs</th>
                                  <th scope="col">Sur Fixe</th>
                                  <th scope="col">Sur GSM</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                  <td><?=$rowTTFC['nb']?></td>
                                  <td><?=$rowreptotal['nb'].' <b style="color:blue"> ('.number_format(($rowreptotal['nb'] / $rowTTFC['nb'])*100, 2, '.', '') .') %</b>'?></td>
                                  <td><?=$rowreptotal['nb'] - $rowrepgsm['nb'].' <b style="color:blue"> ('.number_format((($rowreptotal['nb'] - $rowrepgsm['nb'] )/ $rowTTFC['nb'])*100, 2, '.', '') .') %</b>'?></td>
                                  <td><?=$rowrepgsm['nb'].' <b style="color:blue"> ('.number_format(($rowrepgsm['nb'] / $rowTTFC['nb'])*100, 2, '.', '') .') %</b>'?></td>
                                  </tr>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>

            <div class="col-xl-5">
                   <div class="card" >
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Graphe des Répondeurs ( <?=$dt?> )</strong>
                            </div>
                    <div id="chart-container">
                        <canvas id="mycanvasrep"></canvas>
                    </div> <!-- .content -->
                    </div>
                    </div>
                 
                    <div class="card" >
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Graphe des Rappels ( <?=$dt?> ) - Total : <?=$totalrap?></strong>
                            </div>
                    <div id="chart-container">
                        <canvas id="mycanvasrap"></canvas>
                    </div> <!-- .content -->
                    </div>
                    </div>
                </div>



    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <iframe id="txtArea1" style="display:none"></iframe>
    <button id="btnExport" onclick="fnExcelReport();"> EXPORT </button>

    <script src="assets/js/vendor/jquery-3.5.1.js"></script>
    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/lib/chart-js/chartjs-plugin-deferred.js"></script>
    <script src="assets/js/lib/chart-js/chartjs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>



    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
<!--     <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script> -->
      </script>
                <script type="text/javascript">
                function fnExcelReport()
            {
                var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
                var textRange; var j=0;
                tab = document.getElementById('HO'); // id of table

                for(j = 0 ; j < tab.rows.length ; j++) 
                {     
                    tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
                    //tab_text=tab_text+"</tr>";
                }

                tab_text=tab_text+"</table>";
                tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
                tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
                tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

                var ua = window.navigator.userAgent;
                var msie = ua.indexOf("MSIE "); 

                if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
                {
                    txtArea1.document.open("txt/html","replace");
                    txtArea1.document.write(tab_text);
                    txtArea1.document.close();
                    txtArea1.focus(); 
                    sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
                }  
                else                 //other browser not tested on IE 11
                    sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

                return (sa);
            }
            </script>
            <script type="text/javascript">
                 ( function ( $ ) {
                        $.ajax({
                            url: "https://192.168.1.4/DashKGL/poscamp.php?id=<?=$idcamp?>&dt=<?=$dt?>",
                            method: "GET",
                            success: function(data) {
                                // console.log(data);
                                var Heure = [];
                                var Accord = [];
                                
                                

                                for(var i in data) {

                                    Heure.push(data[i].Heure);
                                    Accord.push(data[i].Accord);
                                }

                                var ctx1 = $("#mycanvas");
                                var chartdata = {
                                    labels: Heure,
                                    datasets : [
                                        {
                                            label: 'C+',
                                            backgroundColor: 'rgba(28, 187, 65, 1)',
                                            borderColor: 'rgba(200, 200, 200, 0.75)',
                                            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                                            hoverBorderColor: 'rgba(200, 200, 200, 1)',
                                            data: Accord
                                        }
                                    ]
                                };

                                

                                    var barGraph = new Chart(ctx1, {
                                    type: 'line',
                                    data: chartdata,
                                    options: {
                                               

                                                tooltips: {
                                                    mode: 'index',
                                                    titleFontSize: 12,
                                                    titleFontColor: '#000',
                                                    bodyFontColor: '#000',
                                                    backgroundColor: '#fff',
                                                    titleFontFamily: 'Montserrat',
                                                    bodyFontFamily: 'Montserrat',
                                                    cornerRadius: 3,
                                                    intersect: false,
                                                },
                                                legend: {
                                                    display: false,
                                                    labels: {
                                                        usePointStyle: true,
                                                        fontFamily: 'Montserrat',
                                                    },
                                                },
                                                Hover : true
                                    }
                                    
                                });

                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                    } )( jQuery );
            </script>




                        <script type="text/javascript">
                 ( function ( $ ) {
                        $.ajax({
                            url: "https://192.168.1.4/DashKGL/ttrecu.php?id=<?=$idcamp?>&dt=<?=$dt?>",
                            method: "GET",
                            success: function(data) {
                                // console.log(data);
                                var HeureA = [];
                                var Appel = [];
                                
                                HeureA.push("");
                                Appel.push(1);

                                for(var i in data) {

                                    HeureA.push(data[i].Heure + " H");
                                    Appel.push(data[i].Appel);
                                }

                                // var chartdata = {
                                //     labels: Heure,
                                //     datasets : [
                                //         {
                                //             label: 'Appel',
                                //             backgroundColor: 'rgba(28, 187, 65, 1)',
                                //             borderColor: 'rgba(200, 200, 200, 0.75)',
                                //             hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                                //             hoverBorderColor: 'rgba(200, 200, 200, 1)',
                                //             data: Accord
                                //         }
                                //     ]
                                // };

                                var ctx2 = $("#mycanvastt");

                                var barGraph = new Chart(ctx2, {
                                    type: 'line',
                                    data: {
                                    labels: HeureA,
                                    datasets : [
                                        {
                                            label: 'Appel',
                                            backgroundColor: 'rgba(28, 187, 65, 1)',
                                            borderColor: 'rgba(200, 200, 200, 0.75)',
                                            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                                            hoverBorderColor: 'rgba(200, 200, 200, 1)',
                                            data: Appel
                                        }
                                    ]
                                }
                                });
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                    } )( jQuery );
            </script>




            <script type="text/javascript">
                 ( function ( $ ) {
                        $.ajax({
                            url: "https://192.168.1.4/DashKGL/argcamp.php?id=<?=$idcamp?>&dt=<?=$dt?>",
                            method: "GET",
                            success: function(data) {
                                // console.log(data);
                                var HeureCA = [];
                                var CA = [];

                                HeureCA.push("");
                                CA.push(1);

                                for(var i in data) {
                                    HeureCA.push(data[i].Heure + " H");
                                    CA.push(data[i].CA);
                                }

                                // var chartdata = {
                                //     labels: Heure,
                                //     datasets : [
                                //         {
                                //             label: 'CA',
                                //             backgroundColor: 'rgba(34, 169, 216, 1)',
                                //             borderColor: 'rgba(200, 200, 200, 0.75)',
                                //             hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                                //             hoverBorderColor: 'rgba(200, 200, 200, 1)',
                                //             data: CA
                                //         }
                                //     ]
                                // };

                                var ctx3 = $("#mycanvasarg");

                                var barGraph = new Chart(ctx3, {
                                    type: 'line',
                                    data: {
                                    labels: HeureCA,
                                    datasets : [
                                        {
                                            label: 'CA',
                                            backgroundColor: 'rgba(34, 169, 216, 1)',
                                            borderColor: 'rgba(200, 200, 200, 0.75)',
                                            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                                            hoverBorderColor: 'rgba(200, 200, 200, 1)',
                                            data: CA
                                        }
                                    ]
                                }
                                });
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                    } )( jQuery );
            </script>
            <script type="text/javascript">
                 ( function ( $ ) {
                        $.ajax({
                            url: "https://192.168.1.4/DashKGL/repcamp.php?id=<?=$idcamp?>&dt=<?=$dt?>",
                            method: "GET",
                            success: function(data) {
                                // console.log(data); 
                                var HeureRP = [];
                                var RP = [];

                                HeureRP.push("");
                                RP.push(1);

                                for(var i in data) {
                                    HeureRP.push(data[i].Heure + " H");
                                    RP.push(data[i].RP);
                                }

                                // var chartdata = {
                                //     labels: Heure,
                                //     datasets : [
                                //         {
                                //             label: 'Répondeur',
                                //             backgroundColor: 'rgba(34, 169, 216, 1)',
                                //             borderColor: 'rgba(200, 200, 200, 0.75)',
                                //             hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                                //             hoverBorderColor: 'rgba(200, 200, 200, 1)',
                                //             data: RP
                                //         }
                                //     ]
                                // };

                                var ctx4 = $("#mycanvasrep");

                                var barGraph = new Chart(ctx4, {
                                    type: 'bar',
                                    data: {
                                    labels: HeureRP,
                                    datasets : [
                                        {
                                            label: 'Répondeur',
                                            backgroundColor: 'rgba(34, 169, 216, 1)',
                                            borderColor: 'rgba(200, 200, 200, 0.75)',
                                            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                                            hoverBorderColor: 'rgba(200, 200, 200, 1)',
                                            data: RP
                                        }
                                    ]
                                },
                                                                    options: {
                                               

                                                tooltips: {
                                                    mode: 'index',
                                                    titleFontSize: 12,
                                                    titleFontColor: '#000',
                                                    bodyFontColor: '#000',
                                                    backgroundColor: '#fff',
                                                    titleFontFamily: 'Montserrat',
                                                    bodyFontFamily: 'Montserrat',
                                                    cornerRadius: 3,
                                                    intersect: false,
                                                },
                                                legend: {
                                                    display: false,
                                                    labels: {
                                                        usePointStyle: true,
                                                        fontFamily: 'Montserrat',
                                                    },
                                                },
                                                Hover : true
                                    }
                                });
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                    } )( jQuery );
            </script>
            <script type="text/javascript">
                 ( function ( $ ) {
                        $.ajax({
                            url: "https://192.168.1.4/DashKGL/rapcamp.php?id=<?=$idcamp?>&dt=<?=$dt?>",
                            method: "GET",
                            success: function(data) {
                                // console.log(data); 
                                var HeureRA = [];
                                var RA = [];

                                HeureRA.push("");
                                RA.push(1);

                                for(var i in data) {
                                    HeureRA.push(data[i].Heure + " H");
                                    RA.push(data[i].RA);
                                }

                                // var chartdata = {
                                //     labels: Heure,
                                //     datasets : [
                                //         {
                                //             label: 'Rappels',
                                //             backgroundColor: 'rgba(34, 169, 216, 1)',
                                //             borderColor: 'rgba(200, 200, 200, 0.75)',
                                //             hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                                //             hoverBorderColor: 'rgba(200, 200, 200, 1)',
                                //             data: RA
                                //         }
                                //     ]
                                // };

                                var ctx5 = $("#mycanvasrap");

                                var barGraph = new Chart(ctx5, {
                                    type: 'bar',
                                    data: {
                                    labels: HeureRA,
                                    datasets : [
                                        {
                                            label: 'Rappels',
                                            backgroundColor: 'rgba(34, 169, 216, 1)',
                                            borderColor: 'rgba(200, 200, 200, 0.75)',
                                            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                                            hoverBorderColor: 'rgba(200, 200, 200, 1)',
                                            data: RA
                                        }
                                    ]
                                },

                                });
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                    } )( jQuery );
            </script>

</body>
</html>
