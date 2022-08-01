<?php

    header('Content-Type: application/json');

    $server = 'localhost';
    $utilisateur ='cliksip';
    $password = 'cliksip2018';
    $database = 'voxcrm';

    $cnx = mysqli_connect($server,$utilisateur,$password,$database);
   
        
    

            $sql_stat = "SELECT u.name as HOTESSE,DATE_FORMAT( o.agent_start, '%T' )  as HeureAppel,o.call_duration as Duree,
            s.text as Description,c.phone_1 as Telephone,s.argued
            FROM  `outgoing_calls` o
            LEFT JOIN  `users` u ON o.agent_id = u.id
            LEFT JOIN  `contacts` c ON o.contact_id = c.id
            LEFT JOIN  `campaigns_2` camp ON camp.id = c.cid
            LEFT JOIN  `campaigns_status` s ON o.status = s.num
            WHERE s.text is not null AND camp.id=s.campaign_id  
            AND camp.id='1' and u.id='25' AND DATE_FORMAT( o.agent_start, '%d/%m/%y' )='05/04/18' order by DATE_FORMAT( o.agent_start, '%T' )";

            $result = $cnx->query($sql_stat);

            $data = array();

            while($rowRec = $result->fetch_assoc()) 
                {
                        $data[] = $rowRec;

                      }

   
             echo json_encode($data);
            
?>