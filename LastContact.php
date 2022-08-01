
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
      
      $dato = date("d/m/y", strtotime($_GET['dt']));

    }
    else
    {

      $dato = date('d/m/y');
    }


  $sqla = 'SELECT id as IDO,NUM_CLIENT,Refappel,phone_1
                from contacts  WHERE cid="1" and NUM_PLAN="1810KG" and phone_1!=""';
            
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
                            <li class="active">Last Contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-12" >
            

            <div class="col-xl-12">
                <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Last Contact</strong>
                        </div>
                        <div class="card-body">
                                    <table class="table table-striped" id="HO" style="font-size: 11px">
                                      <thead>
                                        <tr> 
                                        
                                          <td>ID</td>
                                          <td>NUM_CLIENT</td>
                                          <td>Refappel</td>
                                          <td>Phone</td>
                                          <td>Qualification</td>
                                          <td>Last Contact</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                        <?php
               
    			                    $query = mysqli_query($cnx, $sqla);
    			                    while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
                              {

                                    $sqlclt = "SELECT DATE_FORMAT(max(o.call_start), '%d/%m/%y' ) as LastC,max(o.call_start) as LastCC
    									FROM outgoing_calls o
    									LEFT JOIN users u ON o.agent_id = u.id
    									LEFT JOIN contacts c ON o.contact_id = c.id
    									LEFT JOIN campaigns_2 camp ON camp.id = c.cid
    									LEFT JOIN campaigns_status s ON o.status = s.num
   									    WHERE s.text IS NOT NULL 
    								    AND camp.id = s.campaign_id and camp.id='1' and c.NUM_PLAN='1810KG' and s.REFQUALIF not in(1,110,111,0) and o.contact_id='".$row['IDO']."' order by o.call_start desc";

                                    $queryclt = mysqli_query($cnx, $sqlclt);
                                    $rowclt = mysqli_fetch_array($queryclt);


                                    $sqlQL = "SELECT s.text as QL 
                                        FROM outgoing_calls o
                                        LEFT JOIN users u ON o.agent_id = u.id
                                        LEFT JOIN contacts c ON o.contact_id = c.id
                                        LEFT JOIN campaigns_2 camp ON camp.id = c.cid
                                        LEFT JOIN campaigns_status s ON o.status = s.num
                                        WHERE s.text IS NOT NULL 
                                        AND camp.id = s.campaign_id and camp.id='1' and c.NUM_PLAN='1810KG' and s.REFQUALIF not in(1,110,111,0) and o.contact_id='".$row['IDO']."' and o.call_start='".$rowclt['LastCC']."'";

                                    $queryQL = mysqli_query($cnx, $sqlQL);
                                    $rowQL = mysqli_fetch_array($queryQL);

                                    ?>
                                    <tr>
                                       <td><?=$row['IDO']?></td>
                                       <td><?=$row['NUM_CLIENT']?></td>
                                       <td><?=$row['Refappel']?></td> 
                                       <td><?=$row['phone_1']?></td> 
                                       <td><?=$rowQL['QL']?></td> 
                                       <td><?=$rowclt['LastC']?></td>  
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

    <div class="col-sm-12" >
      <iframe id="txtArea1" style="display:none"></iframe>
      <button id="btnExport" onclick="fnExcelReport();" class="btn btn-warning form-group"> Exporter la liste </button>
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
