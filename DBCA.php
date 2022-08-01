
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
                            <li class="active">ADP Extraction</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
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

            <div class="col-sm-12" style="max-width: 1430px;max-height: 800px;overflow: scroll;">
            

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
        </div> <!-- .content -->
    </div><!-- /#right-panel -->



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
</body>
</html>
