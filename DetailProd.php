
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
<body style="zoom:80%">
<?php

    $server = 'localhost';
    $utilisateur ='cliksip';
    $password = 'cliksip2018';
    $database = 'voxcrm';

    $cnx = mysqli_connect($server,$utilisateur,$password,$database);
   

        
    $idcamp = $_GET['id'];

    if (isset($_GET['dt'])) {

        $dt = date("/m/y", strtotime($_GET['dt']));
    }
    else
    {
        $dt = date('/m/y');
    }

    

        $QueryAgent = "SELECT distinct u.name as Agent,u.id as ID FROM 
                     outgoing_calls o
                    left join campaigns_2 camp on o.cid=camp.id
                    left join campaigns_status s on o.status=s.num
                    left join users u on u.id=o.agent_id 
                    left join contacts c on c.id=o.contact_id
                    where DATE_FORMAT(o.agent_start , '%d/%m/%y') like '%".$dt."' and camp.id='".$idcamp."' and camp.id=s.campaign_id";

        $QueryAgentREC = "SELECT distinct u.name as Agent,u.id as ID FROM 
                     outgoing_calls o
                    left join campaigns_2 camp on o.cid=camp.id
                    left join campaigns_status s on o.status=s.num
                    left join users u on u.id=o.agent_id 
                    left join contacts c on c.id=o.contact_id
                    where DATE_FORMAT(o.agent_start , '%d/%m/%y') like '%".$dt."' and camp.id='".$idcamp."' and o.note='RECEPTION' and camp.id=s.campaign_id";

  
        require_once('bdd.php');

      
        $totalFC='SELECT count(*) as nb
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.text!="" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"';
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
        AND camp.id = s.campaign_id and s.positive="1" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" ) like "%'.$dt.'"')->fetchColumn();


        $totalCA = $bdd->query('SELECT count(*)
        FROM outgoing_calls o
        LEFT JOIN users u ON o.agent_id = u.id
        LEFT JOIN contacts c ON o.contact_id = c.id
        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
        LEFT JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND camp.id = s.campaign_id and s.argued="1" and camp.id="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" ) like "%'.$dt.'"')->fetchColumn();


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
                            <span class=""><?=$totalC?></span>
                        </h4>
                        <p class="text-light">C+</p>
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
                <div class="col-sm-6">
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
                <div class="col-sm-6">
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
                                  <th scope="col">Agent</th>
                                  <th scope="col">C+</th>
                                  <th scope="col">H</th>
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
                                        AND camp.id = s.campaign_id and s.positive="1" and camp.id="'.$idcamp.'" and u.id="'.$rowRec['ID'].'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" ) like "%'.$dt.'"')->fetchColumn();
                                        
                                        $totalCAAG = $bdd->query('SELECT count(*)
                                        FROM outgoing_calls o
                                        LEFT JOIN users u ON o.agent_id = u.id
                                        LEFT JOIN contacts c ON o.contact_id = c.id
                                        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
                                        LEFT JOIN campaigns_status s ON o.status = s.num
                                        WHERE s.text IS NOT NULL 
                                        AND camp.id = s.campaign_id and s.argued="1" and camp.id="'.$idcamp.'" and u.id="'.$rowRec['ID'].'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

                                        
                                    ?>
                                    <tr>

                                      <td><?=$rowRec['Agent']?></td>
                                      <td><?=$totalCAG?></td>
                                      <td>H</td>
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
                <!-- /# card -->
            </div>

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
                            url: "https://192.168.1.4/DashboradKGL/poscamp.php?id=<?=$idcamp?>&dt=<?=$dt?>",
                            method: "GET",
                            success: function(data) {
                                console.log(data);
                                var Heure = [];
                                var Accord = [];
                                
                                Heure.push("");
                                Accord.push(1);

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
                            url: "https://192.168.1.4/DashboradKGL/argcamp.php?id=<?=$idcamp?>&dt=<?=$dt?>",
                            method: "GET",
                            success: function(data) {
                                console.log(data);
                                var Heure = [];
                                var CA = [];

                                Heure.push("");
                                CA.push(1);

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
                            url: "https://192.168.1.4/DashboradKGL/repcamp.php?id=<?=$idcamp?>&dt=<?=$dt?>",
                            method: "GET",
                            success: function(data) {
                                console.log(data); 
                                var Heure = [];
                                var RP = [];

                                Heure.push("");
                                RP.push(1);

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
                            url: "https://192.168.1.4/DashboradKGL/rapcamp.php?id=<?=$idcamp?>&dt=<?=$dt?>",
                            method: "GET",
                            success: function(data) {
                                console.log(data); 
                                var Heure = [];
                                var RA = [];

                                Heure.push("");
                                RA.push(1);

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
