
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
		  $Q1 = "";
          $Q2 = "";
          $Q3 = "";
          $Q4 = "";
          $Q5 = "";
          $ACC = "";
          $FORMUL = "S";

  $sqla = 'SELECT c.RefProspect
    FROM outgoing_calls o
    LEFT JOIN users u ON o.agent_id = u.id
    LEFT JOIN contacts c ON o.contact_id = c.id
    LEFT JOIN campaigns_2 camp ON camp.id = c.cid
    LEFT JOIN campaigns_status s ON o.status = s.num
    WHERE s.text IS NOT NULL 
    AND camp.id = s.campaign_id and camp.comment="ADP" and c.NUM_PLAN="2207KG" and s.REFQUALIF in (1,110,111) and DATE_FORMAT(o.agent_start , "%d/%m/%y")!="02/10/16"';

    foreach  ($bdd->query($sqla) as $row) { $t = $t .''. $row['RefProspect'].','; } ;

    $sqla2 = 'SELECT c.RefProspect,  c.NumAppel1,  c.NUM_CLIENT, c.NUM_CLIENT2,  c.CIVILITE, c.lastname as NOM,  c.firstname as PRENOM,  c.ADR_ETAGE,  c.ADR_BATIMENT, c.ADR_RUE,  c.ADR_4,  c.ADR_CP, c.ADR_COMMUNE,  c.NAIS_EMP, c.AGE_EMP,  c.NAIS_CO_EMP,  c.AGE_CO_EMP, c.CIVILITE_COT, c.NOM_COT,  c.PRENOM_COT, c.NUM_PLAN, c.CSP,  c.SITUATION_FAMILIALE,  c.SITUATION_LOCATIVE, c.TOP_CIBLE,  c.COTISATION, c.COTISATION_2, c.CAPITAL,  c.PRIME_MOIS, c.PRIME_MOIS_2, c.PRIME_JOUR, c.PRIME_JOUR_2, c.COUVERTURE_1, c.COUVERTURE_2, c.COUVERTURE_5, c.DEST, c.Refappel, u.name as HOTESSE,    DATE_FORMAT( o.agent_start,  "%d/%m/%y" ) AS DateAppel, DATE_FORMAT( o.agent_start,  "%T" ) AS HeureAppel,  s.RefQualif,  s.RefCatg,  c.Newrib, c.BIC,  c.RecordFileName, c.PREUVE_SONORE_OUT,  s.Conclusion, s.MotifRefus, s.Lib_EI,c.id as ID,c.RefProspect,  c.NUM_CLIENT,   c.NUM_CLIENT2,  c.Refappel, c.phone_1 as Phone,c.NumAppel1,c.NumAppel2, s.text as qul,c.COUVERTURE_5,o.note,count(c.RefProspect) as nt,camp.name as CAMPAGNE,c.DETTE, c.FormuleADP, c.Q1, c.Q2, c.Q3, c.Q4, c.Q5,c.COMMENTAIRE,camp.name as campaign_n
    FROM outgoing_calls o
    LEFT JOIN users u ON o.agent_id = u.id
    LEFT JOIN contacts c ON o.contact_id = c.id
    LEFT JOIN campaigns_2 camp ON camp.id = c.cid
    LEFT JOIN campaigns_status s ON o.status = s.num
    WHERE s.text IS NOT NULL AND camp.id = s.campaign_id and camp.comment="ADP" and c.NUM_PLAN="2207KG" AND c.RefProspect not in ('.rtrim($t,",").') group by c.RefProspect order by count(c.RefProspect) desc' ;
            
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
                                          <td>NumAppel1</td> 
                                          <td>NUM_CLIENT</td> 
                                          <td>NUM_CLIENT2</td>  
                                          <td>CIVILITE</td> 
                                          <td>NOM</td>  
                                          <td>PRENOM</td> 
                                          <td>ADR_ETAGE</td>  
                                          <td>ADR_BATIMENT</td> 
                                          <td>ADR_RUE</td>  
                                          <td>ADR_4</td>  
                                          <td>ADR_CP</td> 
                                          <td>ADR_COMMUNE</td>  
                                          <td>NAIS_EMP</td> 
                                          <td>AGE_EMP</td>  
                                          <td>NAIS_CO_EMP</td>  
                                          <td>AGE_CO_EMP</td> 
                                          <td>CIVILITE_COT</td> 
                                          <td>NOM_COT</td>  
                                          <td>PRENOM_COT</td> 
                                          <td>NUM_PLAN</td> 
                                          <td>CSP</td>  
                                          <td>SITUATION_FAMILIALE</td>  
                                          <td>SITUATION_LOCATIVE</td> 
                                          <td>TOP_CIBLE</td>  
                                          <td>COTISATION</td> 
                                          <td>COTISATION_2</td> 
                                          <td>CAPITAL</td>  
                                          <td>PRIME_MOIS</td> 
                                          <td>PRIME_MOIS_2</td> 
                                          <td>PRIME_JOUR</td> <td>PRIME_JOUR_2</td> <td>COUVERTURE_1</td> <td>COUVERTURE_2</td> <td>COUVERTURE_5</td> <td>DEST</td> <td>Refappel</td> <td>HOTESSE</td>  <td>DateAppel</td>  <td>HeureAppel</td> <td>RefQualif</td>  <td>RefCatg</td>  <td>Newrib</td> <td>BIC</td>  <td>RecordFileName</td> <td>PREUVE_SONORE_OUT</td>  <td>Conclusion</td> <td>MotifRefus</td> <td>Formule</td> <td>Q1</td> <td>Q2</td> <td>Q3</td> <td>Q4</td> <td>Q5</td> <td>Lib_EI</td>
                                          <td>count</td>
                                          <td>count FIXE</td>
                                          <td>count GSM</td>
                                          <td>Remarque</td>
                                          <td>campagne</td>
                                      
                                        </tr>
                                      </thead>
                                      <tbody>
                        <?php
                                          
                 
                    foreach  ($bdd->query($sqla2) as $row) {
 

								$ADT = "SELECT DATE_FORMAT( agent_start,  '%d/%m/%y' ) AS DateAppel FROM `outgoing_calls` WHERE `contact_id`='".$row['ID']."' and caller_id!='' and DATE_FORMAT( agent_start,  '%d' )!=00 ORDER BY id DESC LIMIT 1;";
                                $ADTALL = $cnx->query($ADT);
                                $ADTFALL= $ADTALL->fetch_assoc();

                                $AHT = "SELECT DATE_FORMAT( agent_start,  '%T' ) AS HeureAppel FROM `outgoing_calls` WHERE `contact_id`='".$row['ID']."' and caller_id!='' and DATE_FORMAT( agent_start,  '%d' )!=00 ORDER BY id DESC LIMIT 1;";
                                $AHTALL = $cnx->query($AHT);
                                $AHTFALL= $AHTALL->fetch_assoc();

                                $AGGT = "SELECT u.name as HOTESSE FROM `outgoing_calls` o
    							JOIN users u ON o.agent_id = u.id WHERE o.contact_id='".$row['ID']."' and o.caller_id!='' and DATE_FORMAT( o.agent_start,  '%d' )!=00 ORDER BY o.id DESC LIMIT 1;";
                                $AGGTALL = $cnx->query($AGGT);
                                $AGGTFALL= $AGGTALL->fetch_assoc();

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
                                       <td><?=$row['RefProspect']?></td> 
                                       <td><?=$row['NumAppel1']?></td> 
                                       <td><?=$row['NUM_CLIENT']?></td>  
                                       <td><?=$row['NUM_CLIENT2']?></td> 
                                       <td><?=$row['CIVILITE']?></td> 
                                       <td><?=$row['NOM']?></td>  
                                       <td><?=$row['PRENOM']?></td> 
                                       <td><?=$row['ADR_ETAGE']?></td>  
                                       <td><?=$row['ADR_BATIMENT']?></td> 
                                       <td><?=$row['ADR_RUE']?></td>  
                                       <td><?=$row['ADR_4']?></td>  
                                       <td><?=$row['ADR_CP']?></td> 
                                       <td><?=$row['ADR_COMMUNE']?></td>  
                                       <td><?=$row['NAIS_EMP']?></td> 
                                       <td><?=$row['AGE_EMP']?></td>  
                                       <td><?=$row['NAIS_CO_EMP']?></td>  
                                       <td><?=$row['AGE_CO_EMP']?></td> 
                                       <td><?=$row['CIVILITE_COT']?></td> 
                                       <td><?=$row['NOM_COT']?></td>  
                                       <td><?=$row['PRENOM_COT']?></td> 
                                       <td><?=$row['NUM_PLAN']?></td> 
                                       <td><?=$row['CSP']?></td>  
                                       <td><?=$row['SITUATION_FAMILIALE']?></td>  
                                       <td><?=$row['SITUATION_LOCATIVE']?></td> 
                                       <td><?=$row['TOP_CIBLE']?></td>  
                                       <td><?=$row['COTISATION']?></td> 
                                       <td><?=$row['COTISATION_2']?></td> 
                                       <td><?=$row['CAPITAL']?></td>  
                                       <td><?=$row['PRIME_MOIS']?></td> 
                                       <td><?=$row['PRIME_MOIS_2']?></td> 
                                       <td><?=$row['PRIME_JOUR']?></td> 
                                       <td><?=$row['PRIME_JOUR_2']?></td> 
                                       <td><?=$row['COUVERTURE_1']?></td>  
                                       <td><?=$row['COUVERTURE_2']?></td>  
                                       <td><?=$row['COUVERTURE_5']?></td> 
                                       <td><?=$row['DEST']?></td> 
                                       <td><?=$row['Refappel']?></td> 
                                       <td><?=$AGGTFALL['HOTESSE']?></td>  
                                       <td><?=$ADTFALL['DateAppel']?></td> 
                                       <td><?=$AHTFALL['HeureAppel']?></td> 
                                       <td><?=$row['RefQualif']?></td> 
                                       <td><?=$row['RefCatg']?></td> 
                                       <td><?=$row['Newrib']?></td> 
                                       <td><?=$row['BIC']?></td>  
                                       <td><?=$row['RecordFileName']?></td> 
                                       <td><?=$row['PREUVE_SONORE_OUT']?></td>  
                                       <td><?=$row['Conclusion']?></td> 
                                       <td><?=$row['MotifRefus']?></td> 
                                       <td><?=$FORMUL?></td>
                                       <td><?=$Q1?></td> 
                                       <td><?=$Q2?></td> 
                                       <td><?=$Q3?></td> 
                                       <td><?=$Q4?></td> 
                                       <td><?=$Q5?></td>
                                       <td><?=$ACC?></td>
                                       <td><?=$RTTFALL['nb']?></td>
                                       <td><?=$RTTFIXE['nb']?></td>
                                       <td><?=$RTTGSM['nb']?></td>
                                       <td><?php if($row['NumAppel1'] == $row['NumAppel2']) {
                                                  echo 'meme N°';
                                                }else
                                                    {
                                                  echo 'N° differents';
                                                  }
                                             ?>
                                       </td>
                                       <td><?=$row['campaign_n']?></td>
                                       
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
