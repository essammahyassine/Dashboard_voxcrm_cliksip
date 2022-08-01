
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

</head>
<body style="zoom:85%">
        <!-- Left Panel -->

    <?php
        $server = 'localhost';
    $utilisateur ='cliksip';
    $password = 'cliksip2018';
    $database = 'voxcrm';

    $cnx = mysqli_connect($server,$utilisateur,$password,$database);
       require('menu.php');

       if (isset($_GET['dt'])) {

        $dt = date("d/m/y", strtotime($_GET['dt']));
        $dto = $_GET['dt'];
    }
    else
    {
        $dt = date('d/m/y');
        $dto = date('d-m-Y');
    }
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
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Accueil</li>
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
    

         
             


        </br>







 <!--<div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Campagnes CANADA  ( <?=$dt?> )</strong>
                        </div>
                        <div class="card-body">

            <table class="table table-striped" id="HO">
                              <thead>
                                <tr>
                                  <th scope="col">Campagne</th>
                                  <th scope="col">C+</th>
                                  <th scope="col">CA-</th>
                                  <th scope="col">CA</th>
                                  <th scope="col">Ratio</th>
                                  <th scope="col">CA-/H (H)</th>
                                  <th scope="col">Plus</th>
                                </tr>
                              </thead>
                              <tbody>-->


<?php

   

    
        $cp = 0;
        $cap = 0;
        $chh = 0;
        $chhca = 0;

        $QueryCamp = "SELECT distinct camp.name as campagne,camp.id as ID FROM 
                     outgoing_calls o
                    left join campaigns_2 camp on o.cid=camp.id
                    left join campaigns_status s on o.status=s.num
                    left join users u on u.id=o.agent_id 
                    left join contacts c on c.id=o.contact_id
                    where DATE_FORMAT(o.agent_start , '%d/%m/%y')='".$dt."' and
                     camp.comment='Mondopayements' and camp.id=s.campaign_id";


        $resultCamp = $cnx->query($QueryCamp);
                    while($rowCamp = $resultCamp->fetch_assoc())
                    {
                        $idcamp = $rowCamp['ID'];
                        $cmpname= $rowCamp['campagne'];
                    
    

        $QueryAgent = "SELECT distinct u.name as Agent,u.id as ID FROM 
                     outgoing_calls o
                    left join campaigns_2 camp on o.cid=camp.id
                    left join campaigns_status s on o.status=s.num
                    left join users u on u.id=o.agent_id 
                    left join contacts c on c.id=o.contact_id
                    where DATE_FORMAT(o.agent_start , '%d/%m/%y')='".$dt."' and camp.id='".$idcamp."' and camp.id=s.campaign_id";

  
        require_once('bdd.php');
        $totalreste = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.positive="1" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'" and c.RecordFileName=""')->fetchColumn(); 


        $totalCplus = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.positive="1" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();


        $totalCAmoins = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.argued="1" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

        $totalCA = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.positive="-1" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();


//Vient de changer de fournisseur 442
         $vientdechanger = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.id="466" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

         //Pas disponible pour un rdv 443
     $pasdisponible = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.id="467" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

    //partenariat 444 
     $partenariat = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.id="468" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

         //Paie moin cher 445
     $paiemoin = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.id="469" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

//refus intro 446 
     $intro = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.id="470" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

     //n utilise pas 444 
     $utilisepas = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.id="472" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

      //repondeur 73 
     $repondeur = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.id="473" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

       //fax 75 
     $fax = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.id="474" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

     //fauxnum 447 
     $fauxnum = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.id="471" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

  //entreprisedessoute 448 
     $entreprisedessoute = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.id="475" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();
      


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 $totalcontacte = $bdd->query('SELECT count(c.phone_1)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id  and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

 
        





















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

                $cp = $cp + $totalCplus;
                $cap = $cap + $totalCAmoins;
                $capp = $capp + $totalCA;
                $chh = $chh + number_format($totalCAmoins / $tthcal, 2, '.', '');
                $chhca = $chhca + $tthcal;
?>



<div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Campagnes CANADA  ( <?=$dt?> )</strong>
                        </div>
                        <div class="card-body">

            <table class="table table-striped" id="HOO">
                              <thead>
                                <tr>
                                 
                                  <th scope="col">C+</th>
                                  <th scope="col">CA-</th>
                                  <th scope="col">CA</th>
                                  <th scope="col">C+/C-</th>
                                  <th scope="col">CA-/H </th>
                                  <th scope="col">CA+/H </th>
                                  <th scope="col">Total Heur</th>
                                  <th scope="col">Total clients Contacté</th>
                              
                                </tr>
                              </thead>
                              <tbody>
       <tr>

            
            <td><?=$totalCplus?></td>
            <td><?=$totalCAmoins?></td>
            <td><?=$totalCA?></td>

            
            <td>
          <?php
                $plus=$totalCplus +$totalCAmoins;
                        echo '<b style="color:green">'.number_format(($totalCplus  / $plus)*100, 2, '.', '') .' %</b>';

            ?>
            </td>
             <td><?=number_format($cap / $chhca, 2, '.', '') ?></td>
           <td><?=number_format($totalCplus / $tthcal, 2, '.', '') ?></td>
<td><?=$tthcal?></td>
<td><?=$totalcontacte?></td>
       </tr>
        <?php
                    }
        ?>
        <!-- <tr>
       
           <td><?=$cp?></td>
           <td><?=$cap?></td>
             <td><?=$capp?></td>
           <td>
           <?php
                if ( number_format(($cp / $cap)*100, 2, '.', '') < 19 ) {                    
                        echo '<b style="color:red">'.number_format(($cp / $cap)*100, 2, '.', '') .' %</b>';
                            }
                else
                        {
                        echo '<b style="color:green">'.number_format(($cp / $cap)*100, 2, '.', '') .' %</b>';

                            }
            ?>
            </td>
           <td><?=number_format($cap / $chhca, 2, '.', '') ?></td>
           <td><?=number_format($totalCplus / $tthcal, 2, '.', '') ?></td>
           <td><?=$tthcal?></td>
        </tr>-->
        </tbody>
    </table>
    </div>
    </div>
    </div>






     <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Campagnes CANADA  ( <?=$dt?> )</strong>
                        </div>
                        <div class="card-body">

            <table class="table table-striped" id="HO">
                              <thead>
                                <tr>
                                  <td><th scope="col">Campagne</th> </td> <th scope="col"> <?=$cmpname?> </th>  </tr>

                                  <td><th scope="col">C+</th></td> <td><!--<?=$totalCplus?>--></td>  </tr>
                                  <td><th scope="col">RDV confirmé</th></td> <td><?=$totalCplus?></td>  </tr> 
     
                                  <td><th scope="col">CA-</th></td> <td><?=$totalCAmoins?></td>  </tr>
                                  <td><th scope="col">Vient de changer de fournisseur</th></td> <td><?=$vientdechanger?></td> </tr>
                                  <td><th scope="col">Pas disponible pour un rdv</th></td> <td><?=$pasdisponible?></td>  </tr>
                                  <td><th scope="col">Partenariat avec le fournisseur</th></td> <td><?=$partenariat?></td>  </tr>
                                  <td><th scope="col">Paie moins de 1500 $</th></td> <td><?=$paiemoin?></td>  </tr>
                                  
                                  <td><th scope="col">CA</th></td> <td><!--<?=$totalCA?>--></td>  </tr>
                                  <td><th scope="col">Rappel</th></td> <td><?=$totalCA?></td>  </tr>

                                   <td><th scope="col">KO</th></td> <td><??></td>  </tr>
                                   <td><th scope="col">Refus intro</th></td> <td><?=$intro ?></td>  </tr>
                                   <td><th scope="col">N'utilise pas le service</th></td> <td><?=$utilisepas?></td>  </tr>

                                  
                                   <td><th scope="col">AUTRE</th></td> <td><??></td>  </tr>
                                   <td><th scope="col">Répondeur</th></td> <td><?=$repondeur?></td>  </tr>
                                   <td><th scope="col">Fax</th></td> <td><?=$fax?></td>  </tr>
                                   <td><th scope="col">Faux numéro</th></td> <td><?=$fauxnum?></td>  </tr>
                                   <td><th scope="col">Entreprise dissoute</th></td> <td><?=$entreprisedessoute?></td>  </tr>

                                 <!-- <td><th scope="col">Ratio</th></td>  <td><?php
                if ( number_format(($cp / $cap)*100, 2, '.', '') < 19 ) {                    
                        echo '<b style="color:red">'.number_format(($totalCplus / $totalCAmoins)*100, 2, '.', '') .' %</b>';
                            }
                else
                        {
                        echo '<b style="color:green">'.number_format(($totalCplus / $totalCAmoins)*100, 2, '.', '') .' %</b>';

                            }
            ?>
            </td>  </tr>
                                  <td><th scope="col">CA-/H (H)</th></td> <td><?=number_format($cap / $chhca, 2, '.', '') .' ( '.$chhca. ' H)'?></td>  </tr>-->
                                 


                               
                              </thead>
                              <tbody>

            
            
            

      <!-- </tr>-->
        </tbody>
    </table>
    </div>
    </div>
    </div>






























<BR>



         
                    
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <iframe id="txtArea1" style="display:none"></iframe>
    <button id="btnExport" onclick="fnExcelReport();" class="btn btn-primary">Détail par status EXPORT </button>
<button id="btnExport" onclick="fnnExcelReport();" class="btn btn-warning">Détail EXPORT </button>
<a href="https://192.168.1.4/kglink/extraction.php" class="btn btn-success"> Extraction Vente </a>
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>
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


            <!--   -->



             function fnnExcelReport()
            {
                var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
                var textRange; var j=0;
                tab = document.getElementById('HOO'); // id of table

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

</body>
</html>
