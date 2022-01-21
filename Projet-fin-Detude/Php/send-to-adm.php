<?php 
    session_start();
    if (!isset($_SESSION["username"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    include 'inc/header.php';
    include 'inc/connection.php';
 ?>
 <style>
	 .col6 SELECT{
    border:none;
    border-bottom: 1px solid rgba(109, 93, 93, 0.4);
    outline: none;
    background: none;
  }

.col6 input[type=text],textarea,select{
    align-items: center;
    display: block;
    width: 300%;
    margin-top: 5px;
    font-size: 16px;
    padding-bottom: 35px;
    border-radius:15px;
    text-align: center;
    font-family: 'Nunito', sans-serif; 
  }
 
  .sendMessage{
	  margin-left:300px;
  }
  .upd{
    display: block;
  width: 230px;
  height: 36px;
  border-radius: 30px;
  color: #fff;
  font-size: 15px;
  cursor: pointer;
  margin-top:5%;
  margin-left:18%;
    background: -webkit-linear-gradient(left,#d40a0a, #ec9f10);
  }
  
 </style>
	<!--dashboard area-->
	<div class="dashboard-content">
		<div class="dashboard-header">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>Paneau</a>
							<span class="disabled">Contacter-nous</span>
						</div>
					</div>
				</div>
				<div class="sendMessage">
					<form action="" method="post" name="form1" class="col6" enctype="multipart/form-data">
					 
                        <table class="table table-bordered table-striped">
						<?php
							date_default_timezone_set("Asia/Dhaka");
							$time= date("Y-m-d h:i:sa");
							if (isset($_POST["submit"])) {
								$title  = $_POST["title"];
								$msg    = $_POST["msg"]; 
                                $to="Gestionnaire";
								if ($title == "" | $msg =="" ) {
									echo "<span style='color: red;'><b>Erreur :</b>les champs vide!!!</span>";
								}else{
									$sql = mysqli_query($link, "insert into message values('','$_SESSION[name]','$to','$_POST[title]','$_POST[msg]','n','$time') ");
									echo "<span !!!style='color: green; margin-bottom: 10px;'><b>Bien :</b>Message est bien envoyé</span>";
									if(!$sql){
										echo "<span style='color: red; margin-bottom: 10px;'><b>Warning !</b>Le messge n'est pas envoyé !!!</span>";	
									}
								}	
							}
						?>
                            <tr>
                                <td>
                                  <input type="text" value="à: gestionnaire" readonly>
	                                    
                                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Objet" name="title">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea name="msg" class="form-control" placeholder="Message ici...."></textarea>
                                </td>
                            </tr>
                            <tr>
                        </table>
                        <input type="submit" name="submit" value="✉Envoyer" class="upd">
                    </form>
				</div>
			</div>					
		</div>
	</div>
	
	<?php 
		include 'inc/footer.php';
	 ?>