<?php 
     session_start();
    if (!isset($_SESSION["username"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    $page = 'ibook';
    include 'inc/header.php';
    include 'inc/connection.php';
 ?>
	<!--dashboard area-->
    <style>
        select{
    align-items: center;
    margin-top: 10px;
    font-size: 16px;
    border-radius:15px;
    text-align: center;
    margin-left:5px;
    font-family: 'Nunito', sans-serif; 
  }
  input[type=text]{
    
    margin-top: 5px;
    font-size: 16px;
    border-radius:15px;
    text-align: center;
    font-family: 'Nunito', sans-serif; 
  }
  .Tri
 {
    width: 80px;
    border-radius: 30px;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
     background: -webkit-linear-gradient(left,#d40a0f, #ec9f10);
  
 }
    </style>
	<div class="dashboard-content">
		<div class="dashboard-header">
			<div class="container">
            <div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>Paneau</a>
							<span class="disabled">Livre Réservées</span>
						</div >
                        <form action="" method="POST">
                                Trier par :
                            <select name="choix" class="form-control">

                                                    <option value="booksname">
                                                     Nom de livre
                                                    </option>
                                                    <option value="auteur">
                                                      Nom de l'auteur
                                                    </option><option value="date">
                                                    Date de réservation
                                                   </option>
                                                   <option value="categorie">
                                                     Categorie
                                                    </option>
                                                    
                                  </select>=<input type="text" name="mot" size="15" placeholder="Chercher...">

                                  <input class="Tri"  type="submit" value="Chercher" style="" name="trier">
                            </form>
					</div>
				<div class="row" style="margin-top:10px;">
                <div class="dbooks" >
                           
                           <table id="dtBasicExample" class="table table-striped table-dark text-center" width="650" style="margin-left:130px;">
                          <thead>
                               <tr>
                               <th>Couverture</th>
                                   <th>Nom-Livre</th>
                                   <th>L'auteur</th>
                                   
                                   <th>date_reservation</th>
                                  
                                   <th>Categorie</th>
                                   <th>Action</th>
                               </tr>
                          </thead>
                           
                           <tbody>
                            <?php
                            $res = mysqli_query($link, "select * from livre_reser where name='$_SESSION[name]'");
                            if( isset($_POST["trier"]) )
                            {
                                $choix=$_POST["choix"];
                                $mot=$_POST["mot"];
                                if($mot == "")
                                {
                                   $res = mysqli_query($link, "select * from livre_reser where name='$_SESSION[name]' order by $choix");
                                }
                                else
                                {
                                    $res = mysqli_query($link, "select * from livre_reser where name='$_SESSION[name]' && $choix like '%$mot%'");
                                }

   
                              
                            }
                            $test=0;
                               while ($row = mysqli_fetch_array($res)) {
                                   echo "<tr>";
                                   echo "<td>"; ?><img src="<?php echo $row["image"]; ?> " height="100" width="100" alt=""> <?php echo "</td>";
                                   echo "<td>";
                                   echo "&nbsp".$row["booksname"]."&nbsp";
                                   echo "</td>";
                                   echo "<td>";
                                   echo "&nbsp".$row["auteur"]."&nbsp";
                                   echo "</td>";
                                   echo "<td>";
                                   echo "&nbsp".$row["booksissuedate"]."&nbsp";
                                   echo "</td>";
                                   echo "<td>";
                                   echo "&nbsp". "&nbsp". "&nbsp".$row["categorie"]."&nbsp"."&nbsp"."&nbsp";
                                   echo "</td>";
                                    echo "<td>----------------";
                                    $r = mysqli_query($link, "select status from lib_registration where name='$_SESSION[username]");
                                    echo "<a style=\"text-decoration: none;\" href=\"delete_reser.php?id=". $row["id"]."\" \"><input class=\"reserver\"  type=\"button\" value=\"Annuler🅧\" ></a>";
                                   ?><a href="delete-book.php?id=<?php echo $row["id"]; ?> "><i class="fas fa-trash"></i></a><?php
                                   echo "----------------</td>";
                                   echo "</tr>";
                                $test=1;
                               }
                               
                                ?>
                                </tbody>
                           </table>
                       </div>
					<div class="col-md-6">
						<div class="left">
							<p><span></span></p>
						</div>
					</div>
					
				</div>				
			</div>	
            <div class="container">
                
                <div class="row">
                    <div class="col-md-12">
                        
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