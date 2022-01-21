<?php 
     session_start();
    if (!isset($_SESSION["username"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    $page = 'home';
    include 'inc/header.php';
    include 'inc/connection.php';
 ?>
	<!--dashboard area-->
	<div class="dashboard-content" >
		<div class="dashboard-header">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span>Paneau</span></p>
						</div>
					</div>
					
				</div>
				<div class="row counterup">
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box" style="position:absolute;top:20%;left:35%;">
							<div class="icon">
								<i class="fa fa-users"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                    <?php
                                         
                                         $res = mysqli_query($link,"select * from livre_reser where name='$_SESSION[username]'");
                                         $res2 = mysqli_query($link,"select * from livre_emp where name='$_SESSION[username]'");
                                         $count = mysqli_num_rows($res);
                                         $count2=mysqli_num_rows($res2);
                                        $count3=$count+$count2;
                                        echo $count3;
                                    
                                    ?>
                                    </span></h3>
								<h4><a href="#">Action Total</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box2" style="position:absolute;top:20%;left:55%;">
							<div class="icon">
								<i class="fa fa-rocket"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                    <?php
                                         $res = mysqli_query($link, "select * from livre_reser where name='$_SESSION[username]'");
                                         $count = mysqli_num_rows($res);
                                        echo $count;
                                    ?>
                                    </span></h3>
								<h4><a href="l_reserver.php">Livre Reservés</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control" >
						<div class="box box3" style="position:absolute;top:20%;left:75%;" >
							<div class="icon">
								<i class="fa fa-book"></i>
							</div>
							<div class="text">
								
								<h4><a href="display-books.php">Liste des livres</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box4" style="position:absolute;top:45%;left:75%;" >
							<div class="icon">
								<img src="gp.png" width="35" style="margin-left:15px;margin-bottom:17px;">
							</div>
							<div class="text">
								<h3><span class="counter">
                                    </span></h3>
								<h4><a href="profile.php">Profile</a></h4>
							</div>
						</div>
					</div>
					
					
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box" style="position:absolute;top:45%;left:35%;">
							<div class="icon">
                            
							</div>
							<div class="text">
                                
								<h4 class="mt-20"> &nbsp STATUS</h4>
                                <?php
				$r = mysqli_query($link, "select status from lib_registration where name='$_SESSION[username]'");
                                     $rows = mysqli_fetch_array($r);
                                if($rows["status"]=='A') 
                                   {
                                       echo "&nbsp"."<p style=\"color:#12cf21;-webkit-text-stroke: 1px black;margin-left:6px;\">ACTIVE</p>"."&nbsp";
                                      
                                    //   echo"<a href=\"\"><img src=\"panier.png\" width=\"30\"  style=\"padding: 5px;\"></a>"; 
                                   }
                                else
                                    {
                                       echo "&nbsp"."<p style=\"color:#da290a;-webkit-text-stroke: 1px black;\">SUSPEND</p>"."&nbsp";
                                      
                                    //   echo"<a href=\"\"><img src=\"panier.png\" width=\"30\"  style=\"padding: 5px;\"></a>"; 
                                   }
                                ?>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box2" style="position:absolute;top:45%;left:55%;">
							<div class="icon">
								<i class="fas fa-book"></i>
							</div>
							<div class="text">
                                <h4 class="mt-10">
							<?php
                                         $res = mysqli_query($link, "select * from livre_emp where name='$_SESSION[username]'");
                                         $count = mysqli_num_rows($res);
                                        echo $count;
                                    ?>
                                   <br>
								<a href="l_emp.php">livres Empruntés</a></h4>
							</div>
						</div>
					</div>
				</div>
			</div>					
		</div>
	</div>
	<?php 
		include 'inc/footer.php';
	 ?>