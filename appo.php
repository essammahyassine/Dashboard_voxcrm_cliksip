
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

    $Q01 = 0;
    $Q02 = 0;
    $Q03 = 0;
    $Q04 = 0;
    $Q05 = 0;
    $Q06 = 0;
    $Q07 = 0;
    $Q08 = 0;
    $Q09 = 0;
    $Q10 = 0;
    $Q10p = 0;

    $Q01ca = 0;
    $Q02ca = 0;
    $Q03ca = 0;
    $Q04ca = 0;
    $Q05ca = 0;
    $Q06ca = 0;
    $Q07ca = 0;
    $Q08ca = 0;
    $Q09ca = 0;
    $Q10ca = 0;
    $Q10pca = 0;


    $Q01rr = 0;
    $Q02rr = 0;
    $Q03rr = 0;
    $Q04rr = 0;
    $Q05rr = 0;
    $Q06rr = 0;
    $Q07rr = 0;
    $Q08rr = 0;
    $Q09rr = 0;
    $Q10rr = 0;
    $Q10prr = 0;


    $Q01fx = 0;
    $Q02fx = 0;
    $Q03fx = 0;
    $Q04fx = 0;
    $Q05fx = 0;
    $Q06fx = 0;
    $Q07fx = 0;
    $Q08fx = 0;
    $Q09fx = 0;
    $Q10fx = 0;
    $Q10pfx = 0;


    $cnx = mysqli_connect($server,$utilisateur,$password,$database);
   


    require_once('bdd.php');

    if (isset($_GET['dt'])) {
      
      $dato = date("d/m/y", strtotime($_GET['dt']));

    }
    else
    {

      $dato = date('d/m/y');
    }


  $sqla = 'SELECT c.id
    FROM outgoing_calls o
    LEFT JOIN users u ON o.agent_id = u.id
    LEFT JOIN contacts c ON o.contact_id = c.id
    LEFT JOIN campaigns_2 camp ON camp.id = c.cid
    LEFT JOIN campaigns_status s ON o.status = s.num
    WHERE s.text IS NOT NULL 
    AND camp.id = s.campaign_id and camp.comment="ADP" and c.NUM_PLAN="2112KG" and s.positive in (1) and DATE_FORMAT(o.agent_start , "%d/%m/%y")!="02/10/16"';

    foreach  ($bdd->query($sqla) as $row) { $t = $t .''. $row['id'].','; } ;

    $sqla2 = 'SELECT c.id,c.RefProspect,  c.NumAppel1,  c.NUM_CLIENT, c.NUM_CLIENT2,  c.CIVILITE, c.lastname as NOM,  c.firstname as PRENOM,  c.ADR_ETAGE,  c.ADR_BATIMENT, c.ADR_RUE,  c.ADR_4,  c.ADR_CP, c.ADR_COMMUNE,  c.NAIS_EMP, c.AGE_EMP,  c.NAIS_CO_EMP,  c.AGE_CO_EMP, c.CIVILITE_COT, c.NOM_COT,  c.PRENOM_COT, c.NUM_PLAN, c.CSP,  c.SITUATION_FAMILIALE,  c.SITUATION_LOCATIVE, c.TOP_CIBLE,  c.COTISATION, c.COTISATION_2, c.CAPITAL,  c.PRIME_MOIS, c.PRIME_MOIS_2, c.PRIME_JOUR, c.PRIME_JOUR_2, c.COUVERTURE_1, c.COUVERTURE_2, c.COUVERTURE_5, c.DEST, c.Refappel, u.name as HOTESSE,    DATE_FORMAT( o.agent_start,  "%d/%m/%y" ) AS DateAppel, DATE_FORMAT( o.agent_start,  "%T" ) AS HeureAppel,  s.RefQualif,  s.RefCatg,  c.Newrib, c.BIC,  c.RecordFileName, c.PREUVE_SONORE_OUT,  s.Conclusion, s.MotifRefus, s.Lib_EI,c.id as ID,c.RefProspect,  c.NUM_CLIENT,   c.NUM_CLIENT2,  c.Refappel, c.phone_1 as Phone,c.NumAppel1,c.NumAppel2, s.text as qul,c.COUVERTURE_5,o.note,count(c.id) as nt,camp.name as CAMPAGNE,c.DETTE 
    FROM outgoing_calls o
    LEFT JOIN users u ON o.agent_id = u.id
    LEFT JOIN contacts c ON o.contact_id = c.id
    LEFT JOIN campaigns_2 camp ON camp.id = c.cid
    LEFT JOIN campaigns_status s ON o.status = s.num
    WHERE s.text IS NOT NULL AND camp.id = s.campaign_id and camp.comment="ADP" and c.NUM_PLAN="2112KG" AND c.id in ('.rtrim($t,",").') group by c.id order by count(c.id) desc' ;



    $sqlaca = 'SELECT c.id
    FROM outgoing_calls o
    LEFT JOIN users u ON o.agent_id = u.id
    LEFT JOIN contacts c ON o.contact_id = c.id
    LEFT JOIN campaigns_2 camp ON camp.id = c.cid
    LEFT JOIN campaigns_status s ON o.status = s.num
    WHERE s.text IS NOT NULL 
    AND camp.id = s.campaign_id and camp.comment="ADP" and c.NUM_PLAN="2112KG" and s.argued in (1) and DATE_FORMAT(o.agent_start , "%d/%m/%y")!="02/10/16"';

    foreach  ($bdd->query($sqlaca) as $row) { $tca = $tca .''. $row['id'].','; } ;

    $sqla2ca = 'SELECT c.id,c.RefProspect,  c.NumAppel1,  c.NUM_CLIENT, c.NUM_CLIENT2,  c.CIVILITE, c.lastname as NOM,  c.firstname as PRENOM,  c.ADR_ETAGE,  c.ADR_BATIMENT, c.ADR_RUE,  c.ADR_4,  c.ADR_CP, c.ADR_COMMUNE,  c.NAIS_EMP, c.AGE_EMP,  c.NAIS_CO_EMP,  c.AGE_CO_EMP, c.CIVILITE_COT, c.NOM_COT,  c.PRENOM_COT, c.NUM_PLAN, c.CSP,  c.SITUATION_FAMILIALE,  c.SITUATION_LOCATIVE, c.TOP_CIBLE,  c.COTISATION, c.COTISATION_2, c.CAPITAL,  c.PRIME_MOIS, c.PRIME_MOIS_2, c.PRIME_JOUR, c.PRIME_JOUR_2, c.COUVERTURE_1, c.COUVERTURE_2, c.COUVERTURE_5, c.DEST, c.Refappel, u.name as HOTESSE,    DATE_FORMAT( o.agent_start,  "%d/%m/%y" ) AS DateAppel, DATE_FORMAT( o.agent_start,  "%T" ) AS HeureAppel,  s.RefQualif,  s.RefCatg,  c.Newrib, c.BIC,  c.RecordFileName, c.PREUVE_SONORE_OUT,  s.Conclusion, s.MotifRefus, s.Lib_EI,c.id as ID,c.RefProspect,  c.NUM_CLIENT,   c.NUM_CLIENT2,  c.Refappel, c.phone_1 as Phone,c.NumAppel1,c.NumAppel2, s.text as qul,c.COUVERTURE_5,o.note,count(c.id) as nt,camp.name as CAMPAGNE,c.DETTE 
    FROM outgoing_calls o
    LEFT JOIN users u ON o.agent_id = u.id
    LEFT JOIN contacts c ON o.contact_id = c.id
    LEFT JOIN campaigns_2 camp ON camp.id = c.cid
    LEFT JOIN campaigns_status s ON o.status = s.num
    WHERE s.text IS NOT NULL AND camp.id = s.campaign_id and camp.comment="ADP" and c.NUM_PLAN="2112KG" AND c.id in ('.rtrim($tca,",").') group by c.id order by count(c.id) desc' ;


    $sqlarr = 'SELECT c.id
    FROM outgoing_calls o
    LEFT JOIN users u ON o.agent_id = u.id
    LEFT JOIN contacts c ON o.contact_id = c.id
    LEFT JOIN campaigns_2 camp ON camp.id = c.cid
    LEFT JOIN campaigns_status s ON o.status = s.num
    WHERE s.text IS NOT NULL 
    AND camp.id = s.campaign_id and camp.comment="ADP" and c.NUM_PLAN="2112KG" and s.MOTIFREFUS="Refus de répondre" and DATE_FORMAT(o.agent_start , "%d/%m/%y")!="02/10/16"';

    foreach  ($bdd->query($sqlarr) as $row) { $trr = $trr .''. $row['id'].','; } ;

    $sqla2rr = 'SELECT c.id,c.RefProspect,  c.NumAppel1,  c.NUM_CLIENT, c.NUM_CLIENT2,  c.CIVILITE, c.lastname as NOM,  c.firstname as PRENOM,  c.ADR_ETAGE,  c.ADR_BATIMENT, c.ADR_RUE,  c.ADR_4,  c.ADR_CP, c.ADR_COMMUNE,  c.NAIS_EMP, c.AGE_EMP,  c.NAIS_CO_EMP,  c.AGE_CO_EMP, c.CIVILITE_COT, c.NOM_COT,  c.PRENOM_COT, c.NUM_PLAN, c.CSP,  c.SITUATION_FAMILIALE,  c.SITUATION_LOCATIVE, c.TOP_CIBLE,  c.COTISATION, c.COTISATION_2, c.CAPITAL,  c.PRIME_MOIS, c.PRIME_MOIS_2, c.PRIME_JOUR, c.PRIME_JOUR_2, c.COUVERTURE_1, c.COUVERTURE_2, c.COUVERTURE_5, c.DEST, c.Refappel, u.name as HOTESSE,    DATE_FORMAT( o.agent_start,  "%d/%m/%y" ) AS DateAppel, DATE_FORMAT( o.agent_start,  "%T" ) AS HeureAppel,  s.RefQualif,  s.RefCatg,  c.Newrib, c.BIC,  c.RecordFileName, c.PREUVE_SONORE_OUT,  s.Conclusion, s.MotifRefus, s.Lib_EI,c.id as ID,c.RefProspect,  c.NUM_CLIENT,   c.NUM_CLIENT2,  c.Refappel, c.phone_1 as Phone,c.NumAppel1,c.NumAppel2, s.text as qul,c.COUVERTURE_5,o.note,count(c.id) as nt,camp.name as CAMPAGNE,c.DETTE 
    FROM outgoing_calls o
    LEFT JOIN users u ON o.agent_id = u.id
    LEFT JOIN contacts c ON o.contact_id = c.id
    LEFT JOIN campaigns_2 camp ON camp.id = c.cid
    LEFT JOIN campaigns_status s ON o.status = s.num
    WHERE s.text IS NOT NULL AND camp.id = s.campaign_id and camp.comment="ADP" and c.NUM_PLAN="2112KG" AND c.id in ('.rtrim($trr,",").') group by c.id order by count(c.id) desc' ;


    $sqlafx = 'SELECT c.id
    FROM outgoing_calls o
    LEFT JOIN users u ON o.agent_id = u.id
    LEFT JOIN contacts c ON o.contact_id = c.id
    LEFT JOIN campaigns_2 camp ON camp.id = c.cid
    LEFT JOIN campaigns_status s ON o.status = s.num
    WHERE s.text IS NOT NULL 
    AND camp.id = s.campaign_id and camp.comment="ADP" and c.NUM_PLAN="2112KG" and s.CONCLUSION="Faux Numero" and DATE_FORMAT(o.agent_start , "%d/%m/%y")!="02/10/16"';

    foreach  ($bdd->query($sqlafx) as $row) { $tfx = $tfx .''. $row['id'].','; } ;

    $sqla2fx = 'SELECT c.id,c.RefProspect,  c.NumAppel1,  c.NUM_CLIENT, c.NUM_CLIENT2,  c.CIVILITE, c.lastname as NOM,  c.firstname as PRENOM,  c.ADR_ETAGE,  c.ADR_BATIMENT, c.ADR_RUE,  c.ADR_4,  c.ADR_CP, c.ADR_COMMUNE,  c.NAIS_EMP, c.AGE_EMP,  c.NAIS_CO_EMP,  c.AGE_CO_EMP, c.CIVILITE_COT, c.NOM_COT,  c.PRENOM_COT, c.NUM_PLAN, c.CSP,  c.SITUATION_FAMILIALE,  c.SITUATION_LOCATIVE, c.TOP_CIBLE,  c.COTISATION, c.COTISATION_2, c.CAPITAL,  c.PRIME_MOIS, c.PRIME_MOIS_2, c.PRIME_JOUR, c.PRIME_JOUR_2, c.COUVERTURE_1, c.COUVERTURE_2, c.COUVERTURE_5, c.DEST, c.Refappel, u.name as HOTESSE,    DATE_FORMAT( o.agent_start,  "%d/%m/%y" ) AS DateAppel, DATE_FORMAT( o.agent_start,  "%T" ) AS HeureAppel,  s.RefQualif,  s.RefCatg,  c.Newrib, c.BIC,  c.RecordFileName, c.PREUVE_SONORE_OUT,  s.Conclusion, s.MotifRefus, s.Lib_EI,c.id as ID,c.RefProspect,  c.NUM_CLIENT,   c.NUM_CLIENT2,  c.Refappel, c.phone_1 as Phone,c.NumAppel1,c.NumAppel2, s.text as qul,c.COUVERTURE_5,o.note,count(c.id) as nt,camp.name as CAMPAGNE,c.DETTE 
    FROM outgoing_calls o
    LEFT JOIN users u ON o.agent_id = u.id
    LEFT JOIN contacts c ON o.contact_id = c.id
    LEFT JOIN campaigns_2 camp ON camp.id = c.cid
    LEFT JOIN campaigns_status s ON o.status = s.num
    WHERE s.text IS NOT NULL AND camp.id = s.campaign_id and camp.comment="ADP" and c.NUM_PLAN="2112KG" AND c.id in ('.rtrim($tfx,",").') group by c.id order by count(c.id) desc' ;
            
            
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
                            <strong class="card-title">Liste des tentatives d'appels par CA</strong>
                        </div>
                        <div class="card-body">

                        <?php
                                          
                 
                    foreach  ($bdd->query($sqla2) as $row) {
                                $cut = $cut + 1;
                                $CTALL = "SELECT count(*) as nb FROM `outgoing_calls` WHERE `contact_id`='".$row['ID']."' and caller_id!=''";
                                $TTALL = $cnx->query($CTALL);
                                $RTTFALL= $TTALL->fetch_assoc();

                                if ($RTTFALL['nb'] == 1) {
                                  $Q01 = $Q01 + 1;
                                }
                                if ($RTTFALL['nb'] == 2) {
                                  $Q02 = $Q02 + 1;
                                }
                                if ($RTTFALL['nb'] == 3) {
                                  $Q03 = $Q03 + 1;
                                }
                                if ($RTTFALL['nb'] == 4) {
                                  $Q04 = $Q04 + 1;
                                }
                                if ($RTTFALL['nb'] == 5) {
                                  $Q05 = $Q05 + 1;
                                }
                                if ($RTTFALL['nb'] == 6) {
                                  $Q06 = $Q06 + 1;
                                }
                                if ($RTTFALL['nb'] == 7) {
                                  $Q07 = $Q07 + 1;
                                }
                                if ($RTTFALL['nb'] == 8) {
                                  $Q08 = $Q08 + 1;
                                }
                                if ($RTTFALL['nb'] == 9) {
                                  $Q09 = $Q09 + 1;
                                }
                                if ($RTTFALL['nb'] == 10) {
                                  $Q10 = $Q10 + 1;
                                }
                                if ($RTTFALL['nb'] > 10) {
                                  $Q10p = $Q10p + 1;
                                }


                                $CTFIXE = "SELECT count(*) as nb FROM `outgoing_calls` WHERE `contact_id`='".$row['ID']."' and `caller_id`='0033".substr($row['NumAppel1'],1)."'";
                                $TTFIXE = $cnx->query($CTFIXE);
                                $RTTFIXE = $TTFIXE->fetch_assoc();

                                $CTFIXE = "SELECT count(*) as nb FROM `outgoing_calls` WHERE `contact_id`='".$row['ID']."' and `caller_id`='0033".substr($row['NumAppel2'],1)."'";
                                $TTGSM = $cnx->query($CTFIXE);
                                $RTTGSM = $TTGSM->fetch_assoc();
                                              }

                              


                                foreach  ($bdd->query($sqla2ca) as $row) {
                                $cutca = $cut + 1;
                                $CTALLca = "SELECT count(*) as nb FROM `outgoing_calls` WHERE `contact_id`='".$row['ID']."' and caller_id!=''";
                                $TTALLca = $cnx->query($CTALLca);
                                $RTTFALLca= $TTALLca->fetch_assoc();

                                if ($RTTFALLca['nb'] == 1) {
                                  $Q01ca = $Q01ca + 1;
                                }
                                if ($RTTFALLca['nb'] == 2) {
                                  $Q02ca = $Q02ca + 1;
                                }
                                if ($RTTFALLca['nb'] == 3) {
                                  $Q03ca = $Q03ca + 1;
                                }
                                if ($RTTFALLca['nb'] == 4) {
                                  $Q04ca = $Q04ca + 1;
                                }
                                if ($RTTFALLca['nb'] == 5) {
                                  $Q05ca = $Q05ca + 1;
                                }
                                if ($RTTFALLca['nb'] == 6) {
                                  $Q06ca = $Q06ca + 1;
                                }
                                if ($RTTFALLca['nb'] == 7) {
                                  $Q07ca = $Q07ca + 1;
                                }
                                if ($RTTFALLca['nb'] == 8) {
                                  $Q08ca = $Q08ca + 1;
                                }
                                if ($RTTFALLca['nb'] == 9) {
                                  $Q09ca = $Q09ca + 1;
                                }
                                if ($RTTFALLca['nb'] == 10) {
                                  $Q10ca = $Q10ca + 1;
                                }
                                if ($RTTFALLca['nb'] > 10) {
                                  $Q10pca = $Q10pca + 1;
                                }

                                $CTFIXEca = "SELECT count(*) as nb FROM `outgoing_calls` WHERE `contact_id`='".$row['ID']."' and `caller_id`='0033".substr($row['NumAppel1'],1)."'";
                                $TTFIXEca = $cnx->query($CTFIXEca);
                                $RTTFIXEca = $TTFIXEca->fetch_assoc();

                                $CTFIXEca = "SELECT count(*) as nb FROM `outgoing_calls` WHERE `contact_id`='".$row['ID']."' and `caller_id`='0033".substr($row['NumAppel2'],1)."'";
                                $TTGSMca = $cnx->query($CTFIXEca);
                                $RTTGSMca = $TTGSMca->fetch_assoc();
                                              }


                                foreach  ($bdd->query($sqla2rr) as $row) {
                                $cutrr = $cutrr + 1;
                                $CTALLrr = "SELECT count(*) as nb FROM `outgoing_calls` WHERE `contact_id`='".$row['ID']."' and caller_id!=''";
                                $TTALLrr = $cnx->query($CTALLrr);
                                $RTTFALLrr= $TTALLrr->fetch_assoc();

                                if ($RTTFALLrr['nb'] == 1) {
                                  $Q01rr = $Q01rr + 1;
                                }
                                if ($RTTFALLrr['nb'] == 2) {
                                  $Q02rr = $Q02rr + 1;
                                }
                                if ($RTTFALLrr['nb'] == 3) {
                                  $Q03rr = $Q03rr + 1;
                                }
                                if ($RTTFALLrr['nb'] == 4) {
                                  $Q04rr = $Q04rr + 1;
                                }
                                if ($RTTFALLrr['nb'] == 5) {
                                  $Q05rr = $Q05rr + 1;
                                }
                                if ($RTTFALLrr['nb'] == 6) {
                                  $Q06rr = $Q06rr + 1;
                                }
                                if ($RTTFALLrr['nb'] == 7) {
                                  $Q07rr = $Q07rr + 1;
                                }
                                if ($RTTFALLrr['nb'] == 8) {
                                  $Q08rr = $Q08rr + 1;
                                }
                                if ($RTTFALLrr['nb'] == 9) {
                                  $Q09rr = $Q09rr + 1;
                                }
                                if ($RTTFALLrr['nb'] == 10) {
                                  $Q10rr = $Q10rr + 1;
                                }
                                if ($RTTFALLrr['nb'] > 10) {
                                  $Q10prr = $Q10prr + 1;
                                }

                                $CTFIXErr = "SELECT count(*) as nb FROM `outgoing_calls` WHERE `contact_id`='".$row['ID']."' and `caller_id`='0033".substr($row['NumAppel1'],1)."'";
                                $TTFIXErr = $cnx->query($CTFIXErr);
                                $RTTFIXErr = $TTFIXEca->fetch_assoc();

                                $CTFIXErr = "SELECT count(*) as nb FROM `outgoing_calls` WHERE `contact_id`='".$row['ID']."' and `caller_id`='0033".substr($row['NumAppel2'],1)."'";
                                $TTGSMrr = $cnx->query($CTFIXErr);
                                $RTTGSMrr = $TTGSMca->fetch_assoc();
                                              }


                                 foreach  ($bdd->query($sqla2fx) as $row) {
                                $cutfx = $cutfx + 1;
                                $CTALLfx = "SELECT count(*) as nb FROM `outgoing_calls` WHERE `contact_id`='".$row['ID']."' and caller_id!=''";
                                $TTALLfx = $cnx->query($CTALLfx);
                                $RTTFALLfx= $TTALLfx->fetch_assoc();

                                if ($RTTFALLfx['nb'] == 1) {
                                  $Q01fx = $Q01fx + 1;
                                }
                                if ($RTTFALLfx['nb'] == 2) {
                                  $Q02fx = $Q02fx + 1;
                                }
                                if ($RTTFALLfx['nb'] == 3) {
                                  $Q03fx = $Q03fx + 1;
                                }
                                if ($RTTFALLfx['nb'] == 4) {
                                  $Q04fx = $Q04fx + 1;
                                }
                                if ($RTTFALLfx['nb'] == 5) {
                                  $Q05fx = $Q05fx + 1;
                                }
                                if ($RTTFALLfx['nb'] == 6) {
                                  $Q06fx = $Q06fx + 1;
                                }
                                if ($RTTFALLfx['nb'] == 7) {
                                  $Q07fx = $Q07fx + 1;
                                }
                                if ($RTTFALLfx['nb'] == 8) {
                                  $Q08fx = $Q08fx + 1;
                                }
                                if ($RTTFALLfx['nb'] == 9) {
                                  $Q09fx = $Q09fx + 1;
                                }
                                if ($RTTFALLfx['nb'] == 10) {
                                  $Q10fx = $Q10fx + 1;
                                }
                                if ($RTTFALLfx['nb'] > 10) {
                                  $Q10pfx = $Q10pfx + 1;
                                }

                                $CTFIXEfx = "SELECT count(*) as nb FROM `outgoing_calls` WHERE `contact_id`='".$row['ID']."' and `caller_id`='0033".substr($row['NumAppel1'],1)."'";
                                $TTFIXEfx = $cnx->query($CTFIXEfx);
                                $RTTFIXEfx = $TTFIXEfx->fetch_assoc();

                                $CTFIXEfx = "SELECT count(*) as nb FROM `outgoing_calls` WHERE `contact_id`='".$row['ID']."' and `caller_id`='0033".substr($row['NumAppel2'],1)."'";
                                $TTGSMfx = $cnx->query($CTFIXEfx);
                                $RTTGSMfx = $TTGSMfx->fetch_assoc();
                                              }

                                ?>
                                 
                                         <table class="table">
        <thead>
            <th>Tentative</th><th>C+</th><th>CA</th><th>RR</th><th>FX</th>
        </thead>
        <tbody>
          <tr>
            <td>1</td><td><?=$Q01?></td><td><?=$Q01ca?></td><td><?=$Q01rr?></td><td><?=$Q01fx?></td>
          </tr>
          <tr>
            <td>2</td><td><?=$Q02?></td><td><?=$Q02ca?></td><td><?=$Q02rr?></td><td><?=$Q02fx?></td>
          </tr>
          <tr>
            <td>3</td><td><?=$Q03?></td><td><?=$Q03ca?></td><td><?=$Q03rr?></td><td><?=$Q03fx?></td>
          </tr>
          <tr>
            <td>4</td><td><?=$Q04?></td><td><?=$Q04ca?></td><td><?=$Q04rr?></td><td><?=$Q04fx?></td>
          </tr>
          <tr>
            <td>5</td><td><?=$Q05?></td><td><?=$Q05ca?></td><td><?=$Q05rr?></td><td><?=$Q05fx?></td>
          </tr>
          <tr>
            <td>6</td><td><?=$Q06?></td><td><?=$Q06ca?></td><td><?=$Q06rr?></td><td><?=$Q06fx?></td>
          </tr>
          <tr>
            <td>7</td><td><?=$Q07?></td><td><?=$Q07ca?></td><td><?=$Q07rr?></td><td><?=$Q07fx?></td>
          </tr>
          <tr>
            <td>8</td><td><?=$Q08?></td><td><?=$Q08ca?></td><td><?=$Q08rr?></td><td><?=$Q08fx?></td>
          </tr>
          <tr>
            <td>9</td><td><?=$Q09?></td><td><?=$Q09ca?></td><td><?=$Q09rr?></td><td><?=$Q09fx?></td>
          </tr>
          <tr>
            <td>10</td><td><?=$Q10?></td><td><?=$Q10ca?></td><td><?=$Q10rr?></td><td><?=$Q10fx?></td>
          </tr>
          <tr>
            <td>Plus que 10</td><td><?=$Q10p?></td><td><?=$Q10pca?></td><td><?=$Q10prr?></td><td><?=$Q10pfx?></td>
          </tr>
        </tbody>
      </table> 
                              

  
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
    <div class="col-sm-12" >

      </h3>
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
