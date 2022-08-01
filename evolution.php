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

    require_once('bdd.php');
   
        
        $idagent = $_POST['agentlist'];
        

        $agentlist = "SELECT distinct u.name as HOTESSE, u.id as hotesseid
            FROM outgoing_calls o
            LEFT JOIN users u ON o.agent_id = u.id
            LEFT JOIN contacts c ON o.contact_id = c.id
            WHERE c.NUM_PLAN='2207KG' and u.name is not NULL ";

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
                    </div>
                    <form action="" method="post">
                        <select name="agentlist">
                            <?php 

                            $resultrec = $cnx->query($agentlist);
                            while($rowag = $resultrec->fetch_assoc()) 
                                {
                            ?>
                                <option value="<?=$rowag['hotesseid']?>"><?=$rowag['HOTESSE']?></option>
                            <?php
                                }
                            ?>
                            
                        </select>
                        <input type="submit" name="" value="search"/>
                    </form>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title"></strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th scope="col">Jour</th>
                                  <th scope="col">C+</th>
                                  <th scope="col">CA</th>
                                  <th scope="col">H Prod facturé</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                    $list=array();
                                    $month = 07;
                                    $year = 2022;

                                    for($d=1; $d<=31; $d++)
                                    {
                                        $time=mktime(12, 0, 0, $month, $d, $year);    

                                        if (substr(date('D', $time),0,3)=='Sun') {

                                            $list[$d]="Day Off";

                                          }  
                                        else{

                                            $list[$d]=date('d/m/y', $time);

                                            $c = $bdd->query("SELECT count(status) 
                                            FROM outgoing_calls
                                            where status='1' and agent_id='".$idagent."' and DATE_FORMAT(agent_start , '%d/%m/%y')='".$list[$d]."'")->fetchColumn();


                                            
                                        }
                                    
                                ?> 
                                    <tr > 
                                    <td><?=$list[$d]?></td>
                                    <td style="color:green;font-weight: bold;"><?=$c?></td>
                                    <td></td>
                                    <td></td>
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
    

</body>
</html>

