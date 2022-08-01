<!DOCTYPE html>
<html>
<head>
  <title>Indemni reception</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php

    $server = 'localhost';
    $utilisateur ='cliksip';
    $password = 'cliksip2018';
    $database = 'voxcrm';

    $cnx = mysqli_connect($server,$utilisateur,$password,$database);

 $idcont = $_GET['idcont'];  
    $sqlo = "SELECT `id` as hadak FROM `outgoing_calls` where `caller_id`='".$idcont."'  order by `id` desc LIMIT 1";
$resulto = $cnx-> query($sqlo);
$row = $resulto -> fetch_assoc();


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




 if (isset($_POST['accord'])) {

            
    $test = $_POST['test'];
            $sa3a = $_POST['sa3a']; 
              $idcont = $_GET['idcont'];       

    $queryexec = "UPDATE `outgoing_calls` set status=1 , `agent_start`='".$sa3a."'  , `call_start`='".$sa3a."' where `id`=".$test;
            $cnx->query($queryexec);

         $queryexe = "UPDATE `contacts` set  `TYPE_`='Reception' WHERE phone_1='".$idcont."' or NumAppel1='".$idcont."' or NumAppel2='".$idcont."'";
        $cnx->query($queryexe);  


        }

          if (isset($_POST['refus'])) {


            $idcont = $_GET['idcont'];
        

$sa3a = $_POST['sa3a'];  
      $test = $_POST['test'];                   

$queryexec = "UPDATE `outgoing_calls` set status=2 , `agent_start`='".$sa3a."'  , `call_start`='".$sa3a."' where `id`=".$test;
            $cnx->query($queryexec);

         $queryexe = "UPDATE `contacts` set  `TYPE_`='Reception' WHERE phone_1='".$idcont."' or NumAppel1='".$idcont."' or NumAppel2='".$idcont."'";
        $cnx->query($queryexe);  


        }




  

    
   
        
        $idcont = $_GET['idcont'];

        $queryrec = "SELECT distinct c.RefProspect,  c.NumAppel1,    c.NUM_CLIENT,   c.NUM_CLIENT2,  c.CIVILITE, c.lastname as NOM,  c.firstname as PRENOM,  c.ADR_ETAGE,    c.ADR_BATIMENT, c.ADR_RUE,  c.ADR_4,    c.ADR_CP,   c.ADR_COMMUNE,  c.NAIS_EMP, c.AGE_EMP,  c.NAIS_CO_EMP,  c.AGE_CO_EMP,   c.CIVILITE_COT, c.NOM_COT,  c.PRENOM_COT,   c.NUM_PLAN, c.CSP,  c.SITUATION_FAMILIALE,  c.SITUATION_LOCATIVE,   c.TOP_CIBLE,    c.COTISATION,   c.COTISATION_2, c.CAPITAL,  c.PRIME_MOIS,   c.PRIME_MOIS_2, c.PRIME_JOUR,   c.PRIME_JOUR_2, c.COUVERTURE_1, c.COUVERTURE_2, c.COUVERTURE_5, c.DEST,  c.Newrib,   c.BIC,  c.RecordFileName,   c.PREUVE_SONORE_OUT, c.MENS_VAL,c.DETTE,c.COUVERTURE_3,c.CAPITAL,c.phone_1 as TEL
            FROM contacts c         
            WHERE    c.phone_1='".$idcont."' or c.NumAppel1='".$idcont."' or c.NumAppel2='".$idcont."' LIMIT 1";
            

   


?>

 <?php
                                            
                            $resultcont = $cnx->query($queryrec);
                            while($rowcont = $resultcont->fetch_assoc()) 
                            {    
                                
                    ?>
            
               
            </div>  


            

<div style="text-align: center; padding: 5px; color: white; background-color: #999900;">
    <h1><center><strong><font size="5" face="arial, helvetica, sans-serif">Indemni+</font></strong></center></h1>
  </div>

<div class="container">
<BR><BR><BR>
<CENTER><h1 style="color: #ff0000;"">N'oublie pas d'enregistrer sur eyebeam !</h1></CENTER>


<br><br>
<div class="row">
<div class="col-md-3">
   <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal">Modifier</button>
</div> 
<div class="col-md-9">
    <form method="POST" >
    <input type="hidden" value="<?= date("Y-m-d H:i:s")?>"  name="sa3a" id="sa3a" />     
    <input type="hidden" value="<?= $row["hadak"]?>"  name="test" id="test" />
   <button type="submit" name="accord" id="accord" class="btn btn-success " >Accord</button>
   <button type="submit" name="refus" id="refus" class="btn btn-danger " >Refus</button>
 </form>
</div>
</div>   
<br><br>

  <p><font face="arial, helvetica, sans-serif"></font></p>
  <div style="color: #0033cc; text-align: center;"></div>
  <p><strong style="color: #0033cc;"><font size="4" face="arial, helvetica, sans-serif">Commentaire :&nbsp;<?=$rowcont['COMMENTAIRE']?></font></strong></p>
  <div style="color: #0033cc; text-align: center;">
    <p><font face="arial, helvetica, sans-serif">&nbsp;</font></p>
  </div><font face="arial, helvetica, sans-serif"><span style="color: #b4b4b4;">-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span><br /></font>
  <table>
    <tbody>
      <tr>
        <td>
          <h3 style="color: #0033cc; margin-left: 40px;"><font size="3" face="arial, helvetica, sans-serif">Cordonnées EUMPRUNTEUR :</font></h3>
        </td>
        <td>
          <h3 style="color: #0033cc; margin-left: 40px;"><font size="3" face="arial, helvetica, sans-serif">Cordonnées CO_EUMPRUNTEUR :</font></h3>
        </td>
        <td>
          <h3 style="color: #0033cc; margin-left: 40px;"><font size="3" face="arial, helvetica, sans-serif">INFOS CREDITS :</font></h3>
        </td>
      </tr>
      <tr>
        <td>
          <div style="margin-left: 60px; margin-bottom: 20px; border: 2px solid #0033cc; padding: 20px;">
            <div><font face="arial, helvetica, sans-serif">Civilite :<strong style="color: #0033cc; text-align: center;"><?=$rowcont['CIVILITE']?></strong></font></div>
            <div><font face="arial, helvetica, sans-serif">Nom :&nbsp;<strong style="color: #0033cc; text-align: center;"><?=$rowcont['NOM']?></strong></font></div>
            <div><font face="arial, helvetica, sans-serif">Prenom :<strong style="color: #0033cc; text-align: center;"><?=$rowcont['PRENOM']?></strong></font></div>
            <div><font face="arial, helvetica, sans-serif">Date naissance :<strong style="color: #0033cc; text-align: center;"><?=$rowcont['NAIS_EMP']?></strong></font></div>
            <div><font face="arial, helvetica, sans-serif">Age :&nbsp;<strong style="color: #0033cc; text-align: center;"><?=$rowcont['AGE_EMP']?></strong></font></div>
          </div>
        </td>
        <td>
          <div style="margin-left: 60px; margin-bottom: 20px; border: 2px solid #0033cc; padding: 20px;">
            <div>
              <div><font face="arial, helvetica, sans-serif">Civilite COT :<strong style="color: #0033cc; text-align: center;">
        <?=$rowcont['CIVILITE_COT']?>
        </strong></font></div>
              <div><font face="arial, helvetica, sans-serif">Nom COT :<strong style="color: #0033cc; text-align: center;">
        <?=$rowcont['NOM_COT']?>
        </strong></font></div>
              <div><font face="arial, helvetica, sans-serif">Prenom COT :<strong style="color: #0033cc; text-align: center;">
        <?=$rowcont['PRENOM_COT']?>
        </strong></font></div>
              <div><font face="arial, helvetica, sans-serif">Date naissance COT :<strong style="color: #0033cc; text-align: center;">
        <?=$rowcont['NAIS_CO_EMP']?></strong></font></div>
              <div><font face="arial, helvetica, sans-serif">Age COT :<strong style="color: #0033cc; text-align: center;"><?=$rowcont['AGE_CO_EMP']?></strong></font></div>
            </div>
          </div>
        </td>
        <td>
          <div style="margin-left: 60px; margin-bottom: 20px; border: 2px solid #0033cc; padding: 20px;">
            <div><font face="arial, helvetica, sans-serif">Dette:<strong style="text-align: center; color: #990066;">&nbsp;
      <?=$rowcont['DETTE']?>
      </strong></font></div>
            <p><font face="arial, helvetica, sans-serif">Mensualité:<strong style="color: #990066; text-align: center;"> </strong><strong style="text-align: center; color: #990066;">
      <?=$rowcont['MENS_VAL']?>
      </strong></font></p>
            <p><font face="arial, helvetica, sans-serif">Type crédit :<strong style="color: #990066; text-align: center;">&nbsp;
      <?=$rowcont['CARTE']?>
      </strong></font></p>
            <div><font face="arial, helvetica, sans-serif">Ancienneté client :<strong style="color: #990066; text-align: center;">&nbsp;
      <?=$rowcont['COUVERTURE_3']?> an(s)</strong></font></div>
            <div>
              <p><font face="arial, helvetica, sans-serif">Date d ouverture du compte :<strong style="color: #990066; text-align: center;">
        <?=$rowcont['DATE_DERNIER_CREDIT']?></strong> </font></p>
              <p><font face="arial, helvetica, sans-serif">Campagne : <span style="color: #0003ff;"><strong>&nbsp;
         <?=$rowcont['COUVERTURE_5']?></strong></span></font></p>
            </div>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Bonjour/bonsoir,
je cherche à joindre&nbsp;<strong><span style="color: #0003ff;"><?=$rowcont['CIVILITE']?>
<?=$rowcont['NOM']?>&nbsp;</span></strong>s'il vous plaît.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Enchanté(e),
je suis Sonia/Yanis <strong><span style="color: red;">de CELP</span></strong>, je vous
contacte de la part de <strong><span style="color: red;">COFIDIS</span></strong>courtier en
assurance dans le cadre de la mise à jour de votre dossier afin de faire un
point rapide avec vous, êtes-vous disponible&nbsp;? </span><em><u><span style="font-size: 10pt; color: #0003ff;">&gt; ATTENDRE RÉPONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; color: #019600;">RÉPONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Je vous
rassure cela ne prend que quelques minutes. </span><em><u><span style="font-size: 10pt; color: #0003ff;">&gt; ATTENDRE RÉPONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; color: #019600;">RÉPONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Dans une
démarche de qualité, je tiens à vous préciser que l’appel est susceptible
d’être enregistré. Pas de soucis pour vous j’imagine&nbsp;? </span><em><u><span style="font-size: 10pt; color: #0003ff;">&gt; ATTENDRE RÉPONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; color: #019600;">RÉPONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Parfait.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <ul type="disc"> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Vous êtes bien né(e) le&nbsp;
  <strong><span style="color: #0003ff;"><?=$rowcont['NAIS_EMP']?></span></strong> ?</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Vous êtes toujours au&nbsp;
  <strong style="color: #0003ff; font-size: medium;">
  
  <?=$rowcont['ADR_ETAGE']?> <?=$rowcont['ADR_BATIMENT']?> <?=$rowcont['ADR_RUE']?> <?=$rowcont['ADR_CP']?> <?=$rowcont['ADR_COMMUNE']?> </strong>&nbsp;?</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><span>vous pouvez me confirmer votre adresse email ?
  <span style="font-size: 12pt;"> </span><strong style="font-size: 12pt;"><span style="color: #0003ff;">
  <?=$rowcont['EMAIL']?></span></strong><span style="font-size: 12pt;"> ?</span></span><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Vous êtes bien en CDI (<strong><span style="color: #0003ff;"><?=$rowcont['CSP']?></span></strong>) ?&nbsp;</span></font></li> 
  </ul> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Parfait je
vous remercie pour cette mise à jour. </span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">De mon côté
en consultant votre dossier, avant de vous appeler, je me rends compte que vous
ne bénéficier pas encore de la garantie qui couvre votre pouvoir d'achat.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Dans ce
cadre, mon devoir de conseil m'amène à vous informer de la nécessité de
protéger votre pouvoir d'achat<strong><span style="color: red;"> </span></strong></span></font></p>
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;"><strong><span style="color: red;">si information ADE =
NON</span></strong> et par la même occasion d'en profiter pour couvrir notamment
votre ou vos prêts.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">La
protection <strong><span style="color: red;">INDÉMNI+</span></strong> vous permet de
toucher de l'argent en cas d'arrêt de travail lié à un accident ou une maladie,
en cas de chômage et notamment en cas de licenciement économique.<br />
L'actualité nous prouve aujourd'hui qu'aucun secteur d'activité n'est à l'abri
que ce soit dans les petites ou les grandes entreprises.<br />
C'est pour cette raison que ce complément de revenus est indispensable !</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Concrètement,
vous recevez une rente mensuellede <strong><span style="color: #0003ff;"><?=$rowcont['CAPITAL']?>
€</span></strong>et pendant une durée maximale de 6 mois pleins pour seulement<strong><span style="color: #0003ff;"><?=$rowcont['COTISATION']?> €</span></strong> par mois soit à peine
40 cts/jour !</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">La
protection <strong><span style="color: red;">INDÉMNI+</span></strong> de COFIDIS s'ajoute à
vos allocations (Pôle Emploi, Sécurité Sociale, CAF) pour combler une perte de
revenus toujours significative en cas de licenciement ou d'arrêt de travail. <br />
Grâce à cette protection, votre foyer et votre pouvoir d'achat sont préservés. <br />
Elle ne coûte vraiment rien et il est vrai que par les temps qui courent (forte
instabilité économique, hausse constante du chômage, difficultés à trouver un
travail), se protéger est LA priorité. Vous en convenez&nbsp;? </span><em><u><span style="font-size: 10pt; color: #0003ff;">&gt; ATTENDRE RÉPONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="margin-bottom: 0.0001pt; text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; color: #019600;">RÉPONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">En plus
sachez que les sommes que vous percevez ne sont pas imposables, elles ne sont
donc pas à considérer dans vos revenus annuels. <br /> <br />
Concrètement pour en bénéficier,c'est très simple
: une fois la souscription effectuée, par téléphone, vous serez assuré(e) dès
la fin de notre conversation. Et je vous offre dès à présent le 1er mois de
cotisation. <br /> <br />
Très bien, <strong><span style="color: #0003ff;"><?=$rowcont['CIVILITE']?> <?=$rowcont['NOM']?></span></strong>,
je vous propose de procéder ensemble à l’enregistrement de votre accord, cela
vous convient&nbsp;? </span><em><u><span style="font-size: 10pt; color: #0003ff;">&gt; ATTENDRE RÉPONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; color: #019600;">RÉPONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><span style="font-size: 12pt;"><font face="arial, helvetica, sans-serif">Parfait,
donc la procédure est très simple, <strong><span style="color: #0003ff;"><?=$rowcont['CIVILITE']?>
<?=$rowcont['NOM']?></span></strong>, on procède à l'enregistrement vocal de votre
adhésion pendant lequel je vous enverrai, par email, les documents
précontractuels.<br />
Vous recevrez ensuite un courrier de confirmation valant certificat d’adhésion
ainsi que la Notice d'Information à la maison.<br />
On s'assure, ainsi, que vous avez bien pris connaissance des conditions du contrat
et surtout, vous êtes <strong><span style="color: red;">IMMEDIATEMENT</span></strong>
couvert(e) dès la fin de notre conversation s'il arrive quelque chose.<br /></font></span></p>
  <p><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Il y en a pour 2 à 3 minutes.</span> </font></p>

  <p class="MsoNormal" align="center" style="text-align: center; background-color: #1ea51e; background-position: initial initial; background-repeat: initial initial;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 18pt; color: white;">Enregistrement - Juridique</span></strong><strong><span style="font-size: 24pt; color: white;"><o:p /></span></strong></font></p> 
  <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><span style="font-size: 12pt;"><font face="arial, helvetica, sans-serif"> </font></span></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 12pt; color: #0003ff;"><?=$rowcont['CIVILITE']?> <?=$rowcont['NOM']?></span></strong><span style="font-size: 12pt;">,&nbsp;</span><span style="font-size: 12pt;">l'enregistrement vient de débuter,</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Je suis
Sonia / Yanis de <strong><span style="color: red;">CELP</span></strong>, intervenant pour
le compte de <strong><span style="color: red;">COFIDIS</span></strong>, courtier en
assurance, qui vous propose le contrat d'assurance <strong><span style="color: red;">INDÉMNI+</span></strong>
assuré par <strong><span style="color: red;">SÉRÉNIS ASSURANCES</span></strong>.<br /> <br />
Très bien, afin d'éviter toute erreur administrative dans le traitement de
votre adhésion,êtes-vous toujours d'accord pour qu'il
soit procédé à l'enregistrement de la présente conversation téléphonique ? <u><span style="background-position: initial initial; background-repeat: initial initial;">&gt;</span></u></span><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE RÉPONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="margin-bottom: 0.0001pt; text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt; color: green;">RÉPONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Cet
enregistrement téléphonique servira de preuve de votre souscription.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; color: #222222;">Les informations que je vais collecter seront traitées par </span><strong><span style="font-size: 12pt; color: red;">COFIDIS</span></strong><span style="font-size: 12pt;">et <strong><span style="color: red;">SÉRÉNIS
ASSURANCES</span></strong><span style="color: #222222;"> aux fins d’exécution du
contrat et de prospection commerciale. Bien entendu, vous disposez notamment,
s’agissant de vos données personnelles, d’un droit d’accès, de mise à jour, de
rectification, d’opposition,&nbsp;</span><strong><span style="color: red;">de
limitation et de portabilité</span></strong><span style="color: #222222;">. Vous
pouvez exercer ces droits en adressant un courrier simple à </span><strong><span style="color: red;">SÉRÉNIS ASSURANCES</span></strong><span style="color: #222222;">,
comme précisé dans la notice d’information, qui vous apportera également de
plus amples renseignements quant à l’utilisation de vos données personnelles.</span></span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Dès lors
qu'elles y sont nécessaires, vous consentez à ce que vos données de santé,
soient traitées en vue de l’établissement, de la gestion et de l’exécution de
votre contrat. Ce traitement s'opère dans le respect de la confidentialité
renforcée applicable à cette nature de données.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Etes-vous
d'accord ? <u><span style="background-position: initial initial; background-repeat: initial initial;">&gt;</span></u></span><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
RÉPONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt; color: green;">RÉPONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><span style="font-size: 12pt;"><font face="arial, helvetica, sans-serif">Je vais
confirmer vos coordonnées avec vous :</font></span></p>
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">Vous êtes donc bien :&nbsp;<strong><span style="color: #000be0;"><?=$rowcont['CIVILITE']?> <?=$rowcont['NOM']?> <?=$rowcont['PRENOM']?></span></strong><br />Vous pouvez me confirmer votre adresse :</span></font></p>
  <p class="MsoNormal">&nbsp;</p>
  <ul>
    <li><font face="arial, helvetica, sans-serif">Adresse etage :&nbsp;<strong style="color: #0003ff;"><?=$rowcont['ADR_ETAGE']?></strong></font></li>
    <li><font face="arial, helvetica, sans-serif">adresse batimant :&nbsp;<strong style="color: #0003ff;"><?=$rowcont['ADR_BATIMENT']?></strong></font></li>
    <li><font face="arial, helvetica, sans-serif">adresse rue :&nbsp;<strong style="color: #0003ff;"><?=$rowcont['ADR_RUE']?></strong></font></li>
    <li><font face="arial, helvetica, sans-serif">Adresse 4 :&nbsp;<strong style="color: #0003ff;"><?=$rowcont['ADR_4']?></strong></font></li>
    <li><font face="arial, helvetica, sans-serif">Code postal :&nbsp;<strong style="color: #0003ff;"><?=$rowcont['ADR_CP']?></strong></font></li>
    <li><font face="arial, helvetica, sans-serif">Adresse commune :&nbsp;<strong style="color: #0003ff;"><?=$rowcont['ADR_COMMUNE']?></strong></font></li>
  </ul>
  <p>&nbsp;</p>
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"></font></p>
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif">vous pouvez me confirmer votre adresse email ?<span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">&nbsp;:&nbsp;<strong><span style="color: #000be0;"><?=$rowcont['ADRESSE_EMAIL']?></span></strong><br />Vous êtes bien né(e) le :<span style="font-weight: bold; color: #000be0;">&nbsp; <?=$rowcont['NAIS_EMP']?>&nbsp;- &nbsp;</span>Age<strong>&nbsp;:&nbsp;<span style="color: #0003ff;"> <?=$rowcont['AGE_EMP']?></span></strong></span></font></p>
  <p><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">C'est bien cela ?<u>&gt;</u></span><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE RÉPONSE</span></u></em></font></p>
  <p style="text-align: center;"><font face="arial, helvetica, sans-serif"> <span style="color: green; font-size: 12pt; text-align: center;">RÉPONSE CLIENT : OUI&nbsp;</span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Me
permettez-vous de vous rappeler de manière simplifiée en quoi l'assurance
consiste ? <u><span style="background-position: initial initial; background-repeat: initial initial;">&gt;</span></u></span><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
RÉPONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">RÉPONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif" style="color: #019600;"><strong><span style="font-size: 18pt;">CDI : </span></strong><strong><span style="font-size: 18pt;"></span></strong></font></p>
  <table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0" width="100%" style="width: 100%; border-collapse: collapse; border: none;"> 
    <tbody>
      <tr> 
        <td width="50%" valign="top" style="width: 50%; border: 1pt dotted black; padding: 3.75pt;"> 
          <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 12pt; color: #0003ff;">CDI = Garanties
  CHOMAGE + ARRET DE TRAVAIL</span></strong><strong><span style="font-size: 18pt;"><o:p /></span></strong></font></p> 
          <p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 12pt;">Je vous informe que vous bénéficiez de la garantie arrêt de travail dès
  lors que vous : </span></strong><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <ul type="disc"> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">êtes
       âgé(e) de moins de 59 ans,</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">avez
       votre résidence principale et fiscale en France, exercez une activité
       professionnelle rémunérée (salariée ou non) en France métropolitaine ou
       dans un pays limitrophe,</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">n'êtes
       pas en arrêt de travail pour raison de santé et que vous ne l'avez pas
       été pendant plus de 30 jours consécutifs depuis 1 an,</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">n'êtes
       pas titulaire d'une rente ou d'une pension d'invalidité,</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">n'êtes
       pas exonéré(e) du ticket modérateur pour raison de santé (ALD) ?</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
          </ul> 
        </td> 
        <td width="50%" valign="top" style="width: 50%; border-style: dotted dotted dotted none; border-top-color: black; border-right-color: black; border-bottom-color: black; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; padding: 3.75pt;"> 
          <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 12pt; color: #0003ff;">PAS CDI = Garantie
  ARRET DE TRAVAIL seule</span></strong><strong><span style="font-size: 18pt;"><o:p /></span></strong></font></p> 
          <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 12pt;">Je vous
  informe que vous bénéficiez de la garantie arrêt de travail dès lors que vous
  :</span></strong><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <ul type="disc"> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">êtes
       âgé(e) de moins de 59 ans,</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">avez
       votre résidence principale et fiscale en France, exercez une activité
       professionnelle rémunérée (salariée ou non) en France métropolitaine ou
       dans un pays limitrophe,</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">n'êtes
       pas en arrêt de travail pour raison de santé et que vous ne l'avez pas
       été pendant plus de 30 jours consécutifs depuis 1 an,</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">n'êtes
       pas titulaire d'une rente ou d'une pension d'invalidité.</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">n'êtes
       pas exonéré(e) du ticket modérateur pour raison de santé (ALD), </span><span style="font-size: 12pt;"><o:p /></span></font></li> 
          </ul> 
          <p class="MsoNormal" style="margin-left: 36pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 12pt;">Vous confirmez ?</span></strong><u><span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">&gt;</span></u><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
  RÉPONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
        </td> 
      </tr> 
      <tr> 
        <td colspan="2" style="border-style: none dotted dotted; border-right-color: black; border-bottom-color: black; border-left-color: black; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 3.75pt;"> 
          <p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><strong><span style="font-size: 18pt;"><font face="arial, helvetica, sans-serif">Exonéré du ticket modérateur : <span style="color: #3fa50a;"></span></font></span></strong></p> 
        </td> 
      </tr> 
      <tr> 
        <td valign="top" style="border-style: none dotted dotted; border-right-color: black; border-bottom-color: black; border-left-color: black; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 3.75pt;"> 
          <p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Vous
  bénéficiez aussi de la garantie Chômage dès lors que vous:</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <ul type="disc"> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">occupez
       un emploi salarié dans le cadre d'un contrat à durée indéterminée</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">n'êtes
       pas au chômage, en préavis de licenciement ou de démission, en
       préretraite ou à la retraite, ou en période d'essai</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
          </ul> 
          <p class="MsoNormal" style="margin-left: 36pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 12pt;">Vous confirmez ?</span></strong><u><span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">&gt;</span></u><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
  RÉPONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="text-align: left; margin-left: 36pt;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 18pt;">En période d'essai, licenciement
  ou démission :&nbsp;<span style="color: #3fa50a;">
  </span></span></strong><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" align="center" style="margin-bottom: 0.0001pt; text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt; color: #019600;">RÉPONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Vous nous confirmez donc votre intérêt à une
  assurance de prévoyance individuelle qui vous couvrirait en cas d'arrêt de
  travail par suite de maladie ou d'accident ou de chômage suite à un
  licenciement ? <u><span style="background-position: initial initial; background-repeat: initial initial;">&gt;</span></u></span><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
  RÉPONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt; color: #019600;">RÉPONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Parfait, compte tenu de l'ensemble des informations
  que vous nous avez fournies, le contrat <strong><span style="color: red;">INDÉMNI+</span></strong>
  est conseillé. <strong><span style="color: red;">INDÉMNI+</span></strong> répond à votre
  besoin en ce sens qu'il prévoit pour un montant de&nbsp;<strong><span style="color: red; background-position: initial initial; background-repeat: initial initial;">
  <?=$rowcont['COTISATION']?></span><span style="color: red;"> €</span></strong> par mois après une franchise de 90 jours le
  versement d'une rente mensuelle de <strong><span style="color: red;"> <?=$rowcont['CAPITAL']?></span></strong>
  par mois en cas :</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <ul type="disc"> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">de
       perte d'emploi consécutive à un licenciement,</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">d'arrêt
       de travail suite à un accident ou une maladie, </span><span style="font-size: 12pt;"><o:p /></span></font></li> 
          </ul> 
          <p class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;"><br />
  qui prend fin à la date de reprise de travail et/ou d'une activité
  professionnelle rémunérée et au plus tard après 6 mois d'indemnisation. <br /> <br />
  La garantie Arrêt de Travail prend immédiatement effet à la date d'adhésion. <br />
  La garantie Perte d'Emploi prend effet 180 jours ou 6 mois à compter
  d'aujourd'hui d'où l'importance de s'assurer rapidement. <br />
  Bien sûr, il y a quelques exclusions qui figurent dans la Notice
  d'Information comme : </span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;"><br /> <em><u style="color: #0003ff;">Pour les arrêts de travail :</u></em></span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">les affections cervico-dorso-lombaires, psychiatriques,
  psychiques ou neuro-psychiques, les états dépressifs quelle que soit leur
  nature et la fibromyalgie. Les affections suivantes connues de l'assuré au
  moment de l'adhésion : hypertension, diabète, asthme, tumeurs malignes. Les
  sinistres survenus sous l'emprise de l'alcool ou suite à l'usage de la
  drogue.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;"><br /> <em><u style="color: #0003ff;">Pour la garantie Perte d'emploi :</u></em></span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">le licenciement pour faute grave ou lourde ou encore
  le licenciement par un membre de la famille. Je vous invite à les consulter
  dans la Notice d'information de l'assurance que je vais vous envoyer. </span><span style="font-size: 12pt;"><o:p /></span></font></p> 
        </td> 
        <td valign="top" style="border-style: none dotted dotted none; border-bottom-color: black; border-bottom-width: 1pt; border-right-color: black; border-right-width: 1pt; padding: 3.75pt;"> 
          <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt 36pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Vous bénéficiez aussi de la
  garantie Incapacité de Travail améliorée. Dans ce cas l'indemnisation débute
  30 jours après le début de l'incapacité de travail dès lors que vous avez
  atteint 90 jours consécutifs d'arrêt de travail. <br />
  Vous nous confirmez donc votre intérêt à une assurance de prévoyance
  individuelle qui vous couvrirait en cas d'arrêt de travail par suite de
  maladie ou d'accident ? <u><span style="background-position: initial initial; background-repeat: initial initial;">&gt;</span></u></span><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
  RÉPONSE</span></u></em></font></p> 
          <p class="MsoNormal" align="center" style="margin-bottom: 0.0001pt; text-align: center;"><span style="color: #019600;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt;">RÉPONSE CLIENT : OUI</span> </font></span></p> 
          <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt 36pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Parfait, compte tenu de l'ensemble
  des informations que vous nous avez fournies, le contrat <strong><span style="color: red;">INDÉMNI+</span></strong> est conseillé.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt 36pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 12pt;">INDÉMNI+</span></strong><span style="font-size: 12pt;"> répond à votre besoin en ce sens
  qu'il prévoit pour un montant de <strong><span style="color: red;"><?=$rowcont['COTISATION']?>
  €</span></strong> par mois après une franchise de 90 jours le versement d'une
  rente mensuelle de <strong><span style="color: red;"><?=$rowcont['CAPITAL']?></span></strong>par
  mois en cas : d'arrêt de travail suite à un accident ou une maladie, qui
  prend fin à la date de reprise de travail et au plus tard après 6 mois
  d'indemnisation.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt 36pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">La garantie Arrêt de Travail prend
  immédiatement effet à la date d'adhésion.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt 36pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Bien sûr, il y a quelques
  exclusions qui figurent dans la Notice d'Information comme par exemple les
  affections cervico-dorso-lombaires, psychiatriques, psychiques ou
  neuro-psychiques, les états dépressifs quelle que soit leur nature et la
  fibromyalgie</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt 36pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Je vous invite à les consulter
  dans la Notice d'information de l'assurance que je vais vous envoyer.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
        </td> 
      </tr> 
    </tbody>
  </table>
  <p><font face="arial, helvetica, sans-serif"> <strong><span style="font-size: 12pt; color: #0003ff;"><?=$rowcont['CIVILITE']?> <?=$rowcont['NOM']?>, </span></strong><span style="font-size: 12pt;">je vous remets de suite par e-mail les informations
précontractuelles.</span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif" size="5"><strong style="color: #ff0000;">Appuyer sur button envoi contrat EMPRUNTEUR !</strong></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Tous ces
éléments sont repris dans la notice d'information que je vous ai remise.
Souhaitez-vous que nous les parcourions ou acceptez-vous les conditions
générales vues ensemble ? <u><span style="background-position: initial initial; background-repeat: initial initial;">&gt;</span></u></span><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
RÉPONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Je vous
rappelle que ce contrat est conclu pour une durée d'un an et est renouvelable
annuellement par tacite reconduction. Il est résiliable à tout moment.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Vous aurez
néanmoins la possibilité de renoncer à cette adhésion dans les 30 jours qui
suivent la réception de la Notice&nbsp;
d’information par lettre recommandée avec accusé de réception à <strong><span style="color: red;">COFIDIS </span></strong>au Parc de la Haute Borne, à Villeneuve
d’Ascq.<br /> <br />
Vous acceptez que la cotisation mensuelle de <strong><span style="color: red;"><?=$rowcont['COTISATION']?>&nbsp;
€ </span></strong>soit automatiquement prélevée par
<strong><span style="color: red;">SÉRÉNIS ASSURANCES</span></strong> sur votre compte bancaire connu chez <strong><span style="color: red;">COFIDIS</span></strong> ?<u><span style="background-position: initial initial; background-repeat: initial initial;">&gt;</span></u></span><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE RÉPONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="margin-bottom: 0.0001pt; text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt; color: green;">RÉPONSE CLIENT : OUI</span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Votre accord
vaut mandat de prélèvement. La référence unique de mandat vous sera confirmée
lors de l'envoi du certificat d'adhésion.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Vous nous confirmez donc demander à adhérer à l'assurance </span><strong><span style="font-size: 12pt; color: red;">INDÉMNI+</span></strong><span style="font-size: 12pt;"> de </span><strong><span style="font-size: 12pt; color: red;">COFIDIS </span></strong><span style="font-size: 12pt;">?</span><u><span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">&gt;</span></u><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
RÉPONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><span style="font-size: 12pt;"><font face="arial, helvetica, sans-serif"> </font></span></p> 
  <p class="MsoNormal" align="center" style="margin-bottom: 0.0001pt; text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt; color: green;">RÉPONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Êtes-vous d'accord pour que votre adhésion prenne effet immédiatement tout
en conservant votre droit à renonciation ?</span><u><span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">&gt;</span></u><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
RÉPONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="margin-bottom: 0.0001pt; text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt; color: green;">RÉPONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; color: #222222;">Suite à notre conversation, vous recevrez&nbsp;</span><span style="font-size: 12pt;">le document d’information sur le
produit d'assurance<span style="color: #222222;">, le certificat de garantie et
un exemplaire de la notice d’information. En plus, nous avons le plaisir de
vous offrir le premier mois de cotisation.</span></span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Souhaitez-vous en savoir plus notamment sur votre intermédiaire
d'assurance, notre Assureur, l'Autorité de Contrôle de l'assureur, la loi et la
langue applicables au contrat ainsi que le fonctionnement des réclamations ou
bien les informations déjà fournies vous semblent suffisantes ?</span><u><span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">&gt;</span></u><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
RÉPONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt; color: green;">RÉPONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Tout est clair pour vous&nbsp;?</span><u><span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">&gt;</span></u><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
RÉPONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 7.5pt;">Si souhait
d'en savoir plus : sachez que...</span></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <ul type="disc"> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 7.5pt;">CEL Prévoyance est votre
     intermédiaire d'assurance, son siège social est à Paris (75015), 1 rue du
     Lieuvin et est immatriculé à l'ORIAS sous le numéro 21 003 723</span></em><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 10pt;">La gestion des saisies des
     adhésions est confiée à COFIDIS</span></em><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 7.5pt;">Coordonnées de l'assureur
     (siège social): Sérénis Assurance, 25 rue du Docteur Henri Abel - 26000
     Valence RCS ROMANS 350 838 686</span></em><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 7.5pt;">Coordonnées de l'autorité de
     contrôle: l'ensemble des sociétés est soumis au contrôle de l'Autorité de
     Contrôle Prudentiel et de Résolution, 61 rue Taitbout 75436 Paris cedex
     09. Pour plus d'informations, le registre des intermédiaires d'assurance
     (ORIAS) est librement accessible sur le site internet www.orias.fr. Je
     vous communique également les coordonnées de notre service Cofidis
     Assurance, Autorisation 50040, 59869 Villeneuve d'Ascq cedex</span></em><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 7.5pt;">INDEMNI + est un contrat
     d'assurance collectif à adhésion facultative souscrit par COFIDIS auprès
     de SERENIS Assurance, Service Prévoyance - 46 rue Jules Méline - 53098
     LAVAL Cedex 9.</span></em><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 7.5pt;">Loi applicable: la loi
     française</span></em><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 7.5pt;">Langue du contrat: français</span></em><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 7.5pt;">Modalités de traitement des
     réclamations: entrez en contact d'abord avec votre interlocuteur habituel
     SERENIS ASSURANCES. Si sa réponse ne vous satisfait pas : Vous pouvez
     adresser votre réclamation au: Responsable des relations consommateurs Sérénis
     Assurances 34 rue du Wacken 67906 Strasbourg cedex 9.Si votre litige n'est
     toujours pas résolu : Les coordonnées du Médiateur vous seront
     communiquées par l'assureur</span></em><span style="font-size: 12pt;"><o:p /></span></font></li> 
  </ul> <span style="font-size: 12pt; line-height: 107%;"><font face="arial, helvetica, sans-serif">&nbsp;Je vous remercie du temps que vous m'avez
consacré&nbsp;<strong><span style="color: #0003ff;"><?=$rowcont['CIVILITE']?> <?=$rowcont['NOM']?></span></strong>&nbsp;et
vous souhaite une excellente journée de la part de toute l'équipe de <strong><span style="color: red;">COFIDIS </span></strong>et de moi-même.&nbsp;</font></span>

<!--              *********Modal pour modifier**********                -->
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
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </div>
    </form>
      </div>
      
    </div>

<!--------------------- ----------------------  -->


</div>
  
  <?php 
                      
                     
                      }

                 ?>
</body>
</html>
