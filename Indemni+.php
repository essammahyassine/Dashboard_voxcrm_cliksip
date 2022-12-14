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
                            Enregistrement valid?? avec succ??s.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">??</span>
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
                            Enregistrement valid?? avec succ??s.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">??</span>
                        </button>
                      </div>';
            $ok = 'ok';



        }


    




        
        $idcont = $_GET['idcont'];

        $queryrec = "SELECT c.RefProspect,  c.NumAppel1,    c.NUM_CLIENT,   c.NUM_CLIENT2, c.ClientID, c.ClientID2 , c.CIVILITE, c.lastname as NOM,  c.firstname as PRENOM,  c.ADR_ETAGE,    c.ADR_BATIMENT, c.ADR_RUE,  c.ADR_4,    c.ADR_CP,   c.ADR_COMMUNE,  c.NAIS_EMP, c.AGE_EMP,  c.NAIS_CO_EMP,  c.AGE_CO_EMP,   c.CIVILITE_COT, c.NOM_COT,  c.PRENOM_COT,   c.NUM_PLAN, c.CSP,  c.SITUATION_FAMILIALE,  c.SITUATION_LOCATIVE,   c.TOP_CIBLE,    c.COTISATION,   c.COTISATION_2, c.CAPITAL,  c.PRIME_MOIS,   c.PRIME_MOIS_2, c.PRIME_JOUR,   c.PRIME_JOUR_2, c.COUVERTURE_1, c.COUVERTURE_2, c.COUVERTURE_5, c.DEST, c.Refappel, u.name as HOTESSE,    DATE_FORMAT( o.agent_start,  '%Y%m%d' ) AS DateAppel,   DATE_FORMAT( o.agent_start,  '%H%i%s' ) AS HeureAppel,  s.RefQualif,    s.RefCatg,  c.Newrib,   c.BIC,  c.RecordFileName,   c.PREUVE_SONORE_OUT,    s.Conclusion,   s.MotifRefus,   s.Lib_EI, c.MENS_VAL,c.DETTE,c.COUVERTURE_3,c.CAPITAL,o.monitor_filename as Link,o.note,c.phone_1 as TEL,c.COMMENTAIRE as comi
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

            <div class="header-menu">

            </div>

        </header><!-- /header -->
        <!-- Header-->
        <?php include 'Call_Option.php'; ?>

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
                            <li class="active">Indemni+</li>
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
			<div class="col-sm-2">
			
			<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal">Modifier</button>
			
         
            </div>
			
            <div class="col-sm-2">
			
			
			
            <form  method="post">
                <input type="hidden" name="idcont" value="<?=$idcont?>" >
                <input type="hidden" name="namerecord" value="<?=$recname?>">
                <button name="save" type="submit" class="btn btn-success btn-block">Valider</button>
				
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
            <div class="col-sm-2">
                 Telephone : <?=$rowcont['TEL']?>
                 commentaire : <?=$rowcont['comi']?></br>
                 Preuve SonoreOUT : <?=$rowcont['PREUVE_SONORE_OUT']?>
            </div>
            </div>

            <div class="col-xl-12">
                    <div style="text-align:center; background-color:#999900;color:white;padding:5px"><H2><CENTER>Indemni+ - Enregistrement</CENTER></H2></div>
                            </br>
                           
                            <div style="margin-left:50px;text-align:left">Commentaire :</br><textarea name="note" cols="60"  ><?=$rowcont['note']?></textarea></div>
                            </br>
                            <table>
                            <tr><td>

                            <h3 style="color:#0033CC;margin-left:40px">Cordonn??es EUMPRUNTEUR :</h3></td>
                            <td>
                            <h3 style="color:#0033CC;margin-left:40px">Cordonn??es CO_EUMPRUNTEUR :</h3></td>
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
                            <div>Civilite COT : <b style="color:#0033CC;text-align:center"> <?=$rowcont['CIVILITE_COT']?></b></div> 
                            <div>Nom  COT : <b style="color:#0033CC;text-align:center"> <?=$rowcont['NOM_COT']?></b></div>
                            <div>Prenom COT : <b style="color:#0033CC;text-align:center"> <?=$rowcont['PRENOM_COT']?></b></div>
                            <div>Date naissance COT : <b style="color:#0033CC;text-align:center"> <?=$rowcont['NAIS_CO_EMP']?></b></div>
                            <div>Age COT : <b style="color:#0033CC;text-align:center"> <?=$rowcont['AGE_CO_EMP']?></b></div>
                            </div>
                            </td>
                            <td>
                            <div style="margin-left:60px;margin-bottom:20px;border:2px solid #0033CC;padding:20px">
                            <div>Dette initiale : <b style="color:#990066;text-align:center"> <?=$rowcont['CAPITAL']?></b></div> 
                            <div>Capital restant d?? :<b style="color:#990066;text-align:center"> <?=$rowcont['DETTE']?></b></div>
                            <div>Mensualit??s: <b style="color:#990066;text-align:center"> <?=$rowcont['MENS_VAL']?></b></div>
                            <div>Type cr??dit :<b style="color:#990066;text-align:center"> <?=$rowcont['CARTE']?></b></div>
                            <div>ADE :<b style="color:#990066;text-align:center"> <?=$rowcont['DATE_SOUSCRIPTION']?></b></div>
                            <div>Anciennet?? client :<b style="color:#990066;text-align:center"> <?=$rowcont['COUVERTURE_3']?>  an(s) </b></div>
                            <div>Date d ouverture du compte :<b style="color:#990066;text-align:center"> <?=$rowcont['DATE_DERNIER_CREDIT']?></b></div>
                            </div>
                            </td>
                            </TR>
                            </table>

                            </br>
                            
                                </br>
                                <div style="margin-left:50px;text-align:left"><b style="color:green"> <?=$rowcont['CIVILITE']?> </b> <b style="color:green"> <?=$rowcont['NOM']?> </b> L&#39enregistrement vient de d??buter,
                                </br>
                                Je suis Sonia / Yanis d&#39Ad Pr??voyance, intervenant pour le compte de <b style="color:green">COFIDIS</b>, courtier en assurance, qui vous propose le contrat d&#39assurance <b style="color:green">INDEMNI+</b> assur?? par <b style="color:green">SERENIS ASSURANCES</b>.</br></br> Tr??s bien <b style="color:green"> <?=$rowcont['CIVILITE']?> </b> <b style="color:green"> <?=$rowcont['NOM']?> </b>, afin d&#39??viter toute erreur administrative dans le traitement de votre adh??sion, ??tes-vous toujours d&#39accord pour qu&#39il soit proc??d?? ?? l&#39enregistrement de la pr??sente conversation t??l??phonique ?  
                                </div></br>
                                <div style="text-align:center"><strong style="color:green">R??ponse client:OUI</strong></div>
                                </br><div style="margin-left:50px;text-align:left">Cet enregistrement t??l??phonique servira de preuve de votre souscription.
                                </br>
                                Les informations collect??es lors de cet enregistrement seront notamment trait??es par <b style="color:green">COFIDIS</b> et <b style="color:green">SERENIS ASSURANCES</b> aux fins d&#39ex??cution du contrat et d&#39exploitation commerciale. Bien entendu, vous b??n??ficiez d&#39un droit d&#39acc??s, de rectification et d&#39opposition au traitement de vos donn??es personnelles aupr??s de <b style="color:green">COFIDIS</b> par courrier simple, comme pr??cis?? dans la notice d&#39information. </div></br>
                                <p><span style="color: #ff0000;"><strong><span style="font-family: arial, sans-serif;">Consentez-vous ?? ce que vos donn??es personnelles, en particulier celles concernant votre sant??, soient trait??es en vue de l'??tablissement, de la gestion et de l'ex??cution de votre contrat ?&nbsp;</span></strong></span></p>
    <p><strong><span style="font-family: arial, sans-serif;"></span><span style="color: #ffaa00;"><span style="font-family: arial, sans-serif;"><span style="font-family: Wingdings;">??</span></span><span style="font-family: arial, sans-serif;">&nbsp;Obtenir un OUI</span></span><span style="color: #ff0000;"> </span></strong></p>
                                <div style="margin-left:50px;text-align:left"><b style="color:green"> <?=$rowcont['CIVILITE']?> </b> <b style="color:green"> <?=$rowcont['NOM']?> </b>, ?? la suite de cet enregistrement, nous allons vous renvoyer la Notice d&#39information portant l&#39ensemble des conditions et limites contractuelles applicables aux garanties de la pr??sente offre d&#39assurance. Vous reconnaissez en prendre connaissance d??s r??ception. D&#39accord ? 
                                </div></br>
                                <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div>
                                </br><div style="text-align:left;margin-left:50px"><strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, j&#39;aimerais confirmer vos coordonn??es : 
                                </br>
                                </div>
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
                            <b>??? Vous ??tes bien n??(e) le : </b></div></br>
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
                            <b>??? Vous habitez bien :</b></div></br>
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
          <label for="usr">Adresse Batiment:</label>
          <input type="text" class="form-control" name="ADR_BATIMENT" value="<?=$rowcont['ADR_BATIMENT']?>"  >
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

                                <div style="text-align:center;margin-left:50px"><strong style="color:orange">-----------------------------------------------</strong></div>
                                 <div style="text-align:center;margin-left:50px"><strong style="color:orange">-----------------------------------------------</strong>
                                </div>
                                <div style="margin-left:50px;margin-right:50px;padding-top:0px;margin-bottom:50px;height:100%;background-color:#F0FFFF">
                                <div style="float:left;width:45%;padding:30px;text-align:left"><h2 style="color:orange;text-align:center">CDI_Garanties CHOMAGE + ARRET DE TRAVAIL</h2><b style="color:green"> <?=$rowcont['CIVILITE']?> </b> <b style="color:green"> <?=$rowcont['NOM']?> </b>,<b> nous vous informons que :</br>
                                Vous b??n??ficiez de la garantie arr??t de travail d??s lors que vous :</b>
                                <ul>
                                <li>??tes ??g??(e) de moins de 59 ans,</li>
                                <li>avez votre r??sidence principale et fiscale en France, exercez une activit?? professionnelle r??mun??r??e (salari??e ou non) en France m??tropolitaine ou dans un pays limitrophe,</li>
                                <li>n&#39??tes pas en arr??t de travail pour raison de sant?? et que vous ne l&#39avez pas ??t?? pendant plus de 30 jours cons??cutifs depuis 1 an,</li>
                                <li>n&#39??tes pas titulaire d&#39une rente ou d&#39une pension d&#39invalidit??,</li>
                                <li>n&#39??tes pas exon??r??(e) du ticket mod??rateur pour raison de sant?? (ALD).</li>
                                </ul>
                                <b>Vous b??n??ficiez aussi de la garantie Ch??mage d??s lors que vous:</b>
                                <ul>
                                <li> occupez un emploi salari?? dans le cadre d&#39un contrat ?? dur??e ind??termin??e</li>
                                <li>n&#39??tes pas au ch??mage, en pr??avis de licenciement ou de d??mission, en pr??retraite ou ?? la retraite, ou en p??riode d&#39essai Vous confirmez ?</li>
                                </li>
                                </ul>
                                </br><b style="font-size:17px;color:green;text-align:center;padding:20px">R??ponse client: OUI</b></br>
                                Vous nous confirmez donc votre int??r??t ?? une assurance de pr??voyance individuelle qui vous couvrirait en cas d&#39arr??t de travail par suite de maladie ou d&#39accident ou de ch??mage suite ?? un licenciement ?
                                </br>
                                <b style="font-size:17px;color:green;text-align:center;padding:20px">R??ponse client: OUI</b></br>
                                Parfait, compte tenu de l&#39ensemble des informations que vous nous avez fournies, le contrat INDEMNI + est conseill??. INDEMNI + r??pond ?? votre besoin en ce sens qu&#39il pr??voit pour un montant de <b style="color:red"> <?=$rowcont['COTISATION']?> </b> ??? par mois apr??s une franchise de 90 jours le versement d&#39une rente mensuelle de <b style="color:red"> <?=$rowcont['CAPITAL']?> </b> par mois en cas :</br>
                                <ul>
                                <li>de perte d&#39emploi cons??cutive ?? un licenciement,</li>
                                <li>d&#39arr??t de travail suite ?? un accident ou une maladie, </li>
                                </ul>
                                </br>
                                qui prend fin ?? la date de reprise de travail et/ou d&#39une activit?? professionnelle r??mun??r??e et au plus tard apr??s 6 mois d&#39indemnisation. 
                                </br></br>
                                La garantie Arr??t de Travail prend imm??diatement effet ?? la date d&#39adh??sion. 
                                </br>
                                La garantie Perte d&#39Emploi prend effet 180 jours ou 6 mois ?? compter d&#39aujourd&#39hui d&#39o?? l&#39importance de s&#39assurer rapidement. 
                                </br>
                                Bien s??r, il y a quelques exclusions qui figurent dans la Notice d&#39Information comme :
                                </br>
                                Pour les arr??ts de travail : les affections cervico-dorso-lombaires, psychiatriques, psychiques ou neuro-psychiques, les ??tats d??pressifs quelle que soit leur nature et la fibromyalgie. Les affections suivantes connues de l&#39assur?? au moment de l&#39adh??sion : hypertension, diab??te, asthme, tumeurs malignes. Les sinistres survenus sous l&#39emprise de l&#39alcool ou suite ?? l&#39usage de la drogue.</br></br>
                                Pour la garantie Perte d&#39emploi : le licenciement pour faute grave ou lourde ou encore le licenciement par un membre de la famille. Je vous invite ?? les consulter dans la Notice d&#39information de l&#39assurance que je vais vous envoyer. 
                                </div><div style="float:right;width:45%;padding:30px;text-align:left;border-left:2px dashed #aaa;border-bottom:2px dashed #aaa"><h2 style="color:orange;text-align:center">PAS CDI_Garantie ARRET DE TRAVAIL seule</h2><b style="color:green"> <?=$rowcont['CIVILITE']?> </b> <b style="color:green">  <?=$rowcont['NOM']?> </b> ,<b> nous vous informons que :</br>
                                Vous b??n??ficiez de la garantie arr??t de travail d??s lors que vous :</b></br>
                                <ul>
                                <li> ??tes ??g??(e) de moins de 59 ans,</li>
                                <li>avez votre r??sidence principale et fiscale en France, exercez une activit?? professionnelle r??mun??r??e (salari??e ou non) en France m??tropolitaine ou dans un pays limitrophe,</li>
                                <li>n&#39??tes pas en arr??t de travail pour raison de sant?? et que vous ne l&#39avez pas ??t?? pendant plus de 30 jours cons??cutifs depuis 1 an,</li>
                                <li> n&#39??tes pas titulaire d&#39une rente ou d&#39une pension d&#39invalidit??.</li>
                                <li>n&#39??tes pas exon??r??(e) du ticket mod??rateur pour raison de sant?? (ALD), </li>
                                </br>
                                Vous confirmez ?
                                </br>
                                <b style="font-size:17px;color:green;text-align:center;padding:20px">R??ponse client: OUI</b>
                                </br>
                                Vous b??n??ficiez aussi de la garantie Incapacit?? de Travail am??lior??e. Dans ce cas l&#39indemnisation d??bute 30 jours apr??s le d??but de l&#39incapacit?? de travail d??s lors que vous avez atteint 90 jours cons??cutifs d&#39arr??t de travail.
                                </br>
                                Vous nous confirmez donc votre int??r??t ?? une assurance de pr??voyance individuelle qui vous couvrirait en cas d&#39arr??t de travail par suite de maladie ou d&#39accident ?
                                </br>
                                <b style="font-size:17px;color:green;text-align:center;padding:20px">R??ponse client: OUI</b>
                                </br>
                                Parfait, compte tenu de l&#39ensemble des informations que vous nous avez fournies, le contrat INDEMNI + est conseill??. 
                                </br>
                                INDEMNI + r??pond ?? votre besoin en ce sens qu&#39il pr??voit pour un montant de <b style="color:red"> <?=$rowcont['COTISATION']?> </b> ??? par mois apr??s une franchise de 90 jours le versement d&#39une rente mensuelle de <b style="color:red"> <?=$rowcont['CAPITAL']?> </b> par mois en cas : d&#39arr??t de travail suite ?? un accident ou une maladie, qui prend fin ?? la date de reprise de travail et au plus tard apr??s 6 mois d&#39indemnisation. 
                                </br>
                                La garantie Arr??t de Travail prend imm??diatement effet ?? la date d&#39adh??sion. 
                                </br>
                                Bien s??r, il y a quelques exclusions qui figurent dans la Notice d&#39Information comme par exemple les affections cervico-dorso-lombaires, psychiatriques, psychiques ou neuro-psychiques, les ??tats d??pressifs quelle que soit leur nature et la fibromyalgie. 
                                </br>
                                Je vous invite ?? les consulter dans la Notice d&#39information de l&#39assurance que je vais vous envoyer.</div>
                                </div>
                                </div>
                                <div style="margin-left:50px;text-align:left">Je vous rappelle que ce contrat est conclu pour une dur??e d&#39un an et est renouvelable annuellement par tacite reconduction. Il est r??siliable ?? tout moment.</br></br>
                                Vous aurez n??anmoins la possibilit?? de renoncer ?? cette adh??sion dans les 14 jours qui suivent la r??ception  de la Notice d???information par lettre recommand??e avec accus?? de r??ception ?? Cofidis au Parc de la Haute Borne, ?? Villeneuve d???Ascq.</br></br>
                                <b style="color:green"> <?=$rowcont['CIVILITE']?> </b> <b style="color:green"> <?=$rowcont['NOM']?> </b>, vous acceptez que la cotisation mensuelle de <b style="color:green"> <?=$rowcont['COTISATION']?> </b> ???/mois soit automatiquement pr??lev??e par Serenis Assurance sur votre compte bancaire connu chez COFIDIS ?</div>
                                </br>
                                <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div></br>
                                <div style="margin-left:50px;text-align:left">Votre accord vaut mandat de pr??l??vement. La r??f??rence unique de mandat vous sera confirm??e lors de l&#39envoi du certificat d&#39adh??sion.</br>
                                <b style="color:green">  <?=$rowcont['CIVILITE']?>   <?=$rowcont['NOM']?> </b>, vous nous confirmez donc demander ?? adh??rer ?? l&#39assurance INDEMNI + de COFIDIS ?</div></br>
                                <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div></br>
                                <div style="margin-left:50px;text-align:left">??tes-vous d&#39accord pour que votre adh??sion prenne effet imm??diatement tout en conservant votre droit ?? renonciation ? </div>
                                </br>
                                <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div></br><div style="margin-left:50px;text-align:left">Suite ?? notre conversation, vous recevrez le certificat d&#39adh??sion et un exemplaire de la Notice d&#39information. En plus, nous avons le plaisir de vous offrir le premier mois de cotisation.</br> Souhaitez-vous en savoir plus notamment sur notre Assureur, l&#39Autorit?? de Contr??le de l&#39assureur, la loi et la langue applicables au contrat ainsi que le fonctionnement des r??clamations ou bien les informations d??j?? fournies vous semblent suffisantes ? </div></br>
                                <div style="text-align:left;padding:50px">
                                <b>Si souhait d&#39en savoir plus : sachez que...</b> 
                                </br>
                                <ul style="font-size:12px;line-height:1">
                                <li>La gestion des saisies des adh??sions est confi??e ?? COFIDIS,</li>
                                <li>Coordonn??es de l&#39assureur (si??ge social): Serenis Assurance, 25 rue du Docteur Henri Abel - 26000 Valence RCS ROMANS 350 838 686</li>
                                <li>Coordonn??es de l&#39autorit?? de contr??le: l&#39ensemble des soci??t??s est soumis au contr??le de l&#39Autorit?? de Contr??le Prudentiel et de R??solution, 61 rue Taitbout 75436 Paris cedex 09. Pour plus d&#39informations, le registre des interm??diaires d&#39assurance (ORIAS) est librement accessible sur le site internet www.orias.fr. Je vous communique ??galement les coordonn??es de notre service Cofidis Assurance, Autorisation 50040, 59869 Villeneuve d&#39Ascq cedex</li> 
                                <li>INDEMNI + est un contrat d&#39assurance collectif ?? adh??sion facultative souscrit par COFIDIS aupr??s de SERENIS Assurance, Service Pr??voyance - 46 rue Jules M??line - 53098 LAVAL Cedex 9.</li> 
                                <li>Loi applicable: la loi fran??aise</li> 
                                <li>Langue du contrat: fran??ais</li> 
                                <li>Modalit??s de traitement des r??clamations: entrez en contact d&#39abord avec votre interlocuteur habituel SERENIS ASSURANCES. Si sa r??ponse ne vous satisfait pas : Vous pouvez adresser votre r??clamation au: Responsable des relations consommateurs S??r??nis Assurances 34 rue du Wacken 67906 Strasbourg cedex 9.Si votre litige n&#39est toujours pas r??solu : Les coordonn??es du M??diateur vous seront communiqu??es par l&#39assureur</li>
                                </ul>
                                </div>
                                <div style="text-align:left;margin-left:50px"> Je vous remercie du temps que vous m&#39avez consacr?? <b style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></b> et vous souhaite une excellente journ??e de la part de toute l&#39equipe de <b style="color:green">Cofidis</b> et de moi-m??me.</div>

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
            echo '<script>window.location="https://192.168.1.4/DashKGL/?id=4";</script>';

        }


    ?>
	 


</body>
</html>
