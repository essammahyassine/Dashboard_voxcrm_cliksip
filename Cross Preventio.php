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
                            Enregistrement validé avec succés.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                      </div>';
            $ok = 'ok';
                  }

    
   
        
        $idcont = $_GET['idcont'];

        $queryrec = "SELECT c.RefProspect,  c.NumAppel1,    c.NUM_CLIENT,   c.NUM_CLIENT2,  c.CIVILITE,c.ClientID,c.ClientID2, c.lastname as NOM,  c.firstname as PRENOM,  c.ADR_ETAGE,    c.ADR_BATIMENT, c.ADR_RUE,  c.ADR_4,    c.ADR_CP,   c.ADR_COMMUNE,  c.NAIS_EMP, c.AGE_EMP,  c.NAIS_CO_EMP,  c.AGE_CO_EMP,   c.CIVILITE_COT, c.NOM_COT,  c.PRENOM_COT,   c.NUM_PLAN, c.CSP,  c.SITUATION_FAMILIALE,  c.SITUATION_LOCATIVE,   c.TOP_CIBLE,    c.COTISATION,   c.COTISATION_2, c.CAPITAL,  c.PRIME_MOIS,   c.PRIME_MOIS_2, c.PRIME_JOUR,   c.PRIME_JOUR_2, c.COUVERTURE_1, c.COUVERTURE_2, c.COUVERTURE_5, c.DEST, c.Refappel, u.name as HOTESSE,    DATE_FORMAT( o.agent_start,  '%Y%m%d' ) AS DateAppel,   DATE_FORMAT( o.agent_start,  '%H%i%s' ) AS HeureAppel,  s.RefQualif,    s.RefCatg,  c.Newrib,   c.BIC,  c.RecordFileName,   c.PREUVE_SONORE_OUT,    s.Conclusion,   s.MotifRefus,   s.Lib_EI, c.MENS_VAL,c.DETTE,c.COUVERTURE_3,c.CAPITAL,o.monitor_filename as Link,o.note,c.phone_1 as TEL,c.COMMENTAIRE as comi
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

  <header id="header" class="header" >

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
                        <h1>Preventio</h1>
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
                <audio controls autoplay controlsList="nodownload" id="myAudio">
                      <source src="../record/monitor/voxcrm/<?=$rec?>" type="audio/wav">
                      <source src="../record/monitor/voxcrm/<?=$rec?>" type="audio/wav">
                </audio>
                <button onclick="setPlaySpeed()" type="button" class="btn btn-success">x2</button>
                <button onclick="normal()" type="button" class="btn btn-success">normal</button>
            </div>
            <div class="col-sm-2">
                 Telephone : <?=$rowcont['TEL']?></br>
                 commentaire : <?=$rowcont['comi']?></br>
                 Preuve SonoreOUT : <?=$rowcont['PREUVE_SONORE_OUT']?>
            </div>
            </div>
        </div>

        </header><!-- /header -->


            
        <!-- Header-->



        <div class="content mt-3" >

            <div class="">
                    <div style="text-align:center; background-color:#3399CC; padding:5px;color:white"><H1><CENTER><B>Preventio - Enregistrement</B></CENTER></H1></div>

                    
                            </br>
                        
                            <div>Commentaire : <b style="color:#0033CC;text-align:center"> <?=$rowcont['note']?></b></div>
                            </br>
                            <table>
                            <tr><td>
                            <h3 style="color:#0033CC;margin-left:40px">Cordonnées EUMPRUNTEUR :</h3></td>
                            <td>
                            <h3 style="color:#0033CC;margin-left:40px">Cordonnées CO_EUMPRUNTEUR :</h3></td>
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
                            <div>Capital restant dû :<b style="color:#990066;text-align:center"> <?=$rowcont['DETTE']?></b></div>
                            <div>Mensualités: <b style="color:#990066;text-align:center"> <?=$rowcont['MENS_VAL']?></b></div>
                            <div>Type crédit :<b style="color:#990066;text-align:center"> <?=$rowcont['CARTE']?></b></div>
                            <div>ADE :<b style="color:#990066;text-align:center"> <?=$rowcont['DATE_SOUSCRIPTION']?></b></div>
                            <div>Ancienneté client :<b style="color:#990066;text-align:center"> <?=$rowcont['COUVERTURE_3']?>  an(s) </b></div>
                            <div>Date d ouverture du compte :<b style="color:#990066;text-align:center"> <?=$rowcont['DATE_DERNIER_CREDIT']?></b></div>
                            </div>
                            </td>
                            </TR>
                            </table>



                            <div style="text-align:left;margin-left:50px"><strong style="color:green"> <?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?> </strong> 
Je suis Sonia / Yanis d&#39;Ad Prévoyance, intervenant pour le compte de COFIDIS, société de courtage d&#39;assurance qui vous propose le contrat d&#39;assurance PREVENTIO assuré auprès de SERENIS ASSURANCES. </div>
                            </br>


                            <div style="text-align:left;margin-left:50px">Très bien <strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, afin d'éviter toute erreur administrative dans le traitement de votre adhésion, êtes-vous toujours d’accord pour qu'il soit procedé à l’enregistrement de la présente conversation téléphonique ?
 </div>
                            </br>


                            <div style="text-align:center"><strong style="color:green">Réponse client: OUI</strong></div>

                            </br>
                            <div style="text-align:left;margin-left:50px">Cet enregistrement téléphonique servira de preuve de votre souscription. 


                            Les informations collectées lors de cet enregistrement seront notamment traitées par <strong style="color:green">COFIDIS</strong> et SERENIS ASSURANCES aux fins d'exécution du contrat et d'exploitation commerciale. Bien entendu, vous disposez notamment, s’agissant de vos données personnelles, d’un droit d’accès, de mise à jour, de rectification, d’opposition, de limitation et de portabilité.<br>
                            Vous pouvez exercer ces droits en adressant un courrier simple au Délégué à la Protection des Données, comme précisé dans la notice d’information, qui vous apportera également de plus amples renseignements quant à l’utilisation de vos données personnelles.
                            <br>
                            <strong style="color:red">Consentez-vous à ce que vos données personnelles, en particulier celles concernant votre santé, soient traitées en vue de l’établissement, de la gestion et de l’exécution de votre contrat?</strong>
</span></strong></span></p>
                                <p><strong><span style="color: #ffaa00;"><span style="font-family: arial, sans-serif;"><span style="font-family: Wingdings;">à</span></span><span style="font-family: arial, sans-serif;">&nbsp;Obtenir un OUI</span></span><span style="color: #ff0000;"> </span></strong> </p>

                            </div>

                             
                            </br>

                            <div style="text-align:left;margin-left:50px"><strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>,  à la suite de cet enregistrement, nous allons vous envoyer à nouveau tous les documents d’informations précontractuelle dont le document d’information sur le produit d’assurance et la Notice d'information portant l'ensemble des conditions et limites contractuelles applicables aux garanties de la présente offre d'assurance. Vous reconnaissez les lire dès réception. D'accord ?</div>
                            </br>
                            <div style="text-align:center"><strong style="color:green">Réponse client: OUI</strong></div>
                            </br>

<div style="text-align:center"><strong style="color:red">Me permettez-vous de vous rappeler de manière simplifiée en quoi l’assurance consiste ?</strong></div>
                            </br>


                            <div style="text-align:left;margin-left:50px"><strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, j&#39;aimerais confirmer vos coordonnées : </div>
                            </br>
                            <div style="text-align:left;margin-left:70px"><b>titre :</b> <?=$rowcont['CIVILITE']?>
                            </div>

                            <div style="text-align:left;margin-left:70px"><b>Nom :</b> <?=$rowcont['NOM']?>

                            </div>

                            <div style="text-align:left;margin-left:70px"><b>Prenom :</b> <?=$rowcont['PRENOM']?>

                            </div></br>
                            <div style="text-align:left;margin-left:50px">
                            <b>• Vous êtes bien né(e) le : </b></div></br>


                            <div style="text-align:left;margin-left:70px"><b>Date Naissance :</b> <?=$rowcont['NAIS_EMP']?></div>
                            </br>

                            <div style="text-align:left;margin-left:50px">
                            <b>• Vous habitez bien :</b></div></br>

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

                            <div style="text-align:left;margin-left:50px"><strong style="color:orange">--- >> ATTENTION SI + DE 65 ANS NE PAS DIRE LA PERTE TOTALE ET IRREVERSIBLE D’AUTONOMIE (PTIA)</strong></div>

                            </br>
                            <div style="text-align:left;margin-left:50px"><strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, <b >nous vous informons que compte-tenu de votre situation personnelle, vous pouvez bénéficier en cas d’accident de la garantie Décès ainsi que la garantie Perte Totale et Irréversible d'Autonomie dès lors que vous :
                            <ul>


                            <li> êtes majeur et âgé(e) de moins de 70 ans,</li>
                            <li> avez votre résidence principale et fiscale en France métropolitaine,</li>
                            </ul>
                            Nous attirons votre attention sur le fait que vous ne pouvez pas bénéficier de la (Perte Totale et Irréversible d'Autonomie) si vous avez liquidé votre retraite ou atteint l’âge prévu par la loi de la retraite à taux plein, est ce que c’est votre cas ? </div>
                            </br>


                            <div style="text-align:center"><strong style="color:red">Si oui, on fait disparaitre tout ce qui est PTIA</strong></div>
                            </br>
                            <div style="text-align:center"><strong style="color:green">Si non, le script se déroule avec la PTIA. </strong></div>
                            </br>
                             <div style="text-align:left;margin-left:50px"><strong style="color:orange">--- >> Vous nous confirmez donc votre intérêt à une assurance de prévoyance individuelle qui vous couvrirait en cas de décès accidentel <strong style="color:red">[et de Perte totale et irréversible d'autonomie]</strong> consécutive à un accident ?</strong></div>




                            <div style="text-align:left;margin-left:50px">Parfait, compte tenu de l'ensemble des informations que vous nous avez fournies, le contrat PREVENTIO est conseillé. PREVENTIO répond à votre besoin en ce sens qu'il prévoit de vous assurer dés la fin de cet enregistrement, en cas de sinistre pour <strong style="color:brown"> <?=$rowcont['COTISATION']?> </strong> euros par mois pour un montant de <strong style="color:brown"><?=$rowcont['PRIME_MOIS']?> </strong> euros dont :
                            <ul>
                            <li> <strong style="color:brown"> <?=$rowcont['CAPITAL']?> </strong> euros en capital,</li> 
                            <li> plus une rente de <strong style="color:brown"> <?=$rowcont['PRIME_MOIS_2']?> </strong> euros par mois sur une durée de 12 mois, soit <strong style="color:brown"> <?=$rowcont['PRIME_JOUR']?> </strong> euros au total </li>
                            En cas d’accident de la circulation, le montant du capital et le montant de la rente sont doublés.
<br>
                            Vous bénéficiez en plus d'une assistance personnalisée. Vous trouverez la définition complète de ces garanties ainsi que les cas de cessation de ces garanties dans la notice d'information.
                            <br>

Il y a quelques exclusions comme par exemple la maladie, l'usage de stupéfiants, la pratique de sport à titre professionnel ou d'accident survenu sous l'emprise d'un état alcoolique : je vous invite à les consulter également dans la Notice d'information de l'assurance que je vais vous envoyer de nouveau..
<br>

 </div>
                            </br>
                            <div style="text-align:left;margin-left:50px">En cas de décès accidentel, les bénéficiaires sont votre conjoint (marié non séparé de corps ou votre partenaire lié par un PACS ou votre concubin notoire), à défaut, par parts égales vos enfants nés ou à naître, vivants ou représentés, à défaut, par parts égales, vos héritiers. Vous confirmez ?
                            </div>
                            </br>
                            <div style="text-align:center"><strong style="color:green">Réponse client: OUI</strong></div>
                            </br>
                            
                            <div style="text-align:left;margin-left:50px">En l’absence de bénéficiaire acceptant, vous pouvez bien évidemment modifier à tout moment la désignation de vos bénéficiaires par courrier avec lettre recommandée envoyée à l'assureur dont vous trouverez les coordonnées dans la notice d'information.
                            <br>

Je vous rappelle que cette « adhésion » est conclue pour une durée d'un an et renouvelable annuellement par tacite reconduction.
<br>
Vous aurez néanmoins la possibilité d’y renoncer dans les 14 jours qui suivent la réception de la Notice d’information par lettre recommandée avec accusé de réception, à Cofidis au Parc de la Haute Borne, à Villeneuve d’Ascq. Passé ce délai, elle est résiliable à tout moment. <br>
                            </div>
                            </br>
                            <div style="text-align:left;margin-left:50px"><strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, vous acceptez que la cotisation mensuelle de <strong style="color:brown"> <?=$rowcont['COTISATION']?> </strong> euros par mois soit automatiquement prélevée par Serenis Assurances sur votre compte bancaire connu chez COFIDIS ? </div>
                            </br>
                            <div style="text-align:center"><strong style="color:green">Réponse client: OUI</strong></div>
                            </br>


                            <div style="text-align:left;margin-left:50px">Votre accord vaut mandat de prélèvement. La référence unique de mandat vous sera confirmée lors de l'envoi du certificat d’adhésion. <br/>
                            <strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, vous nous confirmez donc demander à adhérer à l&#39;assurance PREVENTIO de COFIDIS. </div>
                            </br>



                            <div style="text-align:center"><strong style="color:green">Réponse client: OUI</strong></div>
                            </br>


                            <div style="text-align:left;margin-left:50px">Êtes-vous d&#39;accord pour que votre adhésion prenne effet immédiatement tout en conservant votre droit à renonciation ? </div> 
                            </br>

                            <div style="text-align:center"><strong style="color:green">Réponse client: OUI</strong></div>
                            </br>
                            <div style="text-align:left;margin-left:50px">Parfait, suite à notre conversation vous recevrez le document d’information sur le produit d’assurance, le certificat d'adhésion et un exemplaire de la Notice d'information. En plus, nous avons le plaisir de vous offrir le premier mois de cotisation.
                            <br>

Souhaitez-vous en savoir plus notamment sur votre Intermédiaire d’assurance, notre Assureur, l’Autorité de Contrôle de l’assureur, la loi et la langue applicables au contrat ainsi que le fonctionnement des réclamations ou bien les informations déjà fournies vous semblent suffisantes ?<br>

Tout est clair pour vous ?<br> </div> 
                            </br>


                            <div style="text-align:left;margin-left:50px"><strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, Je vous remercie du temps que vous m&#39;avez consacré, et je vous souhaite une excellente journée de la part de Cofidis.</div>
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
            echo '<script>window.location="https://192.168.1.4/DashKGL/?id=1";</script>';
 
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
