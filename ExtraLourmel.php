
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
<body>
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

  
  $sqla = 'SELECT o.caller_id as TEL,c.NUMPLAN, c.MUNA, c.CIVILITE, c.NOM_NAISSANCE,  c.lastname as NOM,  c.firstname as PRENOM,  c.DATENAISSANCE,  c.AGE,  c.EMAIL,  c.ADRESSE_RUE,  c.ADRESSE_BATIMENT, c.ADRESSE_4,  c.zipcode as CP,  c.city as VILLE , c.REFAPPEL, u.name as HOTESSE,  c.PSEUDO,
  DATE_FORMAT( o.agent_start,  "%d/%m/%y" ) AS DateAppel, DATE_FORMAT( o.agent_start, "%T"  ) AS Heureappel,  c.COMMENTAIRE,  s.REFQUALIF,
  s.CONCLUSION, s.MOTIFREFUS, c.FORMULE,  c.CIV_CONJOINT, c.NOM_NAISSANCECONJOINT,  c.NOMCONJOINT,  c.PRENOMCONJOINT, c.DATENAISSANCECONJOINT,  c.CONSENTEMENT, c.RappelSante,  c.GAMME_SANTE,  c.COTISATION_CS,c.GAROBSEQUES,c.RecordFileName AS PRV_SON,DATE_FORMAT(o.agent_start , "%Y%m%d") as DTA,DATE_FORMAT(o.agent_start , "%H%i%s") as HA,o.note

    FROM outgoing_calls o
    LEFT JOIN users u ON o.agent_id = u.id
    LEFT JOIN contacts c ON o.contact_id = c.id
    LEFT JOIN campaigns_2 camp ON camp.id = c.cid
    LEFT JOIN campaigns_status s ON o.status = s.num
    WHERE s.text IS NOT NULL 
    AND camp.id = s.campaign_id and camp.comment="Lourmel" and s.REFQUALIF in(1,110,111) AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"' ;



    $sqladoub = 'SELECT count(c.REFAPPEL) as nb, c.REFAPPEL, c.id as ID
    FROM contacts c
    LEFT JOIN campaigns_2 camp ON camp.id = c.cid
    WHERE camp.comment="Lourmel"
    group by c.REFAPPEL having count(c.REFAPPEL)>1' ;


    // scan deja

          $sqlanot = 'SELECT c.id as ID
            FROM outgoing_calls o
            LEFT JOIN users u ON o.agent_id = u.id
            LEFT JOIN contacts c ON o.contact_id = c.id
            LEFT JOIN campaigns_2 camp ON camp.id = c.cid
            LEFT JOIN campaigns_status s ON o.status = s.num
            WHERE s.text IS NOT NULL 
            AND camp.id = s.campaign_id and camp.comment="Lourmel" and s.REFQUALIF in(1,110,111) and DATE_FORMAT( o.agent_start,  "%d/%m/%y" )!="'.$dt.'"';

    foreach  ($bdd->query($sqlanot) as $row) { $t = $t .''. $row['ID'].','; } ;

            $sqlaget = 'SELECT c.REFAPPEL,camp.name as cmp,c.id as IDF 
            FROM outgoing_calls o
            LEFT JOIN users u ON o.agent_id = u.id
            LEFT JOIN contacts c ON o.contact_id = c.id
            LEFT JOIN campaigns_2 camp ON camp.id = c.cid
            LEFT JOIN campaigns_status s ON o.status = s.num
            WHERE s.text IS NOT NULL  AND camp.comment="Lourmel" AND camp.id = s.campaign_id and s.REFQUALIF in(1,110,111)
            AND DATE_FORMAT( o.agent_start,  "%d/%m/%y" )="'.$dt.'"
            AND o.contact_id in ('.rtrim($t,",").')   order by o.agent_start' ;

            
?>

        <!-- Left Panel -->

    <?php
       require_once('menu.php');
    ?><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

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
                            <li class="active">Lourmel Extraction</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-12" style="max-width: 1210px;max-height: 800px;overflow: scroll;">
            
            <div class="col-sm-12" style="padding: 20px">
                <div class="" style="padding-bottom: 20px">
                    <div class="page-title">

                    <form method="get">
                        <h5>Date : </h5></br>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="dt">
                        </div>  
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">OK</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Doublons RefAppel</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" style="font-size: 11px">
                              <thead>
                                <tr> 
                                  <td>Count</td>   
                                  <td>Refappel</td>
                                  <td>ID</td>
                                </tr>
                              </thead>
                              <tbody>
                        <?php                     
                                foreach  ($bdd->query($sqladoub) as $rowd) {
                                    ?>
                                    <tr>
                                       <td><?=$rowd['cmp']?></td>
                                       <td><?=$rowd['REFAPPEL']?></td>
                                       <td><?=$rowd['ID']?></td>
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


            <div class="col-xl-6">
                <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Doublons CA</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" style="font-size: 11px">
                              <thead>
                                <tr> 
                                  <td>Count</td>   
                                  <td>Refappel</td>
                                  <td>ID</td>
                                </tr>
                              </thead>
                              <tbody>
                        <?php                     
                                foreach  ($bdd->query($sqlaget) as $rowca) {
                                    ?>
                                    <tr>
                                       <td><?=$rowca['cmp']?></td>
                                       <td><?=$rowca['REFAPPEL']?></td>
                                       <td><?=$rowca['IDF']?></td>
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

            <div class="col-sm-12">
                  <button id="btnExport" onclick="fnExcelReport();" class="btn btn-warning form-group"> Exporter la liste </button>
            </div>

            <div class="col-xl-12">
                <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Statistiques Agents</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="HO" style="font-size: 11px">
                              <thead>
                                <tr> 
                                  <td>Telephone</td>
                                  <td>NUMPLAN</td>
                                  <td>MUNA</td>  
                                  <td>CIVILITE</td> 
                                  <td>NOM_NAISSANCE</td>
                                  <td>NOM</td>
                                  <td>PRENOM</td>
                                  <td>DATENAISSANCE</td>
                                  <td>AGE</td>
                                  <td>EMAIL</td>
                                  <td>ADRESSE_RUE</td>
                                  <td>ADRESSE_BATIMENT</td>
                                  <td>ADRESSE_4</td>
                                  <td>CP</td>
                                  <td>VILLE</td>
                                  <td>REFAPPEL</td>
                                  <td>HOTESSE</td>
                                  <td>PSEUDO</td>
                                  <td>DateAppel</td>
                                  <td>Heureappel</td>
                                  <td>COMMENTAIRE</td>
                                  <td>REFQUALIF</td>
                                  <td>CONCLUSION</td>
                                  <td>MOTIFREFUS</td>
                                  <td>FORMULE</td>
                                  <td>CIV_CONJOINT</td>
                                  <td>NOM_NAISSANCECONJOINT</td>
                                  <td>NOMCONJOINT</td>
                                  <td>PRENOMCONJOINT</td>
                                  <td>DATENAISSANCECONJOINT</td>
                                  <td>CONSENTEMENT</td>
                                  <td>RappelSante</td>
                                  <td>GAMME_SANTE</td>
                                  <td>COTISATION_CS</td>
                                  <td>GAROBSEQUES</td>
                                  <td>PRV_SON</td>
                                </tr>
                              </thead>
                              <tbody>
                        <?php
                                          
                                $erreur = "";
                                foreach  ($bdd->query($sqla) as $row) {

                                  if (strlen($row['CP']) > 5  or  strlen($row['CP']) < 4 ) {

                                    $erreur .= 'MUNA : '.$row['MUNA'].' Erreur : CP</br>';

                                  }
                                  if (strlen($row['DATENAISSANCE']) != 10 ) {

                                    $erreur .= 'MUNA : '.$row['MUNA'].' Erreur : DATENAISSANCE</br>';

                                  }
                                  if (strlen($row['AGE']) != 2 ) {

                                    $erreur .= 'MUNA : '.$row['MUNA'].' Erreur : AGE</br>';

                                  }
                                  if ($row['CIVILITE'] == "" ) {

                                    $erreur .= 'MUNA : '.$row['MUNA'].' Erreur : CIVILITE</br>';

                                  }
                                  if ($row['CIVILITE'] == "M" ) {

                                    $erreur .= 'MUNA : '.$row['MUNA'].' Erreur : CIVILITE</br>';

                                  }
                                  if ($row['CIVILITE'] == "MLE" ) {

                                    $erreur .= 'MUNA : '.$row['MUNA'].' Erreur : CIVILITE</br>';

                                  }
                                  if ($row['NOM']  == "" ) {

                                    $erreur .= 'MUNA : '.$row['MUNA'].' Erreur : NOM</br>';

                                  }
                                  if ($row['PRENOM'] == "" ) {

                                    $erreur .= 'MUNA : '.$row['MUNA'].' Erreur : PRENOM</br>';

                                  }
                                  if ($row['REFAPPEL']  == "" ) {

                                    $erreur .= 'MUNA : '.$row['MUNA'].' Erreur : REFAPPEL</br>';

                                  }
                                  if ($row['REFQUALIF']  != "110" and $row['PRV_SON'] != "") {

                                    $erreur .= 'MUNA : '.$row['PRV_SON'].' Erreur : RecordFileName</br>';

                                  }
                                  if ( $row['REFQUALIF']  == "110" and strpos($row['PRV_SON'], '_'.$row['DTA'].'_'.$row['HA'].'.wav') ==false) {
                                             echo $row['MUNA'].': '.$row['DTA'].'_'.$row['HA'].'.wav</br>';
                                  }
                                  if ( $row['REFQUALIF']  == "110" and  $row['GAROBSEQUES']  == "" ) {
                                             echo $row['MUNA'].': GAROBSEQUES vide !</br>';
                                  }

                                  if ( $row['NUMPLAN']  == "" ) {
                                             echo $row['MUNA'].' : NUM PLAN vide !</br>';
                                  }
                                  if ( $row['MUNA']  == "" ) {
                                             echo $row['MUNA'].' : MUNA vide !</br>';
                                  }
                                

                                    ?>
                                    <tr>
                                    <td><?=$row['TEL']?></td>
                                       <td><?=$row['NUMPLAN']?></td>
                                       <td><?=$row['MUNA']?></td>
                                       <td><?=$row['CIVILITE']?></td> 
                                       <td><?=$row['NOM_NAISSANCE']?></td>
                                       <td><?=$row['NOM']?></td>
                                       <td><?=$row['PRENOM']?></td>
                                       <td><?=$row['DATENAISSANCE']?></td>
                                       <td><?=$row['AGE']?></td>
                                       <td><?=$row['EMAIL']?></td>
                                       <td><?=$row['ADRESSE_RUE']?></td>
                                       <td><?=$row['ADRESSE_BATIMENT']?></td>
                                       <td><?=$row['ADRESSE_4']?></td>
                                       <td><?=$row['CP']?></td>
                                       <td><?=$row['VILLE']?></td>
                                       <td><?=$row['REFAPPEL']?></td>
                                       <td><?=$row['HOTESSE']?></td>
                                       <td><?=$row['PSEUDO']?></td>
                                       <td><?=$row['DateAppel']?></td>
                                       <td><?=$row['Heureappel']?></td>
                                       <td><?=$row['COMMENTAIRE']?></td> 
                                       <td><?=$row['REFQUALIF']?></td>
                                       <td><?=$row['CONCLUSION']?></td>
                                       <td><?=$row['MOTIFREFUS']?></td> 
                                       <td><?=$row['FORMULE']?></td>  
                                       <td><?=$row['CIV_CONJOINT']?></td> 
                                       <td><?=$row['NOM_NAISSANCECONJOINT']?></td>   
                                       <td><?=$row['NOMCONJOINT']?></td>    
                                       <td><?=$row['PRENOMCONJOINT']?></td> 
                                       <td><?=$row['DATENAISSANCECONJOINT']?></td>   
                                       <td><?=$row['CONSENTEMENT']?></td> 
                                       <td><?=$row['RappelSante']?></td>   
                                       <td><?=$row['GAMME_SANTE']?></td>   
                                       <td><?=$row['COTISATION_CS']?></td>   
                                       <td><?=$row['GAROBSEQUES']?></td>   
                                       <td><?=$row['PRV_SON']?></td>   
                                    </tr>

                        <?php
                                 
                                    }
                                    echo $erreur;

                            ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>


        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <iframe id="txtArea1" style="display:none"></iframe>
    <button id="btnExport" onclick="fnExcelReport();"> EXPORT </button>

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>
                <script type="text/javascript">
                function fnExcelReport()
            {
                var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
                var textRange; var j=0;
                tab = document.getElementById('HO'); // id of table

                for(j = 0 ; j < tab.rows.length ; j++) 
                {     
                    tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
                    //tab_text=tab_text+"</tr>";
                }

                tab_text=tab_text+"</table>";
                tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
                tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
                tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

                var ua = window.navigator.userAgent;
                var msie = ua.indexOf("MSIE "); 

                if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
                {
                    txtArea1.document.open("txt/html","replace");
                    txtArea1.document.write(tab_text);
                    txtArea1.document.close();
                    txtArea1.focus(); 
                    sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
                }  
                else                 //other browser not tested on IE 11
                    sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

                return (sa);
            }
            </script>

</body>
</html>
