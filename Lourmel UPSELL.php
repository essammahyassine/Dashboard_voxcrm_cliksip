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
    $IDOO = $_GET['OOID'];
    $IDF = $_GET['idcont'];
    $IDCC = $_GET['CCID'];

    $cnx = mysqli_connect($server,$utilisateur,$password,$database);
    $get_voice = "SELECT  monitor_filename FROM outgoing_calls where monitor_filename not in ('NULL','') and id!='".$IDOO."' and contact_id=".$IDF;

  
    if (isset($_POST['save'])) {

            $c = $_POST['idcont'];
            $r = $_POST['namerecord'];

            $queryexec = "UPDATE `contacts` SET `RecordFileName`='".$r."' where id='".$c."'";
            $cnx->query($queryexec);

            $alert = '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Success</span>
                            Enregistrement valid?? avec succ??s.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">??</span>
                        </button>
                      </div>';
            $ok = 'ok';

            
        }
   
        
        $idcont = $_GET['idcont'];


        $queryrec = "SELECT c.REF_AUTO,c.NUMPLAN,   c.MUNA, c.CIVILITE, c.NOM_NAISSANCE,    c.lastname as NOM,  c.firstname as PRENOM,  c.DATENAISSANCE,    c.AGE,  c.EMAIL,    c.ADRESSE_RUE,  c.ADRESSE_BATIMENT, c.ADRESSE_4,    c.zipcode as CP,    c.city as VILLE ,   c.REFAPPEL, u.name as HOTESSE,  c.PSEUDO,
            DATE_FORMAT( o.agent_start,  '%Y%m%d' ) AS DateAppel,   DATE_FORMAT( o.agent_start,  '%H%i%s' ) AS HeureAppel,  c.COMMENTAIRE,  s.REFQUALIF,
            s.CONCLUSION, s.MOTIFREFUS,   c.FORMULE,  c.CIV_CONJOINT, c.NOM_NAISSANCECONJOINT,    c.NOMCONJOINT,  c.PRENOMCONJOINT,   c.DATENAISSANCECONJOINT,    c.CONSENTEMENT, c.RappelSante,  c.GAMME_SANTE,  c.COTISATION_CS,c.GAROBSEQUES,c.phone_1,o.monitor_filename as Link ,c.CIV_CONJOINT, c.DATENAISSANCECONJOINT,c.IDPROD

            FROM outgoing_calls o
            LEFT JOIN users u ON o.agent_id = u.id
            LEFT JOIN contacts c ON o.contact_id = c.id
            LEFT JOIN campaigns_2 camp ON camp.id = c.cid
            LEFT JOIN campaigns_status s ON o.status = s.num
            WHERE s.text IS NOT NULL 
            AND camp.id = s.campaign_id and s.positive=1  and c.id='".$idcont."'";

    if (isset($_POST['modifier'])) {

            $c = $_POST['idcont'];
            $CIVILITE = $_POST['CIVILITE'];
            $NOM = $_POST['NOM'];
            $PRENOM = $_POST['PRENOM'];
             $DATENAISSANCE = $_POST['DATENAISSANCE'];
            $AGE = $_POST['AGE'];
             $ADR_ETAGE = $_POST['ADR_ETAGE'];
              $ADRESSE_BATIMENT = $_POST['ADRESSE_BATIMENT'];
               $ADRESSE_RUE = $_POST['ADRESSE_RUE'];
              $ADRESSE_4 = $_POST['ADRESSE_4'];
               $CP = $_POST['CP'];
               $ADR_COMMUNE = $_POST['ADR_COMMUNE'];
               $CIV_CONJOINT = $_POST['CIV_CONJOINT'];
               $NOMCONJOINT = $_POST['NOMCONJOINT'];
               $PRENOMCONJOINT = $_POST['PRENOMCONJOINT'];
               $DATENAISSANCECONJOINT = $_POST['DATENAISSANCECONJOINT'];
               $COMMENTAIRE = $_POST['COMMENTAIRE'];
               

$queryexec = "UPDATE `contacts` SET `CIVILITE`='".$CIVILITE."',`ADR_COMMUNE`='".$ADR_COMMUNE."',`zipcode`='".$CP."',
`ADRESSE_4`='".$ADRESSE_4."',`ADRESSE_RUE`='".$ADRESSE_RUE."',`ADRESSE_BATIMENT`='".$ADRESSE_BATIMENT."',
`ADR_ETAGE`='".$ADR_ETAGE."',`AGE`='".$AGE."',`DATENAISSANCE`='".$DATENAISSANCE."',`firstname`='".$PRENOM."',
`lastname`='".$NOM."',`CIV_CONJOINT`='".$CIV_CONJOINT."',`NOMCONJOINT`='".$NOMCONJOINT."',
`PRENOMCONJOINT`='".$PRENOMCONJOINT."',`DATENAISSANCECONJOINT`='".$DATENAISSANCECONJOINT."' 
            ,`COMMENTAIRE`='".$COMMENTAIRE."' where id='".$c."'";
            $cnx->query($queryexec);

        


        }

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

            <div class="header-menu">

            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Qualit??</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Lourmel UPSELL</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <?php
                                            
                            $resultcont = $cnx->query($queryrec);
                            while($rowcont = $resultcont->fetch_assoc()) 
                            {    
                                $rec = str_replace(".mp3",".wav",$rowcont['Link']);
                                $recname = $rowcont['MUNA'].'_'.$rowcont['NOM'].'_'.$rowcont['PRENOM'].'_'.$rowcont['DateAppel'].'_'.$rowcont['HeureAppel'].'.wav'; 

                               
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
                <button name="save" type="submit" class="btn btn-success">Valider</button>
                <a href="../record/monitor/voxcrm/<?=$rec?>" id="dn" download="<?=$recname?>"></a>
            </form>

            </div>
            <div class="col-sm-6">
                <audio controls autoplay controlsList="nodownload" id="myAudio">
                      <source src="../record/monitor/voxcrm/<?=$rec?>" type="audio/wav">
                      <source src="../record/monitor/voxcrm/<?=$rec?>" type="audio/wav">
                </audio>
                <button onclick="setPlaySpeed()" type="button" class="btn btn-success">x2</button>
                <button onclick="normal()" type="button" class="btn btn-success">normal</button>
            </div>
            </br>
            <div class="col-sm-12">
              <h4>Autres Enregistrements :</h4>
            <?php
                $RS_GETV = $cnx->query($get_voice);
                while($R_GETV = $RS_GETV->fetch_assoc()) 
                    {
                        $recv = str_replace(".mp3",".wav",$R_GETV['monitor_filename']);
            ?>

                <audio controls autoplay controlsList="download">
                      <source src="../record/monitor/voxcrm/<?=$recv?>" type="audio/wav">
                      <source src="../record/monitor/voxcrm/<?=$recv?>" type="audio/wav">
                </audio>
            </br>
            <?php
                    }
            ?>
            </div>
            
            </div>

            <div class="col-xl-12">
                    <div style="text-align:center; background-color:#993366; padding:5px;color:white"><H1><CENTER><B>Lourmel UPSELL - Enregistrement</B></CENTER></H1></div>
                    </br>

                            <div style="text-align:left; margin-left:80px;background-color:#F0F0F0;margin-right:80px;padding:20px;margin-top:10px">
                            NOM : <b style="color:blue"><?=$rowcont['NOM']?></b> 
                            PRENOM : <b style="color:blue"><?=$rowcont['PRENOM']?></b> 
                            DATE NAISSANCE : <b style="color:blue"><?=$rowcont['DATENAISSANCE']?></b> 
                            ADRESSE : <b style="color:blue"><?=$rowcont['ADRESSE_RUE'].' '.$rowcont['ADRESSE_BATIMENT'].' '.$rowcont['ADRESSE_4']?></b> 
                            CP : <b style="color:blue"><?=$rowcont['CP']?></b> 
                            VILLE : <b style="color:blue"><?=$rowcont['VILLE']?></b> 
                            | RefProspect : <b style="color:blue"><?=$rowcont['REFPROSPECT']?></b> | N?? de contrat <b style="color:blue"><?=$rowcont['ClientID']?></b> | Assur?? blessure le <b style="color:blue"><?=$rowcont['IDPROD']?></b> | Muna <b style="color:blue"><?=$rowcont['MUNA']?></b>
                            </div>
                            </br>
                              <p><font face="verdana, arial, helvetica, sans-serif"></font><span style="font-family: verdana, arial, helvetica, sans-serif;">Bonjour&nbsp;<strong style="color: #3d3fff;"><?=$rowcont['CIVILITE']?>&nbsp;<?=$rowcont['NOM']?> <?=$rowcont['PRENOM']?></strong>, Ang??lique Capi, Groupe Lourmel ?? Carpilig ?? ?? l???appareil, vous savez votre caisse de retraite de l'imprimerie ?</span></p> 
  <p><font face="verdana, arial, helvetica, sans-serif" style="color: #018700;"><strong>ATTENDRE R??PONSE</strong></font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Je vous contacte au sujet de votre contrat Lourmel Protection Blessures. Tout s'est bien pass?? jusqu'?? pr??sent ? Vous n'avez pas eu d'accident ?</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #ff0000;">NON :</strong> Tant mieux, c'est une bonne nouvelle !</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Je vous rappelle quand m??me que s???il vous arrive quoi que ce soit, luxation, fracture, br??lure suite ?? un accident ou une agression, il faut que vous pensiez bien ?? nous envoyer le certificat m??dical pour recevoir l???argent, d???accord ?(Luxation du genou = 700 euros)</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">OUI :</strong> Que s'est-il pass?? ??&nbsp;&nbsp;</font><strong style="font-family: verdana, arial, helvetica, sans-serif; color: #018700;">LAISSER PARLER / ACCOMPAGNER</strong></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">* Si sinistre toujours pas pay??, je vais en faire part ?? notre service r??clamation afin que l'on vous apporte une r??ponse dans les meilleurs d??lais.</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif"><span style="color: #018700;"><strong>&quot;Si OUI&quot;</strong> </span> Vous n'avez malheureusement pas ??t?? le seul dans ce cas et c'est ?? la suite de nombreux accidents que nous avons d??cid?? de renforcer les garanties de votre contrat ?? moindre co??t.</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif"><strong><span style="color: #ff0000;">&quot;Si NON&quot;</span> </strong>Donc vous n'avez rien eu mais ??a n'a malheureusement pas ??t?? le cas pour tous nos retrait??s et c'est suite ??leur demande que nous avons d??cid?? de renforcer les garanties de votre contrat ?? moindre co??t.</font></p> 
  <p> </p> 
  <p><span style="font-family: verdana, arial, helvetica, sans-serif;">Concr??tement, ??a veut dire que vous passez de 8000 ?? 12000??? d'indemnit??s tous les ans,&nbsp;</span></p> 
  <p><strong style="font-family: verdana, arial, helvetica, sans-serif; color: #018700;">Si Solo :&nbsp;</strong><span style="font-family: verdana, arial, helvetica, sans-serif;">pour seulement 4,87??? de compl??ment mensuel, ?? peine 15 cts/jour (14,85???/mois au lieu de 9,98???)&nbsp;</span></p> 
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">Si couple :</strong> pour seulement 8,76??? de compl??ment mensuel, ?? peine 30 cts/jour (26,72???/mois au lieu de 17,96???).</font></p> 
  <p><span style="font-family: verdana, arial, helvetica, sans-serif;">sans aucune augmentation, jamais !&nbsp;</span><strong style="font-family: verdana, arial, helvetica, sans-serif; color: #018700;">ENCHAINER</strong> </p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Nos retrait??s optent aujourd'hui pour ce niveau de couverture parce qu'il permet d'??tre mieux garanti et prot??g?? en cas d'accident, d'agression, de fractures, de luxation et en cas de br??lures aussi !&nbsp;</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Ainsi, pour une simple luxation du genou, au lieu de recevoir un ch??que de 700???, <strong>vous en recevrez un de 1050??? !&nbsp;</strong></font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Pour une luxation de la cheville ou du poignet au lieu de ne recevoir que 500???,<strong>vous recevrez 750??? !</strong></font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Comme il n???y a <strong>aucun questionnaire m??dical, pas de frais de dossier et pas non plus de d??lai de carence,</strong> on proc??de <strong>ensemble </strong>au renforcement de votre contrat comme pour tous nos retrait??s comme ??a vous ??tes parfaitement tranquille et couvert, d???accord ?&nbsp;</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">OUI</strong></font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Si besoin de consolider le OUI : ?? Je pense que c'est effectivement plus sage, surtout par les temps qui courent ! ??</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">Accord :</strong> Tr??s bien, alors la proc??dure est tr??s simple et avant de vous adresser la confirmation ?? la maison, nous allons proc??der ?? l???enregistrement vocal de la modification de votre contrat.&nbsp;</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Vous allez voir, c???est tr??s rapide. A peine 2 minutes, vous serez totalement couvert et recevrez votre confirmation ?? la maison, ??a vous va ? </font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">On fait comme ??a ?&nbsp;</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">OUI&nbsp;</strong></font></p> 







    <div style="text-align: center; background-color: #3399cc; padding: 5px; color: white;"> 
    <p> <strong><font face="verdana, arial, helvetica, sans-serif" size="5">Enregistrement</font></strong></p> 
  </div> 
  <p> </p> 
  <p><font face="verdana, arial, helvetica, sans-serif">&nbsp;<strong style="color: #3d3fff;"><?=$rowcont['CIVILITE']?>&nbsp;<?=$rowcont['NOM']?></strong>, je vais commencer par v??rifier avec vous que nos informations vous concernant sont toujours ?? jour, vous ??tes donc bien :&nbsp;</font></p> 
  <ul> 
    <li><font face="verdana, arial, helvetica, sans-serif">Civilite : <?=$rowcont['CIVILITE']?></font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">Nom :&nbsp;<?=$rowcont['NOM']?></font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">Prenom :&nbsp;<?=$rowcont['PRENOM']?></font></li> 
  </ul> 
  <p> <span style="font-family: verdana, arial, helvetica, sans-serif; font-size: 12pt;">Et vous
??tes bien n??(e) le&nbsp;:&nbsp;</span></p> 
  <ul> 
    <li><font face="verdana, arial, helvetica, sans-serif">Date Naissance :&nbsp;<?=$rowcont['DATENAISSANCE']?></font></li> 
  </ul> 
  <p> <span style="font-size: 12pt; font-family: verdana, arial, helvetica, sans-serif;">Parfait,
veuillez me confirmer votre adresse en entier s???il vous pla??t&nbsp;:</span></p> 
  <ul> 
    <li><font face="verdana, arial, helvetica, sans-serif">adresse rue :&nbsp;<?=$rowcont['ADRESSE_RUE']?></font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">adresse batimant :&nbsp;<?=$rowcont['ADRESSE_BATIMENT']?></font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">Adresse 4 :&nbsp;<?=$rowcont['ADRESSE_4']?></font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">Code postal :<strong> </strong><?=$rowcont['CP']?></font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">Ville :<strong> </strong><?=$rowcont['VILLE']?></font></li> 
  </ul> 
  <p><strong style="color: #018700;"><font face="verdana, arial, helvetica, sans-serif">&nbsp;(Si contrat initial couple)Je vais ??galement v??rifier les informations relatives ?? votre conjoint,</font></strong></p> 
  <ul> 
    <li><font face="verdana, arial, helvetica, sans-serif">Civilite :&nbsp;</font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">Nom :&nbsp;</font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">Prenom :&nbsp;</font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">Date Naissance :&nbsp;</font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">?? :&nbsp;</font></li> 
    <p> </p> 
  </ul> 
  <p><font face="verdana, arial, helvetica, sans-serif">Merci&nbsp;</font><strong style="font-family: verdana, arial, helvetica, sans-serif; color: #3d3fff;"><?=$rowcont['CIVILITE']?>&nbsp;<?=$rowcont['NOM']?></strong><font face="verdana, arial, helvetica, sans-serif">.</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Maintenant que nos informations sont ?? jour, je vous demande juste de me confirmer les paragraphes qui vont suivre en me r??pondant par ?? oui ?? ou par ?? non ??, d???accord ?</font></p> 
  <p style="text-align: center;"><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">OUI CLAIR</strong></font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Tr??s bien&nbsp;</font><strong style="font-family: verdana, arial, helvetica, sans-serif; color: #3d3fff;"><?=$rowcont['CIVILITE']?>&nbsp;<?=$rowcont['NOM']?></strong><font face="verdana, arial, helvetica, sans-serif">, je vous rappelle que vous ??tes assur??(e) par AUXIA, au titre de votre contrat Lourmel Protection Blessures depuis le JJ/MM/AAAA.</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Vous avez d??j?? re??u les conditions g??n??rales du contrat lors de la souscription et nous pr??levons vos cotisations sur votre compte bancaire, vous confirmez ?</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">OUI CLAIR</strong></font></p> 
  <p><strong style="font-family: verdana, arial, helvetica, sans-serif; color: #018700;">Si Solo :&nbsp;</strong><font face="verdana, arial, helvetica, sans-serif">La souscription de ce renforcement pour un montant compl??mentaire de 4,87??? porte ainsi votre cotisation totale?? 14,85???/mois et vous permet ainsi de passer d???un bar??me applicable de 4 000 ?? 6 000???.</font></p> 
  <p><strong style="font-family: verdana, arial, helvetica, sans-serif; color: #018700;">Si couple :</strong><span style="font-family: verdana, arial, helvetica, sans-serif;"> </span><span style="font-family: verdana, arial, helvetica, sans-serif;">La souscription de ce renforcement pour un montant compl??mentaire de&nbsp;</span><span style="font-family: verdana, arial, helvetica, sans-serif;">8,76???</span><span style="font-family: verdana, arial, helvetica, sans-serif;">&nbsp;porte ainsi votre cotisation totale ??&nbsp;</span><span style="font-family: verdana, arial, helvetica, sans-serif;">26,72???/mois</span><span style="font-family: verdana, arial, helvetica, sans-serif;">&nbsp;et vous permet ainsi de passer d???un bar??me applicable de 4 000 ?? 6 000???.</span></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Je vous rappelle que votre contrat pr??voit la majoration des indemnit??s en cas de blessures multiples jusqu????? un montant maximum de 12 000??? tous les ans contre 8 000??? aujourd???hui.&nbsp;</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Vous acceptez ?</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">OUI CLAIR</strong></font></p> 
  <p><span style="font-family: verdana, arial, helvetica, sans-serif;">Tr??s bien&nbsp;</span><strong style="font-family: verdana, arial, helvetica, sans-serif; color: #3d3fff;"><?=$rowcont['CIVILITE']?>&nbsp;<?=$rowcont['NOM']?></strong><span style="font-family: verdana, arial, helvetica, sans-serif;">, d??s demain matin, nous vous faisons parvenir votre attestation de couverture renforc??e. Vous verrez, c'est un simple document ?? conserver dans lequel la nouvelle cotisation et le montant des indemnit??s sont clairement rappel??s. Dor??navant, vous ??tes mieux prot??g??(e).</span></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Je vous remercie de votre confiance et vous souhaite une excellente journ??e de la part du Groupe Lourmel et de moi-m??me.&nbsp;</font></p> 
                            

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
      <label for="usr">civilit??:</label>
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
      <input type="text" class="form-control" value="<?=$rowcont['DATENAISSANCE']?>" name="DATENAISSANCE">
    </div>
    <div class="form-group">
      <label for="usr">Age :</label>
      <input type="text" class="form-control" name="AGE" value="<?=$rowcont['AGE']?>" >
    </div>

<div class="form-group">
      <label for="usr">CIV_CONJOINT:</label>
      <input type="" class="form-control" value="<?=$rowcont['CIV_CONJOINT']?>" name="CIV_CONJOINT">
    </div>
<div class="form-group">
      <label for="usr">NOM CONJOINT:</label>
      <input type="text" class="form-control"  value="<?=$rowcont['NOMCONJOINT']?>" name="NOMCONJOINT">
    </div>
    <div class="form-group">
      <label for="usr">Prenom CONJOINT:</label>
      <input type="text" class="form-control" value="<?=$rowcont['PRENOMCONJOINT']?>" name="PRENOMCONJOINT" >
    </div>
    <div class="form-group">
      <label for="usr">Date naissance CONJOINT:</label>
      <input type="text" class="form-control" value="<?=$rowcont['DATENAISSANCECONJOINT']?>" name="DATENAISSANCECONJOINT">
    </div>

    <div class="form-group">
      <label for="usr">ADRESSE BATIMENT:</label>
      <input type="text" class="form-control" name="ADRESSE_BATIMENT" value="<?=$rowcont['ADRESSE_BATIMENT']?>"  >
    </div>
    <div class="form-group">
      <label for="usr">Adresse rue :</label>
      <input type="text" class="form-control" name="ADRESSE_RUE" value="<?=$rowcont['ADRESSE_RUE']?>"  >
    </div>
    <div class="form-group">
      <label for="usr">Adresse 4 :</label>
      <input type="text" class="form-control" name="ADRESSE_4" value="<?=$rowcont['ADRESSE_4']?>">
    </div>
    <div class="form-group">
      <label for="usr">Code postale :</label>
      <input type="text" class="form-control" name="CP" value="<?=$rowcont['CP']?>" >
    </div>
    <div class="form-group">
      <label for="usr">VILLE :</label>
      <input type="text" class="form-control" name="VILLE" value="<?=$rowcont['VILLE']?>"  >
    </div>
        <div class="form-group">
      <label for="usr">COMMENTAIRE :</label>
      <input type="text" class="form-control" name="COMMENTAIRE" value="<?=$rowcont['COMMENTAIRE']?>"  >
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


                            
                            </br>
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

    <?php
            if ($ok=='ok') {

            echo '<script>document.getElementById("dn").click();</script>';
            echo '<script>window.location="https://192.168.1.4/DashKGL/?id=12";</script>';

        }


    ?>
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

</body>
</html>
