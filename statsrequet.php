<meta charset="utf-8"> 
 <?php 
  
  
  
  require_once('bdd.php');

  
  $sqla = 'SELECT u.name as Agent,camp.name as Campagne,s.Positive,s.Argued,DATE_FORMAT( o.agent_start, "%d/%m/%y" ) as Date,c.RecordFileName,camp.comment,c.COUVERTURE_1 as Cible,c.COTISATION,c.TYPE_ as Type,c.ClientID,c.ClientID2,DATE_FORMAT(o.agent_start , "%Y%m%d") as DateAppel,DATE_FORMAT(o.agent_start , "%H%i%s") as HeureAppel
FROM outgoing_calls o
LEFT JOIN users u ON o.agent_id = u.id
LEFT JOIN contacts c ON o.contact_id = c.id
LEFT JOIN campaigns_2 camp ON camp.id = c.cid
LEFT JOIN campaigns_status s ON o.status = s.num
WHERE s.text IS NOT NULL 
AND camp.id = s.campaign_id and DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.date("d/m/y").'" and camp.comment in ("Lourmel","ADP","Autre") and s.argued!="0" and c.PREUVE_SONORE_OUT!="REJETEE"' ;
			
	
 
 
 

    $comp ='';
    $rec = '';
   $excel='';
   	
    foreach  ($bdd->query($sqla) as $row) {
      if ($row['Campagne']=='QRC PREV' || $row['Campagne']=='QRC IND') { $comp='QRC';}else{$comp=$row['Campagne'];}

      if ($row['Positive']=="1" and $row['RecordFileName']=="") {$rec = 'KGLFICSON_14940_'.$row['ClientID'].'_'.$row['ClientID2'].'_'.$row['DateAppel'].'_'.$row['HeureAppel'].'.wav';}else { $rec =$row['RecordFileName']; }

 $excel .="<p>INSERT INTO Stats  ([Agent],[Campagne],[Positive],[Argued],[Date],[RecordFileName],[comment],[Cible],[Cotisation],[Type]) VALUES ('". $row['Agent']."','". $comp."','". $row['Positive']."','".	$row['Argued']."','".$row['Date']."','".$rec."','".$row['comment']."','". $row['Cible']."','".$row['COTISATION']."','". $row['Type']."');</p>";

   }
         echo $excel;

  ?>