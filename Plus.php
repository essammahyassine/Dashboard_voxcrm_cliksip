
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
<body style="zoom : 80%">
<?php

    $server = 'localhost';
    $utilisateur ='cliksip';
    $password = 'cliksip2018';
    $database = 'voxcrm';

    $cnx = mysqli_connect($server,$utilisateur,$password,$database);
     
    require_once('bdd.php');

    if (isset($_POST['up_hourdate'])) {

           $Fi = $_POST['Fichppp']; 
           $Di = $_POST['Datef'].' '.$_POST['Heuref'];
           $Dufi = $_POST['Duf']; 

           $uph="UPDATE `outgoing_calls` SET agent_start='".$Di."',call_start='".$Di."',call_duration='".$Dufi."'  WHERE id='".$Fi."'";
            $cnx->query($uph);

    }

    if (isset($_POST['Del_fich'])) {

           $Fi = $_POST['Fichppp']; 

           $DLF="DELETE FROM `outgoing_calls` WHERE id='".$Fi."'";
            $cnx->query($DLF);

    }

 if (!empty($_GET['CA'])) {

      $idcamp = $_GET['idcmp'];
      $idagent = $_GET['idag'];

      $sqla = "SELECT o.id as IDO,c.REFPROSPECT,u.name as HOTESSE, DATE_FORMAT( o.agent_start, '%d/%m/%y' )  as Dateappel,
      DATE_FORMAT( o.agent_start, '%T' )  as HeureAppel,o.call_duration as Duree,c.COUVERTURE_1,c.COUVERTURE_5,c.DETTE,c.DATE_SOUSCRIPTION as ADE,
      c.refappel,s.REFQUALIF,c.RecordFileName,s.text as Description,s.MOTIFREFUS,s.Lib_EI,o.caller_id as Telephone,s.argued
      FROM  `outgoing_calls` o
      LEFT JOIN  `users` u ON o.agent_id = u.id
      LEFT JOIN  `contacts` c ON o.contact_id = c.id
      LEFT JOIN  `campaigns_2` camp ON camp.id = c.cid
      LEFT JOIN  `campaigns_status` s ON o.status = s.num
      WHERE s.text is not null AND camp.id=s.campaign_id  
      AND camp.id='".$idcamp."' and u.id='".$idagent."' AND DATE_FORMAT( o.agent_start, '%d/%m/%y' )='".date('d/m/y')."' and s.argued=1 order by DATE_FORMAT( o.agent_start, '%T' )";


      $sqla2 = "SELECT DATE_FORMAT( o.agent_start, '%T' )  as HeureAppel
      FROM  `outgoing_calls` o
      LEFT JOIN  `users` u ON o.agent_id = u.id
      LEFT JOIN  `contacts` c ON o.contact_id = c.id
      LEFT JOIN  `campaigns_2` camp ON camp.id = c.cid
      LEFT JOIN  `campaigns_status` s ON o.status = s.num
      WHERE s.text is not null AND camp.id=s.campaign_id  
      AND camp.id='".$idcamp."' and u.id='".$idagent."' AND DATE_FORMAT( o.agent_start, '%d/%m/%y' )='".date('d/m/y')."' and s.argued=1 order by DATE_FORMAT( o.agent_start, '%T' )";

 }
 else
 {
      $idcamp = $_GET['idcmp'];
      $idagent = $_GET['idag'];
      $sqla = "SELECT o.id as IDO,c.REFPROSPECT,u.name as HOTESSE, DATE_FORMAT( o.agent_start, '%d/%m/%y' )  as Dateappel,
      DATE_FORMAT( o.agent_start, '%T' )  as HeureAppel,o.call_duration as Duree,c.COUVERTURE_1,c.COUVERTURE_5,c.AGE_EMP as ag,c.NAIS_EMP as ns,c.DATENAISSANCE nl,c.AGE as al,c.DETTE,c.DATE_SOUSCRIPTION as ADE,
      c.refappel,s.REFQUALIF,c.RecordFileName,s.text as Description,s.MOTIFREFUS,s.Lib_EI,o.caller_id as Telephone,s.argued,camp.comment as cm,o.id as idout  
      FROM  `outgoing_calls` o
      LEFT JOIN  `users` u ON o.agent_id = u.id
      LEFT JOIN  `contacts` c ON o.contact_id = c.id
      LEFT JOIN  `campaigns_2` camp ON camp.id = c.cid
      LEFT JOIN  `campaigns_status` s ON o.status = s.num
      WHERE s.text is not null AND camp.id=s.campaign_id  
      AND camp.id='".$idcamp."' and u.id='".$idagent."' AND DATE_FORMAT( o.agent_start, '%d/%m/%y' )='".date('d/m/y')."' order by DATE_FORMAT( o.agent_start, '%T' )";


      $sqla2 = "SELECT DATE_FORMAT( o.agent_start, '%T' )  as HeureAppel
      FROM  `outgoing_calls` o
      LEFT JOIN  `users` u ON o.agent_id = u.id
      LEFT JOIN  `contacts` c ON o.contact_id = c.id
      LEFT JOIN  `campaigns_2` camp ON camp.id = c.cid
      LEFT JOIN  `campaigns_status` s ON o.status = s.num
      WHERE s.text is not null AND camp.id=s.campaign_id  
      AND camp.id='".$idcamp."' and u.id='".$idagent."' AND DATE_FORMAT( o.agent_start, '%d/%m/%y' )='".date('d/m/y')."' order by DATE_FORMAT( o.agent_start, '%T' )";
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
        <?php 
        $last = 0;
          $reso = $cnx->query($sqla2);     
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



          $elev = 0;

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

            <div class="col-sm-12">
              <div class="modal" id="exampleModalLive" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Modification Date et Heur Appel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="post">
                            <label>Fiche ID</label>
                            <input type="text" class="form-control" name="Fichppp"  id="Fichppp" /> 
                            <label>Date</label>
                            <input type="text" class="form-control" name="Datef" id="Datef" value="<?=date('Y-m-d')?>" /> 
                            <label>Heure</label>
                            <input type="text" class="form-control" name="Heuref" id="Heuref" /> 
                            <label>Durée</label>
                            <input type="text" class="form-control" name="Duf" id="Duf" /> 

                      </div>
                      <div class="modal-footer">
                      	<button type="submit" name="Del_fich"  class="btn btn-danger">Supprimer</button>
                        <button type="submit" name="up_hourdate"  class="btn btn-primary">Modifier</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class=""><?=$rows[0]['HeureAppel']?></span>
                        </h4>
                        <p class="text-light">Heure début</p>
                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class=""><?=$rows[$last - 1]['HeureAppel']?></span>
                        </h4>
                        <p class="text-light">Heure Fin</p>
                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class=""><?=$calcf?></span>
                        </h4>
                        <p class="text-light">Heure Calculé</p>
                    </div>

                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class=""><?=$timeFormatelev?></span>
                        </h4>
                        <p class="text-light">Heure enlevé</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class=""><?=$timeFormatfact.'  ('.sprintf ("%.2f", $difact/60/60).' )';?></span>
                        </h4>
                        <p class="text-light">Heure Facturé</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3" id="onePage">
            <script type="text/javascript">
              
                     
                
            </script>
            </div>
            

            <div class="col-xl-12">
            <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
            <script src="assets/js/plugins.js"></script>
            <script src="assets/js/main.js"></script>
                <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Statistiques Agents</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="HO">
                              <thead>
                                <tr> 
                                  <td>ID</td>
                                  <td>Interval</td>
                                  <td>HeureAppel</td>
                                  <td>Description</td>
                                  <td>Argumenté</td> 
                                  <td>Duree</td> 
                                  <td>Duree (s)</td>
                                  <td>Agent</td> 
                                  <td>Telephone</td>
                                  <td>DTN</td>
                                  <td>CIBLE</td>
                                  <td>Dette</td>
                                  <td>ADE</td>
                                  <td>ID</td>
                                  <td>update</td>
                                </tr>
                              </thead>
                              <tbody>
                        <?php


                            

                            $t = 0;
                            $po=0;
                            
                            foreach  ($bdd->query($sqla) as $row) {

                                $po++;
                                $selectedTime = $row['HeureAppel'];
                                $dr = $row['Duree'];
                                $finappel = strtotime("+".$dr ."seconds", strtotime($selectedTime));
                                $dif = strtotime($rows[$t + 1]['HeureAppel']) - strtotime($rows[$t]['HeureAppel']);

                                $hours = floor($dif / 3600);
                                $mins = floor($dif / 60 % 60);
                                $secs = floor($dif % 60);
                                $timeFormat = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);

                                if ($dif >= 1200) {
                                        
                                    ?>
                                    <tr style="background-color: red">
                                      <td><?=$row['IDO']?></td>
                                    <td><?=$timeFormat?></td>
                                    <td><p id="H<?=$po?>"><?=$row['HeureAppel']?></p></td>
                                    <td><?=$row['Description']?></td>
                                    <td><?=$row['argued']?></td>
                                    <td><?=date("00:i:s",$row['Duree'])?></td>
                                    <td><p id="Du<?=$po?>"><?=$row['Duree']?></p></td>
                                    <td><?=$row['HOTESSE']?></td>
                                    <td><?=$row['Telephone']?></td>
                                    <td><?php 
                                    if($row['cm']=="Lourmel")
                                      {echo $row['nl'];}
                                    else
                                      {echo $row['ns'];}
                                    ?></td>
                                    <td><?=$row['COUVERTURE_1']?></td>
                                    <td><?=$row['DETTE']?></td>
                                    <td><?=$row['ADE']?></td>
                                    <td><p id="F<?=$po?>"><?=$row['idout']?></p></td>
                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" id="fichoo<?=$po?>" data-target="#exampleModalLive">Modifier</button></td>
                                    </tr>

                        <?php
                                        
                                        }  
                                        else
                                        {   


                        ?>
                                    <tr >
                                      <td><?=$row['IDO']?></td>
                                    <td><?=$timeFormat?></td>
                                    <td><p id="H<?=$po?>"><?=$row['HeureAppel']?></p></td>
                                    <td><?=$row['Description']?></td>
                                    <td><?=$row['argued']?></td>
                                    <td><?=date("00:i:s",$row['Duree'])?></td>
                                    <td><p id="Du<?=$po?>"><?=$row['Duree']?></p></td>
                                    <td><?=$row['HOTESSE']?></td>
                                    <td><?=$row['Telephone']?></td>
                                    <td><?php 
                                    if($row['cm']=="Lourmel")
                                      {echo $row['nl'];}
                                    else
                                      {echo $row['ns'];}
                                    ?></td>
                                    <td><?=$row['COUVERTURE_1']?></td>
                                    <td><?=$row['DETTE']?></td>
                                    <td><?=$row['ADE']?></td>
                                    <td><p id="F<?=$po?>"><?=$row['idout']?></p></td>
                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" id="fichoo<?=$po?>" data-target="#exampleModalLive">Modifier</button></td>
                                    </tr>

                            <?php      
                                           }                                
                                    $t ++;

                            ?>
                            <script>
                                ( function ( $ ) {
                                  $("#fichoo<?=$po?>").click(function(){

                                    var F  = $("#F<?=$po?>").text();
                                    var H  = $("#H<?=$po?>").text();
                                    var Du = $("#Du<?=$po?>").text();

                                    $("#Fichppp").val(F);
                                    $("#Heuref").val(H);
                                    $("#Duf").val(Du);

                                  
                                    });
                                 } )( jQuery );
                          </script>

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
