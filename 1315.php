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
    $cnx -> set_charset("utf8");  
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

    if (isset($_GET['sto'])) {

        $sto = $_GET['sto'];
        // if ( $sto == 'RR' ) {

        //  $queryrec = "SELECT distinct c.id as idc,o.id as OOID,u.name as Agent,c.MUNA,c.COUVERTURE_1,camp.name as Campagne,s.text as Statut,o.caller_id as Telephone,c.firstname as NOM,c.lastname as PRENOM,c.NUM_CLIENT,c.NUM_CLIENT2,c.ClientID,c.ClientID2,DATE_FORMAT(o.agent_start , '%Y%m%d') as DateAppel,DATE_FORMAT(o.agent_start , '%H%i%s') as HeureAppel,o.monitor_filename as Link,camp.comment as tp, o.call_duration as duree,DATE_FORMAT(o.agent_start , '%H:%i:%s') as temps FROM 
        //              outgoing_calls o
        //             left join campaigns_2 camp on o.cid=camp.id
        //             left join campaigns_status s on o.status=s.num
        //             left join users u on u.id=o.agent_id 
        //             left join contacts c on c.id=o.contact_id
        //             where s.rech='".$sto."' and o.call_duration > 60  and DATE_FORMAT(o.agent_start , '%Y/%m/%d')='".$dt."' and camp.id='".$idcamp."' and camp.id=s.campaign_id order by o.call_duration desc";

        //     require_once('bdd.php');
        //             $totalreste = $bdd->query("SELECT count(*) FROM 
        //              outgoing_calls o
        //             left join campaigns_2 camp on o.cid=camp.id
        //             left join campaigns_status s on o.status=s.num
        //             left join users u on u.id=o.agent_id 
        //             left join contacts c on c.id=o.contact_id
        //             where s.rech='".$sto."' and o.call_duration > 60  and DATE_FORMAT(o.agent_start , '%Y/%m/%d')='".$dt."' and camp.id='".$idcamp."' and camp.id=s.campaign_id")->fetchColumn(); 
        //                 $cmpn = $bdd->query("SELECT name FROM campaigns_2 where id='".$idcamp."'")->fetchColumn();

        // }

  
    // else
    // {
                $queryrec = "SELECT distinct c.id as idc,o.id as OOID,u.name as Agent,c.MUNA,c.COUVERTURE_1,camp.name as Campagne,s.text as Statut,o.caller_id as Telephone,c.firstname as NOM,c.lastname as PRENOM,c.NUM_CLIENT,c.NUM_CLIENT2,c.ClientID,c.ClientID2,DATE_FORMAT(o.agent_start , '%Y%m%d') as DateAppel,DATE_FORMAT(o.agent_start , '%H%i%s') as HeureAppel,o.monitor_filename as Link,camp.comment as tp, o.call_duration as duree,DATE_FORMAT(o.agent_start , '%H:%i:%s') as temps FROM 
                     outgoing_calls o
                    left join campaigns_2 camp on o.cid=camp.id
                    left join campaigns_status s on o.status=s.num
                    left join users u on u.id=o.agent_id 
                    left join contacts c on c.id=o.contact_id
                    where s.text='".$sto."'  and DATE_FORMAT(o.agent_start , '%Y/%m/%d')='".$dt."' and camp.id='".$idcamp."' and camp.id=s.campaign_id order by temps desc";

                require_once('bdd.php');
                    $totalreste = $bdd->query("SELECT count(*) FROM 
                     outgoing_calls o
                    left join campaigns_2 camp on o.cid=camp.id
                    left join campaigns_status s on o.status=s.num
                    left join users u on u.id=o.agent_id 
                    left join contacts c on c.id=o.contact_id
                    where s.text='".$sto."'  and DATE_FORMAT(o.agent_start , '%Y/%m/%d')='".$dt."' and camp.id='".$idcamp."' and camp.id=s.campaign_id")->fetchColumn(); 
                        $cmpn = $bdd->query("SELECT name FROM campaigns_2 where id='".$idcamp."'")->fetchColumn();
    // }

  }

  
                    


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
                           <!-- <li class="active"><?=$cmpn?> > Liste <?=$sto?> + 1 min</li>-->
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
                        <select class="form-control" name="id" >
                            <?php
                                 
                                $queryc = "Select * from campaigns_2 where active='1' and comment='ADP' and campaigns_2.id in(5,34) order by name desc";                
                                $result = $cnx->query($queryc);
                                while($rowc = $result->fetch_assoc()) 
                                {    
                            ?>

                            <option value='<?=$rowc['id']?>'><?=$rowc['name']?></option>
                            <?php
                                }

                            ?>
                        </select>
                        
                    </div>  
                    <div class="col-md-4">
                        <select class="form-control" name="sto" >
                            <option value="Rappel personnel">Rappel personnel</option>
                            <option value="Abandon">Abandon</option>
                            <option value="Refus de répondre">Refus de répondre</option>
                            <option value="Déjà couvert par produit identique">Déjà couvert par produit identique</option>
                            <option value="Trop cher">Trop cher</option>
                            <option value="Refus médical">Refus médical</option>
                              <option value="Chômage">Chômage</option>
                            <option value="Accord">Accord</option>
                        </select>
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
                          <!--  <strong class="card-title">Liste <?=$sto?> + 1 min :  <?php echo $totalreste; ?></strong>-->
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th scope="col">Agent</th>
                                  <th scope="col">Campagne</th>
                                  <th scope="col">Qualification</th>
                                  <th scope="col">Durée</th>
                                  <th scope="col">Temps</th>
                                  <th scope="col">N° Telephone</th>
                                  <th scope="col">Cible</th>
                                  <th scope="col">Ecouter</th>
                                  <th scope="col">download</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                            
                                    $resultrec = $cnx->query($queryrec);
                                    while($rowRec = $resultrec->fetch_assoc()) 
                                    {    
                                ?>
                                    <tr>
                                      <td><?=$rowRec['OOID']?></td>
                                      <td><?=$rowRec['Agent']?></td>
                                      <td><?=$rowRec['Campagne']?></td>
                                      <td><?=$rowRec['Statut']?></td>
                                      <td><?=date("00:i:s",$rowRec['duree'])?></td>
                                      <td><?=$rowRec['DateAppel'].' '.$rowRec['temps']?></td>
                                      <td><?=$rowRec['Telephone']?></td>
                                      <td><?=$rowRec['COUVERTURE_1']?></td>
                                      <td>
                                        <audio controls controlsList="nodownload" id="myAudio">
                                              <source src="../record/monitor/voxcrm/<?=str_replace('mp3','wav',$rowRec['Link'])?>" type="audio/wav">
                                              <source src="../record/monitor/voxcrm/<?=str_replace('mp3','wav',$rowRec['Link'])?>" type="audio/wav">
                                        </audio>
                                      </td>
                                     <td><a href="../record/monitor/voxcrm/<?=str_replace('mp3','wav',$rowRec['Link'])?>" download="<?=$recordn?>" class="btn btn-info" >Telecharger</a></td>
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
        ( function ( $ ) {
            $('select[name="id"] option[value="<?=$idcamp?>"]').attr('selected', 'selected');
            $('select[name="sto"] option[value="<?=$sto?>"]').attr('selected', 'selected');
        } )( jQuery );
    </script>
</body>
</html>
