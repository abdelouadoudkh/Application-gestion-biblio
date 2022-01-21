<?php 
     session_start();
    if (!isset($_SESSION["username"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    $page='livres';
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
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span>Livres</span></p>
						</div>
                        <form action="" method="POST">
                                Trier par :
                            <select name="choix" class="form-control">

                                                    <option value="books_name">
                                                     Nom de livre
                                                    </option>
                                                    <option value="books_author_name">
                                                      Nom de l'auteur
                                                    </option><option value="status">
                                                    Status
                                                   </option>
                                                   <option value="categorie">
                                                     Categorie
                                                    </option>
                                                    
                                  </select>=<input type="text" name="mot" size="15" placeholder="Chercher...">

                                  <input class="Tri"  type="submit" value="Chercher" style="" name="trier">
                            </form>
					</div>
					
				</div>				
			</div>	
            <div class="container">
            
                
                <div class="row" style="margin-top:15px;">
                    <div class="col-md-12">
                        <div class="dbooks">
                            <table id="dtBasicExample" class="table table-striped table-dark text-center" width="900">
                           <thead>
                                <tr>
                                    <th>Couverture</th>
                                    <th>Nom-Livre</th>
                                    <th>L'auteur</th>
                                    
                                    <th>date_publi</th>
                                   
                                    <th>Catégorie</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                           </thead>
                            
                            <tbody>
                             <?php
                                
                               $res = mysqli_query($link, "select * from add_book");
                                $r = mysqli_query($link, "select status from lib_registration where name='$_SESSION[username]'");
                                     $rows = mysqli_fetch_array($r);
                                while ($row = mysqli_fetch_array($res)) 
                                {
                                   
                                    $bkn=$row["books_name"];
                                      if($row["books_quantity"]!=0)
                                    {
                                       

                                          $ras=mysqli_query($link,"UPDATE add_book SET status='Disponible' WHERE books_name='$bkn'");
                                     //echo "&nbsp"."<p style=\"color:#12cf21;\">".$row["status"]."</p>"."&nbsp";
                                    }
                                    else
                                    {
                                         

                                          $ras=mysqli_query($link,"UPDATE add_book SET status='Indisponible' WHERE books_name='$bkn'");
                                     //  echo "&nbsp"."<p style=\"color:#da290a;\">".$row["status"]."</p>"."&nbsp";
                                    }
                                   
                                  //echo "</td>";
                                  // echo "<td>-----------";  
                                    

                                 
                                  
                                }
                                
                                
                                $res = mysqli_query($link, "select * from add_book");
                            if( isset($_POST["trier"]) )
                            {
                                $choix=$_POST["choix"];
                                $mot=$_POST["mot"];
                                if($mot == "")
                                {
                                    $res = mysqli_query($link, "select * from add_book order by $choix");
                                }
                                else
                                {
                                    $res = mysqli_query($link, "select * from add_book where $choix like '%$mot%'");
                                }

   
                              
                            }
                            $test=0;
                               
                                $r = mysqli_query($link, "select status from lib_registration where name='$_SESSION[username]'");
                                     $rows = mysqli_fetch_array($r);
                                while ($row = mysqli_fetch_array($res)) {
                                     echo "<tr>";
                                    echo "<td>"; ?><img src="<?php echo $row["books_image"]; ?> " height="100" width="100" alt="Sans-couverture"> <?php echo "</td>";
                                    echo "<td>";
                                    echo "&nbsp".$row["books_name"]."&nbsp";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "&nbsp".$row["books_author_name"]."&nbsp";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "&nbsp".$row["books_purchase_date"]."&nbsp";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "&nbsp".$row["categorie"]."&nbsp";
                                    echo "</td>";
                                    echo "<td>";
                                   
                                     if($row["status"]=="Indisponible")
                                    {
                                        echo "<p style=\"color:#da290a;\">"."&nbsp".$row["status"]."&nbsp"."</p>"."&nbsp";
                                    } 
                                    if($row["status"]=="Disponible")
                                    {
                                        echo "&nbsp"."<p style=\"color:#12cf21;\">"."&nbsp".$row["status"]."&nbsp"."</p>"."&nbsp";
                                    }
                                     
                                    echo "</td>";
                                     echo "<td>-----------";  
                                     $rs = mysqli_query($link, "select * from livre_emp where name='$_SESSION[username]'");
                                     $cpt = mysqli_num_rows($rs);
                                   if($rows["status"]=='A' && $row["status"]!="Indisponible" && $cpt<3)
                                   {
                                       echo "<a style=\"text-decoration:none ;\" href=\"reserver.php?id=".$row["id"]."\" \"><input class=\"reserver\"  type=\"button\" value=\"Réserver☭\" ></a>";
                                      
                                    //   echo"<a href=\"\"><img src=\"panier.png\" width=\"30\"  style=\"padding: 5px;\"></a>"; 
                                   }
                                   
                                  if($rows["status"]!='A' && $row["status"]!="Indisponible" || $cpt>=3)
                                  {
                                    echo "<span class=\"sus\" style=\"color:#d40a0a;\"><br>SUSPENDU<br></span>";
                                  }
                                    if($row["status"]=="Indisponible")
                                    {
                                        echo "<span class=\"sus\" style=\"color:#d40a0a;\"><br>------<br></span>";
                                    }
                                   
                                    

                                 
                                    echo "-----------</td>";
                                    echo "</tr>";
                                }
                                
                                
                                 ?>
                                 </tbody>
                                 <!--href="delete-book.php?id=<?php echo $row["id"]; ?> "-->
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