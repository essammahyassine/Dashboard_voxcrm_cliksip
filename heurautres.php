<?php
        $server = 'localhost';
        $utilisateur ='cliksip';
        $password = 'cliksip2018';
        $database = 'voxcrm';
        $dt = date('d/m/y');


        $cnx = mysqli_connect($server,$utilisateur,$password,$database);

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
?>