
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
<body>
<?php

    $server = 'localhost';
    $utilisateur ='cliksip';
    $password = 'cliksip2018';
    $database = 'voxcrm';

    $cnx = mysqli_connect($server,$utilisateur,$password,$database);
   
        
    $idcamp = $_GET['idcmp'];
    $idagent = $_GET['idag'];


    require_once('bdd.php');

  
  $sqla = "SELECT c.REFPROSPECT,u.name as HOTESSE, DATE_FORMAT( o.agent_start, '%d/%m/%y' )  as Dateappel,
  DATE_FORMAT( o.agent_start, '%T' )  as HeureAppel,o.call_duration as Duree,c.COUVERTURE_1,c.COUVERTURE_5,
  c.refappel,s.REFQUALIF,c.RecordFileName,s.text as Description,s.MOTIFREFUS,s.Lib_EI,c.phone_1 as Telephone,s.argued
  FROM  `outgoing_calls` o
  LEFT JOIN  `users` u ON o.agent_id = u.id
  LEFT JOIN  `contacts` c ON o.contact_id = c.id
  LEFT JOIN  `campaigns_2` camp ON camp.id = c.cid
  LEFT JOIN  `campaigns_status` s ON o.status = s.num
  WHERE s.text is not null AND camp.id=s.campaign_id  
  AND camp.id='".$idcamp."' and u.id='".$idagent."' AND DATE_FORMAT( o.agent_start, '%d/%m/%y' )='".date('d/m/y')."' order by DATE_FORMAT( o.agent_start, '%T' )";
            
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
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Hour Calculator</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-12">
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class=""><?=$totalC?></span>
                        </h4>
                        <p class="text-light">Heure Calculé</p>
                    </div>

                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class=""><?=$totalCA?></span>
                        </h4>
                        <p class="text-light">Heure enlevé</p>
                    </div>
                </div>
            </div>
            <button id="btnExport" onclick="fnExcelReport();" class="btn btn-warning"> Exporter la liste </button>

            <div class="col-xl-12">
                <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Statistiques Agents</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="HO">
                              <thead>
                                <tr> 
                                  <td>Interval</td>
                                  <td>HeureAppel</td>
                                  <td>Description</td>
                                  <td>Argumenté</td> 
                                  <td>Duree</td> 
                                  <td>Agent</td> 
                                  <td>Telephone</td>
                                </tr>
                              </thead>
                              <tbody>
                        <?php
                               $a="";
                                $b="";
                                $c="";
                                $d="1";
                                $e=0;           
                            foreach  ($bdd->query($sqla) as $row) {
                                $e ++;
if($a=="" and $d=="1" )
{
    $a=$row['HeureAppel'];
}
if($e % 2==0)
{
     $d="2";
     $e=0;
}
if($a!="" and $d=="2")
{
    $c= $row['HeureAppel'] ." ".$a;
    $a="";
    $d=1;
}


                                $selectedTime = $row['HeureAppel'];
                                $dr = $row['Duree'];
                                $finappel = strtotime("+".$dr ."seconds", strtotime($selectedTime));

                                    ?>
                                    <tr>
                                    <td><?=$c?></td>
                                    <td><?=$row['HeureAppel']?></td>
                                    <td><?=$row['Description']?></td>
                                    <td><?=$row['argued']?></td>
                                    <td><?=date("00:i:s",$row['Duree'])?></td>
                                    <td><?=$row['HOTESSE']?></td>
                                    <td><?=$row['Telephone']?></td>
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


        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <iframe id="txtArea1" style="display:none"></iframe>
    <button id="btnExport" onclick="fnExcelReport();"> EXPORT </button>

    <!-- Right Panel -->

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

</body>
</html>
