<?php

$server = 'localhost';
$utilisateur ='cliksip';
$password = 'cliksip2018';
$database = 'voxcrm';

$cnx = mysqli_connect($server,$utilisateur,$password,$database);

$sqla = 'SELECT c.RefProspect,  c.NumAppel1,  c.NUM_CLIENT, c.NUM_CLIENT2,  c.CIVILITE, c.lastname as NOM,  c.firstname as PRENOM,  c.ADR_ETAGE,  c.ADR_BATIMENT, c.ADR_RUE,  c.ADR_4,  c.ADR_CP, c.ADR_COMMUNE,  c.NAIS_EMP, c.AGE_EMP,  c.NAIS_CO_EMP,  c.AGE_CO_EMP, c.CIVILITE_COT, c.NOM_COT,  c.PRENOM_COT, c.NUM_PLAN, c.CSP,  c.SITUATION_FAMILIALE,  c.SITUATION_LOCATIVE, c.TOP_CIBLE,  c.COTISATION, c.COTISATION_2, c.CAPITAL,  c.PRIME_MOIS, c.PRIME_MOIS_2, c.PRIME_JOUR, c.PRIME_JOUR_2, c.COUVERTURE_1, c.COUVERTURE_2, c.COUVERTURE_5, c.DEST, c.Refappel, u.name as HOTESSE,    DATE_FORMAT( o.agent_start,  "%d/%m/%y" ) AS DateAppel, DATE_FORMAT( o.agent_start,  "%T" ) AS HeureAppel,  s.RefQualif,  s.RefCatg,  c.Newrib, c.BIC,  c.RecordFileName, c.PREUVE_SONORE_OUT,  s.Conclusion, s.MotifRefus, s.Lib_EI
FROM outgoing_calls o
LEFT JOIN users u ON o.agent_id = u.id
LEFT JOIN contacts c ON o.contact_id = c.id
LEFT JOIN campaigns_2 camp ON camp.id = c.cid
LEFT JOIN campaigns_status s ON o.status = s.num
WHERE s.text IS NOT NULL 
AND camp.id = s.campaign_id and camp.comment="ADP" and s.REFQUALIF in(1,110,111) AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.date('d/m/y').'"';

$reso = $cnx->query($sqla);     

while($rowt = $reso->fetch_assoc()) 
    { 
        $data[]=$rowt;
    }

	if(isset($_POST["ExportType"]))
{
	 
    switch($_POST["ExportType"])
    {
        case "export-to-excel" :
            // Submission from
			$filename = $_POST["ExportType"] . ".xls";		 
            header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=\"$filename\"");
			ExportFile($data);
			//$_POST["ExportType"] = '';
            exit();
        default :
            die("Unknown action : ".$_POST["action"]);
            break;
    }
}

function ExportFile($records) {
	$heading = false;
		if(!empty($records))
		  foreach($records as $row) {
			if(!$heading) {
			  // display field/column names as a first row
			  echo implode("\t", array_keys($row)) . "\n";
			  $heading = true;
			}
			echo implode("\t'", array_values($row)) . "\n";
		  }
		exit;
}

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<title></title>

<div><h3>Export Extraction</h1></div>
<div> 
<div id="container" >
<div class="col-sm-6 pull-left">
                  <div class="well well-sm col-sm-12">
                      <b id='project-capacity-count-lable'><?php echo count($data);?></b> records found.
                   <div class="btn-group pull-right">
  <button type="button" class="btn btn-info">Action</button>
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" role="menu" id="export-menu">
    <li id="export-to-excel"><a href="#">Export to excel</a></li>
    <li class="divider"></li>
    <li><a href="#">Other</a></li>
  </ul>
</div>
				
                      </div>
					  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" id="export-form">
						<input type="hidden" value='' id='hidden-type' name='ExportType'/>
					  </form>
                  <table id="" class="table table-striped table-bordered">
                    <tr>
                        <th>Date Appel</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Salary</th>
                  </tr>
                <tbody>
                  <?php foreach($data as $row):?>
				  <tr>
				  <td><?php echo $row ['NUM_CLIENT']?></td>
				  <td><?php echo $row ['NUM_CLIENT2']?></td>
				  <td><?php echo $row ['DateAppel']?></td>
				  <td><?php echo $row ['HeureAppel']?></td>
				  </tr>
				  <?php endforeach; ?>
                </tbody>
              </table>
              </div></div>  

</div>
</body>   
<script  type="text/javascript">
$(document).ready(function() {
jQuery('#export-menu li').bind("click", function() {
var target = $(this).attr('id');
switch(target) {
	case 'export-to-excel' :
	$('#hidden-type').val(target);
	//alert($('#hidden-type').val());
	$('#export-form').submit();
	$('#hidden-type').val('');
	break
}
});
    });
</script>
