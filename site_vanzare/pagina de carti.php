<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Cărțile dumneavoastră</title>

    <!-- load stylesheets -->
    <link rel="stylesheet" href="assets/css/font_books.css">                
    <link rel="stylesheet" href="assets/css/bootstrap_min_books.css">                                      
    <link rel="stylesheet" href="assets/css/pagebooks.css">                                   
    
	<?php 
	require_once ('component.php');
	require_once ('CreateDb.php');
	
	$database = new createDb("Shop", "Produse");
	?>
    
</head>


    <body>
      
        <div class="container">
            <header class="tm-site-header">
					<nav id="mainav">
						  <ul class="clear">
							<li class="active"><a href="homepage.php">Acasă</a></li>
							<li><a class="drop" href="#">Cărți după tip</a>
							  <ul>
								<li><a href="carti_aventura.php">Aventură</a></li>
								<li><a href="carti_romantic.php">Romantice</a></li>
								<li><a href="carti_politiste.php">Polițiste</a></li>
								<li><a href="gatit.php">Gătit</a></li>
								<li><a href="istorice.php">Istorice</a></li>
								<li><a href="spirituale.php">Spirituale</a></li>
							  </ul>
							</li>
							<li><a class="drop" href="#">Cărți de educație</a>
							  <ul>
								<li><a class="drop" href="#">Educație,clasele 5-8</a>
						  <ul>
							<li><a href="mate_5-8.php">Matematică</a></li>
							<li><a href="bio_5-8.php">Biologie</a></li>
							<li><a href="engleza_5-8.php">Engleză</a></li>
							<li><a href="franceza_5-8.php">Franceză</a></li>
							<li><a href="germana_5-8.php">Germană</a></li>
							<li><a href="fizica_5-8.php">Fizică</a></li>
							<li><a href="limba romana_5-8.php">Limba Română</a></li>
							<li><a href="geografie_5-8.php">Geografie</a></li>
							<li><a href="istorie_5-8.php">Istorie</a></li>
							<li><a href="chimie_5-8.php">Chimie</a></li>
							
						  </ul>
						</li>
						<li><a class="drop" href="#">Educație,clasele 9-12</a>
						  <ul>
							<li><a href="mate_9-12.php">Matematică</a></li>
							<li><a href="biologie_9-12.php">Biologie</a></li>
							<li><a href="engleza_9-12.php">Engleză</a></li>
							<li><a href="franceza_9-12.php">Franceză</a></li>
							<li><a href="germana_9-12.php">Germană</a></li>
							<li><a href="stiinta_calculatoare.php">Știința calculatoarelor</a></li>
							<li><a href="fizica_9-12.php">Fizică</a></li>
							<li><a href="limba_romana_9-12.php">Limba Română</a></li>
							<li><a href="geografie_9-12.php">Geografie</a></li>
							<li><a href="istorie_9-12.php">Istorie</a></li>
							<li><a href="chimie_9-12.php">Chimie</a></li>
							
						  </ul>
						</li>
						<li><a class="drop" href="#">Pentru studenți</a>
						  <ul>
							<li><a href="litere.php">Literatură</a></li>
							<li><a href="economie.php">Economie</a></li>
							<li><a href="psihologie.php">Psihologie</a></li>
							<li><a href="medicina.php">Medicină</a></li>
							<li><a href="informatica.php">Informatică</a></li>
							<li><a href="geografie.php">Geografie</a></li>
							<li><a href="drept.php">Drept</a></li>
							
						  </ul>
						</li>
							  </ul>
							</li>
							<li><a href="cart.php">Coșul meu</a></li>
							
						  </ul>
			</nav>
            </header>
            
            <div class="tm-main-content">
                <section class="tm-margin-b-l">
                    
                    
                    
                    
                    <div class="tm-gallery">
                        <div class="row">
                            <?php
							session_start();
							
							$result = $database->getData($_SESSION['TIMP_LIBER'],$_SESSION['SCOALA'],$_SESSION['SUBIECT'],$_SESSION['STUDENT'],$_SESSION['DOMENIU'],$_SESSION['TIP']);

							while ($row = mysqli_fetch_assoc($result))
							{
								component($row['product_name'], $row['product_price'], $row['product_image'], $row['code']);
						    }
						    ?>
							<?php
							
							
							$result = $database->getData($_SESSION['TIMP_LIBER'],$_SESSION['SCOALA'],$_SESSION['SUBIECT'],$_SESSION['STUDENT'],$_SESSION['DOMENIU'],$_SESSION['TIP']);

							while ($row = mysqli_fetch_assoc($result))
							{
								component($row['product_name'], $row['product_price'], $row['product_image'], $row['code']);
						    }
						    ?>
                            
                        </div>   
                    </div> 
                    
                    <nav class="tm-gallery-nav">
                        
                    </nav>
                </section>

                
            </div>

            
        </div>
        
        

</body>
</html>