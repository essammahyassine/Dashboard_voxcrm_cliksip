<?php

    $server = 'localhost';
    $utilisateur ='cliksip';
    $password = 'cliksip2018';
    $database = 'voxcrm';

    $cnx = mysqli_connect($server,$utilisateur,$password,$database);
   


    require_once('bdd.php');

    if (isset($_GET['dt'])) {

        $dt = date("d/m/y", strtotime($_GET['dt']));
    }
    else
    {
        $dt = date('d/m/y');
    }

  
      $sqla = 'SELECT c.RefProspect,    c.NumAppel1,    c.NUM_CLIENT,   c.NUM_CLIENT2,  c.CIVILITE, c.lastname as NOM,  c.firstname as PRENOM,  c.ADR_ETAGE,    c.ADR_BATIMENT, c.ADR_RUE,  c.ADR_4,    c.ADR_CP,   c.ADR_COMMUNE,  c.NAIS_EMP, c.AGE_EMP,  c.NAIS_CO_EMP,  c.AGE_CO_EMP,   c.CIVILITE_COT, c.NOM_COT,  c.PRENOM_COT,   c.NUM_PLAN, c.CSP,  c.SITUATION_FAMILIALE,  c.SITUATION_LOCATIVE,   c.TOP_CIBLE,    c.COTISATION,   c.COTISATION_2, c.CAPITAL,  c.PRIME_MOIS,   c.PRIME_MOIS_2, c.PRIME_JOUR,   c.PRIME_JOUR_2, c.COUVERTURE_1, c.COUVERTURE_2, c.COUVERTURE_5, c.DEST, c.Refappel, u.name as HOTESSE,    DATE_FORMAT( o.agent_start,  "%d/%m/%y" ) AS DateAppel,   DATE_FORMAT( o.agent_start,  "%T" ) AS HeureAppel,  s.RefQualif,    s.RefCatg,  c.Newrib,   c.BIC,  c.RecordFileName,   c.PREUVE_SONORE_OUT,    s.Conclusion,   s.MotifRefus,   s.Lib_EI,DATE_FORMAT(o.agent_start , "%Y%m%d") as DTA,DATE_FORMAT(o.agent_start , "%H%i%s") as HA,o.note,c.ENSEIGNE
                    FROM outgoing_calls o
                    LEFT JOIN users u ON o.agent_id = u.id
                    LEFT JOIN contacts c ON o.contact_id = c.id
                    LEFT JOIN campaigns_2 camp ON camp.id = c.cid
                    LEFT JOIN campaigns_status s ON o.status = s.num
                    WHERE s.text IS NOT NULL 
                    AND camp.id = s.campaign_id and camp.comment="ADP" AND camp.active="1" and s.REFQUALIF in(1,110,111) AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"' ;

        $sqladoub = 'SELECT count(c.Refappel) as nb, c.Refappel
          FROM contacts c
          LEFT JOIN campaigns_2 camp ON camp.id = c.cid
          WHERE camp.comment="ADP"
          group by c.Refappel having count(c.Refappel)>1' ;


    // scan deja

          $sqlanot = 'SELECT c.id as ID,c.RefProspect,  c.NUM_CLIENT,   c.NUM_CLIENT2,  c.Refappel, c.phone_1 as Phone, u.name as HOTESSE,    DATE_FORMAT( o.agent_start,  "%d/%m/%y" ) AS DateAppel,   DATE_FORMAT( o.agent_start,  "%T" ) AS HeureAppel,  s.RefQualif,    s.RefCatg,  c.Newrib,   c.BIC,  c.RecordFileName,   c.PREUVE_SONORE_OUT,    s.Conclusion,   s.MotifRefus,   s.Lib_EI,c.COUVERTURE_5,DATE_FORMAT(o.agent_start , "%Y%m%d") as DTA,DATE_FORMAT(o.agent_start , "%H%i%s") as HA,o.note,camp.name as cmp
            FROM outgoing_calls o
            LEFT JOIN users u ON o.agent_id = u.id
            LEFT JOIN contacts c ON o.contact_id = c.id
            LEFT JOIN campaigns_2 camp ON camp.id = c.cid
            LEFT JOIN campaigns_status s ON o.status = s.num
            WHERE s.text IS NOT NULL 
            AND camp.id = s.campaign_id and camp.comment="ADP" AND camp.active="1" and s.REFQUALIF in (1,110,111) and DATE_FORMAT( o.agent_start,  "%d/%m/%y" )!="'.$dt.'"';

    foreach  ($bdd->query($sqlanot) as $row) { $t = $t .''. $row['ID'].','; } ;

            $sqlaget = 'SELECT c.id as ID,c.RefProspect,  c.NUM_CLIENT,   c.NUM_CLIENT2,  c.Refappel, c.phone_1 as Phone, u.name as HOTESSE,    DATE_FORMAT( o.agent_start,  "%d/%m/%y" ) AS DateAppel,   DATE_FORMAT( o.agent_start,  "%T" ) AS HeureAppel,  s.text as statut,c.COUVERTURE_5,DATE_FORMAT(o.agent_start , "%Y%m%d") as DTA,DATE_FORMAT(o.agent_start , "%H%i%s") as HA,o.note,camp.name as cmp
            FROM outgoing_calls o
            LEFT JOIN users u ON o.agent_id = u.id
            LEFT JOIN contacts c ON o.contact_id = c.id
            LEFT JOIN campaigns_2 camp ON camp.id = c.cid
            LEFT JOIN campaigns_status s ON o.status = s.num
            WHERE s.text IS NOT NULL  AND camp.comment="ADP" AND camp.active="1" AND  camp.id = s.campaign_id and s.REFQUALIF in(1,110,111)
            AND DATE_FORMAT( o.agent_start,  "%d/%m/%y" )="'.$dt.'"
            AND o.contact_id in ('.rtrim($t,",").')   order by o.agent_start' ;

            
?>
            <div class="col-xl-6">
                <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Doublons CA</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="HO" style="font-size: 11px">
                              <thead>
                                <tr> 
                                  <td>Campagne</td>   
                                  <td>ID</td>  
                                  <td>Refappel</td>
                                  <td>Tel</td>
                                </tr>
                              </thead>
                              <tbody>
                        <?php                     
                                foreach  ($bdd->query($sqlaget) as $rowca) {
                                    ?>
                                    <tr>
                                       <td><?=$rowca['cmp']?></td>
                                       <td><?=$rowca['ID']?></td>
                                       <td><?=$rowca['Refappel']?></td>
                                       <td><?=$rowca['Phone']?></td>
                                    </tr>

                        <?php
                                    }
                            ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>