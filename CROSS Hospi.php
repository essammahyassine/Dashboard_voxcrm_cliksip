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

        $queryrec = "SELECT c.RefProspect,  c.NumAppel1,    c.NUM_CLIENT,   c.NUM_CLIENT2,  c.CIVILITE, c.lastname as NOM,  c.firstname as PRENOM,  c.ADR_ETAGE,    c.ADR_BATIMENT, c.ADR_RUE,  c.ADR_4,    c.ADR_CP,   c.ADR_COMMUNE,  c.NAIS_EMP, c.AGE_EMP,  c.NAIS_CO_EMP,  c.AGE_CO_EMP,   c.CIVILITE_COT, c.NOM_COT,  c.PRENOM_COT,   c.NUM_PLAN, c.CSP,  c.SITUATION_FAMILIALE,  c.SITUATION_LOCATIVE,   c.TOP_CIBLE,    c.COTISATION,   c.COTISATION_2, c.CAPITAL,  c.PRIME_MOIS,   c.PRIME_MOIS_2, c.PRIME_JOUR,   c.PRIME_JOUR_2, c.COUVERTURE_1, c.COUVERTURE_2, c.COUVERTURE_5, c.DEST, c.Refappel, u.name as HOTESSE,    DATE_FORMAT( o.agent_start,  '%Y%m%d' ) AS DateAppel,   DATE_FORMAT( o.agent_start,  '%H%i%s' ) AS HeureAppel,  s.RefQualif,    s.RefCatg,  c.Newrib,   c.BIC,  c.RecordFileName,   c.PREUVE_SONORE_OUT,    s.Conclusion,   s.MotifRefus,   s.Lib_EI, c.MENS_VAL,c.DETTE,c.COUVERTURE_3,c.CAPITAL,o.monitor_filename as Link,o.note,c.phone_1 as TEL
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
                            <li class="active">Hospi</li>
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
                                $recname = 'KGLFICSON_14940_'.$rowcont['NUM_CLIENT'].'_'.$rowcont['NUM_CLIENT2'].'_'.$rowcont['DateAppel'].'_'.$rowcont['HeureAppel'].'.wav';  
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
                <button name="save" type="submit" class="btn btn-success">Valider</button>
                <a href="../record/monitor/voxcrm/<?=$rec?>" id="dn" download="<?=$recname?>"></a>
                
            </form>
             
            </div>

            <div class="col-sm-5">
                <audio controls autoplay controlsList="nodownload" id="myAudio">
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
<!--<div class="col-sm-12 form-group">
			<div class="col-sm-2">
			
			<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal">Modifier</button>
			
         
            </div>
			
            <div class="col-sm-2">
			
			
			
            <form  method="post">
                  <input type="hidden" name="idcont" value="<?=$idcont?>" >
                <input type="hidden" name="namerecord" value="<?=$recname?>">
                <button name="save" type="submit" class="btn btn-success">Valider</button>
                <a href="../record/monitor/voxcrm/<?=$rec?>" id="dn" download="<?=$recname?>"></a>
				
            </form>
			 
            </div>

            <div class="col-sm-5">
                <audio controls autoplay controlsList="nodownload">
                      <source src="../record/monitor/voxcrm/<?=$rec?>" type="audio/wav">
                      <source src="../record/monitor/voxcrm/<?=$rec?>" type="audio/wav">
                    
                </audio>
                  <button onclick="setPlaySpeed()" type="button" class="btn btn-success">x2</button>
                <button onclick="normal()" type="button" class="btn btn-success">normal</button>
            </div>
            <div class="col-sm-2">
                 Telephone : <?=$rowcont['TEL']?>
            </div>
            </div>-->
            <!--<div class="col-sm-12 form-group">
            <div class="col-sm-1">
            <form  method="post">
                <input type="hidden" name="idcont" value="<?=$idcont?>" >
                <button name="save" type="submit" class="btn btn-success">Valider</button>
                <a href="../record/monitor/voxcrm/<?=$rec?>" id="dn" download="<?=$recname?>"></a>
            </form>

            </div>
            <div class="col-sm-6">
                <audio controls autoplay controlsList="nodownload">
                      <source src="../record/monitor/voxcrm/<?=$rec?>" type="audio/wav">
                      <source src="../record/monitor/voxcrm/<?=$rec?>" type="audio/wav">
                </audio>
            </div>
            </div>-->

            <div class="col-xl-12">
                    <div style="text-align:center; background-color:#993366; padding:5px;color:white"><H1><CENTER><B>HOSPI - Enregistrement</B></CENTER></H1></div>
                    
                            </br>
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

                            <div style="text-align:left;margin-left:50px;margin-right:50px"><b>
                                <strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong> L???enregistrement vient de d??buter, je suis Sophie Berthier / St??phane Caron, responsable Pr??voyance de <strong 

                                style="color:green">COFIDIS</strong>, soci??t?? de courtage d&#39;assurance qui vous propose le contrat d&#39;assurance <strong style="color:green">HOSPIPROTEC</strong> assur?? aupr??s de 

                                <strong style="color:green">SERENIS ASSURANCES.</strong> 

                                Tr??s bien <strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, afin d&#39;??viter toute erreur administrative dans le traitement de votre adh??sion, ??tes-vous toujours d???accord 

                                pour qu&#39;il soit proc??d?? ?? l???enregistrement de la pr??sente conversation t??l??phonique ? </b>
                                </div>
                                </br>
                                <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div>
                                </br>
                                <div style="text-align:left;margin-left:50px;margin-right:50px"><b>
                                Cet enregistrement t??l??phonique servira de preuve de votre souscription. 

                                Les informations collect??es lors de cet enregistrement seront notamment trait??es par <strong style="color:green">COFIDIS</strong> et <strong style="color:green">SERENIS 

                                ASSURANCES</strong> aux fins d&#39;ex??cution du contrat et d&#39;exploitation commerciale. Bien entendu, vous b??n??ficiez d&#39;un droit d&#39;acc??s, de rectification et d&#39;opposition au 

                                traitement de vos donn??es personnelles, en particulier aupr??s de <strong style="color:green">SERENIS</strong> par courrier simple, comme pr??cis?? dans la notice d&#39;information. 

                                    <p><span style="color: #ff0000;"><strong><span style="font-family: arial, sans-serif;">Consentez-vous ?? ce que vos donn??es personnelles, en particulier celles concernant votre sant??, soient trait??es en vue de l'??tablissement, de la gestion et de l'ex??cution de votre contrat ?&nbsp;</span></strong></span></p>
                                <p><strong><span style="color: #ffaa00;"><span style="font-family: arial, sans-serif;"><span style="font-family: Wingdings;">??</span></span><span style="font-family: arial, sans-serif;">&nbsp;Obtenir un OUI</span></span><span style="color: #ff0000;"> </span></strong> </p>

                                <strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, ?? la suite de cet enregistrement, nous allons vous renvoyer la Notice d&#39;information portant l&#39;ensemble des conditions 

                                et limites contractuelles applicables aux garanties de la pr??sente offre d&#39;assurance.
                                Nous vous invitons ?? prendre connaissance d??s r??ception. D???accord ?</b>
                                </div>

                                </br>
                                <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div>
                                </br>

                                <div style="text-align:left;margin-left:50px"><b><strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, j&#39;aimerais confirmer vos coordonn??es : </b></div></br>

                                <div style="text-align:left;margin-left:70px"><b>titre :</b> <?=$rowcont['CIVILITE']?>
                            </div>

                            <div style="text-align:left;margin-left:70px"><b>Nom :</b> <?=$rowcont['NOM']?>

                            </div>

                            <div style="text-align:left;margin-left:70px"><b>Prenom :</b> <?=$rowcont['PRENOM']?>

                            </div></br>
                            <div style="text-align:left;margin-left:50px">
                            <b>??? Vous ??tes bien n??(e) le : </b></div></br>


                            <div style="text-align:left;margin-left:70px"><b>Date Naissance :</b> <?=$rowcont['NAIS_EMP']?></div>
                            </br>

                            <div style="text-align:left;margin-left:50px">
                            <b>??? Vous habitez bien :</b></div></br>

                            <div style="text-align:left;margin-left:70px"><b>Adresse etage :</b> <?=$rowcont['ADR_ETAGE']?></div>

                            <div style="text-align:left;margin-left:70px"><b>adresse batimant :</b> <?=$rowcont['ADR_BATIMENT']?></div>

                            <div style="text-align:left;margin-left:70px"><b>adresse rue :</b> <?=$rowcont['ADR_RUE']?></div>

                            <div style="text-align:left;margin-left:70px"><b>Adresse 4 :</b> <?=$rowcont['ADR_4']?></div>

                            <div style="text-align:left;margin-left:70px"><b>Code postal :</b> <?=$rowcont['ADR_CP']?></div>

                            <div style="text-align:left;margin-left:70px"><b>Adresse commune :</b> <?=$rowcont['ADR_COMMUNE']?></div></br>
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
								
                                <div style="text-align:left;margin-left:50px;margin-right:50px"><b>
                                <strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, vous b??n??ficiez de la garantie <strong style="color:green">HospiProtec </strong> d??s lors :<ul>
                                <li> que vous ??tes ??g??(e) de moins de 71 ans,</li> 
                                <li> et avez votre r??sidence principale et fiscale en France, Vous confirmez ?</li></ul></b></div>
                                <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div>
                                </br>

                                <div style="text-align:left;margin-left:50px;margin-right:50px"><b>
                                Vous nous confirmez donc votre int??r??t ?? une assurance de pr??voyance qui vous couvrirait en cas d"hospitalisation ?</b></div></br>

                                <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div>
                                </br>

                                <div style="text-align:left;margin-left:50px;margin-right:50px"><b>
                                Le contrat <strong style="color:green">HOSPIPROTEC</strong> r??pond ?? votre besoin en ce sens qu&#39;il pr??voit pour une cotisation de <strong style="color:brown"><?=$rowcont['COTISATION']?></strong> 

                                ??? par mois :
                                <ul>
                                <li> Le versement d???une indemnit?? de 30???/jour en cas d???hospitalisation suite ?? une maladie apr??s une carence de 180 jours</li>
                                <li> Et le versement d???une indemnit?? de 60???/jour en cas d???hospitalisation suite ?? un accident sans AUCUN d??lai de carence.</li>
                                <li> Tr??s important aussi, une couverture d??s le premier jour, pour une hospitalisation de plus de 2 jours cons??cutifs et <strong style="color:red">AUCUN QUESTIONNAIRE</strong> 

                                de sant??. Vous confirmez ?</li></ul></b></div>

                                </br>
                                <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div>
                                </br>


                                <div style="text-align:left;margin-left:50px;margin-right:50px"><b>
                                Bien s??r, il y a quelques exclusions comme certains types d???hospitalisation de jour, ?? domicile ou ambulatoire.

                                Et certains types de s??jours comme les s??jours en g??riatrie et en structure de perte d???autonomie, en ??tablissement de psychiatrie, pour des soins ou traitements esth??tiques, et 

                                en ??tablissement de cure quel qu???en soit le motif m??dical.

                                Mais autrement le contrat a ??t?? con??u pour vous garantir contre presque toutes les causes de l???hospitalisation qu???elles soient cons??cutives ?? un accident ou une maladie.</b>
                                </div>
                                </br>

                                <div style="text-align:left;margin-left:50px;margin-right:40px"><b>
                                Je vous rappelle que ce contrat est conclu pour une dur??e d&#39;un an et est renouvelable annuellement par tacite reconduction. Il est r??siliable ?? tout moment. 

                                Vous aurez n??anmoins la possibilit?? de renoncer ?? cette adh??sion dans les 14 jours qui suivent la r??ception des conditions g??n??rales par lettre recommand??e aupr??s de <strong 

                                style="color:green">SERENIS.</strong></b> 
                                </div>

                                </br>

                                <div style="text-align:left;margin-left:50px;margin-right:50px"><b>
                                <strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, vous acceptez que la cotisation mensuelle de <strong style="color:brown"><?=$rowcont['COTISATION']?></strong> ??? / mois soit 

                                automatiquement pr??lev??e par <strong style="color:green">Serenis Assurance</strong> sur votre compte bancaire connu chez <strong style="color:green">COFIDIS</strong> ? 

                                </b></div>

                                </br>
                                <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div>
                                </br>


                                <div style="text-align:left;margin-left:50px;margin-right:50px"><b>
                                Votre accord vaut mandat de pr??l??vement. La r??f??rence unique de mandat vous sera confirm??e lors de l&#39;envoi du certificat d&#39;adh??sion. </b></div>
                                </br>
                                <div style="text-align:left;margin-left:50px;margin-right:50px"><b>
                                <strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, suite aux informations que nous venons de vous donner, vous nous confirmez donc demander ?? adh??rer ?? l"assurance 

                                HOSPI???PROTEC de COFIDIS ? </b></div>

                                </br>
                                <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div>
                                </br>

                                <div style="text-align:left;margin-left:50px;margin-right:50px"><b>
                                ??tes-vous d&#39;accord pour que votre adh??sion prenne effet imm??diatement tout en conservant votre droit ?? renonciation ?</b></div> 


                                </br>
                                <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div>
                                </br>

                                <div style="text-align:left;margin-left:50px;margin-right:50px"><b>
                                Parfait, suite ?? notre conversation, vous recevrez le certificat d"adh??sion et un exemplaire de la Notice d&#39;information. 
                                En plus, nous avons le plaisir de vous offrir le premier mois de cotisation. 

                                Souhaitez-vous en savoir plus ou bien les informations d??j?? fournies vous semblent suffisantes ?</b> 
                                </div>
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
