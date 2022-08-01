<?php

    $IDOO = $_GET['OOID'];
    $IDF = $_GET['idcont'];
    $IDCC = $_GET['CCID'];
    $MSG_F = '';
    $AGNO = '';
    
    $GETAGL = "SELECT distinct u.name,u.id as IDUS FROM `users` u join outgoing_calls o on o.agent_id=u.id 
               where o.cid=".$IDCC;
    $EMPTYPH = "UPDATE `contacts` SET phone_1='',RecordFileName='' WHERE id='".$IDF."'";

    $get_voice = "SELECT  monitor_filename FROM outgoing_calls where monitor_filename not in ('NULL','') and id!='".$IDOO."' and DATE_FORMAT(agent_start , '%d/%m/%y')='".date('d/m/y')."' and contact_id=".$IDF;

        $get_QS = "SELECT  * FROM contacts WHERE id=".$IDF;
        
        $RS_Q = $cnx->query($get_QS);
                while($R_QQ = $RS_Q->fetch_assoc()) 
                    {
                        $QRP = '<p>Q1 : '.$R_QQ['Q1'].'    Q2 : '.$R_QQ['Q2'].'    Q3 : '.$R_QQ['Q3'].'     Q4 : '.$R_QQ['Q4'].'     Q5 : '.$R_QQ['Q5'].'</p>';
                    }
    if (isset($_POST['CL_EMAIL_BT'])) {
            $CLEMAILUP = $_POST['CLEMAIL'];
            $SETEMAIL = "UPDATE `contacts` SET `ADRESSE_EMAIL`='".$CLEMAILUP."' WHERE id=".$IDF;
            $cnx->query($SETEMAIL);
            $MSG_F = '<div class="col-md-12" style="padding:20px"><p>Done ! Email changé avec succés.</p></div>';
    }

            
    if (isset($_POST['CT_CT'])) {

            $SETCT_CT = "UPDATE `outgoing_calls` SET status='128'  WHERE id='".$IDOO."'";
            $cnx->query($SETCT_CT);
     

    }
    
    if (isset($_POST['CHUT_CT'])) {

            $SETCHUT_CT = "UPDATE `contacts` SET `PREUVE_SONORE_OUT`='REJETEE'  WHERE id='".$IDF."'";
            $cnx->query($SETCHUT_CT);
            $cnx->query($EMPTYPH);
            

    }
    if (isset($_POST['CT_02'])) {

            $SET_02 ="UPDATE  `contacts` SET 
            `PREUVE_SONORE_OUT`='DOUTEUSE',
            `COMMENTAIRE`='ACC02'
            WHERE `id`='".$IDF."'";
            $cnx->query($SET_02);
            $MSG_F = '<div class="col-md-12" style="padding:20px"><p>Done ! Changement 02 fait avec succés.</p></div>';

    }


  if (isset($_POST['tz'])) {

            $SET_02 ="UPDATE  `contacts` SET 
            `FormuleADP`='D'
            WHERE `id`='".$IDF."'";
            $cnx->query($SET_02);
            $MSG_F = '<div class="col-md-12" style="padding:20px"><p>Done ! Changement DUO fait avec succés.</p></div>';

    }


    if (isset($_POST['R_O'])) {

            $SET_RO ="UPDATE  `contacts` SET 
            `Q4`='O',`Q5`='O'
            WHERE `id`='".$IDF."'";
            $cnx->query($SET_RO);
            $MSG_F = '<div class="col-md-12" style="padding:20px"><p>Retraié Oui,</p></div>';
            $get_QS = "SELECT  * FROM contacts WHERE id=".$IDF;
            $RS_Q = $cnx->query($get_QS);
                while($R_QQ = $RS_Q->fetch_assoc()) 
                    {
                        $QRP = '<p>Q1 : '.$R_QQ['Q1'].'    Q2 : '.$R_QQ['Q2'].'    Q3 : '.$R_QQ['Q3'].'     Q4 : '.$R_QQ['Q4'].'     Q5 : '.$R_QQ['Q5'].'</p>';
                    }

    }
    if (isset($_POST['R_N'])) {

            $SET_RN ="UPDATE  `contacts` SET 
            `Q4`='O',`Q5`='N'
            WHERE `id`='".$IDF."'";
            $cnx->query($SET_RN);
            $MSG_F = '<div class="col-md-12" style="padding:20px"><p>Retraié Non,</p></div>';
            $get_QS = "SELECT  * FROM contacts WHERE id=".$IDF;
            $RS_Q = $cnx->query($get_QS);
                while($R_QQ = $RS_Q->fetch_assoc()) 
                    {
                        $QRP = '<p>Q1 : '.$R_QQ['Q1'].'    Q2 : '.$R_QQ['Q2'].'    Q3 : '.$R_QQ['Q3'].'     Q4 : '.$R_QQ['Q4'].'     Q5 : '.$R_QQ['Q5'].'</p>';
                    }

    }


if (isset($_POST['CDI_O'])) {

            $SET_CDIRO ="UPDATE  `contacts` SET 
            `Q1`='O',`Q2`='N',`Q3`='N'
            WHERE `id`='".$IDF."'";
            $cnx->query($SET_CDIRO);
            $MSG_F = '<div class="col-md-12" style="padding:20px"><p>CDI Oui,</p></div>';
            $get_QS = "SELECT  * FROM contacts WHERE id=".$IDF;
            $RS_Q = $cnx->query($get_QS);
                while($R_QQ = $RS_Q->fetch_assoc()) 
                    {
                        $QRP = '<p>Q1 : '.$R_QQ['Q1'].'    Q2 : '.$R_QQ['Q2'].'    Q3 : '.$R_QQ['Q3'].'     Q4 : '.$R_QQ['Q4'].'     Q5 : '.$R_QQ['Q5'].'</p>';
                    }

    }
    if (isset($_POST['CDI_N'])) {

            $SET_CDIRN ="UPDATE  `contacts` SET 
            `Q1`='N',`Q2`='N',`Q3`='N'
            WHERE `id`='".$IDF."'";
            $cnx->query($SET_CDIRN);
            $MSG_F = '<div class="col-md-12" style="padding:20px"><p>CDI Non,</p></div>';
            $get_QS = "SELECT  * FROM contacts WHERE id=".$IDF;
            $RS_Q = $cnx->query($get_QS);
                while($R_QQ = $RS_Q->fetch_assoc()) 
                    {
                        $QRP = '<p>Q1 : '.$R_QQ['Q1'].'    Q2 : '.$R_QQ['Q2'].'    Q3 : '.$R_QQ['Q3'].'     Q4 : '.$R_QQ['Q4'].'     Q5 : '.$R_QQ['Q5'].'</p>';
                    }

    }



    if (isset($_POST['CT_AG'])) {
            $SIDAGL = $_POST['SELAGIDF'];
            $SETAGID = "UPDATE `outgoing_calls` SET agent_id='".$SIDAGL."' WHERE id='".$IDOO."'";
            $cnx->query($SETAGID);
            $MSG_F = '<div class="col-md-12" style="padding:20px"><p>Done ! Nom Agent changé avec succés.</p></div>';
    }


    

    require_once('bdd.php');
    $AGNO = $bdd->query("SELECT u.name FROM outgoing_calls o JOIN users u  ON o.agent_id = u.id WHERE o.id='".$IDOO."'")->fetchColumn();
    $AGNOID = $bdd->query("SELECT u.id FROM outgoing_calls o JOIN users u  ON o.agent_id = u.id WHERE o.id='".$IDOO."'")->fetchColumn();
    $ALERTADR = $bdd->query("SELECT `custom_30` FROM contacts WHERE id=".$IDF)->fetchColumn();
    $CLEMAIL = $bdd->query("SELECT `ADRESSE_EMAIL` FROM contacts WHERE id=".$IDF)->fetchColumn();

    
    
    
    


?>
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
                    <li class="active">Options</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12" style="padding: 20px;background-color: gainsboro;">
	<form method="post">
        <div class="col-md-2">
          <p class="form-group" style="font-weight: bold;color: black;">Duo :</p>
        <input type="submit" name="tz" class="btn btn-info" value="DUO">
            <p class="form-group" style="font-weight: bold;color: black;">Retraité :</p>
            <input type="submit" name="R_O" class="btn btn-info" value="OUI">
            <input type="submit" name="R_N" class="btn btn-info" value="NON">
            <p>-------------------------</p>
            <p class="form-group" style="font-weight: bold;color: black;">CDI :</p>
            <input type="submit" name="CDI_O" class="btn btn-info" value="OUI">
            <input type="submit" name="CDI_N" class="btn btn-info" value="NON">
        </div>
		<!-- <div class="col-md-2"><h5 class="form-group">Chutte :</h5><input type="submit" name="CT_" class="btn btn-info" value="Chutte"></div> -->
		<div class="col-md-2"><p class="form-group" style="font-weight: bold;color: black;">à refaire :</p><input type="submit" name="CT_CT" class="btn btn-warning" value="à refaire"></div>
        <div class="col-md-2"><p class="form-group" style="font-weight: bold;color: black;">Chutte :</p><input type="submit" name="CHUT_CT" class="btn btn-danger" value="Chutte"></div>
		<div class="col-md-2"><p class="form-group" style="font-weight: bold;color: black;">Changement 02 :</p><input type="submit" name="CT_02" class="btn btn-info" value="Changer"></div>
		<div class="col-md-4">
        <p class="form-group" style="font-weight: bold;color: black;">Agent :</p>
        <div class="col-md-6">
		    <select class="form-control" name="SELAGIDF">
            <option value="<?=$AGNOID?>" selected><?=$AGNO?></option>
            <?php
                $RS_GETAGL = $cnx->query($GETAGL);
                while($R_GETAGL = $RS_GETAGL->fetch_assoc()) 
                    {
            ?>
		    	<option value="<?=$R_GETAGL['IDUS']?>"><?=$R_GETAGL['name']?></option>
            <?php
                    }
            ?>
		    </select>
        </div>
        <div class="col-md-6">
			<input type="submit" name="CT_AG" class="btn btn-info" value="Changer" />
        </div>
		</div>
	</form>
   <script type="text/javascript">
        $(document).ready(function() {
                $('select[name="SELAGIDF"] option[value="<?=$AGNO?>"]').attr('selected', 'selected');
            });
    </script>
    <?=$MSG_F?>
</div>
<div class="col-md-12">
    <?=$QRP?>
</br>
<div class="col-md-6"> <h4>Autres Enregistrements :</h4>
            <?php
                $RS_GETV = $cnx->query($get_voice);
                while($R_GETV = $RS_GETV->fetch_assoc()) 
                    {
                        $recv = str_replace(".mp3",".wav",$R_GETV['monitor_filename']);
            ?>

                <audio controls autoplay controlsList="download">
                      <source src="../record/monitor/voxcrm/<?=$recv?>" type="audio/wav">
                      <source src="../record/monitor/voxcrm/<?=$recv?>" type="audio/wav">
                </audio>
            </br>
            <?php
                    }
            ?></div>
<div class="col-md-6"><h4 style="color:red"><?=$ALERTADR?></h4></div>
<div class="col-md-6">
    <form method="post"><h5>Adresse Email : </h5><input type="text" value="<?=$CLEMAIL?>" class="form-group" style="width:100%" name="CLEMAIL" />
<input type="submit" name="CL_EMAIL_BT" class="btn btn-info" value="Changer" />
</form>
</div>
   
    
</div>

