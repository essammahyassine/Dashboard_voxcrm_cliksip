
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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body style="zoom:85%">
        <!-- Left Panel -->

    <?php
        $server = 'localhost';
    $utilisateur ='cliksip';
    $password = 'cliksip2018';
    $database = 'voxcrm';

    $cnx = mysqli_connect($server,$utilisateur,$password,$database);
       require('menu.php');

       if (isset($_GET['dt'])) {

        $dt = date("d/m/y", strtotime($_GET['dt']));
        $dto = $_GET['dt'];
    }
    else
    {
        $dt = date('d/m/y');
        $dto = date('d-m-Y');
    }
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
                            <li class="active">Situation Campagne</li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>


        <div class="content mt-3">
            <div class="card" >
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Campagne( <?=$dt?> )</strong>
                    </div>
                <div class="card-body">
                    <table class="table table-striped" id="HO">
                              <thead>
                                <tr>
                                  <th scope="col">Campagne</th>
                                  <th scope="col">Total</th>
                                  <th scope="col">C+</th>
                                  <th scope="col">CA</th>
                                  <th scope="col">C-</th>
                                  <th scope="col">Qualifié</th>
                                  <th scope="col">Non qualifié</th>
                                  <th scope="col">TQ (%)</th>
                                </tr>
                              </thead>
                              <tbody>

<?php

   

    
        $cp = 0;
        $cap = 0;
        $cval = 0;
        $cnval = 0;
        $chh = 0;
        $chhca = 0;

        $QueryCamp = "SELECT distinct camp.name as campagne,camp.id as ID FROM 
                      campaigns_2 camp join contacts c on camp.id=c.cid
                    where  camp.comment in ('ADP','Lourmel') and c.NUM_PLAN='2207KG' and camp.active='1'";
        $totalfc = 0;
        $totalcc = 0;
        $totalcac = 0;
        $totalcnc = 0;
        $totalqlc = 0;
        $totalnqlc = 0;


        $resultCamp = $cnx->query($QueryCamp);
                    while($rowCamp = $resultCamp->fetch_assoc())
                    {
                        $idcamp = $rowCamp['ID'];
                        $cmpname= $rowCamp['campagne'];
                    
  
        require_once('bdd.php');

        $total = $bdd->query('SELECT count(id)
        FROM contacts 
        where cid="'.$idcamp.'" and NUM_PLAN="2207KG"')->fetchColumn();

        $totalC = $bdd->query('SELECT count(c.id)
        FROM outgoing_calls o
        JOIN contacts c ON o.contact_id = c.id
        WHERE o.status="1" and c.NUM_PLAN="2207KG" and DATE_FORMAT(o.agent_start , "%d/%m/%y")!="02/10/16" and o.note not in ("CHUTE") and o.cid="'.$idcamp.'"')->fetchColumn();


        $totalCA = $bdd->query('SELECT count(c.id)
        FROM outgoing_calls o
        JOIN contacts c ON o.contact_id = c.id
        JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND o.cid = s.campaign_id and s.argued="1" and c.NUM_PLAN="2207KG" and DATE_FORMAT(o.agent_start , "%d/%m/%y")!="02/10/16" and o.cid="'.$idcamp.'"')->fetchColumn();

        $totalCm = $bdd->query('SELECT count(c.id)
        FROM outgoing_calls o
        JOIN contacts c ON o.contact_id = c.id
        JOIN campaigns_status s ON o.status = s.num
        WHERE s.text IS NOT NULL 
        AND o.cid = s.campaign_id and s.positive="-1" and c.NUM_PLAN="2207KG" and DATE_FORMAT(o.agent_start , "%d/%m/%y")!="02/10/16" and o.cid="'.$idcamp.'"')->fetchColumn();

        $totalfc = $totalfc + $total;
        $totalcc = $totalcc + $totalC;
        $totalcac = $totalcac + $totalCA;
        $totalcnc = $totalcnc + $totalCm;
?>
        <tr>

            <td><?=$cmpname?></td>
            <td><?=$total?></td>
            <td><?=$totalC?></td>
            <td><?=$totalCA?></td>
            <td><?=$totalCm?></td>
            <td><?=$totalCA + $totalCm?></td>
            <td><?=$total-($totalCA + $totalCm)?></td>
            <td><?=number_format((($totalCA + $totalCm)/$total)*100,2,'.','')?></td>
       </tr>
        <?php
                    }
        ?>
        <tr>
        	<td>Total : </td>
        	<td><?=$totalfc?></td>
            <td><?=$totalcc?></td>
            <td><?=$totalcac?></td>
            <td><?=$totalcnc?></td>
            <td><?=$totalcac + $totalcnc?></td>
            <td><?=$totalfc-($totalcac + $totalcnc)?></td>
            <td><?=number_format((($totalcac + $totalcnc)/$totalfc)*100,2,'.','')?></td>
        </tr>
        </tbody>
    </table>

    </div>
    </div>
    </div>

    </br>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
</body>
</html>
