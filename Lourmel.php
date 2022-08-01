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
  
/* if (isset($_POST['modifier'])) {

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

          


        }*/
   

   /* if (isset($_POST['modifier'])) {

            $c = $_POST['idcont'];
            $CIVILITE = $_POST['CIVILITE'];
            $NOM = $_POST['NOM'];
			$PRENOM = $_POST['PRENOM'];
			$DATENAISSANCE = $_POST['DATENAISSANCE'];
			$AGE = $_POST['AGE'];
			//$ADR_ETAGE = $_POST['ADR_ETAGE'];
			$ADRESSE_BATIMENT = $_POST['ADRESSE_BATIMENT'];
			$ADRESSE_RUE = $_POST['ADRESSE_RUE'];
		    $ADRESSE_4 = $_POST['ADRESSE_4'];
			$CP = $_POST['CP'];
            $VILLE = $_POST['VILLE'];
			//$ADR_COMMUNE = $_POST['ADR_COMMUNE'];
			$CIV_CONJOINT = $_POST['CIV_CONJOINT'];
			$NOMCONJOINT = $_POST['NOMCONJOINT'];
			$PRENOMCONJOINT = $_POST['PRENOMCONJOINT'];
			$DATENAISSANCECONJOINT = $_POST['DATENAISSANCECONJOINT'];
		    $COMMENTAIRE = $_POST['COMMEN'];
							 

$queryexec = "UPDATE `contacts` SET `CIVILITE`='".$CIVILITE."',`zipcode`='".$CP."',
`ADRESSE_4`='".$ADRESSE_4."',`ADRESSE_RUE`='".$ADRESSE_RUE."',`ADRESSE_BATIMENT`='".$ADRESSE_BATIMENT."',`AGE`='".$AGE."',`DATENAISSANCE`='".$DATENAISSANCE."',`firstname`='".$PRENOM."',
`lastname`='".$NOM."',`CIV_CONJOINT`='".$CIV_CONJOINT."',`NOMCONJOINT`='".$NOMCONJOINT."',
`PRENOMCONJOINT`='".$PRENOMCONJOINT."',`DATENAISSANCECONJOINT`='".$DATENAISSANCECONJOINT."',city='".$VILLE."',
            ,`COMMENTAIRE`='".$COMMENTAIRE."' where id='".$c."'";
            $cnx->query($queryexec);

       



        }*/

 if (isset($_POST['modifier'])) {

            $c = $_POST['idcont'];
           /* $CIVILITE = $_POST['CIVILITE'];
            $NOM = $_POST['NOM'];
			$PRENOM = $_POST['PRENOM'];
			$DATENAISSANCE = $_POST['DATENAISSANCE'];
			$AGE = $_POST['AGE'];
			//$ADR_ETAGE = $_POST['ADR_ETAGE'];
			$ADRESSE_BATIMENT = $_POST['ADRESSE_BATIMENT'];
			$ADRESSE_RUE = $_POST['ADRESSE_RUE'];
		    $ADRESSE_4 = $_POST['ADRESSE_4'];
			$CP = $_POST['CP'];
            $VILLE = $_POST['VILLE'];
			//$ADR_COMMUNE = $_POST['ADR_COMMUNE'];
			$CIV_CONJOINT = $_POST['CIV_CONJOINT'];
			$NOMCONJOINT = $_POST['NOMCONJOINT'];
			$PRENOMCONJOINT = $_POST['PRENOMCONJOINT'];
			$DATENAISSANCECONJOINT = $_POST['DATENAISSANCECONJOINT'];
,`CIV_CONJOINT`='".$CIV_CONJOINT."',
`NOMCONJOINT`='".$NOMCONJOINT."',
`PRENOMCONJOINT`='".$PRENOMCONJOINT."',
`DATENAISSANCECONJOINT`='".$DATENAISSANCECONJOINT."',

			*/
		    $COMMENTAIRE = $_POST['COMMEN'];
							 

$queryexec = "UPDATE `contacts` SET `COMMENTAIRE`='".$COMMENTAIRE."'



  where id='".$c."'";
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


        $queryrec = "SELECT c.REF_AUTO,c.NUMPLAN,   c.MUNA, c.CIVILITE, c.NOM_NAISSANCE,    c.lastname as NOM,  c.firstname as PRENOM,  c.DATENAISSANCE,    c.AGE,  c.EMAIL,    c.ADRESSE_RUE,  c.ADRESSE_BATIMENT, c.ADRESSE_4,    c.zipcode as CP,    c.city as VILLE ,   c.REFAPPEL, u.name as HOTESSE,  c.PSEUDO,
            DATE_FORMAT( o.agent_start,  '%Y%m%d' ) AS DateAppel,   DATE_FORMAT( o.agent_start,  '%H%i%s' ) AS HeureAppel,  c.COMMENTAIRE,  s.REFQUALIF,
            s.CONCLUSION, s.MOTIFREFUS,   c.FORMULE,  c.CIV_CONJOINT, c.NOM_NAISSANCECONJOINT,    c.NOMCONJOINT,  c.PRENOMCONJOINT,   c.DATENAISSANCECONJOINT,    c.CONSENTEMENT, c.RappelSante,  c.GAMME_SANTE,  c.COTISATION_CS,c.GAROBSEQUES,c.phone_1,o.monitor_filename as Link ,c.CIV_CONJOINT,c.NOM_NAISSANCECONJOINT,c.NOMCONJOINT , c.PRENOMCONJOINT,c.DATENAISSANCECONJOINT

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
                        <h1>Qualité</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Lourmel</li>
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
            </div>
            <div class="col-xl-12">
                    <div style="text-align:center; background-color:#993366; padding:5px;color:white"><H1><CENTER><B>Lourmel - Enregistrement</B></CENTER></H1></div>

                    </br>
                            <div style="color:blue;margin-left:60px;margin-right:60px;text-align:center"><b>
                            Lourmel Protection Blessures : 0 809 10 28 11(uniquement en cas d’accord)</br>
                            Numéro de la gestion Auxia : 09 86 86 01 44</br>
                            Services ventes et adhésions, nouveau contrat SANTE : 01 40 60 20 26 ou 01 40 60 20 15</br>
                            Service gestion des contrats SANTE ou RETRAITE : 01 40 60 20 00 (SVI)</br>
                            Adresse du siège : Groupe LOURMEL, 108 rue de Lourmel 75015 Paris</br>
                            Site internet : www.lourmel.com / onglet "retraite" -> Assurer ma santé et ma famille</b>
                            </div>

                            </br>

                            <div style="text-align:left; margin-left:80px;background-color:#F0F0F0;margin-right:80px;padding:20px;margin-top:10px">
                            NOM : <b style="color:blue"><?=$rowcont['NOM']?></b> 
                            PRENOM : <b style="color:blue"><?=$rowcont['PRENOM']?></b> 
                            DATE NAISSANCE : <b style="color:blue"><?=$rowcont['DATENAISSANCE']?></b> 
                            ADRESSE : <b style="color:blue"><?=$rowcont['ADRESSE_RUE'].' '.$rowcont['ADRESSE_BATIMENT'].' '.$rowcont['ADRESSE_4']?></b> 
                            CP : <b style="color:blue"><?=$rowcont['CP']?></b> 
                            VILLE : <b style="color:blue"><?=$rowcont['VILLE']?></b>
                            Telephone : <b style="color:blue"><?=$rowcont['phone_1']?></b> 
                            </div>
                            <div style="text-align:left;margin-left:50px">
                            <b>Commnentaire : <?=$rowcont['COMMENTAIRE']?></b>
                            </div>
                            </br>
                            <div style="text-align:left;margin-left:50px"><b>Bonjour,<b>Sonia Clement </b> , Groupe Lourmel. </b></div>
                            </br>


                            <div style="text-align:left; margin-left:50px;margin-right:50px">Je vous contacte dans le cadre de votre retraite, vous voyez bien sûr qui nous sommes ? <b style="color:orange">> ATTENDRE REPONSE</b>
                            C’est bien vous qui vous occupez du dossier Assurances et/ou Retraite à la maison ou c’est votre (femme ou mari) – En général c’est plutôt les femmes <img src="data:image/png;base64,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" width="20px" /> ? <b style="color:orange">> ATTENDRE REPONSE</b>
                            </div>
                            </br>


                            <div style="text-align:left;margin-left:50px;margin-top:10px">Pour vos remboursements santé, on est d"accord que vous bénéficiez déjà d’une très bonne mutuelle ? 
                            <b style="color:orange">> ATTENDRE REPONSE</b>
                            <b style="color:green">Oui ></b> C’est très important, et encore plus de nos jours !! Il faut surtout bien la conserver.
                            <b style="color:red">Non ></b> Dans ce cas, cela vous concerne encore plus fortement. 
                            </div>
                            </br>


                            <div style="text-align:left;margin-left:50px;margin-top:10px;margin-right:50px">Je vous contacte donc aujourd"hui parce que j’ai besoin de procéder à la mise à jour de votre dossier Allocation Retraite <b style="color:orange">> ATTENDRE REPONSE</b>
                            Je vous explique tout de suite de quoi il retourne et tiens en préambule à vous rassurer, il n’y a rien d’alarmant. Il est très TRES IMPORTANT de vous préciser qu"actuellement et contrairement aux autres retraités, vous ne bénéficiez pas <b style="color:red">ENCORE</b> de la garantie Lourmel Protection Blessures !
                            Cette garantie est <b style="color:red">DORENAVANT SYSTEMATIQUE</b> pour tous les nouveaux retraités du Groupe Lourmel. <b style="color:orange">> PROVOQUER REACTION</b>
                            Vous, en tant qu"ancien retraité, vous n"en profitez pas encore ... <b style="color:orange">> PETITE PAUSE</b>
                            Mais ce n’est absolument pas de votre faute...tout simplement parce qu"au moment où vous avez pris votre retraite, elle n"existait pas encore. C’est la raison pour laquelle, nous contactons donc tous nos anciens retraités pour régulariser leur dossier et surtout vous permettre de <b style="color:red">BENEFICIER DES MEMES NIVEAUX </b>de couvertures que tous les autres retraités du Groupe Lourmel. Tout simplement parce que, <b style="color:red">VOUS AUSSI, VOUS Y AVEZ DROIT !</b><b style="color:orange">> PROVOQUER REACTION OU QUESTION </b>
                            </div>
                            </br>



                            <div style="text-align:left;margin-left:50px;margin-top:10px;margin-right:50px">Je vous explique rapidement et en deux mots par un exemple bien concret en quoi elle consiste : 
                            <ul>
                            <li>une simple glissade dans la baignoire ou la douche avec une fracture ou une luxation du genou à la clé, et vous avez vite fait d"être immobilisé(e) pendant 6 semaines <b style="color:red">si tout se passe bien</b>, on est d"accord Madame/Monsieur ? <b style="color:orange">> ATTENDRE REPONSE</b> Bien sur je ne vous le souhaite pas <img src="data:image/png;base64,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" width="20px" /> <img src="data:image/png;base64,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" width="20px" /> !</li>
                            </ul>
                            Avec Lourmel protection Blessures, vous recevez<b style="color:red"> un chèque de 700 €.</b> 
                            Pour une fracture beaucoup plus importante, comme la fracture du col du fémur (de + en + courante chez les femmes mais pas que chez les femmes <img src="data:image/png;base64,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" width="20px"/> ), vous touchez <b style="color:red">4000€</b> et ce sur <b style="color:red">simple présentation d"un certificat médical</b>,<b style="color:green"> c’est le seul justificatif qui vous sera demandé ! </b>
                            Votre mutuelle habituelle vous remboursera donc les frais médicaux et les soins courants comme elle le fait habituellement mais par contre en aucun cas elle ne vous versera une somme d"argent, ce n"est pas le rôle de la mutuelle. Donc, l’idée et le rôle de Lourmel Protection Blessures est de la compléter et agir là où elle n"agit pas, pour votre confort à la maison.
                            Cette somme d"argent est la plupart du temps utilisée par nos retraités pour faire appel à une aide à domicile parce que ça coûte <b style="color:red">TRES CHER.</b> Mais sachez, et c"est très important, que vous êtes totalement libre d"utiliser cette somme d"argent à votre convenance et on ne vous demandera JAMAIS aucun justificatif de vos dépenses ! 
                            </div>

                            </br>



                            <div style="text-align:left;margin-left:50px;margin-right:50px">Lourmel Protection Blessures a été mise en place à la demande d’un grand nombre de nos retraités pour palier au maximum le désengagement toujours plus fort et couteux de la Sécurité Sociale.
                            La cotisation a été choisie pour être MINIME, FIXE, SANS AUGMENTATION AUCUNE, ni en fonction de votre âge, ni en fonction de votre état de santé. En l’occurrence elle est de<b style="color:red"> seulement 9€98 par mois</b> soit <b style="color:red">seulement 30 cts par jour </b>(même pas le prix d"une demi baguette).
                            C’est un prix calculé au plus juste, vu que les retraites sont malheureusement et souvent pas très élevées ! 
                            Comme ça, cela permet à tous nos retraités d"être couverts et protégés !
                            Cette garantie est exclusivement réservée aux retraités du Groupe Lourmel, <b style="color:green">elle n’existe nulle part ailleurs, vous ne risquez donc pas de faire un doublon de protection </b>et vous touchez<b style="color:red"> jusqu"à 8000 €/an</b> en cas de blessure, fracture, entorse, accidents de la route, AGRESSION et même les brûlures sont couvertes. Toujours avec<b style="color:red"> un simple certificat médical pour justifier la blessure que vous avez eue</b>,<b style="color:green"> c’est le seul justificatif demandé !</b>
                            Pour une entorse de la cheville, vous allez voir votre médecin de famille, vous faites établir un certificat médical, vous nous l"envoyez et vous recevez 500€ sur votre compte courant sous 48 heures maximum. 
                            Enfin, le plus important dans tout ça, c"est que c"est une garantie<b style="color:red"> viagère DONC elle vous protège tout au long de votre vie sans limite d"âge</b> et toujours pour moins de 10€, ça ne bouge JAMAIS (donc pas d’augmentation tous les ans comme avec les autres assureurs). 
                            Elle est simple d"utilisation, il n"y pas de questionnaire de santé, pas de frais de dossier et pas de conditions de souscription ! 
                            Et comme il n"y pas non plus de délais de carence, vous êtes couvert dès aujourd"hui !!!! 
                            Dans n"importe quelle situation, que vous soyez à la maison, à l"extérieur, en voiture, à l"étranger et même pendant vos loisirs. Du moment que vous nous envoyez le certificat médical, s"il vous arrive quoi que ce soit, vous recevrez de l"argent. 
                            </div>
                            </br>


                             
                             <div style="text-align:left;margin-left:50px;margin-top:10px;margin-right:50px">On procède donc ensemble à la régularisation de votre dossier pour que vous ayez EXACTEMENT LES MEMES DROITS ET LES MEMES PROTECTIONS que tous les autres retraités LOURMEL, d"accord ? 
                            <b style="color:green">Oui</b>
                            </div>

                            </br>
                            <div style="text-align:left;margin-left:50px;margin-top:10px;margin-right:50px"><b style="color:red"> Très bien, vous m"autorisez à procéder à l’enregistrement de votre accord. C’est très simple. Il n’y a qu’une phrase très courte à répéter qui confirme LE PRIX, LE FAIT QU’IL EST FIXE POUR TOUTE LA DUREE DU CONTRAT et que l"on s"est bien mis d"accord sur ça ...</b>
                            La phrase est donc :<b style="color:red">  « Oui, je souhaite souscrire l"extension Lourmel Protection Blessures au tarif de 9.98€/mois, cotisation fixe » --</b>-- <b style="color:orange"> phrase à répéter 
                            </b>
                            <ul>
                            <li>pourquoi ? Simplement pour vous protéger entre la réception de votre bulletin d"adhésion et l'envoi par nos soins de votre contrat définitif : il faut compter une vingtaine de jours : si vous avez un accident entre aujourd"hui et la réception de votre contrat définitif, cela nous permet de vous couvrir et DONC de vous indemniser.</li>
                            <li>Si NON – refus – stopper l’entretien<b style="color:green"> OUI</b> </li>
                            </ul>
                            Dès demain matin nous vous faisons bien sûr parvenir un courrier de confirmation de votre adhésion. 
                            Vous verrez, c’est un simple coupon déjà complété que vous n"aurez qu’à signer et à nous retourner avec un RIB et le mandat de prélèvement. 
                            C’est<b style="color:red"> INDISPENSABLE</b> pour vous verser l’Allocation en cas de blessure. 
                            Pour simplifier tout ça, nous avons mis à votre disposition une enveloppe T pré affranchie donc pas besoin pour vous de mettre de timbre, d’accord ? 
                            <b style="color:green">OUI D’ailleurs, vous verrez que l’adresse sur l’enveloppe T est celle de notre cellule prévoyance à St Ouen et non pas au siège dans le 15ième, pas d’inquiétude c’est normal, d’accord ? OUI</b>
                            </div>
                            </br>



                            <div style="text-align:left;margin-left:50px;margin-top:10px;margin-bottom:10px">Très bien, il me reste à vérifier vos coordonnées : (Nom + Prénom + DDN + Adresse + CP + Ville)
                             </div>
                            </br>
                             


                             <div style="text-align:left;margin-left:50px"><strong style="color:green"><?=$rowcont['CIVILITE'] .' '.$rowcont['NOM']?></strong>, j&#39;aimerais confirmer vos coordonnées : </div>
                            </br>
                            <div style="text-align:left;margin-left:70px"><b>titre :</b> <?=$rowcont['CIVILITE']?></div>
                            <div style="text-align:left;margin-left:70px"><b>Nom :</b> <?=$rowcont['NOM']?></div>
                            <div style="text-align:left;margin-left:70px"><b>Prenom :</b> <?=$rowcont['PRENOM']?></div>
                            </br>
                            <div style="text-align:left;margin-left:50px">
                            <b>• Vous êtes bien né(e) le : </b></div></br>
                            <div style="text-align:left;margin-left:70px"><b>Date Naissance :</b> <?=$rowcont['DATENAISSANCE']?></div>
                            </br>

                            <div style="text-align:left;margin-left:50px">
                            <b>• Vous habitez bien :</b></div></br>
                            <div style="text-align:left;margin-left:70px"><b>ADRESSE RUE :</b> <?=$rowcont['ADRESSE_RUE']?></div>
                            <div style="text-align:left;margin-left:70px"><b>adresse batimant :</b> <?=$rowcont['ADRESSE_BATIMENT']?></div>
                            <div style="text-align:left;margin-left:70px"><b>adresse rue :</b> <?=$rowcont['ADRESSE_4']?></div>
                            <div style="text-align:left;margin-left:70px"><b>Adresse 4 :</b> <?=$rowcont['CP']?></div>
                            <div style="text-align:left;margin-left:70px"><b>Code postal :</b> <?=$rowcont['VILLE']?></div>
                            </br>


                            <div style="text-align:left;margin-left:50px;margin-top:10px;margin-right:50px">Vous êtes maintenant couvert(e), ce qui signifie qu"à partir de maintenant, quoiqu"il arrive, vous percevrez l"allocation Lourmel Protection Blessures, d"accord ? - <b style="color:green">OUI</b> 
                            Sachez que pour vous récompenser de votre <b style="color:red">fidélité</b> et de votre <b style="color:red">prévoyance,</b> nous vous faisons deux cadeaux : 
                            -   Premier cadeau : le premier mois de cotisation est gratuit, vous ne paierez rien 
                            -   Le deuxième : nous verserons à vos proches (ou la personne de votre choix) un capital de 1000€ en cas de décès, vous n’avez rien à faire c’est gratuit… )
                            Je compte sur vous pour me retourner rapidement tous les documents, c’est indispensable pour vous couvrir dans les meilleurs délais et bien sûr vous verser l’allocation Blessure en cas de souci.
                            </br>
                            <u><b style="color:orange;font-size:18px">POSER LA QUESTION SYSTEMATIQUEMENT MEME EN CAS DE REFUS</b></u>
                            Enfin et avant de vous quitter, souhaitez-vous que nous vous rappelions pour vous proposer une étude comparative en mutuelle santé (d’ici 1 trimestre par exemple) ? Sachez que c’est vraiment sans engagement de votre part et d’ailleurs, si vous ne le souhaitez pas dites-le moi franchement il n’y a aucun problème, mon objectif n’est très certainement pas de vous déranger si vous n’y voyez pas d’intérêt ?
                            </div>
                            <b style="font-size:18px;text-align:left;margin-left:50px;margin-top:10px">-  Reponse Client : </b><?=$rowcont['RappelSante']?>
                            </br>
                             

                            <div style="text-align:left;margin-left:50px;margin-top:10px;margin-right:50px">
                            Parfait je le note
                            Afin de préparer au mieux cette étude comparative, je me permets juste 2 petites questions si vous le permettez bien sûr ? <b style="color:orange">(Attendre réponse)</b> <b style="color:green">OUI</b>
                            </div>
                            </br>


                            <div style="text-align:left;margin-left:50px">
                            Diriez-vous des garanties de votre contrat santé qu’elles sont plutôt : (Économiques/ Confortables/ Ou haut de gamme)</div>
                            <b style="font-size:18px;text-align:left;margin-left:50px;margin-top:10px">- Reponse Client : </b><?=$rowcont['GAMME_SANTE']?>
                            </br></br>
                             
                            <div style="text-align:left;margin-left:50px">
                            Votre cotisation mensuelle est plutôt de : (Moins de 80€/personne - 80 et 100€/personne - 100 à 120€/personne - Plus de 120€/personne)</div>
                            <b style="font-size:18px;text-align:left;margin-left:50px;margin-top:10px">- Reponse Client : </b><?=$rowcont['COTISATION_CS']?>
                            </br>
                            </br>
                            <div style="text-align:left;margin-left:50px;margin-top:10px;margin-right:50px">
                            <b style="color:red">NON ></b> Prendre congés
                            Parfait, il me reste à vous remercier de votre accueil, de votre confiance et à vous souhaiter une excellente journée/fin de journée de la part de toute l’équipe du Groupe Lourmel et de moi-même.

                            <b style="color:red">Validation de l"accord conjoint
                            </b>

                            Je vérifie avec vous ses coordonnées : (Nom + Nom de naissance + Prénom + DDN)
                            </div>
                            </br>
                      


                            <div style="text-align:left;margin-left:70px"><b>Civilite Conjoint :</b> <?=$rowcont['CIV_CONJOINT']?></div>

                            <div style="text-align:left;margin-left:70px"><b>Nom Conjoint :</b> <?=$rowcont['NOMCONJOINT']?></div>

                            <div style="text-align:left;margin-left:70px"><b>Prenom Conjoint :</b> <?=$rowcont['PRENOMCONJOINT']?></div>

                            <div style="text-align:left;margin-left:70px"><b>Date Naissance Conjoint :</b> <?=$rowcont['DATENAISSANCECONJOINT']?></div>
                            </br>

                            <div style="text-align:left;margin-left:50px;margin-top:10px">
                            <b style="color:green">>>> Est-ce que l"Allocataire du Goupe LOURMEL vit en couple ?  

                            Qualification obligatoire pour les accords</b>
                            </br>
                            <div style="text-align:left;margin-left:70px"><b>GAROBSEQUES :</b> <?=$rowcont['GAROBSEQUES']?></div>
                            </br>





 <div class="modal  fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

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
		  <input type="text" class="form-control" name="COMMEN" value="<?=$rowcont['COMMENTAIRE']?>"  >
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
            echo '<script>window.location="https://192.168.1.4/DashKGL/?id=2";</script>';

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
