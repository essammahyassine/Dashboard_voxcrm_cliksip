<?php


$idcont = $_GET['idc'];
$NC1 = $_GET['ClientID'];
$NC2 = $_GET['ClientID2'];
$camp = $_GET['COUVERTURE_5'];
$codecamp = $_GET['COUVERTURE_2'];
$titre = $_GET['CIVILITE'];
$nom = $_GET['lastname'];
$prenom = $_GET['firstname'];
$dtn = $_GET['NAIS_EMP'];
$agemp = $_GET['AGE_EMP'];
$emailemp = $_GET['ADRESSE_EMAIL'];
$titreco = $_GET['CIVILITE_COT'];
$nomco = $_GET['NOM_COT'];
$prenomco = $_GET['PRENOM_COT'];
$dtnco = $_GET['NAIS_CO_EMP'];
$agempco = $_GET['AGE_CO_EMP'];
$typecontrat = $_GET['ctp'];
$cdi = $_GET['cdi'];
$retraite = $_GET['rte'];



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
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
				<p>CIVILITE : <input type='text' value='<?=$titreco?>' id="CIVILITE_COT"  /></p>
				<p>lastname : <input type='text' value='<?=$nomco?>' id="NOM_COT"  /></p>
				<p>firstname : <input type='text' value='<?=$prenomco?>' id="PRENOM_COT"  /></p>
				<p>NAIS_EMP : <input type='text' value='<?=$dtnco?>' id="NAIS_CO_EMP"  /></p>
				<p>AGE_EMP : <input type='text' value='<?=$agempco?>' id="AGE_CO_EMP"  /></p>
				<p>Type Contrat : <input type='text' value='<?=$typecontrat?>' id="typecontrat"  /></p>
				<p>cdi : <input type='text' value='<?=$cdi?>' id="cdi"  /></p>
				<p>retraite : <input type='text' value='<?=$retraite?>' id="retraite"  /></p>
			</td>
		</tr>
	</table>
<?php

if ($camp== "INDEMNI" || $camp == "INDEMNI2" && $typecontrat="EMP") {
   echo '<script>get_emp();</script>';

}

?>
</body>
<footer>
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
		email: "zouhri53@gmail.com",
		data: data
	}),
	success: function(result) {
		console.log(result.timestamp);
		stmpemail = result.timestamp;
		alert("Contrat envoyé avec succés !");
	},
	dataType: "json"
});
return stmpemail;
}

function show_hide()
{
	var camp = $("#cid_COUVERTURE_5").val().toLowerCase();
	if (camp == "indemni" || camp == "indemni2") {
		$("#divcdi").hide();
		$("#divticket_moderateur").hide();
		$("#divlicenciement_demission").hide();
	}
		if (camp =="preventio" || camp =="preventio2") {
			$("#divpension_retraite").hide();
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
</script>
</footer>
</html>
</body>
</html>