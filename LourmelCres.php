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


        $queryrec = "SELECT c.REF_AUTO,c.NUMPLAN,   c.MUNA, c.CIVILITE, c.NOM_NAISSANCE,    c.lastname as NOM,  c.firstname as PRENOM,  c.DATENAISSANCE,    c.AGE,  c.EMAIL,    c.ADRESSE_RUE,  c.ADRESSE_BATIMENT, c.ADRESSE_4,    c.zipcode as CP,    c.city as VILLE ,   c.REFAPPEL,  c.PSEUDO,  c.COMMENTAIRE,   c.FORMULE,  c.CIV_CONJOINT, c.NOM_NAISSANCECONJOINT,    c.NOMCONJOINT,  c.PRENOMCONJOINT,   c.DATENAISSANCECONJOINT,    c.CONSENTEMENT, c.RappelSante,  c.GAMME_SANTE,  c.COTISATION_CS,c.GAROBSEQUES,c.phone_1,c.CIV_CONJOINT, c.DATENAISSANCECONJOINT,c.IDPROD
          FROM  contacts c
          WHERE  c.phone_1='".$idcont."' or c.NumAppel1='".$idcont."' or c.NumAppel2='".$idcont."'";

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
                        <h1>Qualité</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Lourmel Couple</li>
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
            
            </div>

            <div class="col-xl-12">
                    <div style="text-align:center; background-color:#993366; padding:5px;color:white"><H1><CENTER><B>Lourmel Couple - Enregistrement</B></CENTER></H1></div>
                    </br>

                            <div style="text-align:left; margin-left:80px;background-color:#F0F0F0;margin-right:80px;padding:20px;margin-top:10px">
                            NOM : <b style="color:blue"><?=$rowcont['NOM']?></b> 
                            PRENOM : <b style="color:blue"><?=$rowcont['PRENOM']?></b> 
                            DATE NAISSANCE : <b style="color:blue"><?=$rowcont['DATENAISSANCE']?></b> 
                            ADRESSE : <b style="color:blue"><?=$rowcont['ADRESSE_RUE'].' '.$rowcont['ADRESSE_BATIMENT'].' '.$rowcont['ADRESSE_4']?></b> 
                            CP : <b style="color:blue"><?=$rowcont['CP']?></b> 
                            VILLE : <b style="color:blue"><?=$rowcont['VILLE']?></b> 
                            | RefProspect : <b style="color:blue"><?=$rowcont['REFPROSPECT']?></b> | N° de contrat <b style="color:blue"><?=$rowcont['ClientID']?></b> | Assuré blessure le <b style="color:blue"><?=$rowcont['IDPROD']?></b> | Muna <b style="color:blue"><?=$rowcont['MUNA']?></b>
                            </div>
                            </br>
  <p><font face="verdana, arial, helvetica, sans-serif">Bonjour&nbsp;</font><strong style="font-family: verdana, arial, helvetica, sans-serif; color: #3d3fff;"><?=$rowcont['CIVILITE']?> &nbsp;<?=$rowcont['NOM']?> &nbsp;<?=$rowcont['PRENOM']?></strong><font face="verdana, arial, helvetica, sans-serif">, Angélique Capi, Groupe Lourmel « Carpilig » à l’appareil, <span style="color: #018700;"><strong>vous savez votre caisse de retraite de l'imprimerie ?</strong></span></font></p>
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">ATTENDRE REPONSE</strong></font></p>
  <p><font face="verdana, arial, helvetica, sans-serif">Je vous contacte au sujet de votre contrat Lourmel Protection Blessures. Tout s’est bien passé jusqu’à présent ? Vous n’avez pas eu d’accident ?&nbsp;</font></p>
  <p>&nbsp;</p>
  <ul>
    <li><span style="font-family: verdana, arial, helvetica, sans-serif;"><strong style="color: #018700;">NON :&nbsp;</strong>Tant mieux, c'est une bonne nouvelle !</span></li>
  </ul>
  <p>&nbsp;</p>
  <p><span style="font-family: verdana, arial, helvetica, sans-serif;">Je vous rappelle quand même que s'il vous arrive quoi que ce soit, luxation, fracture, brulure suite à un accident ou une agression, il faut que vous pensiez bien à nous envoyer le certificat médical pour recevoir l'argent, d'accord ? (luxation du genou = 700 euros)</span></p>
  <p>&nbsp;</p>
  <ul>
    <li><span style="font-family: verdana, arial, helvetica, sans-serif;"><strong style="color: #018700;">OUI :</strong> Que s'est-il passé ? <span style="color: #018700;">LAISSER PARLER / ACCOMPAGNER</span></span></li>
  </ul>
  <p>&nbsp;</p>
  <p><font face="verdana, arial, helvetica, sans-serif"><br /></font></p>
  <p><font face="verdana, arial, helvetica, sans-serif">* (Si sinistre toujours pas payé) je vais en faire part à notre service réclamation afin que l'on vous apporte une réponse dans les meilleurs délais.</font></p>
  <p><font face="verdana, arial, helvetica, sans-serif">De mon côté, en consultant votre dossier juste avant de vous appeler, je me suis aperçue que votre mari/ femme ne bénéficie pas encore du même niveau de protection que vous !</font></p>
  <p><font face="verdana, arial, helvetica, sans-serif">J’imagine que c’est surement un oubli, rassurez-vous, on va pouvoir régulariser la situation tout de suite. <strong style="color: #018700;">(ENCHAINER)&nbsp;</strong></font></p>
  <p><font face="verdana, arial, helvetica, sans-serif">D’autant plus que grâce à vous, il/elle bénéficie de 20% de remise à vie !!!</font></p>
  <p><font face="verdana, arial, helvetica, sans-serif">Ça veut dire que pour <strong>SEULEMENT</strong> 25 cts/jour soit 7,98€/mois, vous le/la protégez aussi et en plus sa cotisation n’augmentera jamais ! </font></p>
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">Ni la vôtre d’ailleurs !</strong></font></p>
  <p><span style="font-family: verdana, arial, helvetica, sans-serif;">Votre conjoint(e) est donc <strong>ENTIEREMENT</strong> couvert(e)comme vous si jamais il lui arrive quoi que ce soit ! Et donc pas de jaloux ????</span></p>
  <p><font face="verdana, arial, helvetica, sans-serif">Comme il n’y a <strong>aucun questionnaire médical, pas de frais de dossier et pas non plus de délai de carence,</strong> on procède donc <strong>ENSEMBLE</strong> à la régularisation comme ça vous êtes tous les 2 parfaitement tranquilles et couverts, d’accord ?</font></p>
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">OUI</strong></font></p>
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">Accord : </strong>Très bien, alors la procédure est très simple et avant de vous adresser la confirmation à la maison, nous allons procéder à l’enregistrement vocal de la modification de votre contrat.&nbsp;</font></p>
  <p><font face="verdana, arial, helvetica, sans-serif">Vous allez voir c’est très rapide,en à peine 2 minutes, vous serez totalement couvert tous les deux et recevrez votre confirmation à la maison, ça vous va, on fait comme ça?</font></p>
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">OUI&nbsp;</strong></font></p>







  <div style="text-align: center; background-color: #3399cc; padding: 5px; color: white;"> 
    <p> <strong><font face="verdana, arial, helvetica, sans-serif" size="5">Enregistrement</font></strong></p> 
  </div> 
  <p> </p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Très bien&nbsp;</font><strong style="font-family: verdana, arial, helvetica, sans-serif; color: #3d3fff;"><?=$rowcont['CIVILITE']?> &nbsp;<?=$rowcont['NOM']?> &nbsp;<?=$rowcont['PRENOM']?></strong><font face="verdana, arial, helvetica, sans-serif">, l’enregistrement vient de débuter je suis donc Angélique Capi du Groupe Lourmel qui vous propose de compléter votre adhésion par celle de votre conjoint(e) en ce qui concerne votre contrat Lourmel Protection Blessures assuré auprès d’Auxia.</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Afin d’éviter toute erreur administrative dans le traitement de cet avenant, êtes-vous toujours d’accord pour qu’il soit procédé à l’enregistrement de la présente conversation téléphonique ?</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">OUI</strong></font></p> 
  <p><span style="font-family: verdana, arial, helvetica, sans-serif;">Cet enregistrement servira de preuve à la modification de votre contrat.</span></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Je vais vérifier avec vous que nos informations vous concernant sont toujours à jour :&nbsp;</font></p> 
  <ul> 
    <li><font face="verdana, arial, helvetica, sans-serif">Civilite : <?=$rowcont['CIVILITE']?></font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">Nom :&nbsp;<?=$rowcont['NOM']?></font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">Prenom :&nbsp;<?=$rowcont['PRENOM']?></font></li> 
  </ul> 
  <p> <span style="font-family: verdana, arial, helvetica, sans-serif; font-size: 12pt;">Et vous
êtes bien né(e) le&nbsp;:&nbsp;</span></p> 
  <ul> 
    <li><font face="verdana, arial, helvetica, sans-serif">Date Naissance :&nbsp;<?=$rowcont['DATENAISSANCE']?></font></li> 
  </ul> 
  <p> <span style="font-size: 12pt; font-family: verdana, arial, helvetica, sans-serif;">Parfait,
veuillez me confirmer votre adresse en entier s’il vous plaît&nbsp;:</span></p> 
  <ul> 
    <li><font face="verdana, arial, helvetica, sans-serif">adresse rue :&nbsp;<?=$rowcont['ADRESSE_RUE']?></font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">adresse batimant :&nbsp;<?=$rowcont['ADRESSE_BATIMENT']?></font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">Adresse 4 :&nbsp;<?=$rowcont['ADRESSE_4']?></font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">Code postal :<strong> </strong><?=$rowcont['CP']?></font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">Ville :<strong> </strong><?=$rowcont['VILLE']?></font></li> 
  </ul> 
  <p><strong style="color: #018700;"><font face="verdana, arial, helvetica, sans-serif">&nbsp;(Si contrat initial couple)Je vais également vérifier les informations relatives à votre conjoint,</font></strong></p> 
  <ul> 
    <li><font face="verdana, arial, helvetica, sans-serif">Civilite :&nbsp;</font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">Nom :&nbsp;</font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">Prenom :&nbsp;</font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">Date Naissance :&nbsp;</font></li> 
    <li><font face="verdana, arial, helvetica, sans-serif">à :&nbsp;</font></li> 
    <p> </p> 
  </ul> 
  <p><font face="verdana, arial, helvetica, sans-serif">Merci&nbsp;<strong style="color: #3d3fff;">&nbsp;<?=$rowcont['CIVILITE']?> &nbsp;<?=$rowcont['NOM']?> &nbsp;<?=$rowcont['PRENOM']?></strong>.</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Maintenant que nos informations sont à jour, je vous demande juste de me confirmer les paragraphes qui vont suivre.</font></p> 
  <p><strong style="font-family: verdana, arial, helvetica, sans-serif; color: #3d3fff;"><?=$rowcont['CIVILITE']?> &nbsp;<?=$rowcont['NOM']?> &nbsp;<?=$rowcont['PRENOM']?></strong><span style="font-family: verdana, arial, helvetica, sans-serif;">, je vous rappelle que vous êtes assuré(e) par <strong style="color: #0003ff;">AUXIA</strong>, au titre de votre contrat <strong style="color: #0003ff;">LOURMEL PROTECTION BLESSURES</strong> Option SOLO depuis le&nbsp;</span><strong style="color: #0003ff; font-family: verdana, arial, helvetica, sans-serif;"><?=$rowcont['IDPROD']?></strong><span style="font-family: verdana, arial, helvetica, sans-serif;">.</span></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Vous avez déjà reçu les conditions générales du contrat lors de la souscription et nous prélevons vos cotisations sur votre compte bancaire. Vous confirmez ?</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">OUI, je confirme</strong></font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Cette extension de garanties vous permet ainsi de bénéficier d'une couverture « Couple » pour un complément de <strong style="color: #0003ff;">7,98</strong> et porte ainsi votre cotisation mensuelle totale à <strong style="color: #0003ff;">17,96€</strong>, vous confirmez que cette cotisation vous convient financièrement ?</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">OUI, je confirme</strong></font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Très bien&nbsp;</font><strong style="font-family: verdana, arial, helvetica, sans-serif; color: #3d3fff;"><?=$rowcont['CIVILITE']?> &nbsp;<?=$rowcont['NOM']?> &nbsp;<?=$rowcont['PRENOM']?></strong><font face="verdana, arial, helvetica, sans-serif">, dès demain matin, nous vous faisons parvenir l’avenant d’extension de votre contrat Lourmel Protection Blessures.&nbsp;</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Vous verrez, c'est un simple document dans lequel la nouvelle cotisation et les renseignements en ce qui concerne votre conjoint seront reprises, d’accord ?</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">OUI</strong></font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Souhaitez-vous en savoir ou plus ou bien les informations déjà transmises vous semblent suffisantes, tout a été clair&nbsp;</font><strong style="font-family: verdana, arial, helvetica, sans-serif; color: #3d3fff;"><?=$rowcont['CIVILITE']?> &nbsp;<?=$rowcont['NOM']?> &nbsp;<?=$rowcont['PRENOM']?>&nbsp;</strong><font face="verdana, arial, helvetica, sans-serif">?</font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif"><strong style="color: #018700;">OUI</strong></font></p> 
  <p><font face="verdana, arial, helvetica, sans-serif">Parfait, il ne me reste plusqu’à vous remercier de votre confianceet à vous souhaiter une excellente journée/fin de journée de la part de tout le Groupe Lourmel et de moi-même, merci&nbsp;</font><strong style="font-family: verdana, arial, helvetica, sans-serif; color: #3d3fff;"><?=$rowcont['CIVILITE']?> &nbsp;<?=$rowcont['NOM']?> &nbsp;<?=$rowcont['PRENOM']?></strong><font face="verdana, arial, helvetica, sans-serif">, portez-vous bien !</font></p> 
  <div><br /></div> 
  <p> </p> 
  <p> </p>
   
                            

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
            echo '<script>window.location="https://192.168.1.4/DashboradKGL/?id=12";</script>';

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
