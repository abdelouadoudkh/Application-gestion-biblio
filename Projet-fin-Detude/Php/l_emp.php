<?php 
     session_start();
    if (!isset($_SESSION["username"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    $page = 'emp';
    include 'inc/header.php';
    include 'inc/connection.php';
 ?>
	<!--dashboard area-->
	<div class="dashboard-content">
		<div class="dashboard-header">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span></span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>Paneau</a>
							<span class="disabled">Livre Empruntées</span>
						</div>
					</div>
				</div>				
			</div>	
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dbooks">
                            <table id="dtBasicExample" class="table table-striped table-dark text-center" width="650" style="margin-left:130px;">
                           <thead>
                                <tr>
                                <th>Couverture</th>
                                    <th>Nom-Livre</th>
                                    <th>L'auteur</th>
                                    
                                    <th>date_retour</th>
                                   
                                    <th>Categorie</th>
                                    <th>J-Restants</th>
                                </tr>
                           </thead>
                            
                            <tbody>
                             <?php
                                $res = mysqli_query($link, "select * from livre_emp where name='$_SESSION[username]'");
                               
                                    while ($row = mysqli_fetch_array($res)) {
                                    echo "<tr>";
                                    echo "<td>"; ?><img src="<?php echo $row["image"]; ?> " height="100" width="100" alt=""> <?php echo "</td>";
                                    echo "<td>";
                                    echo $row["booksname"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["auteur"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["booksreturndate"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["categorie"];
                                    echo "</td>";
                                     echo "<td>";
                                     $r = mysqli_query($link, "select status from lib_registration where name='$_SESSION[username]");
                                    $days=(int)$row["booksreturndate"]-(int)$br=date("d",time());
                                    if($days<=3)
                                    {
                                    echo "&nbsp"."<p style=\"color:#da290a;\">".$days."</p>"."&nbsp";
                                    }
                                    if($days>3 && $days<=5)
                                    {
                                     echo "&nbsp"."<p style=\"color:#ffa200;\">".$days."</p>"."&nbsp";
                                    }
                                    if($days>5)
                                    {
                                      echo "&nbsp"."<p style=\"color:#12cf21;\">".$days."</p>"."&nbsp";
                                    }
                                    
                                    ?><a href="delete-book.php?id=<?php echo $row["id"]; ?> "><i class="fas fa-trash"></i></a><?php
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                
                                
                                 ?>
                                 </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>				
		</div>
	</div>
	<?php 
		include 'inc/footer.php';
	 ?>
     <script>
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>