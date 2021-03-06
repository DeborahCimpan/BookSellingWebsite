
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
<!doctype html>
<html lang="en">

<head>
    <!--
    Proiect individual
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>Pagina principala</title>
    <!-- Stylesheets & Fonts -->
    <link rel="stylesheet" href="assets/css/fonts.css">
    <!-- Plugins Stylesheets -->
    <link rel="stylesheet" href="assets/css/loader/loaders.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/aos/aos.css">
    <link rel="stylesheet" href="assets/css/swiper/swiper.css">
    <link rel="stylesheet" href="assets/css/lightgallery.min.css">
    
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Responsive Stylesheet -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <?php
	   $con=mysqli_connect("localhost","root","","contact");
	   if($con === false){
		   die("ERROR:Could not connect." . mysqli_connect_error());
	   }
	   if(isset($_POST['send'])){
		   $NUME=mysqli_real_escape_string($con,$_POST['name']);
		   $EMAIL=mysqli_real_escape_string($con,$_POST['email']);
		   $PHONE=mysqli_real_escape_string($con,$_POST['phone']);
		   $MESSAGE=mysqli_real_escape_string($con,$_POST['message']);
		   if($NUME!="" && $EMAIL!="" && $PHONE!="" && $MESSAGE!=""){
			   $sql="INSERT INTO OPINIE_CLIENTI (NUME, EMAIL, PHONE,MESSAGE) VALUES ('$NUME', '$EMAIL', '$PHONE','$MESSAGE')";
			   if(mysqli_query($con,$sql)){
				   echo '<script>alert("Mesajul dumneavoastr?? a fost ??nregistrat.")</script>'; 
			   }
			   else{
				   echo '<script>alert("Mesajul nu a putut fi ??nregistrat")</script>'; 
			   }
		   }
		   
	   }
	   
	?>
	
	
	</head>

<body>
    
    <!-- Hero Start -->
    <div class="tm-page-wrap mx-auto">
            <section class="tm-banner">
                <div class="tm-container-outer tm-banner-bg">
                    <div class="container">
                        <div class="row tm-banner-row tm-banner-row-header">
                            <div class="col-xs-12">
                                <div class="tm-banner-header">
                                    <h1 class="text-uppercase tm-banner-title">S?? ??ncepem</h1>
									<div>
	                                <a class="btn purple rounded full-rounded" href="form_books.php">Intra??i pe acest buton pentru a v?? g??si c??r??ile potrivite</a>
	                                </div>
                                    <img src="assets/images/dots-3.png" alt="Dots">
                                    <p class="tm-banner-subtitle">V?? ??ncuraj??m s?? ne spune??i problemele dumneavoastr??</p>
                                     
                                </div>    
                            </div>  <!-- col-xs-12 -->                      
                        </div> <!-- row -->
                        <div class="row tm-banner-row" code="tm-section-search">

    <div class="row">
			<h1>contacta??i-ne</h1>
	</div>
	
	<form action="homepage.php" method="post">
	<div class="row input-container">
			<div class="col-xs-12">
				<div class="styled-input wide">
					<input type="text" name="name" required />
					<label>Nume</label> 
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input">
					<input type="text" name="email" required />
					<label>Email</label> 
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="float:right;">
					<input type="text" name="phone" required />
					<label>Num??r de telefon</label> 
				</div>
			</div>
			<div class="col-xs-12">
				<div class="styled-input wide">
					<textarea required name="message"></textarea>
					<label>Mesajul dumneavoastr??</label>
				</div>
			</div>
			<div class="col-xs-12">
			<button	 class="btn-lrg submit-btn" type="submit" name="send">Trimite</button>
			</div>
	</div>
	</form>

                        </div> <!-- row -->
                        <div class="tm-banner-overlay"></div>
                    </div>  <!-- .container -->                   
                </div>     <!-- .tm-container-outer -->  
    
    </section>
	</div>
    <!-- Featured Start -->
    <section class="featured">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-right" data-aos-delay="400" data-aos-duration="800">
                    <div class="title">
                        <h6 class="title-primary">Despre site</h6>
                        <h1 class="title-blue">Atunci c??nd nu g??se??ti un r??spuns, caut?? ??n c??r??ile noastre</h1>
                    </div>
                   <p>Acest site a fost creat pentru a furniza cele mai bune c??r??i pentru to??i tinerii.Este un site ??n care  ave??i ??ansa de a v?? cump??ra rapid c??r??ile dorite.Spre deosebire de alte site-uri de v??nzare de c??r??i ,unde trebuie s?? accesa??i diverse pagini web p??n?? s?? ajunge??i la c??r??ile dorite ,prin intermediul acestui site,ve??i ajunge mult mai rapid ??i mai u??or la c??r??ile respective.Pentru asta am creat un formular(care poate fi accesat foarte u??or ??n sec??iunea de mai sus) prin care dumneavoastr?? s?? ajunge??i la c??r??ile  pe care vi le-a??i "croit ??n minte".R??spunz??nd la ??ntreb??rile formularului ,site-ul meu  v?? va sugera astfel pagina de c??r??i unde cel mai probabil se va  afla una din c??r??ile mult c??utate.Este un site simplu,u??or de folosit ??i cu o multitudine de c??r??i care abia a??teapt?? s?? fie cump??rate ??i citite.</p>
                    
                    
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-delay="400" data-aos-duration="800">
                    <div class="featured-img">
                        <img class="featured-big" src="assets/images/girl_book.jpg" alt="Featured 1">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured End -->
    
    <section class="recent-posts">
        <div class="container">
		 <div class="title"><h6 class="title-primary">Top c??r??i</h6></div>
            <div class="row">
			
			
			           <?php
						$product_array = $db_handle->runQuery("select * from produse where nr_cumparari=(select max(nr_cumparari) from produse)");
						if (!empty($product_array)) { 
							foreach($product_array as $key=>$value){
						?>
						<table>
						<form method="post" action="homepage.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
						<figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
							<a href="#">
							<div class="tm-gallery-item-overlay">
							  <img src="<?php echo $product_array[$key]["product_image"]; ?>" alt="Image" class="img-fluid tm-img-center">
                            </div>
							<p class="tm-figcaption"><?php echo $product_array[$key]["product_name"]; ?></p>
			
			                <p class="tm-figcaption"><?php echo "".$product_array[$key]["product_price"]; ?> lei</p>
							
							
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
    
    
    
    <!-- Footer Start -->
    <footer>
        <!-- Foot Note Start -->
        <div class="foot-note">
            <div class="container">
                <div
                    class="footer-content text-center text-lg-left d-lg-flex justify-content-between align-items-center">
                    <p class="mb-0" data-aos="fade-right" data-aos-offset="0">&copy; 2020 All Rights Reserved</p>
                    <p class="mb-0" data-aos="fade-left" data-aos-offset="0"><a href="#">Terms Of Use</a><a
                            href="#">Privacy & Security
                            Statement</a></p>
                </div>
            </div>
        </div>
        <!-- Foot Note End -->
    </footer>
    <!-- Footer Endt -->
    <!--jQuery-->
    <script src="assets/js/jquery-3.3.1.js"></script>
    <!--Plugins-->
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/loaders.css.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/swiper.min.js"></script>
    <script src="assets/js/lightgallery-all.min.js"></script>
    <!--Script-->
    <script src="assets/js/main.js"></script>
	<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "#";
    };
</script>
</body>

</html>