<?php
            //setting header to json
            header('Content-Type: application/json');
            
            $server = 'localhost';
            $utilisateur ='cliksip';
            $password = 'cliksip2018';
            $database = 'voxcrm';
           
            $idcamp = $_GET['id'];
            $dt = $_GET['dt'];

            $cnx = mysqli_connect($server,$utilisateur,$password,$database);

            $sql_stat = 'SELECT HOUR( o.agent_start ) as Heure,count(o.status) as CA
            FROM outgoing_calls o
            LEFT JOIN users u ON o.agent_id = u.id
            LEFT JOIN contacts c ON o.contact_id = c.id
            LEFT JOIN campaigns_2 camp ON camp.id = c.cid
            LEFT JOIN campaigns_status s ON o.status = s.num
            WHERE s.text IS NOT NULL 
            AND camp.id = s.campaign_id and DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'" and s.argued=1 and o.cid="'.$idcamp.'"
            group by HOUR( o.agent_start )';

             

            //execute query
            $result = $cnx->query($sql_stat);

            //loop through the returned data
            $data = array();
            // foreach ($result as $row) {
            //       $data[] = $row;
            // }

            while($r = mysqli_fetch_assoc($result)) {
                      $data[] = $r;
                  }
         
            //free memory associated with result
            $result->close();

            //close connection
            $cnx->close();
          
            echo json_encode($data);
           
?>