<?php $session_data = $this->session->userdata('logged_in'); 
$userName=$session_data['username'];
?>
<font style="font-size:50px;color:#267FBB; font-family:Comic Sans MS;">WelCome <?php echo $userName;?>! </font>