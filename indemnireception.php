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
          <h3 style="color: #0033cc; margin-left: 40px;"><font size="3" face="arial, helvetica, sans-serif">Cordonn??es EUMPRUNTEUR :</font></h3>
        </td>
        <td>
          <h3 style="color: #0033cc; margin-left: 40px;"><font size="3" face="arial, helvetica, sans-serif">Cordonn??es CO_EUMPRUNTEUR :</font></h3>
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
            <p><font face="arial, helvetica, sans-serif">Mensualit??:<strong style="color: #990066; text-align: center;"> </strong><strong style="text-align: center; color: #990066;">
      <?=$rowcont['MENS_VAL']?>
      </strong></font></p>
            <p><font face="arial, helvetica, sans-serif">Type cr??dit :<strong style="color: #990066; text-align: center;">&nbsp;
      <?=$rowcont['CARTE']?>
      </strong></font></p>
            <div><font face="arial, helvetica, sans-serif">Anciennet?? client :<strong style="color: #990066; text-align: center;">&nbsp;
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
je cherche ?? joindre&nbsp;<strong><span style="color: #0003ff;"><?=$rowcont['CIVILITE']?>
<?=$rowcont['NOM']?>&nbsp;</span></strong>s'il vous pla??t.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Enchant??(e),
je suis Sonia/Yanis <strong><span style="color: red;">de CELP</span></strong>, je vous
contacte de la part de <strong><span style="color: red;">COFIDIS</span></strong>courtier en
assurance dans le cadre de la mise ?? jour de votre dossier afin de faire un
point rapide avec vous, ??tes-vous disponible&nbsp;? </span><em><u><span style="font-size: 10pt; color: #0003ff;">&gt; ATTENDRE R??PONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; color: #019600;">R??PONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Je vous
rassure cela ne prend que quelques minutes. </span><em><u><span style="font-size: 10pt; color: #0003ff;">&gt; ATTENDRE R??PONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; color: #019600;">R??PONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Dans une
d??marche de qualit??, je tiens ?? vous pr??ciser que l???appel est susceptible
d?????tre enregistr??. Pas de soucis pour vous j???imagine&nbsp;? </span><em><u><span style="font-size: 10pt; color: #0003ff;">&gt; ATTENDRE R??PONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; color: #019600;">R??PONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Parfait.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <ul type="disc"> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Vous ??tes bien n??(e) le&nbsp;
  <strong><span style="color: #0003ff;"><?=$rowcont['NAIS_EMP']?></span></strong> ?</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Vous ??tes toujours au&nbsp;
  <strong style="color: #0003ff; font-size: medium;">
  
  <?=$rowcont['ADR_ETAGE']?> <?=$rowcont['ADR_BATIMENT']?> <?=$rowcont['ADR_RUE']?> <?=$rowcont['ADR_CP']?> <?=$rowcont['ADR_COMMUNE']?> </strong>&nbsp;?</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><span>vous pouvez me confirmer votre adresse email ?
  <span style="font-size: 12pt;"> </span><strong style="font-size: 12pt;"><span style="color: #0003ff;">
  <?=$rowcont['EMAIL']?></span></strong><span style="font-size: 12pt;"> ?</span></span><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Vous ??tes bien en CDI (<strong><span style="color: #0003ff;"><?=$rowcont['CSP']?></span></strong>) ?&nbsp;</span></font></li> 
  </ul> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Parfait je
vous remercie pour cette mise ?? jour. </span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">De mon c??t??
en consultant votre dossier, avant de vous appeler, je me rends compte que vous
ne b??n??ficier pas encore de la garantie qui couvre votre pouvoir d'achat.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Dans ce
cadre, mon devoir de conseil m'am??ne ?? vous informer de la n??cessit?? de
prot??ger votre pouvoir d'achat<strong><span style="color: red;"> </span></strong></span></font></p>
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;"><strong><span style="color: red;">si information ADE =
NON</span></strong> et par la m??me occasion d'en profiter pour couvrir notamment
votre ou vos pr??ts.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">La
protection <strong><span style="color: red;">IND??MNI+</span></strong> vous permet de
toucher de l'argent en cas d'arr??t de travail li?? ?? un accident ou une maladie,
en cas de ch??mage et notamment en cas de licenciement ??conomique.<br />
L'actualit?? nous prouve aujourd'hui qu'aucun secteur d'activit?? n'est ?? l'abri
que ce soit dans les petites ou les grandes entreprises.<br />
C'est pour cette raison que ce compl??ment de revenus est indispensable !</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Concr??tement,
vous recevez une rente mensuellede <strong><span style="color: #0003ff;"><?=$rowcont['CAPITAL']?>
???</span></strong>et pendant une dur??e maximale de 6 mois pleins pour seulement<strong><span style="color: #0003ff;"><?=$rowcont['COTISATION']?> ???</span></strong> par mois soit ?? peine
40 cts/jour !</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">La
protection <strong><span style="color: red;">IND??MNI+</span></strong> de COFIDIS s'ajoute ??
vos allocations (P??le Emploi, S??curit?? Sociale, CAF) pour combler une perte de
revenus toujours significative en cas de licenciement ou d'arr??t de travail. <br />
Gr??ce ?? cette protection, votre foyer et votre pouvoir d'achat sont pr??serv??s. <br />
Elle ne co??te vraiment rien et il est vrai que par les temps qui courent (forte
instabilit?? ??conomique, hausse constante du ch??mage, difficult??s ?? trouver un
travail), se prot??ger est LA priorit??. Vous en convenez&nbsp;? </span><em><u><span style="font-size: 10pt; color: #0003ff;">&gt; ATTENDRE R??PONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="margin-bottom: 0.0001pt; text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; color: #019600;">R??PONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">En plus
sachez que les sommes que vous percevez ne sont pas imposables, elles ne sont
donc pas ?? consid??rer dans vos revenus annuels. <br /> <br />
Concr??tement pour en b??n??ficier,c'est tr??s simple
: une fois la souscription effectu??e, par t??l??phone, vous serez assur??(e) d??s
la fin de notre conversation. Et je vous offre d??s ?? pr??sent le 1er mois de
cotisation. <br /> <br />
Tr??s bien, <strong><span style="color: #0003ff;"><?=$rowcont['CIVILITE']?> <?=$rowcont['NOM']?></span></strong>,
je vous propose de proc??der ensemble ?? l???enregistrement de votre accord, cela
vous convient&nbsp;? </span><em><u><span style="font-size: 10pt; color: #0003ff;">&gt; ATTENDRE R??PONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; color: #019600;">R??PONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><span style="font-size: 12pt;"><font face="arial, helvetica, sans-serif">Parfait,
donc la proc??dure est tr??s simple, <strong><span style="color: #0003ff;"><?=$rowcont['CIVILITE']?>
<?=$rowcont['NOM']?></span></strong>, on proc??de ?? l'enregistrement vocal de votre
adh??sion pendant lequel je vous enverrai, par email, les documents
pr??contractuels.<br />
Vous recevrez ensuite un courrier de confirmation valant certificat d???adh??sion
ainsi que la Notice d'Information ?? la maison.<br />
On s'assure, ainsi, que vous avez bien pris connaissance des conditions du contrat
et surtout, vous ??tes <strong><span style="color: red;">IMMEDIATEMENT</span></strong>
couvert(e) d??s la fin de notre conversation s'il arrive quelque chose.<br /></font></span></p>
  <p><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Il y en a pour 2 ?? 3 minutes.</span> </font></p>

  <p class="MsoNormal" align="center" style="text-align: center; background-color: #1ea51e; background-position: initial initial; background-repeat: initial initial;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 18pt; color: white;">Enregistrement - Juridique</span></strong><strong><span style="font-size: 24pt; color: white;"><o:p /></span></strong></font></p> 
  <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><span style="font-size: 12pt;"><font face="arial, helvetica, sans-serif"> </font></span></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 12pt; color: #0003ff;"><?=$rowcont['CIVILITE']?> <?=$rowcont['NOM']?></span></strong><span style="font-size: 12pt;">,&nbsp;</span><span style="font-size: 12pt;">l'enregistrement vient de d??buter,</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Je suis
Sonia / Yanis de <strong><span style="color: red;">CELP</span></strong>, intervenant pour
le compte de <strong><span style="color: red;">COFIDIS</span></strong>, courtier en
assurance, qui vous propose le contrat d'assurance <strong><span style="color: red;">IND??MNI+</span></strong>
assur?? par <strong><span style="color: red;">S??R??NIS ASSURANCES</span></strong>.<br /> <br />
Tr??s bien, afin d'??viter toute erreur administrative dans le traitement de
votre adh??sion,??tes-vous toujours d'accord pour qu'il
soit proc??d?? ?? l'enregistrement de la pr??sente conversation t??l??phonique ? <u><span style="background-position: initial initial; background-repeat: initial initial;">&gt;</span></u></span><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE R??PONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="margin-bottom: 0.0001pt; text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt; color: green;">R??PONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Cet
enregistrement t??l??phonique servira de preuve de votre souscription.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; color: #222222;">Les informations que je vais collecter seront trait??es par </span><strong><span style="font-size: 12pt; color: red;">COFIDIS</span></strong><span style="font-size: 12pt;">et <strong><span style="color: red;">S??R??NIS
ASSURANCES</span></strong><span style="color: #222222;"> aux fins d???ex??cution du
contrat et de prospection commerciale. Bien entendu, vous disposez notamment,
s???agissant de vos donn??es personnelles, d???un droit d???acc??s, de mise ?? jour, de
rectification, d???opposition,&nbsp;</span><strong><span style="color: red;">de
limitation et de portabilit??</span></strong><span style="color: #222222;">. Vous
pouvez exercer ces droits en adressant un courrier simple ?? </span><strong><span style="color: red;">S??R??NIS ASSURANCES</span></strong><span style="color: #222222;">,
comme pr??cis?? dans la notice d???information, qui vous apportera ??galement de
plus amples renseignements quant ?? l???utilisation de vos donn??es personnelles.</span></span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">D??s lors
qu'elles y sont n??cessaires, vous consentez ?? ce que vos donn??es de sant??,
soient trait??es en vue de l?????tablissement, de la gestion et de l???ex??cution de
votre contrat. Ce traitement s'op??re dans le respect de la confidentialit??
renforc??e applicable ?? cette nature de donn??es.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Etes-vous
d'accord ? <u><span style="background-position: initial initial; background-repeat: initial initial;">&gt;</span></u></span><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
R??PONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt; color: green;">R??PONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><span style="font-size: 12pt;"><font face="arial, helvetica, sans-serif">Je vais
confirmer vos coordonn??es avec vous :</font></span></p>
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">Vous ??tes donc bien :&nbsp;<strong><span style="color: #000be0;"><?=$rowcont['CIVILITE']?> <?=$rowcont['NOM']?> <?=$rowcont['PRENOM']?></span></strong><br />Vous pouvez me confirmer votre adresse :</span></font></p>
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
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif">vous pouvez me confirmer votre adresse email ?<span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">&nbsp;:&nbsp;<strong><span style="color: #000be0;"><?=$rowcont['ADRESSE_EMAIL']?></span></strong><br />Vous ??tes bien n??(e) le :<span style="font-weight: bold; color: #000be0;">&nbsp; <?=$rowcont['NAIS_EMP']?>&nbsp;- &nbsp;</span>Age<strong>&nbsp;:&nbsp;<span style="color: #0003ff;"> <?=$rowcont['AGE_EMP']?></span></strong></span></font></p>
  <p><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">C'est bien cela ?<u>&gt;</u></span><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE R??PONSE</span></u></em></font></p>
  <p style="text-align: center;"><font face="arial, helvetica, sans-serif"> <span style="color: green; font-size: 12pt; text-align: center;">R??PONSE CLIENT : OUI&nbsp;</span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Me
permettez-vous de vous rappeler de mani??re simplifi??e en quoi l'assurance
consiste ? <u><span style="background-position: initial initial; background-repeat: initial initial;">&gt;</span></u></span><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
R??PONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">R??PONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif" style="color: #019600;"><strong><span style="font-size: 18pt;">CDI : </span></strong><strong><span style="font-size: 18pt;"></span></strong></font></p>
  <table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0" width="100%" style="width: 100%; border-collapse: collapse; border: none;"> 
    <tbody>
      <tr> 
        <td width="50%" valign="top" style="width: 50%; border: 1pt dotted black; padding: 3.75pt;"> 
          <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 12pt; color: #0003ff;">CDI = Garanties
  CHOMAGE + ARRET DE TRAVAIL</span></strong><strong><span style="font-size: 18pt;"><o:p /></span></strong></font></p> 
          <p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 12pt;">Je vous informe que vous b??n??ficiez de la garantie arr??t de travail d??s
  lors que vous : </span></strong><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <ul type="disc"> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">??tes
       ??g??(e) de moins de 59 ans,</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">avez
       votre r??sidence principale et fiscale en France, exercez une activit??
       professionnelle r??mun??r??e (salari??e ou non) en France m??tropolitaine ou
       dans un pays limitrophe,</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">n'??tes
       pas en arr??t de travail pour raison de sant?? et que vous ne l'avez pas
       ??t?? pendant plus de 30 jours cons??cutifs depuis 1 an,</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">n'??tes
       pas titulaire d'une rente ou d'une pension d'invalidit??,</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">n'??tes
       pas exon??r??(e) du ticket mod??rateur pour raison de sant?? (ALD) ?</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
          </ul> 
        </td> 
        <td width="50%" valign="top" style="width: 50%; border-style: dotted dotted dotted none; border-top-color: black; border-right-color: black; border-bottom-color: black; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; padding: 3.75pt;"> 
          <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 12pt; color: #0003ff;">PAS CDI = Garantie
  ARRET DE TRAVAIL seule</span></strong><strong><span style="font-size: 18pt;"><o:p /></span></strong></font></p> 
          <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 12pt;">Je vous
  informe que vous b??n??ficiez de la garantie arr??t de travail d??s lors que vous
  :</span></strong><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <ul type="disc"> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">??tes
       ??g??(e) de moins de 59 ans,</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">avez
       votre r??sidence principale et fiscale en France, exercez une activit??
       professionnelle r??mun??r??e (salari??e ou non) en France m??tropolitaine ou
       dans un pays limitrophe,</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">n'??tes
       pas en arr??t de travail pour raison de sant?? et que vous ne l'avez pas
       ??t?? pendant plus de 30 jours cons??cutifs depuis 1 an,</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">n'??tes
       pas titulaire d'une rente ou d'une pension d'invalidit??.</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">n'??tes
       pas exon??r??(e) du ticket mod??rateur pour raison de sant?? (ALD), </span><span style="font-size: 12pt;"><o:p /></span></font></li> 
          </ul> 
          <p class="MsoNormal" style="margin-left: 36pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 12pt;">Vous confirmez ?</span></strong><u><span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">&gt;</span></u><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
  R??PONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
        </td> 
      </tr> 
      <tr> 
        <td colspan="2" style="border-style: none dotted dotted; border-right-color: black; border-bottom-color: black; border-left-color: black; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 3.75pt;"> 
          <p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><strong><span style="font-size: 18pt;"><font face="arial, helvetica, sans-serif">Exon??r?? du ticket mod??rateur : <span style="color: #3fa50a;"></span></font></span></strong></p> 
        </td> 
      </tr> 
      <tr> 
        <td valign="top" style="border-style: none dotted dotted; border-right-color: black; border-bottom-color: black; border-left-color: black; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 3.75pt;"> 
          <p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Vous
  b??n??ficiez aussi de la garantie Ch??mage d??s lors que vous:</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <ul type="disc"> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">occupez
       un emploi salari?? dans le cadre d'un contrat ?? dur??e ind??termin??e</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">n'??tes
       pas au ch??mage, en pr??avis de licenciement ou de d??mission, en
       pr??retraite ou ?? la retraite, ou en p??riode d'essai</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
          </ul> 
          <p class="MsoNormal" style="margin-left: 36pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 12pt;">Vous confirmez ?</span></strong><u><span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">&gt;</span></u><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
  R??PONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="text-align: left; margin-left: 36pt;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 18pt;">En p??riode d'essai, licenciement
  ou d??mission :&nbsp;<span style="color: #3fa50a;">
  </span></span></strong><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" align="center" style="margin-bottom: 0.0001pt; text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt; color: #019600;">R??PONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Vous nous confirmez donc votre int??r??t ?? une
  assurance de pr??voyance individuelle qui vous couvrirait en cas d'arr??t de
  travail par suite de maladie ou d'accident ou de ch??mage suite ?? un
  licenciement ? <u><span style="background-position: initial initial; background-repeat: initial initial;">&gt;</span></u></span><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
  R??PONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt; color: #019600;">R??PONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Parfait, compte tenu de l'ensemble des informations
  que vous nous avez fournies, le contrat <strong><span style="color: red;">IND??MNI+</span></strong>
  est conseill??. <strong><span style="color: red;">IND??MNI+</span></strong> r??pond ?? votre
  besoin en ce sens qu'il pr??voit pour un montant de&nbsp;<strong><span style="color: red; background-position: initial initial; background-repeat: initial initial;">
  <?=$rowcont['COTISATION']?></span><span style="color: red;"> ???</span></strong> par mois apr??s une franchise de 90 jours le
  versement d'une rente mensuelle de <strong><span style="color: red;"> <?=$rowcont['CAPITAL']?></span></strong>
  par mois en cas :</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <ul type="disc"> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">de
       perte d'emploi cons??cutive ?? un licenciement,</span><span style="font-size: 12pt;"><o:p /></span></font></li> 
            <li class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">d'arr??t
       de travail suite ?? un accident ou une maladie, </span><span style="font-size: 12pt;"><o:p /></span></font></li> 
          </ul> 
          <p class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;"><br />
  qui prend fin ?? la date de reprise de travail et/ou d'une activit??
  professionnelle r??mun??r??e et au plus tard apr??s 6 mois d'indemnisation. <br /> <br />
  La garantie Arr??t de Travail prend imm??diatement effet ?? la date d'adh??sion. <br />
  La garantie Perte d'Emploi prend effet 180 jours ou 6 mois ?? compter
  d'aujourd'hui d'o?? l'importance de s'assurer rapidement. <br />
  Bien s??r, il y a quelques exclusions qui figurent dans la Notice
  d'Information comme : </span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;"><br /> <em><u style="color: #0003ff;">Pour les arr??ts de travail :</u></em></span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">les affections cervico-dorso-lombaires, psychiatriques,
  psychiques ou neuro-psychiques, les ??tats d??pressifs quelle que soit leur
  nature et la fibromyalgie. Les affections suivantes connues de l'assur?? au
  moment de l'adh??sion : hypertension, diab??te, asthme, tumeurs malignes. Les
  sinistres survenus sous l'emprise de l'alcool ou suite ?? l'usage de la
  drogue.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;"><br /> <em><u style="color: #0003ff;">Pour la garantie Perte d'emploi :</u></em></span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">le licenciement pour faute grave ou lourde ou encore
  le licenciement par un membre de la famille. Je vous invite ?? les consulter
  dans la Notice d'information de l'assurance que je vais vous envoyer. </span><span style="font-size: 12pt;"><o:p /></span></font></p> 
        </td> 
        <td valign="top" style="border-style: none dotted dotted none; border-bottom-color: black; border-bottom-width: 1pt; border-right-color: black; border-right-width: 1pt; padding: 3.75pt;"> 
          <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt 36pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Vous b??n??ficiez aussi de la
  garantie Incapacit?? de Travail am??lior??e. Dans ce cas l'indemnisation d??bute
  30 jours apr??s le d??but de l'incapacit?? de travail d??s lors que vous avez
  atteint 90 jours cons??cutifs d'arr??t de travail. <br />
  Vous nous confirmez donc votre int??r??t ?? une assurance de pr??voyance
  individuelle qui vous couvrirait en cas d'arr??t de travail par suite de
  maladie ou d'accident ? <u><span style="background-position: initial initial; background-repeat: initial initial;">&gt;</span></u></span><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
  R??PONSE</span></u></em></font></p> 
          <p class="MsoNormal" align="center" style="margin-bottom: 0.0001pt; text-align: center;"><span style="color: #019600;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt;">R??PONSE CLIENT : OUI</span> </font></span></p> 
          <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt 36pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Parfait, compte tenu de l'ensemble
  des informations que vous nous avez fournies, le contrat <strong><span style="color: red;">IND??MNI+</span></strong> est conseill??.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt 36pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><strong><span style="font-size: 12pt;">IND??MNI+</span></strong><span style="font-size: 12pt;"> r??pond ?? votre besoin en ce sens
  qu'il pr??voit pour un montant de <strong><span style="color: red;"><?=$rowcont['COTISATION']?>
  ???</span></strong> par mois apr??s une franchise de 90 jours le versement d'une
  rente mensuelle de <strong><span style="color: red;"><?=$rowcont['CAPITAL']?></span></strong>par
  mois en cas : d'arr??t de travail suite ?? un accident ou une maladie, qui
  prend fin ?? la date de reprise de travail et au plus tard apr??s 6 mois
  d'indemnisation.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt 36pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">La garantie Arr??t de Travail prend
  imm??diatement effet ?? la date d'adh??sion.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt 36pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Bien s??r, il y a quelques
  exclusions qui figurent dans la Notice d'Information comme par exemple les
  affections cervico-dorso-lombaires, psychiatriques, psychiques ou
  neuro-psychiques, les ??tats d??pressifs quelle que soit leur nature et la
  fibromyalgie</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
          <p class="MsoNormal" style="margin: 0cm 0cm 0.0001pt 36pt; text-align: justify;"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Je vous invite ?? les consulter
  dans la Notice d'information de l'assurance que je vais vous envoyer.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
        </td> 
      </tr> 
    </tbody>
  </table>
  <p><font face="arial, helvetica, sans-serif"> <strong><span style="font-size: 12pt; color: #0003ff;"><?=$rowcont['CIVILITE']?> <?=$rowcont['NOM']?>, </span></strong><span style="font-size: 12pt;">je vous remets de suite par e-mail les informations
pr??contractuelles.</span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif" size="5"><strong style="color: #ff0000;">Appuyer sur button envoi contrat EMPRUNTEUR !</strong></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Tous ces
??l??ments sont repris dans la notice d'information que je vous ai remise.
Souhaitez-vous que nous les parcourions ou acceptez-vous les conditions
g??n??rales vues ensemble ? <u><span style="background-position: initial initial; background-repeat: initial initial;">&gt;</span></u></span><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
R??PONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Je vous
rappelle que ce contrat est conclu pour une dur??e d'un an et est renouvelable
annuellement par tacite reconduction. Il est r??siliable ?? tout moment.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Vous aurez
n??anmoins la possibilit?? de renoncer ?? cette adh??sion dans les 30 jours qui
suivent la r??ception de la Notice&nbsp;
d???information par lettre recommand??e avec accus?? de r??ception ?? <strong><span style="color: red;">COFIDIS </span></strong>au Parc de la Haute Borne, ?? Villeneuve
d???Ascq.<br /> <br />
Vous acceptez que la cotisation mensuelle de <strong><span style="color: red;"><?=$rowcont['COTISATION']?>&nbsp;
??? </span></strong>soit automatiquement pr??lev??e par
<strong><span style="color: red;">S??R??NIS ASSURANCES</span></strong> sur votre compte bancaire connu chez <strong><span style="color: red;">COFIDIS</span></strong> ?<u><span style="background-position: initial initial; background-repeat: initial initial;">&gt;</span></u></span><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE R??PONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="margin-bottom: 0.0001pt; text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt; color: green;">R??PONSE CLIENT : OUI</span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Votre accord
vaut mandat de pr??l??vement. La r??f??rence unique de mandat vous sera confirm??e
lors de l'envoi du certificat d'adh??sion.</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Vous nous confirmez donc demander ?? adh??rer ?? l'assurance </span><strong><span style="font-size: 12pt; color: red;">IND??MNI+</span></strong><span style="font-size: 12pt;"> de </span><strong><span style="font-size: 12pt; color: red;">COFIDIS </span></strong><span style="font-size: 12pt;">?</span><u><span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">&gt;</span></u><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
R??PONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" style="margin-bottom: 0.0001pt;"><span style="font-size: 12pt;"><font face="arial, helvetica, sans-serif"> </font></span></p> 
  <p class="MsoNormal" align="center" style="margin-bottom: 0.0001pt; text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt; color: green;">R??PONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">??tes-vous d'accord pour que votre adh??sion prenne effet imm??diatement tout
en conservant votre droit ?? renonciation ?</span><u><span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">&gt;</span></u><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
R??PONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="margin-bottom: 0.0001pt; text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt; color: green;">R??PONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt; color: #222222;">Suite ?? notre conversation, vous recevrez&nbsp;</span><span style="font-size: 12pt;">le document d???information sur le
produit d'assurance<span style="color: #222222;">, le certificat de garantie et
un exemplaire de la notice d???information. En plus, nous avons le plaisir de
vous offrir le premier mois de cotisation.</span></span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Souhaitez-vous en savoir plus notamment sur votre interm??diaire
d'assurance, notre Assureur, l'Autorit?? de Contr??le de l'assureur, la loi et la
langue applicables au contrat ainsi que le fonctionnement des r??clamations ou
bien les informations d??j?? fournies vous semblent suffisantes ?</span><u><span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">&gt;</span></u><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
R??PONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal" align="center" style="text-align: center;"><font face="arial, helvetica, sans-serif"><span style="font-size: 10pt; color: green;">R??PONSE CLIENT : OUI</span><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><span style="font-size: 12pt;">Tout est clair pour vous&nbsp;?</span><u><span style="font-size: 12pt; background-position: initial initial; background-repeat: initial initial;">&gt;</span></u><em><u><span style="font-size: 10pt; color: #000be0; background-position: initial initial; background-repeat: initial initial;">ATTENDRE
R??PONSE</span></u></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <p class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 7.5pt;">Si souhait
d'en savoir plus : sachez que...</span></em><span style="font-size: 12pt;"><o:p /></span></font></p> 
  <ul type="disc"> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 7.5pt;">CEL Pr??voyance est votre
     interm??diaire d'assurance, son si??ge social est ?? Paris (75015), 1 rue du
     Lieuvin et est immatricul?? ?? l'ORIAS sous le num??ro 21 003 723</span></em><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 10pt;">La gestion des saisies des
     adh??sions est confi??e ?? COFIDIS</span></em><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 7.5pt;">Coordonn??es de l'assureur
     (si??ge social): S??r??nis Assurance, 25 rue du Docteur Henri Abel - 26000
     Valence RCS ROMANS 350 838 686</span></em><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 7.5pt;">Coordonn??es de l'autorit?? de
     contr??le: l'ensemble des soci??t??s est soumis au contr??le de l'Autorit?? de
     Contr??le Prudentiel et de R??solution, 61 rue Taitbout 75436 Paris cedex
     09. Pour plus d'informations, le registre des interm??diaires d'assurance
     (ORIAS) est librement accessible sur le site internet www.orias.fr. Je
     vous communique ??galement les coordonn??es de notre service Cofidis
     Assurance, Autorisation 50040, 59869 Villeneuve d'Ascq cedex</span></em><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 7.5pt;">INDEMNI + est un contrat
     d'assurance collectif ?? adh??sion facultative souscrit par COFIDIS aupr??s
     de SERENIS Assurance, Service Pr??voyance - 46 rue Jules M??line - 53098
     LAVAL Cedex 9.</span></em><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 7.5pt;">Loi applicable: la loi
     fran??aise</span></em><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 7.5pt;">Langue du contrat: fran??ais</span></em><span style="font-size: 12pt;"><o:p /></span></font></li> 
    <li class="MsoNormal"><font face="arial, helvetica, sans-serif"><em><span style="font-size: 7.5pt;">Modalit??s de traitement des
     r??clamations: entrez en contact d'abord avec votre interlocuteur habituel
     SERENIS ASSURANCES. Si sa r??ponse ne vous satisfait pas : Vous pouvez
     adresser votre r??clamation au: Responsable des relations consommateurs S??r??nis
     Assurances 34 rue du Wacken 67906 Strasbourg cedex 9.Si votre litige n'est
     toujours pas r??solu : Les coordonn??es du M??diateur vous seront
     communiqu??es par l'assureur</span></em><span style="font-size: 12pt;"><o:p /></span></font></li> 
  </ul> <span style="font-size: 12pt; line-height: 107%;"><font face="arial, helvetica, sans-serif">&nbsp;Je vous remercie du temps que vous m'avez
consacr??&nbsp;<strong><span style="color: #0003ff;"><?=$rowcont['CIVILITE']?> <?=$rowcont['NOM']?></span></strong>&nbsp;et
vous souhaite une excellente journ??e de la part de toute l'??quipe de <strong><span style="color: red;">COFIDIS </span></strong>et de moi-m??me.&nbsp;</font></span>

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
