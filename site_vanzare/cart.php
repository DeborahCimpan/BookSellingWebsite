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
	<meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Coșul meu</title>

    <!-- load stylesheets -->
    <link rel="stylesheet" href="assets/css/font_books.css">                
    <link rel="stylesheet" href="assets/css/bootstrap_min_books.css">                                      
    <link rel="stylesheet" href="assets/css/pagebooks.css">  
	<link rel="stylesheet" href="assets/css/cart.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #d2a679;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #d2a679;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
<?php
	   $con=mysqli_connect("localhost","root","","informatii");
	   if($con === false){
		   die("ERROR:Could not connect." . mysqli_connect_error());
	   }
	   if(isset($_POST['send'])){
		   $NUME=mysqli_real_escape_string($con,$_POST['firstname']);
		   $EMAIL=mysqli_real_escape_string($con,$_POST['email']);
		   $ADRESA=mysqli_real_escape_string($con,$_POST['address']);
		   $ORAS=mysqli_real_escape_string($con,$_POST['city']);
		   $TARA=mysqli_real_escape_string($con,$_POST['state']);
		   $NUME_CARD=mysqli_real_escape_string($con,$_POST['cardname']);
		   $NUMAR_CARD=mysqli_real_escape_string($con,$_POST['cardnumber']);
		   $LUNA_EXPIRARE=mysqli_real_escape_string($con,$_POST['expmonth']);
		   $AN_EXPIRARE=mysqli_real_escape_string($con,$_POST['expyear']);
		   $CVV=mysqli_real_escape_string($con,$_POST['cvv']);
		   if($NUME!="" && $EMAIL!="" && $ADRESA!="" && $ORAS!="" && $TARA!='' && $NUME_CARD!='' && $NUMAR_CARD!='' && $LUNA_EXPIRARE!='' && $AN_EXPIRARE!='' && $CVV!='')
		   {
		    $db_handle = new DBController();
			foreach ($_SESSION["cart_item"] as $item){
				
				$cod = $item["code"];
				$res = $db_handle->runQuery("SELECT * FROM produse  where code=\"$cod\"");
				
				foreach($res as $k => $v){
					
					
					$var=$res[$k]["product_name"];
					$var1=$res[$k]["code"];
					
		   
			   $sql="INSERT INTO INFORMATII_CLIENTI (NUME, EMAIL, ADRESA,ORAS,TARA,NUME_CARD,NUMAR_CARD,LUNA_EXPIRARE,AN_EXPIRARE,CVV,nume_produs,cod_produs) VALUES ('$NUME', '$EMAIL', '$ADRESA','$ORAS','$TARA','$NUME_CARD','$NUMAR_CARD','$LUNA_EXPIRARE','$AN_EXPIRARE','$CVV','$var','$var1')";
			   if(mysqli_query($con,$sql)){
				   echo '<script>alert("Comanda dumneavoastră a fost înregistrată.")</script>'; 
			   }
			   else{
				   echo '<script>alert("Comanda nu a putut fi înregistrată")</script>'; 
			   }
		      }
			}
		   
	      }
		  
				foreach ($_SESSION["cart_item"] as $item1){
						
					$cod1 = $item1["code"];
					$res1 = $db_handle->runQuery("SELECT nr_cumparari FROM produse where code=\"$cod1\"");
					//echo '<p>' . print_r($res1) . '</p>';
					foreach($res1 as $k => $v){
							
						$res1[$k]["nr_cumparari"] = $res1[$k]["nr_cumparari"]+$item1["quantity"];
						
						$val=$res1[$k]["nr_cumparari"];
						$db_handle->runCom("UPDATE produse SET nr_cumparari=\"$val\" WHERE code=\"$cod1\"");
					}
								
						
						
					}
			 
	   }
	
	   
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
        <div id="shopping-cart">
		<div class="txt-heading">Coș de cumpărături</div>

		<a id="btnEmpty" href="cart.php?action=empty">Golește coșul</a>
		<?php
		if(isset($_SESSION["cart_item"])){
			$total_quantity = 0;
			$total_price = 0;
		?>	

		<table class="tbl-cart" cellpadding="10" cellspacing="1">
		<tbody>
		<tr>
		<th style="text-align:left;">Nume</th>
		<th style="text-align:right;" width="5%">Cantitate</th>
		<th style="text-align:right;" width="10%">Preț unitar</th>
		<th style="text-align:right;" width="10%">Preț</th>
		<th style="text-align:center;" width="5%">Șterge</th>
		</tr>	
		<?php		
			foreach ($_SESSION["cart_item"] as $item){
				$item_price = $item["quantity"]*$item["product_price"];
				?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" width=100px; /><?php echo $item["name"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "lei ".$item["product_price"]; ?></td>
				<td  style="text-align:right;"><?php echo "lei ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="assets/images/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["product_price"]*$item["quantity"]);
				}
				?>

				<tr>
				<td colspan="2" align="right">Total:</td>
				<td align="right"><?php echo $total_quantity; ?></td>
				<td align="right" colspan="2"><strong><?php echo "lei ".number_format($total_price, 2); ?></strong></td>
				<td></td>
				</tr>
				</tbody>
				</table>		
				  <?php
				} else {
				?>
				<div class="no-records">Coșul dumneavoastră este gol</div>
				<?php 
				}
				?>
				</div>
	
		
		</div>
		



<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="cart.php" method="post">
      
        <div class="row">
          <div class="col-50">
            <h3>Adresa de facturare</h3>
            <label for="fname"><i class="fa fa-user"></i> Nume</label>
            <input type="text" code="fname" name="firstname" >
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" code="email" name="email" >
            <label for="adr"><i class="fa fa-address-card-o"></i> Adresă</label>
            <input type="text" code="adr" name="address">
            <label for="city"><i class="fa fa-institution"></i> Oraș</label>
            <input type="text" code="city" name="city" >

            <div class="row">
              <div class="col-50">
                <label for="state">Țara</label>
                <input type="text" code="state" name="state" >
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Plată</h3>
            <label for="fname">Carduri acceptate</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Nume Card</label>
            <input type="text" code="cname" name="cardname" >
            <label for="ccnum">Numărul cardului</label>
            <input type="text" code="ccnum" name="cardnumber" >
            <label for="expmonth">Luna expirării </label>
            <input type="text" code="expmonth" name="expmonth" >
            <div class="row">
              <div class="col-50">
                <label for="expyear">Anul expirării </label>
                <input type="text" code="expyear" name="expyear">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" code="cvv" name="cvv" >
              </div>
            </div>
          </div>
          
        </div>
        <input type="submit" name="send" value="Finalizează comanda" class="btn">
      </form>
    </div>
  </div>
</div>
        
        

</body>
</html>