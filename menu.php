<?php
session_start();
if ($_SESSION['LOGIN']!="OKEYGO") {
    header("location:login.php");
}
?> 
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                       
                
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Accueil</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="https://192.168.1.4/DashKGL/detailajax.php">ADP & Lourmel</a></li>
                            <li><i class="fa fa-table"></i><a href="https://192.168.1.4/DashKGL/LI2.php">Autre Campagnes</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                        <ul class="sub-menu children dropdown-menu">
                        <?php
                             
                            $query = "Select * from campaigns_2 order by name desc";                
                            $result = $cnx->query($query);
                            while($row = $result->fetch_assoc()) 
                            {    
                        ?>

                        <li>
                            <i class="menu-icon fa fa-laptop"></i><a href="https://192.168.1.4/DashKGL/Dashboard.php?id=<?=$row['id']?>"> 
                            </i><?=$row['name']?></a>
                        </li>

                        <?php
                            }

                        ?>
                
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Stats Matinée</a>
                        <ul class="sub-menu children dropdown-menu">
                        <?php
                             
                            $query = "Select * from campaigns_2";                
                            $result = $cnx->query($query);
                            while($row = $result->fetch_assoc()) 
                            {    
                        ?>

                        <li>
                            <i class="menu-icon fa fa-laptop"></i><a href="https://192.168.1.4/DashKGL/MA.php?id=<?=$row['id']?>"> 
                            </i><?=$row['name']?></a>
                        </li>

                        <?php
                            }

                        ?>
                
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Stats Aprés Midi</a>
                        <ul class="sub-menu children dropdown-menu">
                        <?php
                             
                            $query = "Select * from campaigns_2";                
                            $result = $cnx->query($query);
                            while($row = $result->fetch_assoc()) 
                            {    
                        ?>

                        <li>
                            <i class="menu-icon fa fa-laptop"></i><a href="https://192.168.1.4/DashKGL/AP.php?id=<?=$row['id']?>"> 
                            </i><?=$row['name']?></a>
                        </li>

                        <?php
                            }

                        ?>
                
                        </ul>
                    </li>

                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Qualité</a>
                        <ul class="sub-menu children dropdown-menu">
                        <?php
                             
                            $query = "Select * from campaigns_2";                
                            $result = $cnx->query($query);
                            while($row = $result->fetch_assoc()) 
                            {    
                        ?>
                            <li><i class="fa fa-table"></i><a href="https://192.168.1.4/DashKGL/?id=<?=$row['id']?>"><?=$row['name']?></a></li>
                        <?php
                            }

                        ?>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Contrat</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="EnvoiContrat.php">Liste des Conntrats</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Détécteur des fx status</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="SCANRAPPELADP.php?id=1">ADP</a></li>
                            <li><i class="fa fa-table"></i><a href="DetectLourmel.php">Lourmel</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="ModifSQL.php"  > <i class="menu-icon fa fa-laptop"></i>OutGoingCall SQL Update</a>                     
                     </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Scanner</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="SCANEXADP.php">Extraction ADP</a></li>
                            <li><i class="fa fa-table"></i><a href="ExtraADP.php">Doublon ADP</a></li>
                            <li><i class="fa fa-table"></i><a href="ExtraLourmel.php">Lourmel</a></li>
                            <li><i class="fa fa-table"></i><a href="DBCA.php">CA Deja contacté</a></li>
                            <li><i class="fa fa-table"></i><a href="toto.php">Fiches non qualifié</a></li>
                        </ul>
                    </li>
                      <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Ext des heures</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="#">ADP Matinée</a></li>
                            <li><i class="fa fa-table"></i><a href="#">ADP Aprés Midi</a></li>
                            <li><i class="fa fa-table"></i><a href="#">Lourmel Matinée</a></li>
                            <li><i class="fa fa-table"></i><a href="#">Lourmel Aprés Midi</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Extractions</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="https://192.168.1.4/kglink/adpmoin14.php">ADP Matinée</a></li>
                            <li><i class="fa fa-table"></i><a href="https://192.168.1.4/kglink/adpplus14.php">ADP Aprés Midi</a></li>
                            <li style="color:white">--------------------------</li>
                            <li><i class="fa fa-table"></i><a href="https://192.168.1.4/kglink/lourmelmoin14.php">Lourmel Matinée</a></li>
                            <li><i class="fa fa-table"></i><a href="https://192.168.1.4/kglink/lourmelplus14.php">Lourmel Aprés Midi</a></li>
                            <li style="color:white">--------------------------</li>
                            <li><i class="fa fa-table"></i><a href="https://192.168.1.4/kglink/miemoin14.php">Mie Matinée</a></li>
                            <li><i class="fa fa-table"></i><a href="https://192.168.1.4/kglink/mieplus14.php">Mie Aprés Midi</a></li>
                            <li style="color:white">--------------------------</li>
                            <li><i class="fa fa-table"></i><a href="https://192.168.1.4/kglink/cofidis.php">Extraction ADP</a></li>
                            <li><i class="fa fa-table"></i><a href="https://192.168.1.4/kglink/lourmel.php">Extraction Lourmel</a></li>
                            <li style="color:white">--------------------------</li>
                            <li><i class="fa fa-table"></i><a href="https://192.168.1.4/kglink/heurs.php">Heur</a></li>
                            <li><i class="fa fa-table"></i><a href="https://192.168.1.4/kglink/statsc.php">Stats</a></li>
                            <li><i class="fa fa-table"></i><a href="statsrequet.php">Stats requete Adp</a></li>
                            <li><i class="fa fa-table"></i><a href="hoursrequete.php">Heur requete Adp</a></li>
                            <li style="color:white">--------------------------</li>
                            <li><i class="fa fa-table"></i><a href="statautres.php">Stats requete Autre</a></li>
                            <li><i class="fa fa-table"></i><a href="heurautres.php">Heur requete Autre</a></li> 


                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Situation</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="situationADP.php">Par Campagne</a></li>
<!--                             <li><i class="fa fa-table"></i><a href="#">Lourmel</a></li> -->
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Qualité</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="QALVIPSCAN.php">VIP</a></li>
                            <li><i class="fa fa-table"></i><a href="QALSCAN.php">OR & upssel</a></li>
<!--                             <li><i class="fa fa-table"></i><a href="#">Lourmel</a></li> -->
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="SituationCibles.php"  > <i class="menu-icon fa fa-laptop"></i>Situation Par Cibles (ADP)</a>                     
                     </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Autres Stats</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="https://192.168.1.4/DashKGL/bazilestats.php">Bazile Telecom</a></li>
                            <li><i class="fa fa-table"></i><a href="http://192.168.1.11:82/dashTDE/">Total Direct Energie (TDE)</a></li>-->
                             <li><i class="fa fa-table"></i><a href="http://192.168.1.4/DashKGL/statslampiris.php"> Lampiris</a></li>
                             <li><i class="fa fa-table"></i><a href="statssolucia.php"> Solucia</a></li>
                        </ul>
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="rechercher.php"  > <i class="menu-icon fa fa-laptop"></i>Rechercher</a>                     
                     </li>
                      <li class="menu-item-has-children dropdown">
                        <a href="1315.php"  > <i class="menu-icon fa fa-laptop"></i>QRC</a>                     
                     </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="statslampiris.php"  > <i class="menu-icon fa fa-laptop"></i>Lampiris</a>                     
                     </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>