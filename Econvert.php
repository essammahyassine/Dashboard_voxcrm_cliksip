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
    <style type="text/css">
        td{
            width: 50%;
        }
    </style>
</head>
<body>
<?php

    $server = 'localhost';
    $utilisateur ='cliksip';
    $password = 'cliksip2018';
    $database = 'voxcrm';

    $cnx = mysqli_connect($server,$utilisateur,$password,$database);
    mysqli_set_charset($cnx,"utf8");

	      if (isset($_POST['modifier'])) {

            $c = $_POST['idcont'];
            $CIVILITE = $_POST['CIVILITE'];
			
					 $NOM = $_POST['NOM'];
					  $PRENOM = $_POST['PRENOM'];
					   $NAIS_EMP = $_POST['NAIS_EMP'];
						$AGE_EMP = $_POST['AGE_EMP'];
						 $ADR_ETAGE = $_POST['ADR_ETAGE'];
						  $ADR_BATIMENT = $_POST['ADR_BATIMENT'];
						   $ADR_RUE = $_POST['ADR_RUE'];
							$ADR_4 = $_POST['ADR_4'];
							 $ADR_CP = $_POST['ADR_CP'];
							 $ADR_COMMUNE = $_POST['ADR_COMMUNE'];

            $queryexec = "UPDATE `contacts` SET `CIVILITE`='".$CIVILITE."',`ADR_COMMUNE`='".$ADR_COMMUNE."',`ADR_CP`='".$ADR_CP."',`ADR_4`='".$ADR_4."',`ADR_RUE`='".$ADR_RUE."',`ADR_BATIMENT`='".$ADR_BATIMENT."',`ADR_ETAGE`='".$ADR_ETAGE."',`AGE_EMP`='".$AGE_EMP."',`NAIS_EMP`='".$NAIS_EMP."',`firstname`='".$PRENOM."',`lastname`='".$NOM."' where id='".$c."'";
            $cnx->query($queryexec);

         



        }
    if (isset($_POST['save'])) {

            

            $c = $_POST['idcont'];
            $r = $_POST['namerecord'];

            $queryexec = "UPDATE `contacts` SET `RecordFileName`='".$r."' where id='".$c."'";
            $cnx->query($queryexec);

            $alert = '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Success</span>
                            Enregistrement valid?? avec succ??s.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">??</span>
                        </button>
                      </div>';
            $ok = 'ok';
                  }

    
   
        
        $idcont = $_GET['idcont'];

        $queryrec = "SELECT c.lastname as NOM,  c.firstname as PRENOM, u.name as HOTESSE,    DATE_FORMAT( o.agent_start,  '%Y%m%d' ) AS DateAppel,   DATE_FORMAT( o.agent_start,  '%H%i%s' ) AS HeureAppel,o.note,c.phone_1 as TEL,c.entreprise,c.address,c.email,c.custom_5,c.custom_6,c.categorie
            FROM outgoing_calls o
            LEFT JOIN users u ON o.agent_id = u.id
            LEFT JOIN contacts c ON o.contact_id = c.id
            LEFT JOIN campaigns_2 camp ON camp.id = c.cid
            LEFT JOIN campaigns_status s ON o.status = s.num
            WHERE s.text IS NOT NULL 
            AND camp.id = s.campaign_id and s.positive=1  and c.id='".$idcont."'";
        

   

?>


        <!-- Left Panel -->

<?php
       require_once('menu.php');
    ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
  <header id="header" class="header" style="position: fixed;">
        <?php include 'Call_Option.php'; ?>
             
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Qualit??</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right">
                    <div class="page-title">
                        <h1>Envirovert</h1>
                    </div>
                </div>
            </div>
                    <?php
                                            
                            $resultcont = $cnx->query($queryrec);
                            while($rowcont = $resultcont->fetch_assoc()) 
                            {    
                                $rec = str_replace(".mp3",".wav",$rowcont['Link']);
                                $recname = 'KGLFICSON_14940_'.$rowcont['NUM_CLIENT'].'_'.$rowcont['NUM_CLIENT2'].'_'.$rowcont['DateAppel'].'_'.$rowcont['HeureAppel'].'.wav';
                    ?>

            <div class="col-sm-12 form-group">
                 <?php 
                      
                      if (!empty($alert)) {
                          
                          echo $alert;
                      }

                 ?>
            </div>        


            <div class="col-sm-12 form-group">
            <div class="col-sm-1">
                  <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal">Modifier</button>
            </div>
            
            <div class="col-sm-1">
            <form  method="post">
                <input type="hidden" name="idcont" value="<?=$idcont?>" >
                <input type="hidden" name="namerecord" value="<?=$recname?>">
                <button name="save" type="submit" class="btn btn-success btn-block">Valider</button>
                
                <a href="../record/monitor/voxcrm/<?=$rec?>" id="dn" download="<?=$recname?>"></a>
                
            </form>
             
            </div>

            <div class="col-sm-6">
                <audio controls autoplay controlsList="nodownload" id="myAudio">
                      <source src="../record/monitor/voxcrm/<?=$rec?>" type="audio/wav">
                      <source src="../record/monitor/voxcrm/<?=$rec?>" type="audio/wav">
                </audio>
                <button onclick="setPlaySpeed()" type="button" class="btn btn-success">x2</button>
                <button onclick="normal()" type="button" class="btn btn-success">normal</button>
            </div>
            <div class="col-sm-2">
                 Telephone : <?=$rowcont['TEL']?>
            </div>
            </div>
        </div>


        </header><!-- /header -->
        <!-- Header-->



        <div class="content mt-3" style="padding-top: 220px">

            <div class="">
                    <div style="text-align:center; background-color:#3399CC; padding:5px;color:white"><H1><CENTER><B>Envirovert - Enregistrement</B></CENTER></H1></div>
                            </br>
        
                            <table class="table table-respensive" id="HO">
                                <tr>
                                    <td>
                                        <h3 style="color:#0033CC;margin-left:40px">Informations Rendez-vous :</h3></td>
                                    <td>
                                </tr>
                                <tr>
                                    <td>Information</td><td>D??tail</td>
                                </tr>
                                <tr>
                                    <td>Date aujourd'hui</td><td><?=date('d/m/y')?></td>
                                </tr>
                                <tr>
                                    <td>Nom de l'entreprise</td><td><?=$rowcont['entreprise']?></td>
                                </tr>
                                <tr>
                                    <td>Responsable</td><td><?=$rowcont['NOM'].' '.$rowcont['PRENOM']?></td>  
                                </tr>
                                <tr>
                                    <td>Adresse de l'entreprise</td><td><?=$rowcont['address']?></td>
                                </tr>
                                <tr>
                                    <td>Courriel</td><td><?=$rowcont['email']?></td>
                                </tr>
                                <tr>
                                    <td>T??l??phone</td><td><?=$rowcont['TEL']?></td>
                                </tr>
                                <tr>
                                    <td>Plage horaire de rendez-vous</td><td><?=$rowcont['custom_5'].' '.$rowcont['custom_6']?></td>
                                </tr>
                                <tr>
                                    <td>Domaine d'activit??</td><td><?=$rowcont['categorie']?></td>
                                </tr>
                                <tr>
                                    <td>Nom de l'agent</td><td><?=$rowcont['HOTESSE']?></td>
                                </tr>
                                <tr>
                                    <td>Commentaire de l'agent</td><td><?=$rowcont['note']?></td>
                                </tr>
                                <tr>
                                    <td>Commentaires de Consultation Envirovert</td><td></td>
                                </tr>
                            </table>
                            <div class="col-sm-12" >
                              <iframe id="txtArea1" style="display:none"></iframe>
                              <button id="btnExport" onclick="fnExcelReport();" class="btn btn-warning form-group"> Exporter la fiche </button>
                            </div>

                <!-- lightbox -->
                 <div class="modal  fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <form method="POST" >
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                           <input type="hidden" name="idcont" value="<?=$idcont?>" >
                        <div class="form-group">
                          <label for="usr">civilit??:</label>
                          <input type="" class="form-control" value="<?=$rowcont['CIVILITE']?>" name="CIVILITE">
                        </div>
                        <div class="form-group">
                          <label for="usr">Nom:</label>
                          <input type="text" class="form-control"  value="<?=$rowcont['NOM']?>" name="NOM">
                        </div>
                        <div class="form-group">
                          <label for="usr">Prenom:</label>
                          <input type="text" class="form-control" value="<?=$rowcont['PRENOM']?>" name="PRENOM" >
                        </div>
                        <div class="form-group">
                          <label for="usr">Date naissance:</label>
                          <input type="text" class="form-control" value="<?=$rowcont['NAIS_EMP']?>" name="NAIS_EMP">
                        </div>
                        <div class="form-group">
                          <label for="usr">Age :</label>
                          <input type="text" class="form-control" name="AGE_EMP" value="<?=$rowcont['AGE_EMP']?>" >
                        </div>
                        <div class="form-group">
                          <label for="usr">Adresse etage:</label>
                          <input type="text" class="form-control" name="ADR_ETAGE" value="<?=$rowcont['ADR_ETAGE']?>"  >
                        </div>
                        <div class="form-group">
                          <label for="usr">Adresse rue :</label>
                          <input type="text" class="form-control" name="ADR_RUE" value="<?=$rowcont['ADR_RUE']?>"  >
                        </div>
                        <div class="form-group">
                          <label for="usr">Adresse 4 :</label>
                          <input type="text" class="form-control" name="ADR_4" value="<?=$rowcont['ADR_4']?>">
                        </div>
                        <div class="form-group">
                          <label for="usr">Code postale :</label>
                          <input type="text" class="form-control" name="ADR_CP" value="<?=$rowcont['ADR_CP']?>" >
                        </div>
                        <div class="form-group">
                          <label for="usr">Commune :</label>
                          <input type="text" class="form-control" name="ADR_COMMUNE" value="<?=$rowcont['ADR_COMMUNE']?>"  >
                        </div>
                        </div>
                        
                        <div class="modal-footer">
                         <button type="submit" name="modifier" class="btn btn-success" >Modifer</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                      </div>
                      
                    </div>
                  </div>
                    <?php
                        }
                    ?>
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
    <?php
            if ($ok=='ok') {

            echo '<script>document.getElementById("dn").click();</script>';
            echo '<script>window.location="https://192.168.1.4/DashboradKGL/?id=1";</script>';
 
        }


    ?>
    <script>
    var x = document.getElementById("myAudio");

    function getPlaySpeed() { 
        alert(x.playbackRate);
    } 

    function setPlaySpeed() { 
        x.playbackRate = 2;
    } 
    function normal() { 
        x.playbackRate = 1;
    } 
    </script> 

</body>
</html>
