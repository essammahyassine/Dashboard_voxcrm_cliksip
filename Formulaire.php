<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta charset="utf-8">
<style type="text/css">
  h3
  {
    padding: 20px;
    background-color: #864ac7;
    color: white;
  }
</style>
<?php
  $server = 'localhost';
    $utilisateur ='cliksip';
    $password = 'cliksip2018';
    $database = 'voxcrm';

    $cnx = mysqli_connect($server,$utilisateur,$password,$database);
    $idcont = $_GET['idcont'];

if (isset($_POST['sub'])) {
      
        $PXNOM=str_replace("'", "&#39;",$_POST['PXNOM']);
        $PXPRENOM=str_replace("'", "&#39;",$_POST['PXPRENOM']);
        $PXSOC=str_replace("'", "&#39;",$_POST['PXSOC']);
        $PXTVA=str_replace("'", "&#39;",$_POST['PXTVA']);
        $PXRUE=str_replace("'", "&#39;",$_POST['PXRUE']);
        $PXN=str_replace("'", "&#39;",$_POST['PXN']);
        $PXBTE=str_replace("'", "&#39;",$_POST['PXBTE']);
        $PXCP=str_replace("'", "&#39;",$_POST['PXCP']);
        $PXLOC=str_replace("'", "&#39;",$_POST['PXLOC']);
        $PXEMAIL=str_replace("'", "&#39;",$_POST['PXEMAIL']);
        $PXTEL=str_replace("'", "&#39;",$_POST['PXTEL']);
        $PXGSMCL=str_replace("'", "&#39;",$_POST['PXGSMCL']);
        $PXDTN=str_replace("'", "&#39;",$_POST['PXDTN']);
        $PXIDEM=str_replace("'", "&#39;",$_POST['PXIDEM']);
        $PXIDEMADR=str_replace("'", "&#39;",$_POST['PXIDEMADR']);
        $PXDIGITALEEMAIL=str_replace("'", "&#39;",$_POST['PXDIGITALEEMAIL']);
        $PXDOMICILIATION=str_replace("'", "&#39;",$_POST['PXDOMICILIATION']);
        $PXPACK=str_replace("'", "&#39;",$_POST['PXPACK']);
        $PXBONUS=str_replace("'", "&#39;",$_POST['PXBONUS']);
        $PXPACKMOBILUS=str_replace("'", "&#39;",$_POST['PXPACKMOBILUS']);
        $PXMOBILUSFC=str_replace("'", "&#39;",$_POST['PXMOBILUSFC']);
        $PXAPP1=str_replace("'", "&#39;",$_POST['PXAPP1']);
        $PXTYPECL=str_replace("'", "&#39;",$_POST['PXTYPECL']);
        $PXLF=str_replace("'", "&#39;",$_POST['PXLF']);
        $PXNAI=str_replace("'", "&#39;",$_POST['PXNAI']);
        $PXINTERNET=str_replace("'", "&#39;",$_POST['PXINTERNET']);
        $PXTV=str_replace("'", "&#39;",$_POST['PXTV']);
        $PXOP1=str_replace("'", "&#39;",$_POST['PXOP1']);
        $PXOP2=str_replace("'", "&#39;",$_POST['PXOP2']);
        $PXOP3=str_replace("'", "&#39;",$_POST['PXOP3']);
        $PXOP4=str_replace("'", "&#39;",$_POST['PXOP4']);
        $PXOP5=str_replace("'", "&#39;",$_POST['PXOP5']);
        $PXOP6=str_replace("'", "&#39;",$_POST['PXOP6']);
        $PXOP7="Netflix";
        $PXDANS=str_replace("'", "&#39;",$_POST['PXDANS']);
        $PXPAYGO=str_replace("'", "&#39;",$_POST['PXPAYGO']);
        $PXGSM=str_replace("'", "&#39;",$_POST['PXGSM']);
        $PXCLEXIST=str_replace("'", "&#39;",$_POST['PXCLEXIST']);
        $PXLANGUE=str_replace("'", "&#39;",$_POST['PXLANGUE']);
        $PXSIM=str_replace("'", "&#39;",$_POST['PXSIM']);
        $PXCARTE=str_replace("'", "&#39;",$_POST['PXCARTE']);
        $PXMARQUEAP=str_replace("'", "&#39;",$_POST['PXMARQUEAP']);
        $PXRMVMOBILUS=str_replace("'", "&#39;",$_POST['PXRMVMOBILUS']);
        $PXRMVMOBILUSFC=str_replace("'", "&#39;",$_POST['PXRMVMOBILUSFC']);
        $PXEPIC=str_replace("'", "&#39;",$_POST['PXEPIC']);
        $PXDATAPHONE=str_replace("'", "&#39;",$_POST['PXDATAPHONE']);
        $PXTYPEMOBILE=str_replace("'", "&#39;",$_POST['PXTYPEMOBILE']);
        $PXREMARQUE=str_replace("'", "&#39;",$_POST['PXREMARQUE']);



        $queryexec = "UPDATE `contacts` SET
           PXIDEM='".$PXIDEM."'
          ,PXIDEMADR='".$PXIDEMADR."'
          ,PXDIGITALEEMAIL='".$PXDIGITALEEMAIL."'
          ,PXDOMICILIATION='".$PXDOMICILIATION."'
          ,PXPACK='".$PXPACK."'
          ,PXBONUS='".$PXBONUS."'
          ,PXPACKMOBILUS='".$PXPACKMOBILUS."'
          ,PXMOBILUSFC='".$PXMOBILUSFC."'
          ,PXAPP1='".$PXAPP1."'
          ,PXTYPECL='".$PXTYPECL."'
          ,PXLF='".$PXLF."'
          ,PXNAI='".$PXNAI."'
          ,PXINTERNET='".$PXINTERNET."'
          ,PXTV='".$PXTV."'
          ,PXOP1='".$PXOP1."'
          ,PXOP2='".$PXOP2."'
          ,PXOP3='".$PXOP3."'
          ,PXOP4='".$PXOP4."'
          ,PXOP5='".$PXOP5."'
          ,PXOP6='".$PXOP6."'
          ,PXOP7='".$PXOP7."'
          ,PXDANS='".$PXDANS."'
          ,PXPAYGO='".$PXPAYGO."'
          ,PXGSM='".$PXGSM."'
          ,PXCLEXIST='".$PXCLEXIST."'
          ,PXLANGUE='".$PXLANGUE."'
          ,PXSIM='".$PXSIM."'
          ,PXCARTE='".$PXCARTE."'
          ,PXMARQUEAP='".$PXMARQUEAP."'
          ,PXRMVMOBILUS='".$PXRMVMOBILUS."'
          ,PXRMVMOBILUSFC='".$PXRMVMOBILUSFC."'
          ,PXEPIC='".$PXEPIC."'
          ,PXDATAPHONE='".$PXDATAPHONE."'
          ,PXTYPEMOBILE='".$PXTYPEMOBILE."'
          ,PXREMARQUE='".$PXREMARQUE."'
          ,PXNOM='".$PXNOM."'
          ,lastname='".$PXNOM."'
          ,PXPRENOM='".$PXPRENOM."'
          ,firstname='".$PXPRENOM."'
          ,PXSOC='".$PXSOC."'
          ,PXTVA='".$PXTVA."'
          ,PXRUE='".$PXRUE."'
          ,PXN='".$PXN."'
          ,PXBTE='".$PXBTE."'
          ,PXCP='".$PXCP."'
          ,PXLOC='".$PXLOC."'
          ,PXEMAIL='".$PXEMAIL."'
          ,PXTEL='".$PXTEL."'
          ,PXGSMCL='".$PXGSMCL."'
          ,PXDTN='".$PXDTN."'
          WHERE id='".$idcont."'";
          $cnx->query($queryexec);

        $alert = '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Success</span>
                            Inscription Done.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                      </div>';

    }

    
    $queryrec = "SELECT * FROM  contacts 
              WHERE id='".$idcont."'";
    $resultcont = $cnx->query($queryrec);
            while($rowcont = $resultcont->fetch_assoc()) 
                  { 


?>
<img src="Banner.png">
<div class="container">
<!-- <img src="Banner.png" style="width: 100%"> -->
<div style="height: 50px"></div>
<form class="form-horizontal" method="post">
<fieldset>
<div class="row text-center" >
   <div class="col">
       <label>Vendeur : Kglink</label>
   </div>
   <div class="col">
       <label>Date : <?=Date('Y/m/d');?></label>
   </div>
</div>

<!-- Form Name -->

<h2 style="padding-top: 20px;padding-bottom: 20px;text-align: center"><u>Fiche Client</u></h2>
<h3><u>Voicelogs</u></h3>
<p>Tres bien Mr / Mme <b><?=$rowcont['lastname'].' '.$rowcont['firstname'] ?></b> nous allons procédés à l enregistrements de votre commande :</p>
<p>Vous êtes Mr/Mme <b><?=$rowcont['lastname'].' '.$rowcont['firstname'] ?></b></p>
<p>Vous êtes le/la titulaire de la ligne téléphonique  <b><?=$rowcont['phone_1']?></b></p>
<p>Vous habitez à (adresse,Ville,CP) : <b><?=$rowcont['address'].', '.$rowcont['zipcode'].' '.$rowcont['city']?></b></p>
<p>Votre /vos num de Gsm est/sont à activer : <b><?=$rowcont['phone_2']?></b></p>
<p>Votre/vos num de carte sim : <b>{$contact.numclient_gsm1}</b></p>
<p>Les bouquets que vous avez choisis sont : <b>{$contact.proposition_pack}</b></p>
<p>Votre Adresse email : <b><?=$rowcont['email']?></b></p>
<p>Si client communique son adresse mail : vous utilisez déjà la facture électronique ?</p>
<p><b style="color: green">Si oui : </b>passer.</p>
<p><b style="color: red">Si Non : </b>Je vous conseille vivement d’utiliser ce service, c’est le fait de recevoir vos factures Proximus par mail et aussi par SMS, l’avantage c’est que vous êtes vite averti, vous avez le détail de votre facture sans avoir à vous connecter sur My Proximus, puis vous faites un geste pour l’environnement. Vous souhaitez testez la facturation électronique ? </p>
<p>c’est sans engagement de votre part et en plus vous avez la possibilité de revenir sur une facturation papier à tout moment.</p>
<p><b>Client d’accord : Vous recevrez un email vous annonçant que vous recevrez désormais vos factures de manière électronique.</b></p>
<p>Tres bien,Mr/Mme <b><?=$rowcont['lastname'].' '.$rowcont['firstname'] ?></b> vous accepter de souscrir à minimum 12 mois à la formule ..... au prix .....</p>
<div class="row">
<!-- Text input-->
<div class="form-group col">
  <label class="col-md-4 control-label" for="textinput">Nom</label>  
  <div class="col-md-12">
  <input id="PXNOM" name="PXNOM" type="text" placeholder="Nom" class="form-control input-md" required="" value="<?=$rowcont['lastname']?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group col">
  <label class="col-md-4 control-label" for="textinput">Prenom</label>  
  <div class="col-md-12">
  <input id="PXPRENOM" name="PXPRENOM" type="text" placeholder="Prenom" class="form-control input-md" required="" value="<?=$rowcont['firstname']?>">
    
  </div>
</div>
</div>

<div class="row">
<!-- Text input-->
<div class="form-group col">
  <label class="col-md-4 control-label" for="textinput">Nom société</label>  
  <div class="col-md-12">
  <input id="PXSOC" name="PXSOC" type="text" placeholder="Nom société" value="<?=$rowcont['PXSOC']?>" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group col">
  <label class="col-md-4 control-label" for="textinput">N° TVA</label>  
  <div class="col-md-12">
  <input id="PXTVA" name="PXTVA" type="text" placeholder="N° TVA" value="<?=$rowcont['PXTVA']?>" class="form-control input-md">
    
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Rue</label>  
  <div class="col-md-12">
  <input id="PXRUE" name="PXRUE" type="text" placeholder="Rue" value="<?=$rowcont['PXRUE']?>" class="form-control input-md" value="<?=$rowcont['address']?>">
    
  </div>
</div>

<div class="row">
<!-- Text input-->
<div class="form-group col">
  <label class="col-md-4 control-label" for="textinput">N°</label>  
  <div class="col-md-12">
  <input id="PXN" name="PXN" type="text" placeholder="N°" value="<?=$rowcont['PXN']?>" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group col">
  <label class="col-md-4 control-label" for="textinput">Bte</label>  
  <div class="col-md-12">
  <input id="PXBTE" name="PXBTE" type="text" placeholder="Bte" value="<?=$rowcont['PXBTE']?>" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group col">
  <label class="col-md-12 control-label" for="textinput">Code postal</label>  
  <div class="col-md-12">
  <input id="PXCP" name="PXCP" type="text" placeholder="Code postal" value="<?=$rowcont['zipcode']?>" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group col">
  <label class="col-md-4 control-label" for="textinput">Localité</label>  
  <div class="col-md-12">
  <input id="PXLOC" name="PXLOC" type="text" placeholder="Localité" value="<?=$rowcont['city']?>" class="form-control input-md">
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Adresse Email</label>  
  <div class="col-md-12">
  <input id="PXEMAIL" name="PXEMAIL" type="text" placeholder="Adresse Email" value="<?=$rowcont['PXEMAIL']?>" class="form-control input-md">
    
  </div>
</div>

<div class="row">
<!-- Text input-->
<div class="form-group col">
  <label class="col-md-4 control-label" for="textinput">Téléphone</label>  
  <div class="col-md-12">
  <input id="PXTEL" name="PXTEL" type="text" placeholder="Téléphone" value="<?=$rowcont['PXTEL']?>" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group col">
  <label class="col-md-4 control-label" for="textinput">GSM</label>  
  <div class="col-md-12">
  <input id="PXGSMCL" name="PXGSMCL" type="text" placeholder="GSM" value="<?=$rowcont['PXGSMCL']?>" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group col">
  <label class="col-md-12 control-label" for="textinput">Date Naissance</label>  
  <div class="col-md-12">
  <input id="PXDTN" name="PXDTN" type="text" placeholder="Date Naissance" value="<?=$rowcont['PXDTN']?>" class="form-control input-md">
    
  </div>
</div>
</div>

<div class="row">
<!-- Select Basic -->
<div class="form-group col">
  <label class="col-md-12 control-label" for="selectbasic">Adresse d'installation idem ?</label>
  <div class="col-md-12">
    <select id="PXIDEM" name="PXIDEM" class="form-control">
      <option value=""></option>
      <option value="Oui">Oui</option>
      <option value="Non">Non</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group col">
  <label class="col-md-12 control-label" for="textinput">Adresse</label>  
  <div class="col-md-12">
  <input id="PXIDEMADR" name="PXIDEMADR" type="text" placeholder="Adresse" class="form-control input-md">
    
  </div>
</div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Digitale " par Email " : </label>
  <div class="col-md-4">
    <select id="PXDIGITALEEMAIL" name="PXDIGITALEEMAIL" class="form-control">
      <option value=""></option>
      <option value="Oui">Oui</option>
      <option value="Non">Non</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="textinput">Domiciliation (obligatoire avec une J.O) : N° de compte en banque : BE</label>  
  <div class="col-md-12">
  <input id="PXDOMICILIATION" name="PXDOMICILIATION" type="text" placeholder="Domiciliation (obligatoire avec une J.O) : N° de compte en banque : BE" class="form-control input-md">
  </div>
</div>
<hr>
<h3><u>PACK</u></h3>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Pack</label>
  <div class="col-md-5">
    <select id="PXPACK" name="PXPACK" class="form-control">
      <option value=""></option>
      <option value="Familus Internet + TV + Tel">Familus " Internet + TV + Tel "</option>
      <option value="Minimus Internet + TV + Tel">Minimus " Internet + TV + Tel "</option>
      <option value="Tuttimus Internet + TV + Tel">Tuttimus " Internet + TV + Tel "</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Bonus</label>
  <div class="col-md-5">
    <select id="PXBONUS" name="PXBONUS" class="form-control">
      <option value=""></option>
      <option value="avec 1 bonus TV au choix">avec 1 bonus TV au choix</option>
      <option value="sans bonus TV">sans bonus TV</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">avec Mobilus </label>
  <div class="col-md-5">
    <select id="PXPACKMOBILUS" name="PXPACKMOBILUS" class="form-control">
      <option value=""></option>
      <option value="S">S</option>
      <option value="M">M</option>
      <option value="L">L</option>
      <option value="XL Unlimited">XL Unlimited</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">avec Mobilus FullControl</label>
  <div class="col-md-5">
    <select id="PXMOBILUSFC" name="PXMOBILUSFC" class="form-control">
      <option value=""></option>
      <option value="S">S</option>
      <option value="M">M</option>
      <option value="L">L</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">App (1 au choix)</label>
  <div class="col-md-5">
    <select id="PXAPP1" name="PXAPP1" class="form-control">
      <option value=""></option>
      <option value="Facebook, Messenger">Facebook, Messenger</option>
      <option value="Twitter">Twitter</option>
      <option value="Instagram">Instagram</option>
      <option value="Snapchat">Snapchat</option>
      <option value="Whatsapp">Whatsapp</option>
      <option value="Pinterest">Pinterest</option>
    </select>
  </div>
</div>
<hr>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Type Client </label>
  <div class="col-md-5">
    <select id="PXTYPECL" name="PXTYPECL" class="form-control">
      <option value=""></option>
      <option value="Nouveau">Nouveau</option>
      <option value="Conversion">Conversion</option>
      <option value="Port (LOA)">Port (LOA)</option>
    </select>
  </div>
</div>

<div class="row">
<!-- Select Basic -->
<div class="form-group col">
  <label class="col-md-12 control-label" for="selectbasic">Ligne Fixe</label>
  <div class="col-md-12">
    <select id="PXLF" name="PXLF" class="form-control">
      <option value=""></option>
      <option value="Oui">Oui</option>
      <option value="Non">Non</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group col">
  <label class="col-md-12 control-label" for="textinput">N° d'appel ou n° Internet sans ligne fixe </label>  
  <div class="col-md-12">
  <input id="PXNAI" name="PXNAI" type="text" placeholder="N° d'appel ou n° Internet sans ligne fixe " class="form-control input-md">
    
  </div>
</div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Internet</label>
  <div class="col-md-5">
    <select id="PXINTERNET" name="PXINTERNET" class="form-control">
      <option value=""></option>
      <option value="Start">Start</option>
      <option value="Maxi">Maxi</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">TV</label>
  <div class="col-md-5">
    <select id="PXTV" name="PXTV" class="form-control">
      <option value=""></option>
      <option value="TV avec Internet">TV avec Internet</option>
      <option value="TV sans Internet">TV sans Internet</option>
      <option value="TV Replay">TV Replay</option>
      <option value="TV Replay+">TV Replay+</option>
      <option value="TV dans Pack Tuttimus (1 bonus TV au choix)">TV dans Pack Tuttimus (1 bonus TV au choix)</option>
    </select>
  </div>
</div>
<h3><u>Les options TV</u></h3>
<div class="row">
<!-- Select Basic -->
<div class="form-group col">
  <label class="col-md-4 control-label" for="selectbasic">Option 1</label>
  <div class="col-md-12">
    <select id="PXOP1" name="PXOP1" class="form-control">
      <option value=""></option>
      <option value="Entertainment Channels">Entertainment Channels</option>
      <option value="Movies&amp;Series Pass">Movies&amp;Series Pass</option>
      <option value="All Entertainment">All Entertainment</option>
      <option value="Belgian Sports">Belgian Sports</option>
      <option value="International Sports">International Sports</option>
      <option value="All Sports">All Sports</option>
      <option value="Kids Channels">Kids Channels</option>
      <option value="Studio 100 GO Pass">Studio 100 GO Pass</option>
      <option value="All Kids">All Kids</option>
      <option value="Adult Channels">Adult Channels</option>
      <option value="Adult Pass">Adult Pass</option>
      <option value="All Adult">All Adult</option>
      <option value="RTBF Culture Pass">RTBF Culture Pass</option>
      <option value="RTL Selection Pass">RTL Selection Pass</option>
      <option value="RTL Series Pass">RTL Series Pass</option>
      <option value="Netflix">Netflix</option>
      <option value="Be tv">Be tv</option>
      <option value="Norton Security 1">Norton Security 1</option>
      <option value="Norton Security 5">Norton Security 5</option>
    </select>
  </div>
</div>
<!-- Select Basic -->
<div class="form-group col">
  <label class="col-md-4 control-label" for="selectbasic">Option 2</label>
  <div class="col-md-12">
    <select id="PXOP2" name="PXOP2" class="form-control">
      <option value=""></option>
      <option value="Entertainment Channels">Entertainment Channels</option>
      <option value="Movies&amp;Series Pass">Movies&amp;Series Pass</option>
      <option value="All Entertainment">All Entertainment</option>
      <option value="Belgian Sports">Belgian Sports</option>
      <option value="International Sports">International Sports</option>
      <option value="All Sports">All Sports</option>
      <option value="Kids Channels">Kids Channels</option>
      <option value="Studio 100 GO Pass">Studio 100 GO Pass</option>
      <option value="All Kids">All Kids</option>
      <option value="Adult Channels">Adult Channels</option>
      <option value="Adult Pass">Adult Pass</option>
      <option value="All Adult">All Adult</option>
      <option value="RTBF Culture Pass">RTBF Culture Pass</option>
      <option value="RTL Selection Pass">RTL Selection Pass</option>
      <option value="RTL Series Pass">RTL Series Pass</option>
      <option value="Netflix">Netflix</option>
      <option value="Be tv">Be tv</option>
      <option value="Norton Security 1">Norton Security 1</option>
      <option value="Norton Security 5">Norton Security 5</option>
    </select>
  </div>
</div>
</div>
<div class="row">
<!-- Select Basic -->
<div class="form-group col">
  <label class="col-md-4 control-label" for="selectbasic">Option 3</label>
  <div class="col-md-12">
    <select id="PXOP3" name="PXOP3" class="form-control">
      <option value=""></option>
      <option value="Entertainment Channels">Entertainment Channels</option>
      <option value="Movies&amp;Series Pass">Movies&amp;Series Pass</option>
      <option value="All Entertainment">All Entertainment</option>
      <option value="Belgian Sports">Belgian Sports</option>
      <option value="International Sports">International Sports</option>
      <option value="All Sports">All Sports</option>
      <option value="Kids Channels">Kids Channels</option>
      <option value="Studio 100 GO Pass">Studio 100 GO Pass</option>
      <option value="All Kids">All Kids</option>
      <option value="Adult Channels">Adult Channels</option>
      <option value="Adult Pass">Adult Pass</option>
      <option value="All Adult">All Adult</option>
      <option value="RTBF Culture Pass">RTBF Culture Pass</option>
      <option value="RTL Selection Pass">RTL Selection Pass</option>
      <option value="RTL Series Pass">RTL Series Pass</option>
      <option value="Netflix">Netflix</option>
      <option value="Be tv">Be tv</option>
      <option value="Norton Security 1">Norton Security 1</option>
      <option value="Norton Security 5">Norton Security 5</option>
    </select>
  </div>
</div>
<!-- Select Basic -->
<div class="form-group col">
  <label class="col-md-4 control-label" for="selectbasic">Option 4</label>
  <div class="col-md-12">
    <select id="PXOP4" name="PXOP4" class="form-control">
      <option value=""></option>
      <option value="Entertainment Channels">Entertainment Channels</option>
      <option value="Movies&amp;Series Pass">Movies&amp;Series Pass</option>
      <option value="All Entertainment">All Entertainment</option>
      <option value="Belgian Sports">Belgian Sports</option>
      <option value="International Sports">International Sports</option>
      <option value="All Sports">All Sports</option>
      <option value="Kids Channels">Kids Channels</option>
      <option value="Studio 100 GO Pass">Studio 100 GO Pass</option>
      <option value="All Kids">All Kids</option>
      <option value="Adult Channels">Adult Channels</option>
      <option value="Adult Pass">Adult Pass</option>
      <option value="All Adult">All Adult</option>
      <option value="RTBF Culture Pass">RTBF Culture Pass</option>
      <option value="RTL Selection Pass">RTL Selection Pass</option>
      <option value="RTL Series Pass">RTL Series Pass</option>
      <option value="Netflix">Netflix</option>
      <option value="Be tv">Be tv</option>
      <option value="Norton Security 1">Norton Security 1</option>
      <option value="Norton Security 5">Norton Security 5</option>
    </select>
  </div>
</div>
</div>
<div class="row">
<!-- Select Basic -->
<div class="form-group col">
  <label class="col-md-4 control-label" for="selectbasic">Option 5</label>
  <div class="col-md-12">
    <select id="PXOP5" name="PXOP5" class="form-control">
      <option value=""></option>
      <option value="Entertainment Channels">Entertainment Channels</option>
      <option value="Movies&amp;Series Pass">Movies&amp;Series Pass</option>
      <option value="All Entertainment">All Entertainment</option>
      <option value="Belgian Sports">Belgian Sports</option>
      <option value="International Sports">International Sports</option>
      <option value="All Sports">All Sports</option>
      <option value="Kids Channels">Kids Channels</option>
      <option value="Studio 100 GO Pass">Studio 100 GO Pass</option>
      <option value="All Kids">All Kids</option>
      <option value="Adult Channels">Adult Channels</option>
      <option value="Adult Pass">Adult Pass</option>
      <option value="All Adult">All Adult</option>
      <option value="RTBF Culture Pass">RTBF Culture Pass</option>
      <option value="RTL Selection Pass">RTL Selection Pass</option>
      <option value="RTL Series Pass">RTL Series Pass</option>
      <option value="Netflix">Netflix</option>
      <option value="Be tv">Be tv</option>
      <option value="Norton Security 1">Norton Security 1</option>
      <option value="Norton Security 5">Norton Security 5</option>
    </select>
  </div>
</div>
<!-- Select Basic -->
<div class="form-group col">
  <label class="col-md-4 control-label" for="selectbasic">Option 6</label>
  <div class="col-md-12">
    <select id="PXOP6" name="PXOP6" class="form-control">
      <option value=""></option>
      <option value="Entertainment Channels">Entertainment Channels</option>
      <option value="Movies&amp;Series Pass">Movies&amp;Series Pass</option>
      <option value="All Entertainment">All Entertainment</option>
      <option value="Belgian Sports">Belgian Sports</option>
      <option value="International Sports">International Sports</option>
      <option value="All Sports">All Sports</option>
      <option value="Kids Channels">Kids Channels</option>
      <option value="Studio 100 GO Pass">Studio 100 GO Pass</option>
      <option value="All Kids">All Kids</option>
      <option value="Adult Channels">Adult Channels</option>
      <option value="Adult Pass">Adult Pass</option>
      <option value="All Adult">All Adult</option>
      <option value="RTBF Culture Pass">RTBF Culture Pass</option>
      <option value="RTL Selection Pass">RTL Selection Pass</option>
      <option value="RTL Series Pass">RTL Series Pass</option>
      <option value="Netflix">Netflix</option>
      <option value="Be tv">Be tv</option>
      <option value="Norton Security 1">Norton Security 1</option>
      <option value="Norton Security 5">Norton Security 5</option>
    </select>
  </div>
</div>
</div>
<h3><u>TELEPHONE MOBILE</u></h3>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Dans </label>
  <div class="col-md-5">
    <select id="PXDANS" name="PXDANS" class="form-control">
      <option value=""></option>
      <option value="Dans un Pack Tuttimus">Dans un Pack Tuttimus</option>
      <option value="Dans un Pack Minimus">Dans un Pack Minimus</option>
      <option value="Dans un autre Pack">Dans un autre Pack</option>
      <option value="Hors Pack">Hors Pack</option>
      <option value="Dans un Pack Bizz All-in">Dans un Pack Bizz All-in</option>
      <option value="Hors Pack Bizz All-in">Hors Pack Bizz All-in</option>
      <option value="Nouveau client">Nouveau client</option>
      <option value="Transfert de Base/Orange/Telenet*">Transfert de Base/Orange/Telenet*</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Conversion Pay&amp;Go N° de GSM</label>  
  <div class="col-md-5">
  <input id="PXPAYGO" name="PXPAYGO" type="text" placeholder="Conversion Pay&amp;Go N° de GSM" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">N° GSM</label>  
  <div class="col-md-5">
  <input id="PXGSM" name="PXGSM" type="text" placeholder="N° GSM" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Client Proximus existant</label>  
  <div class="col-md-12">
  <input id="PXCLEXIST" name="PXCLEXIST" type="text" placeholder="Client Proximus existant" class="form-control input-md">
  <b style="color: red">(*Biffez les mentions inutiles ou/et complétez + attention à ne pas oublier de remplir le document de transfert de n° vers Proximus)</b>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Langue</label>
  <div class="col-md-5">
    <select id="PXLANGUE" name="PXLANGUE" class="form-control">
      <option value=""></option>
      <option value="NL">NL</option>
      <option value="F">F</option>
      <option value="D">D</option>
      <option value="EN (EN uniquement pour le Voice Mail)">EN (EN uniquement pour le Voice Mail)</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">N° de carte SIM</label>  
  <div class="col-md-5">
  <input id="PXSIM" name="PXSIM" type="text" placeholder="N° de carte SIM" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Carte</label>
  <div class="col-md-5">
    <select id="PXCARTE" name="PXCARTE" class="form-control">
      <option value=""></option>
      <option value="Nano">Nano</option>
      <option value="Normal">Normal</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Marque et type de l'appreil</label>  
  <div class="col-md-8">
  <input id="PXMARQUEAP" name="PXMARQUEAP" type="text" placeholder="Marque et type de l'appreil" class="form-control input-md">
  <b style="color: red">(à compléter si offre conjointe regroupant un plan tarifaire et un GSM)</b>
  </div>
</div>
<h3><u>RESIDENTIAL MOBILE VOICE</u></h3>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">avec Mobilus </label>
  <div class="col-md-5">
    <select id="PXRMVMOBILUS" name="PXRMVMOBILUS" class="form-control">
      <option value=""></option>
      <option value="S">S</option>
      <option value="M">M</option>
      <option value="L">L</option>
      <option value="XL Unlimited">XL Unlimited</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">avec Mobilus FullControl</label>
  <div class="col-md-5">
    <select id="PXRMVMOBILUSFC" name="PXRMVMOBILUSFC" class="form-control">
      <option value=""></option>
      <option value="S">S</option>
      <option value="M">M</option>
      <option value="L">L</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Epic</label>
  <div class="col-md-5">
    <select id="PXEPIC" name="PXEPIC" class="form-control">
      <option value=""></option>
      <option value="Epic stories">Epic stories</option>
      <option value="Epic beats">Epic beats</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">DataPhone</label>
  <div class="col-md-5">
    <select id="PXDATAPHONE" name="PXDATAPHONE" class="form-control">
      <option value=""></option>
      <option value="DataPhone (500MB) € 5/mois">DataPhone (500MB) € 5/mois</option>
      <option value="DataPhone (1GB) € 10/mois">DataPhone (1GB) € 10/mois</option>
      <option value="DataPhone (2GB) € 20/mois">DataPhone (2GB) € 20/mois</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Type Mobile</label>
  <div class="col-md-5">
    <select id="PXTYPEMOBILE" name="PXTYPEMOBILE" class="form-control">
      <option value=""></option>
      <option value="Mobile 10">Mobile 10</option>
      <option value="Mobile Coverage Extender">Mobile Coverage Extender</option>
    </select>
  </div>
</div>

<h3><u>REMARQUES</u></h3>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Remarques">Remarques</label>
  <div class="col-md-12">                     
    <textarea class="form-control" id="PXREMARQUE" name="PXREMARQUE">Remarques</textarea>
  </div>
</div>
<p>Avec les avantages ...............</p>
<p>Vous me confirmez bien votre inscription ?
<h2 style="color: red">OUI AUDIBLE</h2>
<p>Trés bien Mr/Mme <b><?=$rowcont['lastname'].' '.$rowcont['firstname'] ?></b>, Vous recevrez dans quelques jours un courrier de confirmation reprenant la date du passage de notre technicien, l’activation se fait en général dans les 2 semaines.</p>
<p>En communiquant votre code Easy Switch Proximus se chargera de toutes les démarches administratives relatives à la résiliation de vos abonnements télévision et internet lors du transfert de vos abonnements téléphoniques, autrement vous devez vous-même résilier votre abonnement internet et TV, Cette lettre de résiliation doit être envoyée à votre opérateur actuel dès l’activation de vos services Proximus.</p>
<p>Veuillez noter que dans le cadre de la validation de votre commande, vous recevrez par mail avec nos coordonnées et un bon de commande relatif à votre pack Proximus.</p>
<p>A des fins de preuves, cet appel est enregistré et sera conservé pendant 3 mois. Le contrat est conclu pour une durée indéterminée, par ailleurs vous disposez d’un délai de renonciation de 14 jours, toutefois <b><?=$rowcont['lastname'].' '.$rowcont['firstname'] ?></b>  je suis sûr et certain que seule la qualité de nos services vous retiendra chez nous.</p>
<p>Je vous conseille aussi d’installer l’application My Proximus, cette dernière vous permet de gérer vos abonnements et de garder un œil sur votre consommation en temps réel.</p>
<p>Bienvenue chez Proximus, je suis (annoncer votre nom) et je serai votre conseiller client tout au long de votre contrat chez nous. Je vous remercie pour votre confiance qui sera très bien placée, et au nom de toute l’équipe Proximus je vous souhaite une très bonne journée.</p>
</fieldset>
<?php
 }
?>
<button type="submit" name="sub" class="btn btn-block btn-info">Inscription</button>
</form>
</div>
<div style="height: 100px"></div>
