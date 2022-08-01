
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
        $bdd = new PDO('mysql:host=localhost;dbname=voxcrm;charset=utf8', 'cliksip', 'cliksip2018');

        include('menu.php');
        $totalnp = '2207KG';
        $jrp = 35;

        $ttfcofidis=0;
        $ttccofidis=0;
        $ttrescofidis=0;


    ?>


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
                            <li class="active">Situation par Cibles ADP</li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>


        <div class="content mt-3">

            <div class="card" >
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Situation par Cibles ADP (<?=$totalnp?>)</strong>
                    </div>
                <div class="card-body">
                <div class="col-md-7">
                    <table class="table table-striped" id="HO">
                        <thead>
                            <tr>
                                <th scope="col">Campagne</th>
                                <th scope="col">C+</th>
                                <th scope="col">Fiche injecté</th>
                                <th scope="col">Jour Prod</th>
                                <th scope="col">C+/Jr</th>
                                <th scope="col">Reste à faire</th>
                            </tr>
                        </thead>
                              <tbody>


                <?php
                        

                        $QueryCamp = "SELECT distinct c.COUVERTURE_1  as ID,camp.name as campagne,camp.id as CAMPID FROM 
                                    contacts c join campaigns_2 camp on c.cid=camp.id
                                    where camp.name not like 'QRC%' and camp.comment='ADP' and c.NUM_PLAN='".$totalnp."' order by camp.name";

                        $totalJ = $bdd->query('select count(distinct DATE_FORMAT( o.agent_start, "%d/%m/%y" )) FROM outgoing_calls o
                                        LEFT JOIN contacts c ON o.contact_id = c.id
                                        WHERE o.status="1" and c.NUM_PLAN="'.$totalnp.'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )!="02/10/16"')->fetchColumn();

                        $resultCamp = $cnx->query($QueryCamp);
                                    while($rowCamp = $resultCamp->fetch_assoc())
                                    {

                                        if ($rowCamp['ID']=='01') {$O='583';}
                                        if ($rowCamp['ID']=='15') {$O='115';}
                                        //if ($rowCamp['ID']=='21') {$O='77';}
                                        if ($rowCamp['ID']=='23') {$O='193';}
                                        if ($rowCamp['ID']=='28') {$O='191';}
                                        //if ($rowCamp['ID']=='20') {$O='105';}
                                        if ($rowCamp['ID']=='02') {$O='1105';}
                                        if ($rowCamp['ID']=='13') {$O='85';}
                                        if ($rowCamp['ID']=='17') {$O='584';}
                                        if ($rowCamp['ID']=='24') {$O='326';}
                                        if ($rowCamp['ID']=='16') {$O='175';}
                                        
                                        
                                    


                                        $totalC = $bdd->query('SELECT count(c.id)
                                        FROM outgoing_calls o
                                        LEFT JOIN contacts c ON o.contact_id = c.id
                                        WHERE o.status="1" and c.NUM_PLAN="'.$totalnp.'" and c.COUVERTURE_1="'.$rowCamp['ID'].'" AND o.cid="'.$rowCamp['CAMPID'].'" AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )!="02/10/16"')->fetchColumn();


                                        if ($rowCamp['campagne']=='Preventio') {
                                        	$totalCD = $bdd->query('SELECT count(c.id)
	                                        FROM outgoing_calls o
	                                        LEFT JOIN contacts c ON o.contact_id = c.id
	                                        WHERE o.status="1" and c.NUM_PLAN="'.$totalnp.'" and c.FormuleADP="D" and c.COUVERTURE_1="'.$rowCamp['ID'].'" AND o.cid="'.$rowCamp['CAMPID'].'"  AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )!="02/10/16"')->fetchColumn();
                                        }
                                        

                                        $totalF = $bdd->query('SELECT count(*)
                                        FROM contacts 
                                        WHERE  NUM_PLAN="'.$totalnp.'" and cid="'.$rowCamp['CAMPID'].'" and COUVERTURE_1="'.$rowCamp['ID'].'"')->fetchColumn();

                                        $ttfcofidis = $ttfcofidis + $totalF;
                                        $ttccofidis = $ttccofidis + $totalC;
                                        $ttrescofidis = $ttrescofidis + ($O-$totalC);

                                        
                ?>
                                <tr>
                                    <td><?=$rowCamp['campagne'].' ('.$rowCamp['ID'].')'?></td>
                                    <td>
                                    <?php
	                                    if ($rowCamp['campagne']=='Preventio')  {
	                                    	echo $totalC ." <b style='color:blue'>( DUO : ".$totalCD." )</b>";
	                                    }
	                                	else{
	                                		echo $totalC;
	                                	}
	                                ?></td>
                                    <td><?=$totalF?></td>
                                    <td><?=$jrp-$totalJ?></td>
                                    <td><?=round(($O-$totalC)/($jrp-$totalJ),1)?></td>
                                    <td><?=$O-$totalC?></td>
                               </tr>
                <?php
                       
                            }

                ?>
                <tr>
                    <td><b style="color:blue">Total (sans QRC)</b></td>
                    <td><b style="color:blue"><?=$ttccofidis?></b></td>
                    <td><b style="color:blue"><?=$ttfcofidis?></b></td>
                    <td><b style="color:blue"><?=$jrp-$totalJ?></b></td>
                    <td><b style="color:blue"><?=round($ttrescofidis/($jrp-$totalJ),1)?></b></td>
                    <td><b style="color:blue"><?=$ttrescofidis?></b></td>
                </tr>
        </tbody>
    </table>
    </div>
    <div class="col-md-5">
    	<img src="Objectifo.png" class="img-responsive">
    </div>

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

</body>
</html>
