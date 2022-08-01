
<!doctype html>
<html > <!--<![endif]-->
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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <style type="text/css">
        p
        {
            color:black;
        }
    </style>
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
    ?>
    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="header-menu">
            </div>
        </header>
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
                            <li class="active">Accueil</li>
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
                        <input type="hidden" name="id" value="<?=$idcamp?>" >
                    </div>  
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success">OK</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
                        <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Détail de production ADP & Lourmel ( <?=$dt?> )</strong>
                        </div>
                        <div class="card-body">
 <div class="col-sm-8">
            <table class="table table-striped" id="HO">
                              <thead>
                                <tr>
                                  <th scope="col">Campagne</th>
                                  <th scope="col">C+</th>
                                  <th scope="col">CA</th>
                                  <th scope="col">Ratio</th>
                                  <th scope="col">CA/H (H)</th>
                                  <th scope="col">Plus</th>
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
        $pi=0;

        $QueryCamp = "SELECT distinct camp.name as campagne,camp.id as ID FROM outgoing_calls o
                join campaigns_2 camp on o.cid=camp.id
                where DATE_FORMAT(o.agent_start , '%d/%m/%y')='".$dt."' and camp.comment in ('ADP') order by  camp.name";

        $resultCamp = $cnx->query($QueryCamp);
                    while($rowCamp = $resultCamp->fetch_assoc())
                    {
                        $idcamp = $rowCamp['ID'];
                        $cmpname= $rowCamp['campagne'];
                        $pi++;
                    
  
        require_once('bdd.php');

        $totalC = $bdd->query('SELECT count(*)
        FROM outgoing_calls o join contacts c on c.id=o.contact_id 
        WHERE o.status="1" and c.PREUVE_SONORE_OUT!="REJETEE" and o.cid="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

        $totalCA = $bdd->query('SELECT count(*)
            FROM outgoing_calls o
            join contacts c on c.id=o.contact_id
            JOIN campaigns_status s ON o.status = s.num
            WHERE o.cid = s.campaign_id and s.argued="1" and c.PREUVE_SONORE_OUT!="REJETEE" and o.cid="'.$idcamp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

        $tthcal = 0;
        $cp = $cp + $totalC;
        $cap = $cap + $totalCA;
        $chh = $chh + number_format($totalCA / $tthcal, 2, '.', '');
        $chhca = $chhca + $tthcal;

?>
        <tr>
            <td><?=$cmpname?></td>
            <td><?=$totalC?></td>
            <td><?=$totalCA?></td>
            <td><p id="rat<?=$pi?>"><img style="height: 20px" src="waiting.jpg"></p></td>
            <td><p id="caph<?=$pi?>" style="width: 20%;float: left"><img style="height: 20px" src="waiting.jpg"></p><p style="width: 50%;float: left" id="tthcamp<?=$pi?>" class="totalhc"><img style="height: 20px" src="waiting.jpg"></p></td>
            <td><a href="Dashboard.php?dt=<?=date("d-m-Y", strtotime($dto))?>&id=<?=$idcamp?>" class="btn btn-warning">Plus</a></td>
       </tr>
       <script type="text/javascript">
        var tthourcamp = 0;
        var ctot = <?=$cp?>;
        var catot = <?=$cap?>;
        function returnwasset(){
        var c = <?=$totalC?>;
        var ca = <?=$totalCA?>;
            $.ajax({
                type: "POST",
                url: "calchourcmp.php?campp=<?=$idcamp?>&dt=<?=$dt?>",
                success: function(data) {
                  $('#tthcamp<?=$pi?>').text('('+data+')');
                  $('#caph<?=$pi?>').text(parseFloat(ca/data).toFixed(2));
                  $('#rat<?=$pi?>').text(parseFloat(c*100/ca).toFixed(2)+" %");
                  tthourcamp += parseFloat(data);
                  $('#tthcamptt').text('('+tthourcamp.toFixed(2)+')');
                  $('#ratt').text(parseFloat(ctot*100/catot).toFixed(2)+" %");
                  $('#caphtt').text(parseFloat(catot/tthourcamp).toFixed(2));

                }
            });
        }
        returnwasset();
    </script>
        <?php
                    }
        ?>
        <tr>
           <td><b>Total : </b></td>
           <td><?=$cp?></td>
           <td><?=$cap?></td>
           <td>
            <p id="ratt"><img style="height: 20px" src="waiting.jpg"></p>
           </td>
           <td><p id="caphtt" style="width: 20%;float: left"><img style="height: 20px" src="waiting.jpg"></p><p style="width: 50%;float: left" id="tthcamptt"><img style="height: 20px" src="waiting.jpg"></p></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="col-sm-4">
    <img src="Objectifo.png" class="img-responsive">
</div>
    </div>
    </div>
    </div>
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
