
<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KGLNIK - Détail</title>
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
<body style="zoom:80%">
<?php

    $server = 'localhost';
    $utilisateur ='cliksip';
    $password = 'cliksip2018';
    $database = 'voxcrm';

    $cnx = mysqli_connect($server,$utilisateur,$password,$database);
    mysqli_set_charset($cnx,"utf8");
   

        
    $idcamp = 18;
    $idag = $_GET['idag'];

    if (isset($_GET['dt'])) {

        $dt = date("d/m/y", strtotime($_GET['dt']));
    }
    else
    {
        $dt = date('d/m/y');
    }

  
        require_once('bdd.php');
        
        $campname='SELECT name from campaigns_2 
        where id="'.$idcamp.'"';
        $CMP = $cnx->query($campname);
        $rowCMP = $CMP->fetch_assoc();

        $username='SELECT name from users 
        where id="'.$idag.'"';
        $USR = $cnx->query($username);
        $rowUSR = $USR->fetch_assoc();

        $getposstatut = 'SELECT count(*) as nb,s.text as statut
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.positive=1 and camp.id="'.$idcamp.'"  AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'" group by s.text';

        $getnegstatut = 'SELECT count(*) as nb,s.text as statut
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.positive=-1 and camp.id="'.$idcamp.'"  AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'" group by s.text';

        $getCAstatut = 'SELECT count(*) as nb,s.text as statut
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.argued=1 and camp.id="'.$idcamp.'"  AND
         DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'" group by s.text';


        $tc = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.positive=1 and camp.id="'.$idcamp.'"  AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn(); 

        $tcn = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.positive=-1 and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn(); 

        $tca = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.argued=1 and camp.id="'.$idcamp.'"  AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn(); 


      
        $totalFC='SELECT count(*) as nb
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.text!="" and camp.id="'.$idcamp.'"  AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"';
        $TTFC = $cnx->query($totalFC);
        $rowTTFC = $TTFC->fetch_assoc();
        

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
        AND camp.id = s.campaign_id and s.text in ("Répondeur","Repondeur") and camp.id="'.$idcamp.'"  AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'" and (o.caller_id like "00337%" or o.caller_id like "00336%")';
        $reptgsm = $cnx->query($totalrepondeurgsm);
        $rowrepgsm = $reptgsm->fetch_assoc();

        $totalrap = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.text in ("A rappeler","Rappel personnel") and camp.id="'.$idcamp.'"  AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'" and c.RecordFileName=""')->fetchColumn(); 

    
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
        AND camp.id = s.campaign_id and s.positive="1" and camp.id="'.$idcamp.'" and  DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();


        $totalCA = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.argued="1" and camp.id="'.$idcamp.'"  AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();


        $tthcal = 0;


            
        $hourcalc = "SELECT c.REFPROSPECT,u.name as HOTESSE, DATE_FORMAT( o.agent_start, '%d/%m/%y' )  as Dateappel,
                                        DATE_FORMAT( o.agent_start, '%T' )  as HeureAppel,o.call_duration as Duree,c.COUVERTURE_1,c.COUVERTURE_5,c.refappel,s.REFQUALIF,c.RecordFileName,s.text as Description,s.MOTIFREFUS,s.Lib_EI,c.phone_1 as Telephone,s.argued
                                        FROM  `outgoing_calls` o
                                        LEFT JOIN  `users` u ON o.agent_id = u.id
                                        LEFT JOIN  `contacts` c ON o.contact_id = c.id
                                        LEFT JOIN  `campaigns_2` camp ON camp.id = c.cid
                                        LEFT JOIN  `campaigns_status` s ON o.status = s.num
                                        WHERE s.text is not null AND camp.id=s.campaign_id  
                                        AND camp.id='".$idcamp."'  AND DATE_FORMAT( o.agent_start, '%d/%m/%y' )='".$dt."' order by DATE_FORMAT( o.agent_start, '%T' )";

                                     
            
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
                        <input type="date" class="form-control" name="dt" value="<?=$dt?>">
                        <input type="hidden" name="idcamp" value="<?=$idcamp?>" >
                        <input type="hidden" name="idag" value="<?=$idag?>" >
                    </div>  
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success">OK</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>


            <div class="col-sm-12">
           

            

            
            
            


            
                <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Statistiques Outbound ( <?=$dt?> )</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="HO">
                              <thead>
                                <tr>
                                  <th scope="col">Total</th>
                                  <th scope="col">Statut</th>
                                </tr>
                              </thead>
                              <tbody>
                                    <tr style="background-color: #c6f9dd;">
                                        <td><b>C+</b></td>
                                        <td><b><?=$tc?></b></td>
                                    </tr>
                            <?php
                                
                                $resultPOS = $cnx->query($getposstatut);
                                    while($rowPOS = $resultPOS->fetch_assoc())
                                {
                                     
                            ?>
                                <tr>
                                        <td><?=$rowPOS['nb']?></td>
                                        <td><?=$rowPOS['statut']?></td>
                                <tr>
                            <?php
                                }
                            ?>
                                <tr style="background-color: #f5cbcb;">
                                        <td><b>C-</b></td>
                                        <td><b><?=$tcn?></b></td>
                                </tr>
                            <?php
                                
                                $resultNEG = $cnx->query($getnegstatut);
                                    while($rowNEG = $resultNEG->fetch_assoc())
                                {
                                     
                            ?>
                                <tr>
                                        <td><?=$rowNEG['nb']?></td>
                                        <td><?=$rowNEG['statut']?></td>
                                <tr>
                            <?php
                                }
                            ?>
                                <tr style="background-color: #c8e5f1;">
                                        <td><b>CA<b></td>
                                        <td><b><?=$tca?></b></td>
                                </tr>
                            <?php
                                
                                $resultCA = $cnx->query($getCAstatut);
                                    while($rowCA = $resultCA->fetch_assoc())
                                {
                                     
                            ?>
                                <tr>
                                        <td><?=$rowCA['nb']?></td>
                                        <td><?=$rowCA['statut']?></td>
                                <tr>
                            <?php
                                }
                            ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
          



          





            


          

        













    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <iframe id="txtArea1" style="display:none"></iframe>
    <button id="btnExport" onclick="fnExcelReport();"> EXPORT </button>

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/lib/chart-js/chartjs.min.js"></script>
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
            </script>
            <script type="text/javascript">
                 ( function ( $ ) {
                        $.ajax({
                            url: "https://192.168.1.4/DashboradKGL/posag.php?idcamp=<?=$idcamp?>&dt=<?=$dt?>&idag=<?=$idag?>",
                            method: "GET",
                            success: function(data) {
                                console.log(data);
                                var Heure = [];
                                var Accord = [];

                                for(var i in data) {
                                    Heure.push(data[i].Heure + " H");
                                    Accord.push(data[i].Accord);
                                }

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

                                var ctx = $("#mycanvas");

                                var barGraph = new Chart(ctx, {
                                    type: 'line',
                                    data: chartdata
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
                            url: "https://192.168.1.4/DashboradKGL/argag.php?idcamp=<?=$idcamp?>&dt=<?=$dt?>&idag=<?=$idag?>",
                            method: "GET",
                            success: function(data) {
                                console.log(data);
                                var Heure = [];
                                var CA = [];

                                for(var i in data) {
                                    Heure.push(data[i].Heure + " H");
                                    CA.push(data[i].CA);
                                }

                                var chartdata = {
                                    labels: Heure,
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
                                };

                                var ctx = $("#mycanvasarg");

                                var barGraph = new Chart(ctx, {
                                    type: 'line',
                                    data: chartdata
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
                            url: "https://192.168.1.4/DashboradKGL/repag.php?idcamp=<?=$idcamp?>&dt=<?=$dt?>&idag=<?=$idag?>",
                            method: "GET",
                            success: function(data) {
                                console.log(data); 
                                var Heure = [];
                                var RP = [];

                                for(var i in data) {
                                    Heure.push(data[i].Heure + " H");
                                    RP.push(data[i].RP);
                                }

                                var chartdata = {
                                    labels: Heure,
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
                                };

                                var ctx = $("#mycanvasrep");

                                var barGraph = new Chart(ctx, {
                                    type: 'bar',
                                    data: chartdata
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
                            url: "https://192.168.1.4/DashboradKGL/rapag.php?idcamp=<?=$idcamp?>&dt=<?=$dt?>&idag=<?=$idag?>",
                            method: "GET",
                            success: function(data) {
                                console.log(data); 
                                var Heure = [];
                                var RA = [];

                                for(var i in data) {
                                    Heure.push(data[i].Heure + " H");
                                    RA.push(data[i].RA);
                                }

                                var chartdata = {
                                    labels: Heure,
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
                                };

                                var ctx = $("#mycanvasrap");

                                var barGraph = new Chart(ctx, {
                                    type: 'bar',
                                    data: chartdata
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
