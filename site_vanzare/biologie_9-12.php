<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM produse WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["product_name"], 'code'=>$productByCode[0]["code"],'quantity'=>$_POST["quantity"], 'product_price'=>$productByCode[0]["product_price"],'image'=>$productByCode[0]["product_image"]));			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Biologie_9-12</title>

    <!-- load stylesheets -->
    <link rel="stylesheet" href="assets/css/font_books.css">                
    <link rel="stylesheet" href="assets/css/bootstrap_min_books.css">                                      
    <link rel="stylesheet" href="assets/css/pagebooks.css">   
	

    
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
						$product_array = $db_handle->runQuery("SELECT * FROM produse WHERE timp='st' and scoala='lic' and subiect='bio' and student='nu' and domeniu='nudom' and tip='nudo'  ORDER BY code ASC");
						if (!empty($product_array)) { 
							foreach($product_array as $key=>$value){
						?>
						<table>
						<form method="post" action="biologie_9-12.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
						<figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
							<a href="#">
							<div class="tm-gallery-item-overlay">
							  <img src="<?php echo $product_array[$key]["product_image"]; ?>" alt="Image" class="img-fluid tm-img-center">
                            </div>
							<p class="tm-figcaption"><?php echo $product_array[$key]["product_name"]; ?></p>
			
			                <p class="tm-figcaption"><?php echo "".$product_array[$key]["product_price"]; ?> lei</p>
							
							<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Adaugă coș" class="btnAddAction" /></div>
							 </a>
						</figure>
							
							
						</form>
						</table>
						
						<?php
								}
							}
						?>
												
					    
							
                            
                        </div>   
                    </div>
                    
                    
                </section>

                
            </div>

            
        </div>
        
        

</body>
</html>