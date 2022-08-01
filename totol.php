
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
    $cut = 0;

    $cnx = mysqli_connect($server,$utilisateur,$password,$database);
   


    require_once('bdd.php');

    if (isset($_GET['dt'])) {
      
      $dato = date("d/m/y", strtotime($_GET['dt']));

    }
    else
    {

      $dato = date('d/m/y');
    }


  $sqla = 'SELECT c.muna
    FROM outgoing_calls o
    LEFT JOIN users u ON o.agent_id = u.id
    LEFT JOIN contacts c ON o.contact_id = c.id
    LEFT JOIN campaigns_2 camp ON camp.id = c.cid
    LEFT JOIN campaigns_status s ON o.status = s.num
    WHERE s.text IS NOT NULL 
    AND camp.id = s.campaign_id and camp.id="16"  and s.REFQUALIF in (1,110,111,0)';

    foreach  ($bdd->query($sqla) as $row) { $t = $t .''. $row['muna'].','; } ;

    $sqla2 = 'SELECT c.muna,  c.NumAppel1,  c.NUM_CLIENT, c.NUM_CLIENT2,  c.CIVILITE, c.lastname as NOM,  c.firstname as PRENOM,  c.ADR_ETAGE,  c.ADR_BATIMENT, c.ADR_RUE,  c.ADR_4,  c.ADR_CP, c.ADR_COMMUNE,  c.NAIS_EMP, c.AGE_EMP,  c.NAIS_CO_EMP,  c.AGE_CO_EMP, c.CIVILITE_COT, c.NOM_COT,  c.PRENOM_COT, c.NUM_PLAN, c.CSP,  c.SITUATION_FAMILIALE,  c.SITUATION_LOCATIVE, c.TOP_CIBLE,  c.COTISATION, c.COTISATION_2, c.CAPITAL,  c.PRIME_MOIS, c.PRIME_MOIS_2, c.PRIME_JOUR, c.PRIME_JOUR_2, c.COUVERTURE_1, c.COUVERTURE_2, c.COUVERTURE_5, c.DEST, c.Refappel, u.name as HOTESSE,    DATE_FORMAT( o.agent_start,  "%d/%m/%y" ) AS DateAppel, DATE_FORMAT( o.agent_start,  "%T" ) AS HeureAppel,  s.RefQualif,  s.RefCatg,  c.Newrib, c.BIC,  c.RecordFileName, c.PREUVE_SONORE_OUT,  s.Conclusion, s.MotifRefus, s.Lib_EI,c.id as ID,c.RefProspect,  c.NUM_CLIENT,   c.NUM_CLIENT2,  c.Refappel, c.phone_1 as Phone,c.NumAppel1,c.NumAppel2, s.text as qul,c.COUVERTURE_5,o.note,count(c.RefProspect) as nt,camp.name as CAMPAGNE
    FROM outgoing_calls o
    LEFT JOIN users u ON o.agent_id = u.id
    LEFT JOIN contacts c ON o.contact_id = c.id
    LEFT JOIN campaigns_2 camp ON camp.id = c.cid
    LEFT JOIN campaigns_status s ON o.status = s.num
    WHERE s.text IS NOT NULL AND camp.id = s.campaign_id and camp.id="16"  AND c.muna not in ('.rtrim($t,",").') group by c.muna order by count(c.muna) desc' ;
            
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
                            <li class="active">Fiche non qualifié</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-12" >
            

            <div class="col-xl-12">
                <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Liste des fiches non qualifié classé par nombre des tentatives d'appel</strong>
                        </div>
                        <div class="card-body">
                                    <table class="table table-striped" id="HO" style="font-size: 11px">
                                      <thead>
                                        <tr> 
                                        
                                          <td>ID</td>
                                          <td>RefProspect</td>
                                          <td>NUM_CLIENT</td>
                                          <td>NUM_CLIENT2</td>   
                                          <td>CIVILITE</td>
                                          <td>NOM</td>
                                          <td>PRENOM</td>
                                          <td>AGE</td>
                                          <td>Refappel</td>
                                          <td>Phone</td>
                                          <td>NumAppel1</td>
                                          <td>NumAppel2</td>
                                          <td>Qualification</td>
                                          <td>COUVERTURE_1</td>
                                          <td>CAMPAGNE</td>
                                          <td>count</td>
                                          <td>count FIXE</td>
                                          <td>count GSM</td>
                                          <td>Remarque</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                        <?php
                                          
                 
                    foreach  ($bdd->query($sqla2) as $row) {
                                $cut = $cut + 1;
                                $CTALL = "SELECT count(*) as nb FROM `outgoing_calls` WHERE `contact_id`='".$row['ID']."' and caller_id!=''";
                                $TTALL = $cnx->query($CTALL);
                                $RTTFALL= $TTALL->fetch_assoc();

                                $CTFIXE = "SELECT count(*) as nb FROM `outgoing_calls` WHERE `contact_id`='".$row['ID']."' and `caller_id`='0033".substr($row['NumAppel1'],1)."'";
                                $TTFIXE = $cnx->query($CTFIXE);
                                $RTTFIXE = $TTFIXE->fetch_assoc();

                                $CTFIXE = "SELECT count(*) as nb FROM `outgoing_calls` WHERE `contact_id`='".$row['ID']."' and `caller_id`='0033".substr($row['NumAppel2'],1)."'";
                                $TTGSM = $cnx->query($CTFIXE);
                                $RTTGSM = $TTGSM->fetch_assoc();


                                    ?>
                                    <tr>
                                       <td><?=$row['ID']?></td>
                                       <td><?=$row['muna']?></td>
                                       <td><?=$row['NUM_CLIENT']?></td> 
                                       <td><?=$row['NUM_CLIENT2']?></td> 
                                       <td><?=$row['CIVILITE']?></td>
                                       <td><?=$row['NOM']?></td> 
                                       <td><?=$row['PRENOM']?></td>
                                       <td><?=$row['AGE_EMP']?></td>
                                       <td><?=$row['Refappel']?></td>   
                                       <td><?=$row['Phone']?></td>    
                                       <td><?=$row['NumAppel1']?></td>  
                                       <td><?=$row['NumAppel2']?></td> 
                                       <td><?=$row['qul']?></td>  
                                       <td><?=$row['COUVERTURE_1']?></td>   
                                       <td><?=$row['CAMPAGNE']?></td> 
                                       <td><?=$RTTFALL['nb']?></td>
                                       <td><?=$RTTFIXE['nb']?></td>
                                       <td><?=$RTTGSM['nb']?></td>
                                       <td><?php if($row['NumAppel1'] == $row['NumAppel2']) {
                                                  echo '1';
                                                }else
                                                    {
                                                  echo '0';
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
            </div>
    <div class="col-sm-12" >
      <h3>Count : <?=$cut?></h3>
    </div>
    <div class="col-sm-12" >
      <iframe id="txtArea1" style="display:none"></iframe>
      <button id="btnExport" onclick="fnExcelReport();" class="btn btn-warning form-group"> Exporter la liste </button>
    </div>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

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
