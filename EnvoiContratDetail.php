<?php

$server = 'localhost';
$utilisateur ='cliksip';
$password = 'cliksip2018';
$database = 'voxcrm';

$cnx = mysqli_connect($server,$utilisateur,$password,$database);

$idcont = $_GET['idc'];

$getdetailclient = "SELECT * FROM contacts WHERE id=".$idcont;
$resultcont = $cnx->query($getdetailclient);

    while($rowcont = $resultcont->fetch_assoc()) 
        {   
			$NC1 = $rowcont['ClientID'];
			$NC2 = $rowcont['ClientID2'];
			$camp = $rowcont['COUVERTURE_5'];
			$codecamp = $rowcont['COUVERTURE_2'];
			$titre = $rowcont['CIVILITE'];
			$nom = $rowcont['lastname'];
			$prenom = $rowcont['firstname'];
			$dtn = $rowcont['NAIS_EMP'];
			$agemp = $rowcont['AGE_EMP'];
			$emailemp = $rowcont['ADRESSE_EMAIL'];
			$titreco = $rowcont['CIVILITE_COT'];
			$nomco = $rowcont['NOM_COT'];
			$prenomco = $rowcont['PRENOM_COT'];
			$dtnco = $rowcont['NAIS_CO_EMP'];
			$agempco = $rowcont['AGE_CO_EMP'];
		}

?>
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
<body style="zoom:80%">
	<?php
       require_once('menu.php');
    ?>
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
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Qualité</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
	<table class="table">
		<thead>
			<th>Emprunteur</th>
			<th>CO Emprunteur</th>
		</thead>
		<tbody>
		<tr>
			<td>
				<p>id :<input type='text' value='<?=$idcont?>' id="cid_ID" /></p>
				<p>ClientID : <input type='text' value='<?=$NC1?>' id="cid_ClientID"  /></p>
				<p>ClientID2 : <input type='text' value='<?=$NC2?>' id="cid_ClientID2"  /></p>
				<p>COUVERTURE_5 : <input type='text' value='<?=$camp?>' id="cid_COUVERTURE_5"  /></p>
				<p>COUVERTURE_2 : <input type='text' value='<?=$codecamp?>' id="cid_COUVERTURE_2"  /></p>
				<p>CIVILITE : <input type='text' value='<?=$titre?>' id="CIVILITE"  /></p>
				<p>lastname : <input type='text' value='<?=$nom?>' id="lastname"  /></p>
				<p>firstname : <input type='text' value='<?=$prenom?>' id="firstname"  /></p>
				<p>NAIS_EMP : <input type='text' value='<?=$dtn?>' id="NAIS_EMP"  /></p>
				<p>AGE_EMP : <input type='text' value='<?=$agemp?>' id="AGE_EMP"  /></p>
				<p>ADRESSE_EMAIL : <input type='text' value='<?=$emailemp?>' id="ADRESSE_EMAIL"  /></p>
			</td>
			<td>
				<p>CIVILITE : <input type='text' value='<?=$titreco?>' id="CIVILITE_COT"  /></p>
				<p>lastname : <input type='text' value='<?=$nomco?>' id="NOM_COT"  /></p>
				<p>firstname : <input type='text' value='<?=$prenomco?>' id="PRENOM_COT"  /></p>
				<p>NAIS_EMP : <input type='text' value='<?=$dtnco?>' id="NAIS_CO_EMP"  /></p>
				<p>AGE_EMP : <input type='text' value='<?=$agempco?>' id="AGE_CO_EMP"  /></p>
			</td>
		</tr>
		</tbody>
	</table>


<input type='text' id="date_heur_email"  />


<div id='indemni'>

<div id='divcdi' class="form-group">
	<p>CDI : </p>
	<select id='cdi'>
		<option value="true" >OUI</option>
		<option value="false">NON</option>
	</select>
</div>
<div id='divticket_moderateur' class="form-group">
	<p>Exonere du ticket moderateur : </p>
	<select id='ticket_moderateur'>
		<option value="true" >OUI</option>
		<option value="false">NON</option>
	</select>
</div>
<div id='divlicenciement_demission' class="form-group">
	<p>En periode d'essai, licenciement ou demission : </p>
	<select id='licenciement_demission'>
		<option value="true" >OUI</option>
		<option value="false">NON</option>
	</select>
</div>
</div>

<div id='preventio' class="form-group">
	<div id='divpension_retraite'>
		<p>Retraite : </p>
		<select id='pension_retraite'>
			<option value="true" >OUI</option>
			<option value="false">NON</option>
		</select>
	</div>
</div>

<div id='btnbar'>
<a href="javascript:get_emp()" class="btn btn-info" id="btnemp">Empruteur</a>
<a href="javascript:get_co_emp()" class="btn btn-warning" id="btnco">Co Emprunteur</a>
<a href="javascript:get_duo()" class="btn btn-danger" id="btnduo">DUO</a>
</div>
</div>
</div>

<script src="jquery.min.js"></script>

    <script>
function call_api(product,campaign,id_1,id_2,email,data,idfiche)
{
	var stmpemail = "";
	$.ajax({
	type: "post",
	url: "https://barbetorte.tk/api/emailing/",
	contentType: "application/json",
	crossDomain: true,
	headers: {
              "Access-Control-Allow-Origin":"*"
          },
	data: JSON.stringify({
		product: product, 
		campaign: campaign, 
		id_1: id_1, 
		id_2: id_2, 
		email: email,
		data: data
	}),
	success: function(result) {
		console.log(result.timestamp);
		stmpemail = result.timestamp;
		alert("Contrat envoyé avec succés !");
		$.post( "https://192.168.1.4/DashKGL/setstmpemail.php?refappel="+<?=$idcont?>+"&stmpemail="+result.timestamp);
	},
	error: function (jqXHR, exception) {
            getErrorMessage(jqXHR, exception);
        },
	dataType: "json"
});
return stmpemail;
}

function show_hide()
{
	var camp = $("#cid_COUVERTURE_5").val().toLowerCase();
	if (camp == "indemni" || camp == "indemni2") {
		$("#divpension_retraite").hide();
		$("#btnduo").hide();
	}
		if (camp =="preventio" || camp =="preventio2") {
			$("#divcdi").hide();
			$("#divticket_moderateur").hide();
			$("#divlicenciement_demission").hide();
		}
}
show_hide();
function get_emp()
{	
		var idf = $("#cid_ID").val();
		var NC1 = $("#cid_ClientID").val();
		var NC2 = $("#cid_ClientID2").val();
		var camp = $("#cid_COUVERTURE_5").val().toLowerCase();
		var codecamp = $("#cid_COUVERTURE_2").val();
		var titre = $("#CIVILITE").val();
		var nom = $("#lastname").val();
		var prenom = $("#firstname").val();
		var dtn = $("#NAIS_EMP").val();
		var agemp = $("#AGE_EMP").val();
		var emailemp = $("#ADRESSE_EMAIL").val();

		if(titre=="M"){titre="Monsieur"};
		if(titre=="MLE"){titre="Mademoiselle"};
		if(titre=="MME"){titre="Madamne"};

		if(camp == "indemni" || camp == "indemni2")
		{

		var Q1 = $("#cdi").val();
		var Q2 = $("#ticket_moderateur").val();
		var Q3 = $("#licenciement_demission").val();
		
		
		var data_api = {"firstname": prenom,"lastname": nom,"civility": titre,"birthday": dtn,"q1": Q1,"q2": Q2,"q3": Q3,"spouse":false};
		console.log(data_api);
		if(Q1=="NULL" || Q2=="NULL"|| Q3=="NULL")
		{
			alert("Merci de repondre aux questions avant de valider!");}
		else
		{		
		$("#date_heur_email").val(call_api("indemni",codecamp,NC1,NC2,emailemp,data_api,idf));
		alert("Client ID : " + NC1 + "\nClient ID 2 : " + NC2 + "\nCampagne :" + camp + "\nCode Campagne : " + codecamp + "\nCivilité : " + titre + "\nNom : " + nom + "\nPrenom : " + prenom + "\nDate_naissance : " + dtn + "\nAge : " + agemp + "\nEmail : " + emailemp + "\nQ1 : " + Q1 + "\nQ2 : " + Q2 + "\nQ3 :" + Q3 + "\nData : " + data_api );}
		}		
		if(camp =="preventio" || camp =="preventio2")
		{
		var Q4 = "true";
		var Q5 = $("#pension_retraite").val();
		var data_api_prev = {"firstname": prenom,"lastname": nom,"civility": titre,"birthday": dtn,"age":agemp,"q4": Q4,"q5": Q5,"spouse":false,"duo":false};
		if(Q5=="NULL")
		{alert("Merci de repondre aux questions avant de valider!");}
		else
		{
		$("#date_heur_email").val(call_api("preventio",codecamp,NC1,NC2,emailemp,data_api_prev,idf));
		alert("Client ID : " + NC1 + "\nClient ID 2 : " + NC2 + "\nCampagne :" + camp + "\nCode Campagne : " + codecamp + "\nCivilité : " + titre + "\nNom : " + nom + "\nPrenom : " + prenom + "\nDate_naissance : " + dtn + "\nAge : " + agemp + "\nEmail : " + emailemp + "\nQ4 : " + Q4 + "\nQ5 : " + Q5);}
		}
		
}


function get_co_emp()
{	

		var idf = $("#cid_ID").val();
		var NC1 = $("#cid_ClientID").val();
		var NC2 = $("#cid_ClientID2").val();
		var camp = $("#cid_COUVERTURE_5").val().toLowerCase();
		var codecamp = $("#cid_COUVERTURE_2").val();
		var titre = $("#CIVILITE_COT").val();
		var nom = $("#NOM_COT").val();
		var prenom = $("#PRENOM_COT").val();
		var dtn = $("#NAIS_CO_EMP").val();
		var agemp = $("#AGE_CO_EMP").val();
		var emailemp = $("#ADRESSE_EMAIL").val();

		if(titre=="M"){titre="Monsieur"};
		if(titre=="MLE"){titre="Mademoiselle"};
		if(titre=="MME"){titre="Madamne"};

		if(camp == "indemni" || camp == "indemni2")
		{

			var Q1 = $("#cdi").val();
			var Q2 = $("#ticket_moderateur").val();
			var Q3 = $("#licenciement_demission").val();
			
			
			var data_api = {"firstname": prenom,"lastname": nom,"civility": titre,"birthday": dtn,"q1": Q1,"q2": Q2,"q3": Q3,"spouse":true};
			console.log(data_api);
			if(Q1=="NULL" || Q2=="NULL"|| Q3=="NULL")
			{
				alert("Merci de repondre aux questions avant de valider!");}
			else
			{		
				$("#date_heur_email").val(call_api("indemni",codecamp,NC1,NC2,emailemp,data_api,idf));
			}	
		}

		if(camp =="preventio" || camp =="preventio2")
		{
		var Q4 = "true";
		var Q5 = $("#pension_retraite").val();
		var data_api_prev = {"firstname": prenom,"lastname": nom,"civility": titre,"birthday": dtn,"age":agemp,"q4": Q4,"q5": Q5,"spouse":true,"duo":false};
		if(Q5=="NULL")
		{alert("Merci de repondre aux questions avant de valider!");}
		else
		{
			$("#date_heur_email").val(call_api("preventio",codecamp,NC1,NC2,emailemp,data_api_prev,idf));
		}
		}
		
}


function get_duo()
{	
		var idf = $("#cid_ID").val();
		var NC1 = $("#cid_ClientID").val();
		var NC2 = $("#cid_ClientID2").val();
		var camp = $("#cid_COUVERTURE_5").val().toLowerCase();
		var codecamp = $("#cid_COUVERTURE_2").val();
		var titre = $("#CIVILITE").val();
		var nom = $("#lastname").val();
		var prenom = $("#firstname").val();
		var dtn = $("#NAIS_EMP").val();
		var agemp = $("#AGE_EMP").val();
		var emailemp = $("#ADRESSE_EMAIL").val();
		

		if(titre=="M"){titre="Monsieur"};
		if(titre=="MLE"){titre="Mademoiselle"};
		if(titre=="MME"){titre="Madamne"};

		
		if(camp =="preventio" || camp =="preventio2")
		{
		var Q4 = "true";
		var Q5 = $("#pension_retraite").val();

		var data_api_prev_duo = {"firstname": prenom,"lastname": nom,"civility": titre,"birthday": dtn,"age":agemp,"q4": Q4,"q5": Q5,"spouse":false,"duo":true};
		if(Q5=="NULL")
		{alert("Merci de repondre aux questions avant de valider!");}
		else
		{
		$("#date_heur_email").val(call_api("preventio",codecamp,NC1,NC2,emailemp,data_api_prev_duo,idf));
		alert("Client ID : " + NC1 + "\nClient ID 2 : " + NC2 + "\nCampagne :" + camp + "\nCode Campagne : " + codecamp + "\nCivilité : " + titre + "\nNom : " + nom + "\nPrenom : " + prenom + "\nDate_naissance : " + dtn + "\nAge : " + agemp + "\nEmail : " + emailemp + "\nQ4 : " + Q4 + "\nQ5 : " + Q5);}
		}
		
}

function getErrorMessage(jqXHR, exception) {
    var msg = '';
    if (jqXHR.status === 0) {
        msg = 'Not connect.\n Verify Network.';
    } else if (jqXHR.status == 404) {
        msg = 'Requested page not found. [404]';
    } else if (jqXHR.status == 500) {
        msg = 'Internal Server Error [500].';
    } else if (exception === 'parsererror') {
        msg = 'Requested JSON parse failed.';
    } else if (exception === 'timeout') {
        msg = 'Time out error.';
    } else if (exception === 'abort') {
        msg = 'Ajax request aborted.';
    } else {
        msg = 'Uncaught Error.\n' + jqXHR.responseText;
    }
    alert(msg);
}
</script>

</body>
</html>