
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
<body style="zoom : 80%">
<?php

    $server = 'localhost';
    $utilisateur ='cliksip';
    $password = 'cliksip2018';
    $database = 'voxcrm';

    $cnx = mysqli_connect($server,$utilisateur,$password,$database);
     
    require_once('bdd.php');

    if (isset($_POST['up_hourdate'])) {

           $FIDUP = $_POST['FID']; 
           $CSUP = $_POST['CSS'];
           $ASUP = $_POST['ASS']; 
           $CD = $_POST['CD'];
           $CTIUP = $_POST['CTII'];
           $STUP = $_POST['STT'];


           $uph="UPDATE `outgoing_calls` SET agent_start='".$ASUP."',call_start='".$CSUP."',contact_id='".$CTIUP."',status='".$STUP."',call_duration='".$CD."'  WHERE id='".$FIDUP."'";
            $cnx->query($uph);

    }

    if (isset($_POST['Del_fich'])) {

           $Fi = $_POST['FID']; 

           $DLF="DELETE FROM `outgoing_calls` WHERE id='".$Fi."'";
            $cnx->query($DLF);

    }

 if (!empty($_POST['caller_id'])) {

      $sqla = "SELECT * FROM  `outgoing_calls`
      WHERE caller_id='".$_POST['caller_id']."' or contact_id='".$_POST['caller_id']."'";

      $selectop = "select distinct cs.num,cs.text from campaigns_status cs join outgoing_calls o on o.cid=cs.campaign_id where (o.caller_id='".$_POST['caller_id']."' or o.contact_id='".$_POST['caller_id']."') and cs.text !=''";
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
                            <li class="active">Modif SQL</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-12">
              <div class="modal" id="exampleModalLive" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Modification Date et Heur Appel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="post">
                            <label>Fiche ID</label>
                            <input type="text" class="form-control" name="FID"  id="FID" /> 
                            <label>Call Start</label>
                            <input type="text" class="form-control" name="CSS" id="CSS" /> 
                            <label>Agent Start</label>
                            <input type="text" class="form-control" name="ASS" id="ASS" /> 
                            <label>Durée</label>
                            <input type="text" class="form-control" name="CD" id="CD" />
                            <label>Contact ID</label>
                            <input type="text" class="form-control" name="CTII" id="CTII" /> 
                            <label>Status</label>
                            <select class="form-control" id="STT" name="STT" >
                                <?php
                                    foreach  ($bdd->query($selectop) as $rowselect) {
                                ?>
                                    <option value="<?=$rowselect['num']?>"><?=$rowselect['text']?></option>
                                <?php
                                    }
                                ?>
                            </select>

                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="up_hourdate"  class="btn btn-primary">Modifier</button>
                      	<button type="submit" name="Del_fich"  class="btn btn-danger">Supprimer</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              

            <div class="col-sm-6 col-lg-3">
                <form method="post">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="caller_id" placeholder="Entrer un N° Tel ou un identifiant.. " aria-label="Entrer un N° Tel ou un identifiant.." aria-describedby="basic-addon2" required="">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-info" name="chercher" type="button">Chercher</button>
                      </div>
                    </div>
                </form>
            </div>
            

            <div class="col-xl-12">
            <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
            <script src="assets/js/plugins.js"></script>
            <script src="assets/js/main.js"></script>
                <div class="card" >
                           <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Historiques Appels</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="HO">
                              <thead>
                                <tr> 
                                  <td>id</td>
                                  <td>cid</td>
                                  <td>lid</td>
                                  <td>Caller_id</td>
                                  <td>call_start</td>
                                  <td>agent_start</td>
                                  <td>Durée</td> 
                                  <td>Agent</td> 
                                  <td>Status</td>
                                  <td>Fiche</td> 
                                  <td>update</td>
                                </tr>
                              </thead>
                              <tbody>
                        <?php


                            

                            $t = 0;
                            $po=0;
                            
                            foreach  ($bdd->query($sqla) as $row) {

                                $po++;
                                        
                                    ?>
                                    <tr>
                                      <td><p id="FI<?=$po?>"><?=$row['id']?></p></td>
                                      <td><p id="CI<?=$po?>"><?=$row['cid']?></p></td>
                                      <td><p id="LI<?=$po?>"><?=$row['lid']?></p></td>
                                      <td><p ><?=$row['caller_id']?></p></td>
                                      <td><p id="CS<?=$po?>"><?=$row['call_start']?></p></td>
                                      <td><p id="AS<?=$po?>"><?=$row['agent_start']?></p></td>
                                      <td><p id="CD<?=$po?>"><?=$row['call_duration']?></p></td>
                                      <td><p id="AGID<?=$po?>"><?=$row['agent_id']?></p></td>
                                      <td><p id="ST<?=$po?>"><?=$row['status']?></p></td>
                                      <td><p id="CTI<?=$po?>"><?=$row['contact_id']?></p></td>
                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" id="fichoo<?=$po?>" data-target="#exampleModalLive">Modifier</button></td>
                                    </tr>
                            <script>
                                ( function ( $ ) {
                                  $("#fichoo<?=$po?>").click(function(){

                                    var FI  = $("#FI<?=$po?>").text();
                                    var CI  = $("#CI<?=$po?>").text();
                                    var LI = $("#LI<?=$po?>").text();
                                    var CS = $("#CS<?=$po?>").text();
                                    var AS = $("#AS<?=$po?>").text();
                                    var CD = $("#CD<?=$po?>").text();
                                    var AGID = $("#AGID<?=$po?>").text();
                                    var ST = $("#ST<?=$po?>").text();
                                    var CTI = $("#CTI<?=$po?>").text();

                                    $("#FID").val(FI);
                                    $("#CSS").val(CS);
                                    $("#ASS").val(AS);
                                    $("#CD").val(CD);
                                    $("#CTII").val(CTI);
                                    $("#STT").val(ST);

                                    $('select[name="STT"] option[value="'+ST+"'").attr('selected', 'selected');

                                  
                                    });
                                 } )( jQuery );
                          </script>

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
    <iframe id="txtArea1" style="display:none"></iframe>
    <button id="btnExport" onclick="fnExcelReport();"> EXPORT </button>

    <!-- Right Panel -->




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
