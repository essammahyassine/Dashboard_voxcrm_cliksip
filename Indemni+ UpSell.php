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
   
      if (isset($_POST['modifier'])) {

            $c = $_POST['idcont'];
            $CIVILITE = $_POST['CIVILITE'];
			
					 $NOM = $_POST['NOM'];
					  $PRENOM = $_POST['PRENOM'];
					   $NAIS_EMP = $_POST['NAIS_EMP'];
						$AGE_EMP = $_POST['AGE_EMP'];
						 $ADR_ETAGE = $_POST['ADR_ETAGE'];
						  $ADR_BATIMENT = $_POST['ADR_BATIMENT'];
						   $ADR_RUE = $_POST['ADR_RUE'];
							$ADR_4 = $_POST['ADR_4'];
							 $ADR_CP = $_POST['ADR_CP'];
							 $ADR_COMMUNE = $_POST['ADR_COMMUNE'];

            $queryexec = "UPDATE `contacts` SET `CIVILITE`='".$CIVILITE."',`ADR_COMMUNE`='".$ADR_COMMUNE."',`ADR_CP`='".$ADR_CP."',`ADR_4`='".$ADR_4."',`ADR_RUE`='".$ADR_RUE."',`ADR_BATIMENT`='".$ADR_BATIMENT."',`ADR_ETAGE`='".$ADR_ETAGE."',`AGE_EMP`='".$AGE_EMP."',`NAIS_EMP`='".$NAIS_EMP."',`firstname`='".$PRENOM."',`lastname`='".$NOM."' where id='".$c."'";
            $cnx->query($queryexec);

           /* $alert = '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Success</span>
                            Enregistrement validé avec succés.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                      </div>';
            $ok = 'ok';*/



        }

    if (isset($_POST['save'])) {

            $c = $_POST['idcont'];
            $r = $_POST['namerecord'];

            $queryexec = "UPDATE `contacts` SET `RecordFileName`='".$r."' where id='".$c."'";
            $cnx->query($queryexec);

            $alert = '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Success</span>
                            Enregistrement validé avec succés.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                      </div>';
            $ok = 'ok';



        }


    




        
        $idcont = $_GET['idcont'];

        $queryrec = "SELECT c.RefProspect,  c.NumAppel1,    c.NUM_CLIENT,   c.NUM_CLIENT2, c.ClientID, c.ClientID2,  c.CIVILITE, c.lastname as NOM,  c.firstname as PRENOM,  c.ADR_ETAGE,    c.ADR_BATIMENT, c.ADR_RUE,  c.ADR_4,    c.ADR_CP,   c.ADR_COMMUNE,  c.NAIS_EMP, c.AGE_EMP,  c.NAIS_CO_EMP,  c.AGE_CO_EMP,   c.CIVILITE_COT, c.NOM_COT,  c.PRENOM_COT,   c.NUM_PLAN, c.CSP,  c.SITUATION_FAMILIALE,  c.SITUATION_LOCATIVE,   c.TOP_CIBLE,    c.COTISATION,   c.COTISATION_2, c.CAPITAL,  c.PRIME_MOIS,   c.PRIME_MOIS_2, c.PRIME_JOUR,   c.PRIME_JOUR_2, c.COUVERTURE_1, c.COUVERTURE_2, c.COUVERTURE_5, c.DEST, c.Refappel, u.name as HOTESSE,    DATE_FORMAT( o.agent_start,  '%Y%m%d' ) AS DateAppel,   DATE_FORMAT( o.agent_start,  '%H%i%s' ) AS HeureAppel,  s.RefQualif,    s.RefCatg,  c.Newrib,   c.BIC,  c.RecordFileName,   c.PREUVE_SONORE_OUT,    s.Conclusion,   s.MotifRefus,   s.Lib_EI, c.MENS_VAL,c.DETTE,c.COUVERTURE_3,c.CAPITAL,o.monitor_filename as Link,o.note,c.phone_1 as TEL,c.ENSEIGNE
            FROM outgoing_calls o
            LEFT JOIN users u ON o.agent_id = u.id
            LEFT JOIN contacts c ON o.contact_id = c.id
            LEFT JOIN campaigns_2 camp ON camp.id = c.cid
            LEFT JOIN campaigns_status s ON o.status = s.num
            WHERE s.text IS NOT NULL 
            AND camp.id = s.campaign_id and s.positive=1  and c.id='".$idcont."'";


?>


        <!-- Left Panel -->

  <?php
       require_once('menu.php');
    ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
         <?php include 'Call_Option.php'; ?>
             
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Qualité</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right">
                    <div class="page-title">
                        <h1>Indemni+ Upsell</h1>
                    </div>
                </div>
            </div>
                    <?php
                                            
                            $resultcont = $cnx->query($queryrec);
                            while($rowcont = $resultcont->fetch_assoc()) 
                            {    
                                $rec = str_replace(".mp3",".wav",$rowcont['Link']);
                                $recname = 'KGLFICSON_14940_'.$rowcont['ClientID'].'_'.$rowcont['ClientID2'].'_'.$rowcont['DateAppel'].'_'.$rowcont['HeureAppel'].'.wav';
                    ?>

            <div class="col-sm-12 form-group">
                 <?php 
                      
                      if (!empty($alert)) {
                          
                          echo $alert;
                      }

                 ?>
            </div>        


            <div class="col-sm-12 form-group">
            <div class="col-sm-1">
                  <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal">Modifier</button>
            </div>
            
            <div class="col-sm-1">
            <form  method="post">
                <input type="hidden" name="idcont" value="<?=$idcont?>" >
                <input type="hidden" name="namerecord" value="<?=$recname?>">
                <button name="save" type="submit" class="btn btn-success btn-block">Valider</button>
                
                <a href="../record/monitor/voxcrm/<?=$rec?>" id="dn" download="<?=$recname?>"></a>
                
            </form>
             
            </div>

            <div class="col-sm-6">
                <audio controls autoplay controlsList="nodownload" id="myAudio" style="width: 100%">
                      <source src="../record/monitor/voxcrm/<?=$rec?>" type="audio/wav">
                      <source src="../record/monitor/voxcrm/<?=$rec?>" type="audio/wav">
                </audio>
                <button onclick="setPlaySpeed()" type="button" class="btn btn-success">x2</button>
                <button onclick="normal()" type="button" class="btn btn-success">normal</button>
            </div>
            <div class="col-sm-2">
                 Telephone : <?=$rowcont['TEL']?>
            </div>
            </div>
        </div>


        </header><!-- /header -->
        <!-- Header-->



        <div class="content mt-3" style="padding-top: 180px">




            <div >
                    <div style="text-align:center; background-color:#999900;color:white;padding:5px"><H2><CENTER>Indemni+ Upsell - Enregistrement</CENTER></H2></div>
                            </br>
                           
                            <div style="margin-left:50px;text-align:left">Commentaire :</br><textarea name="note" cols="60"  ><?=$rowcont['note']?></textarea></div>
                            </br>
                            <table>
                            <tr><td>

                            <h3 style="color:#0033CC;margin-left:40px">Cordonnées EUMPRUNTEUR :</h3></td>
                            
                            <td>
                            <h3 style="color:#0033CC;margin-left:40px">INFOS CREDITS :</h3></td>
                            </tr>
                            <TR><td>
                            <div style="margin-left:60px;margin-bottom:20px;border:2px solid #0033CC;padding:20px">
                            <div>Civilite : <b style="color:#0033CC;text-align:center"><?=$rowcont['CIVILITE']?></b></div> 
                            <div>Nom  : <b style="color:#0033CC;text-align:center"><?=$rowcont['NOM']?></b></div>
                            <div>Prenom : <b style="color:#0033CC;text-align:center"><?=$rowcont['PRENOM']?></b></div>
                            <div>Date naissance : <b style="color:#0033CC;text-align:center"><?=$rowcont['NAIS_EMP']?></b></div>
                            <div>Age : <b style="color:#0033CC;text-align:center"><?=$rowcont['AGE_EMP']?></b></div>
                            </div>
                            </td>
                    
                            <td>
                            <div style="margin-left:60px;margin-bottom:20px;border:2px solid #0033CC;padding:20px">
                            <div>Dette initiale : <b style="color:#990066;text-align:center"> <?=$rowcont['CAPITAL']?></b></div> 
                            <div>Capital restant dû :<b style="color:#990066;text-align:center"> <?=$rowcont['DETTE']?></b></div>
                            <div>Mensualités: <b style="color:#990066;text-align:center"> <?=$rowcont['MENS_VAL']?></b></div>
                            <div>Type crédit :<b style="color:#990066;text-align:center"> <?=$rowcont['CARTE']?></b></div>
                            <div>ADE :<b style="color:#990066;text-align:center"> <?=$rowcont['DATE_SOUSCRIPTION']?></b></div>
                            <div>Ancienneté client :<b style="color:#990066;text-align:center"> <?=$rowcont['COUVERTURE_3']?>  an(s) </b>
                            </div>
                            <div>Date d ouverture du compte :<b style="color:#990066;text-align:center"> <?=$rowcont['DATE_DERNIER_CREDIT']?></b></div>
                            <div>Enseigne : <?=$rowcont['ENSEIGNE']?></div>
                            </div>
                            </td>
                            </TR>
                            </table>

                            </br>
                                           <p><font face="verdana, arial, helvetica, sans-serif">Bonjour, Mr/Mme&nbsp;</font><span style="font-family: verdana, arial, helvetica, sans-serif; color: #0003ff;"><strong><b style="color:green"><?=$rowcont['CIVILITE']?> <?=$rowcont['NOM']?></b>,</strong></span></p> 
          </div> 
          <div> 
            <p><font face="verdana, arial, helvetica, sans-serif">Enchantée, je suis Sonia Bertier/Yanis Caron de Cofidis, je suis chargée de votre contrat Indemni+…</font> </p> 
          </div> 
          <div><font face="verdana, arial, helvetica, sans-serif">Vous savez, c’est la couverture qui garantit le versement d’une rente de <strong style="color: #0003ff;">450€</strong> pendant 6 mois en cas de perte d’emploi</font></div> 
          <div> 
            <p><font face="verdana, arial, helvetica, sans-serif">si vous êtes toujours en Cdi, c’est le cas ?</font> </p> 
          </div> 
          <div style="height: 200px;"> 
            <div style="float: left; width: 42%;"> 
              <p style="text-align: center;"><strong><font size="4" style="color: #016900;"> <font face="verdana, arial, helvetica, sans-serif">Si OUI</font></font></strong></p> 
              <p style="text-align: center;"><font face="verdana, arial, helvetica, sans-serif">et également en cas d’arrêt de travail suite à un accident ou une maladie soit un montant total de<strong style="color: #0003ff;"> </strong></font><span style="font-family: verdana, arial, helvetica, sans-serif; color: #0003ff;"><strong>2700€.</strong></span></p> 
            </div> 
            <div style="float: right; width: 42%;"> 
              <p style="text-align: center;"><strong style="text-align: center;"><font size="4" style="color: #ff0000;"> <font face="verdana, arial, helvetica, sans-serif">Si NON</font></font></strong></p> 
              <p style="text-align: center;"><font face="verdana, arial, helvetica, sans-serif">dans ce cas vous percevez cette rente en cas d’arrêt de travail suite à un accident ou une maladie&nbsp;</font><span style="font-family: verdana, arial, helvetica, sans-serif;">soit un total de&nbsp;</span><strong style="color: #0003ff; font-family: verdana, arial, helvetica, sans-serif;">2700€</strong><span style="font-family: verdana, arial, helvetica, sans-serif;">.</span></p> 
              <p style="text-align: center;"><br /></p> 
            </div> 
          </div> 
          <div><font face="verdana, arial, helvetica, sans-serif">En fait, on s’est aperçu qu’à cause de l’instabilité de la conjoncture actuelle, ce montant était trop faible et nous avons</font></div> 
          <div> 
            <p><font face="verdana, arial, helvetica, sans-serif">donc décidé de renforcer nos garanties pour que vous soyez plus tranquille en cas de souci et surtout que vous soyez&nbsp;</font><font face="verdana, arial, helvetica, sans-serif">mieux couvert.</font> </p> 
          </div> 
          <div><font face="verdana, arial, helvetica, sans-serif">D’ailleurs, depuis le début de l’année, tous les nouveaux clients bénéficient systématiquement de la nouvelle</font></div> 
          <div><font face="verdana, arial, helvetica, sans-serif">couverture, et nous contactons tous nos anciens clients pour qu’ils puissent, eux aussi, en profiter.</font></div> 
          <div> 
            <p><font face="verdana, arial, helvetica, sans-serif">Vous y avez droit comme tout le monde !</font> </p> 
          </div> 
          <div><font face="verdana, arial, helvetica, sans-serif">Concrètement cela veut dire que pour seulement <strong style="color: #0003ff;">4€</strong> de complément mensuel vous passez de <strong style="color: #0003ff;">450€</strong> de rente à <strong style="color: #0003ff;">600€</strong> de</font></div> 
          <div> 
            <p><font face="verdana, arial, helvetica, sans-serif">rente mensuelle pendant 6 mois soit d’un total de <span style="color: #0003ff;"><strong>2700€</strong></span> à <strong style="color: #0003ff;">3600€</strong> pour seulement <strong style="color: #0003ff;">4€</strong> de complément !</font> </p> 
          </div> 
          <div> 
            <p><font face="verdana, arial, helvetica, sans-serif">Donc si je résume, vous conservez tous les avantages de la garantie à savoir :</font> </p> 
          </div> 
          <div> 
            <div style="height: 200px;"> 
              <div style="float: left; width: 42%;"> 
                <p style="text-align: center;"><span style="color: #ffaa00;"><strong><font size="4"><font face="verdana, arial, helvetica, sans-serif">CDI</font></font></strong></span></p> 
                <p style="text-align: center;"><font face="verdana, arial, helvetica, sans-serif">- Une rente de <strong style="color: #0003ff;">600€ </strong>versée en cas de perte d’emploi&nbsp; et en cas d’arrêt de travail suite à un accident ou une maladie.</font></p> 
              </div> 
              <div style="float: right; width: 42%;"> 
                <p style="text-align: center;"><strong style="color: #ffaa00;"><font size="4"><font face="verdana, arial, helvetica, sans-serif">PAS CDI</font></font></strong></p> 
                <p style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">- Une rente de <strong style="color: #0003ff;">600€ </strong>versée en cas d’arrêt de travail suite à un accident ou une maladie.</font></p> 
              </div> 
            </div> 
            <p> </p> 
          </div> 
          <div><font face="verdana, arial, helvetica, sans-serif">Ce qui nous fait donc un montant total de <strong style="color: #0003ff;">3600€ </strong>en lieu et place de <strong style="color: #0003ff;">2700€</strong> sur une période de 6 mois toujours pour un</font></div> 
          <div> 
            <p><font face="verdana, arial, helvetica, sans-serif">complément de seulement <strong style="color: #0003ff;">4€</strong> soit <strong style="color: #0003ff;">16€</strong>/ mois au total.</font> </p> 
          </div> 
          <div> 
            <p><font face="verdana, arial, helvetica, sans-serif">Avant de vous en faire profiter, je voulais tout simplement m’assurer de votre accord…</font> </p> 
          </div> 
          <div> 
            <p><strong style="color: #0003ff;"><font face="verdana, arial, helvetica, sans-serif">OUI</font> </strong></p> 
          </div> 
          <div><font face="verdana, arial, helvetica, sans-serif">Parfait, donc comme la dernière fois nous allons procéder à un enregistrement téléphonique qui dure 2 à 3 minutes et</font></div> 
          <div> 
            <p><font face="verdana, arial, helvetica, sans-serif">ensuite vous recevrez une confirmation à la maison, d’accord ?</font> </p> 
          </div> 
          <div> 
            <p><strong style="color: #0003ff;"><font face="verdana, arial, helvetica, sans-serif">OUI</font> </strong></p> 
          </div> 
          <div><font face="verdana, arial, helvetica, sans-serif">Ne soyez pas surpris(e), nous allons procéder pendant cet enregistrement à la résiliation de votre contrat actuel pour</font></div> 
          <div><font face="verdana, arial, helvetica, sans-serif">vous faire profiter des nouvelles couvertures comme ça en plus vous avez de nouveau le 1 er mois gratuit ! (1’40)</font></div>
                            
                                </br>


<div style="text-align: center; background-color: #999900; padding: 5px; color: white;"> 
    <p> <strong><font face="verdana, arial, helvetica, sans-serif" size="5">Enregistrement</font></strong></p> 
  </div> 
  <p> </p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Très bien M/Mme&nbsp;</font><strong style="font-family: verdana, arial, helvetica, sans-serif; text-align: justify; color: #0003ff;"><b style="color:green"><?=$rowcont['CIVILITE']?> <?=$rowcont['NOM']?></b></strong><span style="font-family: verdana, arial, helvetica, sans-serif;">, l’enregistrement
vient de débuter, je suis </span><span style="font-family: verdana, arial, helvetica, sans-serif; color: red;">donc Sonia Bertier/Yanis
Caron de COFIDIS</span><span style="font-family: verdana, arial, helvetica, sans-serif;">, courtier en assurance qui vous propose le contrat d’assurance
<strong style="color: #0003ff;">INDEMNI+</strong> assuré auprès de <strong style="color: #0003ff;">SERENIS ASSURANCES.?</strong></span></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Comme convenu, nous allons renforcer
les garanties de votre contrat Indémni+ actuel et passer de <strong style="color: #0003ff;">450€</strong> de rente à <strong style="color: #0003ff;">600€</strong>
de rente mensuelle pour seulement <strong style="color: #0003ff;">4€</strong> de complément mensuel. </font></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Pour ce faire, vous nous
autorisez à procéder à la résiliation&nbsp;de votre contrat actuel ?</font></p> 
  <p class="MsoNormal" style="text-align: left;"><strong><span style="color: #70ad47;"><font face="verdana, arial, helvetica, sans-serif">Obtenir un OUI<o:p /></font></span></strong></p> 
  <p class="MsoNormal" style="text-align: left;"><strong><span style="color: red;"><font face="verdana, arial, helvetica, sans-serif">Parfait, cet enregistrement téléphonique
servira de preuve de votre souscription.<o:p /></font></span></strong></p> 
  <p class="MsoNormal" style="text-align: left;"><strong><span style="color: red;"><font face="verdana, arial, helvetica, sans-serif">Les
informations que je vais collecter seront traitées par COFIDIS et Sérénis
Assurances aux fins d'exécution du contrat et d'exploitation commerciale. Bien
entendu, vous disposez notamment, s’agissant de vos données personnelles, d’un
droit d’accès, de mise à jour, de rectification et d’opposition. Vous pouvez
exercer ces droits en adressant un courrier simple à SERENIS Assurances, comme
précisé dans la notice d’information, qui vous apportera également de plus
amples renseignements quant à l’utilisation de vos données personnelles<o:p /></font></span></strong></p> 
  <p class="MsoNormal" style="text-align: left;"><strong><span style="color: red;"><font face="verdana, arial, helvetica, sans-serif">Consentez-vous
à ce que vos données personnelles, en particulier celles concernant votre
santé, soient traitées en vue de l'établissement, de la gestion et de
l'exécution de votre contrat ? <o:p /></font></span></strong></p> 
  <p class="MsoNormal" style="text-align: left;"><strong><span style="color: #70ad47;"><font face="verdana, arial, helvetica, sans-serif">Obtenir un OUI<span class="msoIns"><ins cite="mailto:SCHUTT%20H%C3%A9l%C3%A9ne" datetime="2018-06-01T15:26"><o:p /></ins></span></font></span></strong></p> 
  <p class="MsoNormal" style="text-align: left;"><strong><span style="font-size: 12pt; line-height: 107%;"><font face="verdana, arial, helvetica, sans-serif"><span style="color: #ff0000;"><span class="msoIns"><ins cite="mailto:SCHUTT%20H%C3%A9l%C3%A9ne" datetime="2018-06-01T15:53">Me permettez-vous de vous rappeler de manière
simplifiée en quoi </ins></span><span class="msoIns"><ins cite="mailto:SCHUTT%20H%C3%A9l%C3%A9ne" datetime="2018-06-01T15:54">l’assurance</ins></span></span><span class="msoIns"><ins cite="mailto:SCHUTT%20H%C3%A9l%C3%A9ne" datetime="2018-06-01T15:53"><span style="color: #ff0000;">
consiste&nbsp;?&nbsp;</span><span style="color: darkblue;"><o:p /></span></ins></span></font></span></strong></p> 
  <p class="MsoNormal" style="text-align: left;"><strong><span style="color: #70ad47;"><span class="msoIns"><ins cite="mailto:SCHUTT%20H%C3%A9l%C3%A9ne" datetime="2018-06-01T15:54"><font face="verdana, arial, helvetica, sans-serif">Obtenir un OUI<o:p /></font></ins></span></span></strong></p> 
  <div style="height: 300px;"> 
    <div style="float: left; width: 42%;"> 
      <h2 style="background-color: #f0ffff; color: orange; text-align: center;"><font face="verdana, arial, helvetica, sans-serif">CDI</font></h2> 
      <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Je vous rappelle que le nouveau contrat
Indémni+ vous permet de percevoir une rente de <strong style="color: #0003ff;">600€</strong>/mois pendant une période de
6 mois en cas :</font></p> 
      <p class="MsoListParagraphCxSpFirst" style="text-align: left; text-indent: -18pt;"> </p> 
      <ul> 
        <li><span style="font-family: verdana, arial, helvetica, sans-serif; text-indent: -18pt; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal;"> </span><span style="font-family: verdana, arial, helvetica, sans-serif; text-indent: -18pt;">De perte d’emploi
consécutive à un licenciement, (uniquement pour les clients en CDI)</span></li> 
        <li><span style="font-family: verdana, arial, helvetica, sans-serif; text-indent: -18pt; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal;"> </span><span dir="ltr" style="font-family: verdana, arial, helvetica, sans-serif; text-indent: -18pt;"></span><span style="font-family: verdana, arial, helvetica, sans-serif; text-indent: -18pt;">D’arrêt de travail suite à
un accident ou une maladie</span></li> 
      </ul> 
    </div> 
    <div style="float: right; width: 42%;"> 
      <h2 style="background-color: #f0ffff; color: orange; text-align: center;"><font face="verdana, arial, helvetica, sans-serif">PAS CDI</font></h2> 
      <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Je vous rappelle que le nouveau contrat
Indémni+ vous permet de percevoir une rente de <strong style="color: #0003ff;">600€</strong>/mois pendant une période de
6 mois en cas :</font></p> 
      <ul> 
        <li><span style="font-family: verdana, arial, helvetica, sans-serif; text-indent: -18pt; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal;"> </span><span dir="ltr" style="font-family: verdana, arial, helvetica, sans-serif; text-indent: -18pt;"></span><span style="font-family: verdana, arial, helvetica, sans-serif; text-indent: -18pt;">D’arrêt de travail suite à
un accident ou une maladie</span></li> 
      </ul> 
    </div> 
  </div> <strong style="text-indent: -18pt;"><span style="font-size: 12pt; color: darkblue;"><span class="msoIns"><ins cite="mailto:SCHUTT%20H%C3%A9l%C3%A9ne" datetime="2018-06-01T17:31"><font face="verdana, arial, helvetica, sans-serif">qui prend fin à la
date de reprise de travail et/ou d'une activité professionnelle rémunérée et au
plus tard après 6 mois d'indemnisation.</font></ins></span></span></strong> 
  <p> </p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Très bien&nbsp;</font><strong style="font-family: verdana, arial, helvetica, sans-serif; text-align: justify; color: #0003ff;"><b style="color:green"><?=$rowcont['CIVILITE']?> <?=$rowcont['NOM']?></b></strong><font face="verdana, arial, helvetica, sans-serif">, nous
allons donc procéder à la résiliation de votre contrat actuel. Vous allez
recevoir un <strong>certificat d’adhésion, ainsi que la notice d’information</strong>,
mentionnant le montant de votre nouvelle cotisation et le montant de vos
nouvelles garanties. </font></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Est-ce clair pour vous&nbsp;</font><strong style="font-family: verdana, arial, helvetica, sans-serif; text-align: justify; color: #0003ff;"><b style="color:green"><?=$rowcont['CIVILITE']?> <?=$rowcont['NOM']?></b>&nbsp;</strong><font face="verdana, arial, helvetica, sans-serif">?</font></p> 
  <p class="MsoNormal" style="text-align: left;"><strong><span style="color: #70ad47;"><font face="verdana, arial, helvetica, sans-serif">Obtenir un OUI<o:p /></font></span></strong></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Vous confirmez&nbsp;?</font></p> 
  <p class="MsoNormal" style="text-align: left;"><strong><span style="color: #70ad47;"><font face="verdana, arial, helvetica, sans-serif">Obtenir un OUI<o:p /></font></span></strong></p> 
  <div style="height: 600px;"> 
    <div style="float: left; width: 42%; padding: 30px; text-align: left; background-color: #f0ffff;"> 
      <h2 style="background-color: #f0ffff; color: orange; text-align: center;"><font face="verdana, arial, helvetica, sans-serif">CDI</font></h2> 
      <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Je vous rappelle que vous
bénéficiez de la garantie arrêt de travail dès lors que vous :</font></p> 
      <ul type="disc"> 
        <li class="MsoNormal" style="text-align: left; line-height: normal;"><strong><font face="verdana, arial, helvetica, sans-serif">êtes âgé(e) de moins de 59 ans,<o:p /></font></strong></li> 
        <li class="MsoNormal" style="text-align: left; line-height: normal;"><strong><font face="verdana, arial, helvetica, sans-serif">avez votre résidence principale et fiscale en France, exercez une
     activité professionnelle rémunérée (salariée ou non) en France
     métropolitaine ou dans un pays limitrophe,<o:p /></font></strong></li> 
        <li class="MsoNormal" style="text-align: left; line-height: normal;"><strong><font face="verdana, arial, helvetica, sans-serif">n'êtes pas en arrêt de travail pour raison de santé et que vous ne
     l'avez pas été pendant plus de 30 jours consécutifs depuis 1 an,<o:p /></font></strong></li> 
        <li class="MsoNormal" style="text-align: left; line-height: normal;"><strong><font face="verdana, arial, helvetica, sans-serif">n'êtes pas titulaire d'une rente ou d'une pension d'invalidité,<o:p /></font></strong></li> 
        <li class="MsoNormal" style="text-align: left; line-height: normal;"><strong><font face="verdana, arial, helvetica, sans-serif">n'êtes pas exonéré(e) du ticket modérateur pour raison de santé (ALD),<o:p /></font></strong></li> 
      </ul> 
      <p class="MsoNormal" style="text-align: left; margin-bottom: 0.0001pt; line-height: normal;"><strong><font face="verdana, arial, helvetica, sans-serif">Vous bénéficiez aussi de la garantie Chômage dès lors que vous:<o:p /></font></strong></p> 
      <ul type="disc"> 
        <li class="MsoNormal" style="text-align: left; line-height: normal;"><strong><font face="verdana, arial, helvetica, sans-serif">occupez un emploi salarié dans le cadre d'un contrat à durée
     indéterminée<o:p /></font></strong></li> 
        <li class="MsoNormal" style="text-align: left; line-height: normal;"><strong><font face="verdana, arial, helvetica, sans-serif">n'êtes pas au chômage, en préavis de licenciement ou de démission, en
     préretraite ou à la retraite, ou en période d'essai<o:p /></font></strong></li> 
      </ul> 
    </div> 
    <div style="float: right; width: 42%; padding: 30px; text-align: left; background-color: #f0ffff;"> 
      <h2 style="background-color: #f0ffff; color: orange; text-align: center;"><font face="verdana, arial, helvetica, sans-serif">PAS CDI</font></h2> 
      <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Je vous rappelle que vous
bénéficiez de la garantie arrêt de travail dès lors que vous :</font></p> 
      <ul type="disc"> 
        <li class="MsoNormal" style="text-align: left; line-height: normal;"><strong><font face="verdana, arial, helvetica, sans-serif">êtes âgé(e) de moins de 59 ans,<o:p /></font></strong></li> 
        <li class="MsoNormal" style="text-align: left; line-height: normal;"><strong><font face="verdana, arial, helvetica, sans-serif">avez votre résidence principale et fiscale en France, exercez une
     activité professionnelle rémunérée (salariée ou non) en France
     métropolitaine ou dans un pays limitrophe,<o:p /></font></strong></li> 
        <li class="MsoNormal" style="text-align: left; line-height: normal;"><strong><font face="verdana, arial, helvetica, sans-serif">n'êtes pas en arrêt de travail pour raison de santé et que vous ne
     l'avez pas été pendant plus de 30 jours consécutifs depuis 1 an,<o:p /></font></strong></li> 
        <li class="MsoNormal" style="text-align: left; line-height: normal;"><strong><font face="verdana, arial, helvetica, sans-serif">n'êtes pas titulaire d'une rente ou d'une pension d'invalidité,<o:p /></font></strong></li> 
        <li class="MsoNormal" style="text-align: left; line-height: normal;"><strong><font face="verdana, arial, helvetica, sans-serif">n'êtes pas exonéré(e) du ticket modérateur pour raison de santé (ALD),<o:p /></font></strong></li> 
      </ul> 
    </div> 
  </div> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Vous pouvez me confirmer&nbsp;que
c’est bien votre cas&nbsp;?<o:p /></font></p> 
  <p class="MsoNormal" style="text-align: left;"><strong><font face="verdana, arial, helvetica, sans-serif"><span style="color: #70ad47;">Obtenir un OUI</span><o:p /></font></strong></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">A la suite de cet enregistrement,
nous allons vous adresser de nouveau la Notice d’information comportant
l’ensemble des conditions contractuelles. </font></p> 
  <p class="MsoNormal" style="text-align: left;"><strong><font face="verdana, arial, helvetica, sans-serif">Bien
sûr, il y a des conditions, limites et exclusions qui figurent dans les
Conditions Générales d'assurance valant Notice d'information qui sont en votre
possession depuis votre souscription au contrat Indémni+. <span class="msoIns"><ins cite="mailto:SCHUTT%20H%C3%A9l%C3%A9ne" datetime="2018-05-31T16:51"><o:p /></ins></span></font></strong></p> 
  <p class="MsoNormal" style="text-align: left;"><strong><font face="verdana, arial, helvetica, sans-serif"><span class="msoIns"><ins cite="mailto:SCHUTT%20H%C3%A9l%C3%A9ne" datetime="2018-05-31T16:51">Je
me permets de vous les rappeler</ins></span><span class="msoIns"><ins cite="mailto:SCHUTT%20H%C3%A9l%C3%A9ne" datetime="2018-05-31T16:53"> que ces exclusions
sont notamment</ins></span><span class="msoIns"><ins cite="mailto:SCHUTT%20H%C3%A9l%C3%A9ne" datetime="2018-05-31T16:52"> </ins></span><span class="msoIns"><ins cite="mailto:SCHUTT%20H%C3%A9l%C3%A9ne" datetime="2018-05-31T16:51">:</ins></span><span class="msoIns"><ins cite="mailto:SCHUTT%20H%C3%A9l%C3%A9ne" datetime="2018-05-31T16:52"><o:p /></ins></span></font></strong></p> 
  <p class="MsoNormal" style="text-align: left; line-height: normal;"><strong><span style="font-size: 12pt; color: darkblue;"><font face="verdana, arial, helvetica, sans-serif"><span class="msoIns"><ins cite="mailto:SCHUTT%20H%C3%A9l%C3%A9ne" datetime="2018-05-31T16:52">Pour les arrêts de travail&nbsp;: les affections
cervico-dorso-lombaires, psychiatriques, psychiques ou </ins></span>neuropsychiques<a name="_GoBack"></a><span class="msoIns"><ins cite="mailto:SCHUTT%20H%C3%A9l%C3%A9ne" datetime="2018-05-31T16:52">, les états dépressifs quelle que soit leur nature
et la fibromyalgie. Les affections suivantes connues de l’assuré au moment de
l’adhésion&nbsp;: hypertension, diabète, asthme, tumeurs malignes. Les
sinistres survenus sous l’emprise de l’alcool ou suite à l’usage de la drogue.<o:p /></ins></span></font></span></strong></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif"><strong><span style="font-size: 12pt; line-height: 107%; color: darkblue;"><span class="msoIns"><ins cite="mailto:SCHUTT%20H%C3%A9l%C3%A9ne" datetime="2018-05-31T16:52">Et pour la garantie Perte d’emploi&nbsp;: le
licenciement pour faute grave ou lourde ou encore le licenciement par un membre
de la famille. Je vous invite à les consulter dans la Notice d'information de
l'assurance que je vais vous envoyer.</ins></span></span></strong><strong><span class="msoIns"><ins cite="mailto:SCHUTT%20H%C3%A9l%C3%A9ne" datetime="2018-05-31T16:52"><o:p /></ins></span></strong></font></p> 
  <p class="MsoNormal" style="text-align: left;"><strong><font face="verdana, arial, helvetica, sans-serif">Je
vous invite à les consulter à nouveau.<o:p /></font></strong></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">D’accord&nbsp;?</font></p> 
  <p class="MsoNormal" style="text-align: left;"><strong><span style="color: #70ad47;"><font face="verdana, arial, helvetica, sans-serif">Obtenir un OUI<o:p /></font></span></strong></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Bien, comme vous me l’avez
confirmé au début de notre entretien téléphonique :</font></p> 
  <p class="MsoNormal" style="text-align: justify;"><em><font face="verdana, arial, helvetica, sans-serif">Vous êtes bien : </font></em></p> 
                                
                            </br>
                            <table style="text-align:left;margin-left:50px"> 
                            <tr>
                            <td><b>titre :</b> </td><td> <input type="text" name="CIVILITE" value="<?=$rowcont['CIVILITE']?>" style="width:500px"></td>
                            </tr>
                            <tr>
                            <td><b>Nom :</b> </td><td><input type="text" name="NOM" value="<?=$rowcont['NOM']?>" style="width:500px"></td>
                            </tr>
                            <tr>
                            <td><b>Prenom :</b> </td><td><input type="text" name="PRENOM" value="<?=$rowcont['PRENOM']?>" style="width:500px"></td>
                            </tr>
                            </table> 
                            <div style="text-align:left;margin-left:50px">
                            <b>• Vous êtes bien né(e) le : </b></div></br>
                            <table style="text-align:left;margin-left:50px"> 
                            <tr>
                            <td><b>Date Naissance :</b></td> <td><input type="text" name="NAIS_EMP" value="<?=$rowcont['NAIS_EMP']?>"></td>
                            </tr>
                            <tr>
                            <td><b>Age :</b></td> <td><input type="text" name="AGE_EMP" value="<?=$rowcont['AGE_EMP']?>"></td>
                            </tr>
                            </table>
                            </br>
                            <div style="text-align:left;margin-left:50px">
                            <b>• Vous habitez bien :</b></div></br>
                            <table style="text-align:left;margin-left:50px"> 
                            <tr>
                            <td><b>Adresse etage :</b></td> <td><input type="text" name="ADR_ETAGE" value="<?=$rowcont['ADR_ETAGE']?>" style="width:500px"></td>
                            </tr>
                            <tr>
                            <td><b>adresse batimant :</b></td> <td><input type="text" name="ADR_BATIMENT" value="<?=$rowcont['ADR_BATIMENT']?>" style="width:500px"></td>
                            </tr>
                            <tr>
                            <td><b>adresse rue :</b></td> <td><input type="text" name="ADR_RUE" value="<?=$rowcont['ADR_RUE']?>" style="width:500px"></td>
                            </tr>
                            <tr>
                            <td><b>Adresse 4 :</b></td> <td><input type="text" name="ADR_4" value="<?=$rowcont['ADR_4']?>" style="width:500px"></td>
                            </tr>
                            <tr>
                            <td><b>Code postal :</b></td> <td><input type="text" name="ADR_CP" value="<?=$rowcont['ADR_CP']?>" style="width:500px"></td>
                            </tr>
                            <tr>
                            <td><b>Adresse commune :</b></td> <td><input type="text" name="ADR_COMMUNE" value="<?=$rowcont['ADR_COMMUNE']?>" style="width:500px"></td>
                            </tr>
                            </table>
  <!-- __________________________________________________________________________________________________________________________________________________________________________________-->
 <div class="modal  fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <form method="POST" >
		<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
           <input type="hidden" name="idcont" value="<?=$idcont?>" >
		<div class="form-group">
		  <label for="usr">civilité:</label>
		  <input type="" class="form-control" value="<?=$rowcont['CIVILITE']?>" name="CIVILITE">
		</div>
		<div class="form-group">
		  <label for="usr">Nom:</label>
		  <input type="text" class="form-control"  value="<?=$rowcont['NOM']?>" name="NOM">
		</div>
		<div class="form-group">
		  <label for="usr">Prenom:</label>
		  <input type="text" class="form-control" value="<?=$rowcont['PRENOM']?>" name="PRENOM" >
		</div>
		<div class="form-group">
		  <label for="usr">Date naissance:</label>
		  <input type="text" class="form-control" value="<?=$rowcont['NAIS_EMP']?>" name="NAIS_EMP">
		</div>
		<div class="form-group">
		  <label for="usr">Age :</label>
		  <input type="text" class="form-control" name="AGE_EMP" value="<?=$rowcont['AGE_EMP']?>" >
		</div>
		<div class="form-group">
		  <label for="usr">Adresse etage:</label>
		  <input type="text" class="form-control" name="ADR_ETAGE" value="<?=$rowcont['ADR_ETAGE']?>"  >
		</div>
		<div class="form-group">
		  <label for="usr">Adresse rue :</label>
		  <input type="text" class="form-control" name="ADR_RUE" value="<?=$rowcont['ADR_RUE']?>"  >
		</div>
		<div class="form-group">
		  <label for="usr">Adresse 4 :</label>
		  <input type="text" class="form-control" name="ADR_4" value="<?=$rowcont['ADR_4']?>">
		</div>
		<div class="form-group">
		  <label for="usr">Code postale :</label>
		  <input type="text" class="form-control" name="ADR_CP" value="<?=$rowcont['ADR_CP']?>" >
		</div>
		<div class="form-group">
		  <label for="usr">Commune :</label>
		  <input type="text" class="form-control" name="ADR_COMMUNE" value="<?=$rowcont['ADR_COMMUNE']?>"  >
		</div>
        </div>
		
        <div class="modal-footer">
		 <button type="submit" name="modifier" class="btn btn-success" >Modifer</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
		</form>
      </div>
      
    </div>
  </div>
    <!-- __________________________________________________________________________________________________________________________________________________________________________________-->
                            </br>

                                <p> <em><font face="verdana, arial, helvetica, sans-serif"><strong><span style="color: #70ad47;">Obtenir un OUI</span></strong></font></em></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Le montant de la cotisation
mensuelle est de <strong><span style="color: #0003ff;">16€</span> pour le versement d’une rente mensuelle de <span style="color: #0003ff;">600€</span>/mois
pendant 6 mois</strong>. </font></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Je vous confirme que les
nouvelles garanties de votre contrat INDEMNI+ sont effectives dès la fin de cet
enregistrement et je vous rappelle que nous avons le plaisir de vous offrir le1<sup>er</sup>mois
de cotisation.</font></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Nous sommes d’accord&nbsp;?</font></p> 
  <p class="MsoNormal" style="text-align: left;"><strong><span style="color: #70ad47;"><font face="verdana, arial, helvetica, sans-serif">Obtenir un OUI<o:p /></font></span></strong></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Le contrat Indémni+ est un contrat
annuel à tacite reconduction mais que vous pouvez résilier à tout moment. </font></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Vous me confirmez que vous
souhaitez bénéficier dès à présent de la couverture tout en conservant votre
droit de renonciation de 14 jours à réception de la notice d’information,vous
confirmez&nbsp;?</font></p> 
  <p class="MsoNormal" style="text-align: left;"><strong><span style="color: #70ad47;"><font face="verdana, arial, helvetica, sans-serif">Obtenir un OUI<o:p /></font></span></strong></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">En cas de besoin, la renonciation
peut être exercée par lettre recommandée adressée à COFIDIS Parc de la Haute
Borne à Villeneuve d’Ascq.<strong><span style="color: #70ad47;"><o:p /></span></strong></font></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Très bien Mr&nbsp;</font><strong style="font-family: verdana, arial, helvetica, sans-serif; text-align: justify; color: #0003ff;"><b style="color:green"><?=$rowcont['CIVILITE']?> <?=$rowcont['NOM']?></b></strong><font face="verdana, arial, helvetica, sans-serif">, vous acceptez donc
que la cotisation mensuelle de <strong><span style="color: #0003ff;">16€</span> </strong>soit automatiquement prélevée par
Serenis Assurance sur votre compte bancaire connu chez Cofidis, vous confirmez ?</font></p> 
  <p class="MsoNormal" style="text-align: left;"><strong><span style="color: #70ad47;"><font face="verdana, arial, helvetica, sans-serif">Obtenir un OUI<o:p /></font></span></strong></p> 
  <p class="MsoNormal" style="text-align: left;"><em><font face="verdana, arial, helvetica, sans-serif">Validation du compte existant ou saisie d’un autre RIB<o:p /></font></em></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Parfait, je vous informe que
votre accord vaut mandat de prélèvement. La référence unique du mandat vous
sera confirmée lors de l’envoi du certificat d’adhésion. </font></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Je vous fais donc parvenir le
certificat d’adhésion et la notice d’information, que je vous invite à consulter.</font></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Souhaitez-vous en savoir plus
notamment sur notre Assureur, l’Autorité de Contrôle de l’assureur, la loi et
la langue applicables au contrat ainsi que le fonctionnement des réclamationsou
bien les informations déjà fournies vous semblent suffisantes ?</font></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif"><strong><span style="color: #70ad47;">SI BESOIN DE PLUS
D’INFORMATIONS&nbsp;</span></strong>à
réponse aux demandes d’informations Il faut renvoyer aux slides avec les
renseignements dont le RCS de l’assureur à ajouter: RCS Romans 350 838 686</font></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif"><strong><span style="color: #70ad47;">SI NON</span></strong></font></p> 
  <p class="MsoNormal" style="text-align: left;"><font face="verdana, arial, helvetica, sans-serif">Très bien, M&nbsp;</font><strong style="font-family: verdana, arial, helvetica, sans-serif; text-align: justify; color: #0003ff;"><b style="color:green"><?=$rowcont['CIVILITE']?> <?=$rowcont['NOM']?></b></strong><font face="verdana, arial, helvetica, sans-serif">, il ne me reste
qu’à vous remercier pour le temps et la confiance que vous m’avez accordés et
je vous souhaite une excellente journée de la part de Cofidis. (3’)</font></p> 
  <p class="MsoNormal" style="text-align: left;"><o:p><font face="verdana, arial, helvetica, sans-serif"> </font></o:p></p>

                        <?php
                            }

                        ?>
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
<script>
    var x = document.getElementById("myAudio");

    function getPlaySpeed() { 
        alert(x.playbackRate);
    } 

    function setPlaySpeed() { 
        x.playbackRate = 2;
    } 
    function normal() { 
        x.playbackRate = 1;
    } 
    </script>
    <?php
            if ($ok=='ok') {

            echo '<script>document.getElementById("dn").click();</script>';
            echo '<script>window.location="https://192.168.1.4/DashboradKGL/?id=11";</script>';

        }


    ?>
	 


</body>
</html>
