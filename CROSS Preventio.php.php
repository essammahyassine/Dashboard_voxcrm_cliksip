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
  <header id="header" class="header" style="position: fixed;">
        <?php include 'Call_Option.php'; ?>
             
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Qualit??</h1>
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



        <div class="content mt-3" style="padding-top: 250px">

            <div class="">
                    <div style="text-align:center; background-color:#3399CC; padding:5px;color:white"><H1><CENTER><B>Preventio - Enregistrement</B></CENTER></H1></div>

                    
                            </br>
                        
                            <div>Commentaire : <b style="color:#0033CC;text-align:center"> <?=$rowcont['note']?></b></div>
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



                            <div style="text-align:left;margin-left:50px"><strong style="color:green"> <?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?> </strong> l???enregistrement vient de d??buter, je suis Sophie Berthier / St??phane Caron, responsable Pr??voyance de COFIDIS, soci??t?? de courtage d&#39;assurance qui vous propose le contrat d&#39;assurance PREVENTIO assur?? aupr??s de SERENIS ASSURANCES. </div>
                            </br>


                            <div style="text-align:left;margin-left:50px">Tr??s bien <strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, afin d&#39;??viter toute erreur administrative dans le traitement de votre adh??sion, ??tes-vous toujours d???accord pour qu"il soit proc??d?? ?? l???enregistrement de la pr??sente conversation t??l??phonique ? </div>
                            </br>


                            <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div>

                            </br>
                            <div style="text-align:left;margin-left:50px">Cet enregistrement t??l??phonique servira de preuve de votre souscription. 
                            Les informations collect??es lors de cet enregistrement seront notamment trait??es par <strong style="color:green">COFIDIS</strong> et SERENIS ASSURANCES aux fins d&#39;ex??cution du contrat et d&#39;exploitation commerciale. Bien entendu, vous b??n??ficiez d&#39;un droit d&#39;acc??s, de rectification et d&#39;opposition au traitement de vos donn??es personnelles aupr??s de <strong style="color:green">COFIDIS</strong> par courrier simple.
                            </br>

                            <p><span style="color: #ff0000;"><strong><span style="font-family: arial, sans-serif;">Consentez-vous ?? ce que vos donn??es personnelles, en particulier celles concernant votre sant??, soient trait??es en vue de l'??tablissement, de la gestion et de l'ex??cution de votre contrat ?&nbsp;</span></strong></span></p>
                                <p><strong><span style="color: #ffaa00;"><span style="font-family: arial, sans-serif;"><span style="font-family: Wingdings;">??</span></span><span style="font-family: arial, sans-serif;">&nbsp;Obtenir un OUI</span></span><span style="color: #ff0000;"> </span></strong> </p>

                            </div>

                             

                            </br>

                            <div style="text-align:left;margin-left:50px"><strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, ?? la suite de cet enregistrement, nous allons vous envoyer la Notice d&#39;information portant l&#39;ensemble des conditions et limites contractuelles applicables aux garanties de la pr??sente offre d&#39;assurance et vous reconnaissez en prendre connaissance d??s r??ception. d&#39;accord ?</div>
                            </br>
                            <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div>
                            </br>

                            <div style="text-align:left;margin-left:50px"><strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, j&#39;aimerais confirmer vos coordonn??es : </div>
                            </br>
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

                            <div style="text-align:left;margin-left:50px"><strong style="color:orange">--- >> ATTENTION SI + DE 65 ANS NE PAS DIRE LA PERTE TOTALE ET IRREVERSIBLE D???AUTONOMIE (PTIA)</strong></div>

                            </br>
                            <div style="text-align:left;margin-left:50px"><strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, <b style="color:red">nous vous informons que compte-tenu de votre situation personnelle</b>, vous b??n??ficiez de la garantie D??c??s accidentel   <b>[    ainsi que la garantie Perte Totale et Irr??versible d&#39;Autonomie] suite ?? un accident d??s lors que vous : </b>
                            <ul>
                            <li> ??tes ??g??(e) de moins de 70 ans,</li>
                            <li> avez votre r??sidence principale et fiscale en France m??tropolitaine,</li>
                            </ul>
                            Vous nous confirmez donc votre int??r??t ?? une assurance de pr??voyance individuelle qui vous couvrirait en cas de d??c??s accidentel <b>[ et de Perte totale et irr??versible d&#39;autonomie  ]</b> cons??cutive ?? un accident ?  </div>
                            </br>


                            <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div>
                            </br>



                            <div style="text-align:left;margin-left:50px">Parfait, compte tenu de l&#39;ensemble des informations que vous nous avez fournies, le contrat PREVENTIO est conseill??. 
                            PREVENTIO r??pond ?? votre besoin en ce sens qu"il pr??voit de vous assurer d??s la fin de cet enregistrement, en cas de d??c??s accidentel <b>[   et en cas de Perte Totale et Irr??versible d&#39;Autonomie cons??cutive ?? un accident   ]</b> pour <strong style="color:brown"> <?=$rowcont['COTISATION']?> </strong> euros par mois pour un montant de <strong style="color:brown"><?=$rowcont['PRIME_MOIS']?> </strong> euros dont :
                            <ul>
                            <li> <strong style="color:brown"> <?=$rowcont['CAPITAL']?> </strong> euros en capital,</li> 
                            <li> plus une rente de <strong style="color:brown"> <?=$rowcont['PRIME_MOIS_2']?> </strong> euros par mois sur une dur??e de 12 mois, soit <strong style="color:brown"> <?=$rowcont['PRIME_JOUR']?> </strong> euros au total </li>
                            <li> vous b??n??ficiez en plus d&#39;une assistance personnalis??e </li>
                            </ul>
                            Vous trouverez la d??finition compl??te de ces garanties ainsi que les cas de cessation de ces garanties dans la notice d&#39;information. Il y a quelques exclusions comme par exemple la maladie, l&#39;usage de stup??fiants, la pratique de sport ?? titre professionnel ou d&#39;accident survenu sous l&#39;emprise d&#39;un ??tat alcoolique: je vous invite ?? les consulter ??galement dans la Notice d&#39;information de l&#39;assurance que je vais vous envoyer. </div>
                            </br>
                            <div style="text-align:left;margin-left:50px">En cas de d??c??s accidentel, les b??n??ficiaires sont votre conjoint (mari?? non s??par?? de corps ou votre partenaire li?? par un PACS ou votre concubin notoire), ?? d??faut, par parts ??gales vos enfants n??s ou ?? na??tre, vivants ou repr??sent??s, ?? d??faut, par parts ??gales, vos h??ritiers. 
                            Vous confirmez ? 
                            </div>
                            </br>
                            <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div>
                            </br>
                            <div style="text-align:left;margin-left:50px;color:blue"><i>J&#39;ai encore quelques questions ?? vous poser et vous serez totalement tranquille.</i></div>
                            </br>
                            <div style="text-align:left;margin-left:50px">En l???absence de b??n??ficiaire acceptant, vous pouvez bien ??videmment modifier ?? tout moment la d??signation du b??n??ficiaire par courrier avec lettre recommand??e envoy??e ?? l&#39;assureur dont vous trouverez les coordonn??es dans la notice d&#39;information.
                            Je vous rappelle que ce contrat est conclu pour une dur??e d&#39;un an et est renouvelable annuellement par tacite reconduction. Il est r??siliable ?? tout moment.
                            Vous avez la possibilit?? de renoncer ?? cette adh??sion dans les 14 jours qui suivent la reception des conditions generales selon les modalit??s d??taill??es dans la Notice d&#39;information.  
                            </div>
                            </br>
                            <div style="text-align:left;margin-left:50px"><strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, vous acceptez que la cotisation mensuelle de <strong style="color:brown"> <?=$rowcont['COTISATION']?> </strong> euros par mois soit automatiquement pr??lev??e par Serenis Assurances sur votre compte bancaire connu chez COFIDIS ? </div>
                            </br>
                            <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div>
                            </br>


                            <div style="text-align:left;margin-left:50px">Votre accord vaut mandat de pr??l??vement. La r??f??rence unique de mandat vous sera confirm??e lors de l&#39;envoi du certificat de garantie. <br/>
                            <strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, vous nous confirmez donc demander ?? adh??rer ?? l&#39;assurance PREVENTIO de COFIDIS. </div>
                            </br>



                            <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div>
                            </br>


                            <div style="text-align:left;margin-left:50px">??tes-vous d&#39;accord pour que votre adh??sion prenne effet imm??diatement tout en conservant votre droit ?? renonciation ? </div> 
                            </br>

                            <div style="text-align:center"><strong style="color:green">R??ponse client: OUI</strong></div>
                            </br>
                            <div style="text-align:left;margin-left:50px">Suite ?? notre conversation vous recevrez le certificat de garantie et la notice d&#39;information. En plus, nous avons le plaisir de vous offrir le premier mois de cotisation. 
                            Souhaitez-vous en savoir plus ou bien les informations d??j?? fournies vous semblent suffisantes ?</div> 
                            </br>


                            <div style="text-align:left;margin-left:50px"><strong style="color:green"><?=$rowcont['CIVILITE'] .' '. $rowcont['NOM']; ?></strong>, Je vous remercie du temps que vous m&#39;avez consacr??, je vous souhaite une excellente journ??e de la part de COFIDIS.</div>
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
