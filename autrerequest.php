<meta charset="utf-8"> 
 <?php 
  
  
  
  require_once('bdd.php');

  
  $sqla = 'SELECT u.name as Agent,camp.name as Campagne,s.Positive,s.Argued,DATE_FORMAT( o.agent_start, "%d/%m/%y" ) as Date,c.RecordFileName,camp.comment,c.COUVERTURE_1 as Cible,c.COTISATION,note as Type,c.ClientID,c.ClientID2,DATE_FORMAT(o.agent_start , "%Y%m%d") as DateAppel,DATE_FORMAT(o.agent_start , "%H%i%s") as HeureAppel
FROM outgoing_calls o
LEFT JOIN users u ON o.agent_id = u.id
LEFT JOIN contacts c ON o.contact_id = c.id
LEFT JOIN campaigns_2 camp ON camp.id = c.cid
LEFT JOIN campaigns_status s ON o.status = s.num
WHERE s.text IS NOT NULL 
AND camp.id = s.campaign_id and DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.date("d/m/y").'" and camp.comment in ("Autre") and s.argued!="0"' ;
			
	
 
 
 

    $comp ='';
    $rec = '';
   $excel='';
   	
    foreach  ($bdd->query($sqla) as $row) {
      if ($row['Campagne']=='QRC PREV' || $row['Campagne']=='QRC IND') { $comp='QRC';}else{$comp=$row['Campagne'];}

      if ($row['Positive']=="1" and $row['RecordFileName']=="") {$rec = 'KGLFICSON_14940_'.$row['ClientID'].'_'.$row['ClientID2'].'_'.$row['DateAppel'].'_'.$row['HeureAppel'].'.wav';}else { $rec =$row['RecordFileName']; }

 $excel .="<p>INSERT INTO Stats  ([Agent],[Campagne],[Positive],[Argued],[Date],[RecordFileName],[comment],[Cible],[Cotisation],[Type]) VALUES ('". $row['Agent']."','". $comp."','". $row['Positive']."','".	$row['Argued']."','".$row['Date']."','".$rec."','".$row['comment']."','". $row['Cible']."','".$row['COTISATION']."','". $row['Type']."');</p>";

   }
         

          $QueryCamp = "SELECT distinct camp.name as campagne,camp.id as ID FROM outgoing_calls o
                join campaigns_2 camp on o.cid=camp.id
                where DATE_FORMAT(o.agent_start , '%d/%m/%y')='".$dt."' and camp.comment in ('Autre') order by  camp.name";
        $resultCamp = $cnx->query($QueryCamp);
                    while($rowCamp = $resultCamp->fetch_assoc())
                    {
                        $idcamp = $rowCamp['ID'];

                        $QueryAgent = "SELECT distinct u.name as Agent,u.id as ID FROM 
                                    outgoing_calls o join users u on u.id=o.agent_id 
                                    where DATE_FORMAT(o.agent_start , '%d/%m/%y')='".$dt."' and o.cid='".$idcamp."'";
                $resultrec = $cnx->query($QueryAgent);
                    while($rowRec = $resultrec->fetch_assoc())
                    {
            
                    $hourcalc = "SELECT c.REFPROSPECT,u.name as HOTESSE, DATE_FORMAT( o.agent_start, '%d/%m/%y' )  as Dateappel,
                                        DATE_FORMAT( o.agent_start, '%T' )  as HeureAppel,o.call_duration as Duree,c.COUVERTURE_1,c.COUVERTURE_5,c.refappel,s.REFQUALIF,c.RecordFileName,s.text as Description,s.MOTIFREFUS,s.Lib_EI,c.phone_1 as Telephone,s.argued
                                        FROM  `outgoing_calls` o
                                        LEFT JOIN  `users` u ON o.agent_id = u.id
                                        LEFT JOIN  `contacts` c ON o.contact_id = c.id
                                        LEFT JOIN  `campaigns_2` camp ON camp.id = c.cid
                                        LEFT JOIN  `campaigns_status` s ON o.status = s.num
                                        WHERE s.text is not null AND camp.id=s.campaign_id  
                                        AND camp.id='".$idcamp."' and u.id='".$rowRec['ID']."' AND DATE_FORMAT( o.agent_start, '%d/%m/%y' )='".$dt."' order by DATE_FORMAT( o.agent_start, '%T' )";

                                     
            
                                        $reso = $cnx->query($hourcalc); 

                                        $last = 0;
                                        $elev = 0;
                                        $calc = 0;

                                        $rows = array();

                                        while($rowt = $reso->fetch_assoc()) 
                                             {
                                                     $rows[]=$rowt;
                                                     $last ++;
                                             }

                                        $calc = strtotime($rows[$last - 1]['HeureAppel']) - strtotime($rows[0]['HeureAppel']);
                                        $h = floor($calc / 3600);
                                        $m = floor($calc / 60 % 60);
                                        $s = floor($calc % 60);
                                        $calcf = sprintf('%02d:%02d:%02d', $h, $m, $s);

                                        for ($i=0; $i < $last; $i++) { 

                                             $difelev = strtotime($rows[$i + 1]['HeureAppel']) - strtotime($rows[$i]['HeureAppel']);

                                             if ($difelev >= 1200) {

                                                      $elev = $elev + $difelev;
                                                    }
                                        }

                                        $hourselev = floor($elev / 3600);
                                        $minselev = floor($elev / 60 % 60);
                                        $secselev = floor($elev % 60);
                                        $timeFormatelev = sprintf('%02d:%02d:%02d', $hourselev, $minselev, $secselev);



                                        $difact = $calc - $elev;
                                        $hoursfact = floor($difact / 3600);
                                        $minsfact = floor($difact / 60 % 60);
                                        $secsfact = floor($difact % 60);
                                        $timeFormatfact = sprintf('%02d:%02d:%02d', $hoursfact, $minsfact, $secsfact);

                                        $tthcal .=  "<p>INSERT INTO statostable
                                        (nomagent,nomcompany,datetoday,totalhourm)
                                        VALUES ('".$rowRec['Agent']."','".$rowCamp['campagne']."','".$dt."','".str_replace('.',',',sprintf ("%.2f", $difact/60/60))."');</p>";

        }
    }
        echo $tthcal;
        echo $excel;

  ?>