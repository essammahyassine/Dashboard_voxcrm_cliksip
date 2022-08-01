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
<body style="zoom:80%">
<?php

    $server = 'localhost';
    $utilisateur ='cliksip';
    $password = 'cliksip2018';
    $database = 'voxcrm';

    $cnx = mysqli_connect($server,$utilisateur,$password,$database);
   
        
        $idcamp = $_GET['id'];
        
    if (isset($_GET['dt'])) {

        $dt = date("Y/m/d", strtotime($_GET['dt']));
        $dt2 = date("d/m/y", strtotime($_GET['dt']));
    }
    else
    {
        $dt = date('Y/m/d');
        $dt2 = date("d/m/y");
    }

        $queryrec = "SELECT distinct camp.id as CC,c.id as idc,o.id as OOID,u.name as Agent,c.MUNA,c.COUVERTURE_1,camp.name as Campagne,s.text as Statut,o.caller_id as Telephone,c.firstname as NOM,c.lastname as PRENOM,c.NUM_CLIENT,c.NUM_CLIENT2,c.ClientID,c.ClientID2,DATE_FORMAT(o.agent_start , '%Y%m%d') as DateAppel,DATE_FORMAT(o.agent_start , '%H%i%s') as HeureAppel,o.monitor_filename as Link,camp.comment as tp, o.call_duration as duree,DATE_FORMAT(o.agent_start , '%H:%i:%s') as temps,c.custom_30 as alradr,c.custom_1 as horodate,c.ADRESSE_EMAIL as emailcl,TYPE_ as typea FROM 
                     outgoing_calls o
                    left join campaigns_2 camp on o.cid=camp.id
                    left join campaigns_status s on o.status=s.num
                    left join users u on u.id=o.agent_id 
                    left join contacts c on c.id=o.contact_id
                    where s.positive='1'  and DATE_FORMAT(o.agent_start , '%Y/%m/%d')='".$dt."' and camp.comment='ADP' and camp.id=s.campaign_id order by DATE_FORMAT(o.agent_start , '%H:%i:%s') asc";

 

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
                            <li class="active">Qualité</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-12">
            
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

            <div class="col-xl-12">
                <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Liste des accords a validé :  <?php echo $totalreste; ?></strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th scope="col">horodatage</th>
                                  <th scope="col">Client</th>
                                  <th scope="col">Campagne</th>
                                  <th scope="col">Agent</th>
                                  <th scope="col">Temps</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Type</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                            
                                    $resultrec = $cnx->query($queryrec);
                                    $t=0;
                                    while($rowRec = $resultrec->fetch_assoc()) 
                                    {    
                                        $t++;
                                        $idcamp = $rowRec['CC'];
                                    	if ($rowRec['tp'] == 'ADP') {
                                    		$recordn = 'KGLFICSON_14940_'.$rowRec['ClientID'].'_'.$rowRec['ClientID2'].'_'.$rowRec['DateAppel'].'_'.$rowRec['HeureAppel'].'.wav';
                                    		$rec = str_replace(".mp3",".wav",$rowRec['Link']);
                                    	}
                                        if ($rowRec['tp'] == 'Lourmel') {
                                            $recordn = $rowRec['MUNA'].'_'.$rowRec['NOM'].'_'.$rowRec['PRENOM'].'_'.$rowRec['DateAppel'].'_'.$rowRec['HeureAppel'].'.wav'; 
                                            $rec = str_replace(".mp3",".wav",$rowRec['Link']);
                                        }
                                ?>
                                   <?php if ($rowRec['horodate']=='') { ?> 
                                    <tr style="background-color: red"> 
                                <?php } ?>
                                      <td><?=$rowRec['idc']?></td>
                                      <td><?=$rowRec['horodate']?></td>
                                      <td><?=$rowRec['NOM'].' '.$rowRec['PRENOM']?></td>
                                      <td><?=$rowRec['Campagne']?></td>
                                      <td><?=$rowRec['Agent']?></td>
                                      <td><?=$rowRec['temps']?></td>
                                      <td><?=$rowRec['emailcl']?></td>
                                      <td><?=$rowRec['typea']?></td>
                                      <td><a href="https://192.168.1.4/DashKGL/EnvoiContratDetail.php?idc=<?=$rowRec['idc']?>" target="_blank" class="btn btn-warning">Consulter</a></td>
									</tr>
                                <?php
                                    }

                                ?>
                              </tbody>
                            </table>
                            <h2><?='Total : '.$t?></h2>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>


        </div> <!-- .content -->
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

