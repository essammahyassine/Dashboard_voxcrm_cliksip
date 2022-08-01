
<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    
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

        $dt = date("d/m/y", strtotime($_GET['dt']));
    }
    else
    {
        $dt = date('d/m/y');
    }

    

      

        require_once('bdd.php');

  

?>


        <!-- Left Panel -->

    <?php
     //  require_once('menu.php');
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
                        <h1>Solucia</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Stats</li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>

        <div class="content mt-3">
            <div class="col-sm-12" style="padding: 20px">
                <img src="https://s3-eu-west-1.amazonaws.com/tpd/logos/602bd65f45331c0001d17dda/0x0.png" width="200" height="80">
                <div class="" style="padding-bottom: 20px">
                    <div class="page-title">

                    <form method="get">
                    </br><h5>Date : </h5></br>
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


            <div class="col-sm-12">





            <div class="col-xl-7" style="min-height: 600px;">
                <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Statistiques Outbound ( <?=$dt?> )</strong>
                        </div>
                        <div class="card-body">
                              
                      

                            <table class="table table-striped" id="HO">
                              <thead>
                                <tr>
                                <!--  <th scope="col">Num</th>-->
                                  <th scope="col">Status</th>
                                  <th scope="col">Total</th>
                                
                                </tr>
                              </thead>
                              <tbody>
                               <tr>
<th></th>
<?php/*
                                    
            $resultrec = $cnx->query("SELECT num,text FROM `campaigns_status` WHERE `campaign_id`='30' and text!='' order by id");
            while($r1 = $resultrec->fetch_assoc()) 
                    {    
                                $totalCAG = $bdd->query('SELECT count(*)
                                FROM outgoing_calls o
                                LEFT JOIN users u ON o.agent_id = u.id
                                LEFT JOIN contacts c ON o.contact_id = c.id
                                LEFT JOIN campaigns_2 camp ON camp.id = c.cid
                                LEFT JOIN campaigns_status s ON o.status = s.num
                                WHERE s.text IS NOT NULL 
                                AND camp.id = s.campaign_id and s.num='.$r1['num'].'  and camp.id="30" 
                                ')->fetchColumn();

                            
                            ?>

                          
                                
                                <th><?=$r1['text']?></th>
                                
                           
                              
                            
    <?php }*/
     ?>
</tr>
       <tr>


<!--PAR DATE-->
       <th>
 

                            
                        </th>






<?php

//////////////////////////////
$dz=1;

$dtfin=date("d");
//echo $dtfin;
echo "<br>";


       while($dz<=$dtfin){ 

        //echo $dt;
        
        $dtz= date("$dt/m/y");

        $resultrec = $cnx->query("SELECT num,text FROM `campaigns_status` WHERE `campaign_id`='30' and text!='' order by id");
            while($r1 = $resultrec->fetch_assoc()) 
                    {    
                                $totalCAG = $bdd->query('SELECT count(*)
                                FROM outgoing_calls o
                                LEFT JOIN users u ON o.agent_id = u.id
                                LEFT JOIN contacts c ON o.contact_id = c.id
                                LEFT JOIN campaigns_2 camp ON camp.id = c.cid
                                LEFT JOIN campaigns_status s ON o.status = s.num
                                WHERE s.text IS NOT NULL 
                                AND camp.id = s.campaign_id and s.num='.$r1['num'].'  and camp.id="30" 
                                AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dtz.'"')->fetchColumn();


       
/////////////////////////////


                              

?>
  <th><?=$totalCAG?></th>

 <?php  } $dz++;}
     ?>



</tr>
                               
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>





    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <iframe id="txtArea1" style="display:none"></iframe>
    <button id="btnExport" class="btn btn-success" onclick="fnExcelReport();"> EXPORTER </button>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/lib/chart-js/chartjs.min.js"></script>
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




<!--

    <?php/*
                                    
            $resultrec = $cnx->query($Q1);
            while($r1 = $resultrec->fetch_assoc()) 
                    {    
                                $totalCAG = $bdd->query('SELECT count(*)
                                FROM outgoing_calls o
                                LEFT JOIN users u ON o.agent_id = u.id
                                LEFT JOIN contacts c ON o.contact_id = c.id
                                LEFT JOIN campaigns_2 camp ON camp.id = c.cid
                                LEFT JOIN campaigns_status s ON o.status = s.num
                                WHERE s.text IS NOT NULL 
                                AND camp.id = s.campaign_id and s.num='.$r1['num'].'  and camp.id="30" 
                                AND DATE_FORMAT( o.agent_start, "%d/%m/%y" )="'.$dt.'"')->fetchColumn();

                            
                            ?>
                            <tr>
                             <!-- <td><?=$r1['num']?></td>-->
                              <td><?=$r1['text']?></td>
                              <td><?=$totalCAG?></td>
                            </tr>
    <?php }*/ ?>
-->