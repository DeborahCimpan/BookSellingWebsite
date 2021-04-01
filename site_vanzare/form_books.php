<!DOCTYPE html>
<html>
  <head>
    <title>Formular</title>
    <link href="assets/css/form_css.css" rel="stylesheet">
	<?php
	
	   
	   
	
	   $con=mysqli_connect("localhost","root","","formular");
	   if($con === false)
	   {
		   die("ERROR:Could not connect." . mysqli_connect_error());
	   }
	   if(isset($_POST['send']) )
	   {
		   
		   session_start();
		   $t = isset($_POST['time']) ? $_POST['time'] : '';
          
           if($t == "Pentru timpul liber")
           {
              $_SESSION['TIMP_LIBER']='lib';
			  
			  
           }
           else if ($t == "Pentru studiu")
           {
             $_SESSION['TIMP_LIBER']='st';
			 
           }
            
		   
		   
           $s = isset($_POST['scoala']) ? $_POST['scoala'] : '';
		   
           if($s == "Gimnaziu")
           {
              $_SESSION['SCOALA']='gim';
			  
           }
           else if ($s == "Liceu")
           {
             $_SESSION['SCOALA']='lic';
           }
		   else if ($s == "Nu sunt în gimnaziu/liceu sau vreau o carte pentru timpul liber deci nu țin cont de acest aspect")
           {
             $_SESSION['SCOALA']='nust';
			 
           }
		   
		   
		   
		   
		   
		  $su = isset($_POST['subject']) ? $_POST['subject'] : '';
		   

           if($su == "Matematică")
           {
              $_SESSION['SUBIECT']='mate';
			  
           }
           else if ($su == "Biologie")
           {
             $_SESSION['SUBIECT']='bio';
           }
		   else if ($su == "Engleză")
           {
             $_SESSION['SUBIECT']='engl';
           }
		   else if ($su == "Franceză")
           {
             $_SESSION['SUBIECT']='franc';
           }
		   else if ($su == "Germană")
           {
             $_SESSION['SUBIECT']='germ';
           }
		   else if ($su == "Fizică")
           {
             $_SESSION['SUBIECT']='fiz';
           }
		   else if ($su == "Știința calculatoarelor")
           {
             $_SESSION['SUBIECT']='calcu';
           }
		   else if ($su == "Limba română")
           {
             $_SESSION['SUBIECT']='ro';
			 
           }
		   else if ($su == "Geografie")
           {
             $_SESSION['SUBIECT']='geogra';
			 
           }
		   else if ($su == "Istorie")
           {
             $_SESSION['SUBIECT']='istor';
			 
           }
		   else if ($su == "Chimie")
           {
             $_SESSION['SUBIECT']='chi';
			 
           }
		   
		   else if ($su == "nu sunt interesat de niciun subiect")
           {
             $_SESSION['SUBIECT']='nusub';
           }
		   
		   
		   $radioVal_st = isset($_POST['student']) ? $_POST['student'] : '';
		   

           if($radioVal_st == "Da")
           {
              $_SESSION['STUDENT']='da';
			  
           }
           else if ($radioVal_st == "Nu")
           {
             $_SESSION['STUDENT']='nu';
           }
		   else if ($radioVal_st == "vreau o carte pentru timpul liber deci nu țin cont de acest aspect")
           {
             $_SESSION['STUDENT']='nuv';
           }
		    
		   
		   
		   
		   $radioVal_d = isset($_POST['domain']) ? $_POST['domain'] : '';
		   

           if($radioVal_d == "Literatură")
           {
              $_SESSION['DOMENIU']='lit';
			  
           }
           else if ($radioVal_d == "Economie")
           {
             $_SESSION['DOMENIU']='econ';
           }
		   else if ($radioVal_d == "Psihologie")
           {
             $_SESSION['DOMENIU']='psiho';
           }
		   else if ($radioVal_d == "Medicină")
           {
             $_SESSION['DOMENIU']='medi';
           }
		   else if ($radioVal_d == "Informatică")
           {
             $_SESSION['DOMENIU']='info';
           }
		   else if ($radioVal_d == "Geografie")
           {
             $_SESSION['DOMENIU']='geo';
           }
		   else if ($radioVal_d == "Drept")
           {
             $_SESSION['DOMENIU']='dre';
           }
		   else if ($radioVal_d == "Nu am un domeniu sau vreau o carte pentru timpul liber deci nu țin cont de acest aspect")
           {
             $_SESSION['DOMENIU']='nudom';
           }
              
           
		   
		   $radioVal_t = isset($_POST['type']) ? $_POST['type'] : '';

           if($radioVal_t == "aventură")
           {
              $_SESSION['TIP'] ='aven';
			  
           }
           else if ($radioVal_t == "romantice")
           {
             $_SESSION['TIP'] ='rom';
           }   
           else if ($radioVal_t == "polițiste")
           {
             $_SESSION['TIP'] ='poli';
           }   
           else if ($radioVal_t == "gătit")
           {
             $_SESSION['TIP'] ='gat';
           }   
			else if ($radioVal_t == "istorice")
					   {
						 $_SESSION['TIP'] ='isto';
					   }   
			else if ($radioVal_t == "spirituale")
					   {
						 $_SESSION['TIP'] ='spirit';
					   }   
			else if ($radioVal_t == "nu doresc o carte pentru timpul liber deci nu am o preferință")
					   {
						 $_SESSION['TIP'] ='nudo';
					   }   		   
		   
		   
			
			
			    echo '<script>window.location="pagina de carti.php";</script>';
			 
			 
			 
		   
	   }
	   
	?>
	
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, textarea, label { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      line-height: 40px;
      font-size: 40px;
      color: #fff;
      z-index: 2;
      line-height: 83px;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 8px  #cc7a00; 
      }
      .banner {
      position: relative;
      height: 300px;
      background-image: url("assets/images/books.jpg");  
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.2); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      input[type="date"] {
      padding: 4px 5px;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color: #cc7a00;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 3px 0 #cc7a00;
      color: #cc7a00;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      .item span {
      color: red;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #cc7a00;
      }
      .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 1%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      input[type=radio], input[type=checkbox]  {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      margin: 5px 20px 15px 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      .question-answer label {
      display: block;
      }
      label.radio:before {
      content: "";
      position: absolute;
      left: 0;
      width: 17px;
      height: 17px;
      border-radius: 50%;
      border: 2px solid #ccc;
      }
      input[type=radio]:checked + label:before, label.radio:hover:before {
      border: 2px solid #cc7a00;
      }
      label.radio:after {
      content: "";
      position: absolute;
      top: 6px;
      left: 5px;
      width: 8px;
      height: 4px;
      border: 3px solid #cc7a00;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #cc7a00;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #ff9800;
      }
      @media (min-width: 568px) {
      .text-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .text-item input, .age-item div {
      width: calc(50% - 20px);
      }
      .text-item div input {
      width:97%;}
      .text-item div label {
      display:block;
      padding-bottom:5px;
      }
      }
    </style>
	

	
  </head>
  <body>
  <!-- Loader Start -->
    <div class="css-loader">
        <div class="loader-inner line-scale d-flex align-items-center justify-content-center"></div>
    </div>
    <!-- Loader End -->
    <div class="testbox">
      <form action="form_books.php" method="post">
        <div class="banner">
          <h1>Te încurajăm să alegi cele mai bune cărți</h1>
        </div>
        <br></br>
        <div class="question">
          <label>Îți dorești o carte pentru timpul liber sau pentru studiu?</label>
          <div class="question-answer">
            <div>
              <input type="radio" name="time" value="Pentru timpul liber" id="radio_1" />
              <label for="radio_1" class="radio"><span>Pentru timpul liber</span></label>
            </div>
            <div>
              <input  type="radio" name="time" value="Pentru studiu" id="radio_2" />
              <label for="radio_2" class="radio"><span>Pentru studiu</span></label>
            </div>
          </div>
        </div>
        <div class="question">
          <label>Ești la gimnaziu sau la liceu?</label>
          <div class="question-answer">
            <div>
              <input type="radio" name="scoala" value="Gimnaziu" id="radio_3" />
              <label for="radio_3" class="radio"><span>Gimnaziu</span></label>
            </div>
            <div>
              <input  type="radio" name="scoala" value="Liceu" id="radio_4" />
              <label for="radio_4" class="radio"><span>Liceu</span></label>
            </div>
			<div>
              <input  type="radio" name="scoala" value="Nu sunt în gimnaziu/liceu sau vreau o carte pentru timpul liber deci nu țin cont de acest aspect" id="radio_5" />
              <label for="radio_5" class="radio"><span>Nu sunt în gimnaziu/liceu sau vreau o carte pentru timpul liber deci nu țin cont de acest aspect</span></label>
            </div>
          </div>
        </div>
        
        <div class="question">
          <label>Care este subiectul de care ești interesat?</label>
          <div class="question-answer">
            <div>
              <input type="radio" name="subject" value="Matematică" id="radio_6" />
              <label for="radio_6" class="radio"><span>Matematică</span></label>
            </div>
            <div>
              <input  type="radio" name="subject" value="Biologie" id="radio_7" />
              <label for="radio_7" class="radio"><span>Biologie</span></label>
            </div>
			<div>
              <input  type="radio" name="subject" value="Engleză" id="radio_8" />
              <label for="radio_8" class="radio"><span>Engleză</span></label>
            </div>
			<div>
              <input  type="radio" name="subject" value="Franceză" id="radio_9" />
              <label for="radio_9" class="radio"><span>Franceză</span></label>
            </div>
			<div>
              <input  type="radio" name="subject" value="Germană" id="radio_10" />
              <label for="radio_10" class="radio"><span>Germană</span></label>
            </div>
			<div>
              <input  type="radio" name="subject" value="Fizică" id="radio_12" />
              <label for="radio_12" class="radio"><span>Fizică</span></label>
            </div>
			<div>
              <input  type="radio" name="subject" value="Știința calculatoarelor" id="radio_32" />
              <label for="radio_32" class="radio"><span>Știința calculatoarelor</span></label>
            </div>
			<div>
              <input  type="radio" name="subject" value="Limba română" id="radio_33" />
              <label for="radio_33" class="radio"><span>Limba română</span></label>
            </div>
			<div>
              <input  type="radio" name="subject" value="Geografie" id="radio_34" />
              <label for="radio_34" class="radio"><span>Geografie</span></label>
            </div>
			<div>
              <input  type="radio" name="subject" value="Istorie" id="radio_35" />
              <label for="radio_35" class="radio"><span>Istorie</span></label>
            </div>
			<div>
              <input  type="radio" name="subject" value="Chimie" id="radio_36" />
              <label for="radio_36" class="radio"><span>Chimie</span></label>
            </div>
			<div>
              <input  type="radio" name="subject" value="nu sunt interesat de niciun subiect" id="radio_13" />
              <label for="radio_13" class="radio"><span>nu sunt interesat de niciun subiect</span></label>
            </div>
          </div>
        </div>
		 <div class="question">
          <label>Ești student?</label>
          <div class="question-answer">
            <div>
              <input type="radio" name="student" value="Da" id="radio_14" />
              <label for="radio_14" class="radio"><span>Da</span></label>
            </div>
            <div>
              <input  type="radio" name="student" value="Nu" id="radio_15" />
              <label for="radio_15" class="radio"><span>Nu</span></label>
            </div>
			<div>
              <input  type="radio" name="student" value="vreau o carte pentru timpul liber deci nu țin cont de acest aspect" id="radio_37" />
              <label for="radio_37" class="radio"><span>vreau o carte pentru timpul liber deci nu țin cont de acest aspect</span></label>
            </div>
			
          </div>
        </div>
		 <div class="question">
          <label>În ce domeniu studiezi?</label>
          <div class="question-answer">
            
            <div>
              <input  type="radio" name="domain" value="Literatură" id="radio_17" />
              <label for="radio_17" class="radio"><span>Literatură</span></label>
            </div>
			<div>
              <input  type="radio" name="domain" value="Economie" id="radio_18" />
              <label for="radio_18" class="radio"><span>Economie</span></label>
            </div>
			<div>
              <input  type="radio" name="domain" value="Psihologie" id="radio_19" />
              <label for="radio_19" class="radio"><span>Psihologie</span></label>
            </div>
			<div>
              <input  type="radio" name="domain" value="Medicină" id="radio_20" />
              <label for="radio_20" class="radio"><span>Medicină</span></label>
            </div>
			<div>
              <input  type="radio" name="domain" value="Informatică" id="radio_21" />
              <label for="radio_21" class="radio"><span>Informatică</span></label>
            </div>
			<div>
              <input  type="radio" name="domain" value="Geografie" id="radio_22" />
              <label for="radio_22" class="radio"><span>Geografie</span></label>
            </div>
			<div>
              <input  type="radio" name="domain" value="Drept" id="radio_23" />
              <label for="radio_23" class="radio"><span>Drept</span></label>
            </div>
			<div>
              <input  type="radio" name="domain" value="Nu am un domeniu sau vreau o carte pentru timpul liber deci nu țin cont de acest aspect" id="radio_24" />
              <label for="radio_24" class="radio"><span>Nu am un domeniu sau vreau o carte pentru timpul liber deci nu țin cont de acest aspect</span></label>
            </div>
          </div>
        </div>
		 
        
		
		
		
		
		<div class="question">
          <label>Dacă îți dorești o carte pentru timpul liber care să fie tipul acesteia?</label>
          <div class="question-answer">
            <div>
              <input type="radio" name="type" value="aventură" id="radio_25" />
              <label for="radio_25" class="radio"><span>aventură</span></label>
            </div>
            <div>
              <input  type="radio" name="type" value="romantice" id="radio_26" />
              <label for="radio_26" class="radio"><span>romantice</span></label>
            </div>
			<div>
              <input  type="radio" name="type" value="polițiste" id="radio_27" />
              <label for="radio_27" class="radio"><span>polițiste</span></label>
            </div> 
			<div>
              <input  type="radio" name="type" value="gătit" id="radio_28" />
              <label for="radio_28" class="radio"><span>gătit</span></label>
            </div>
			<div>
              <input  type="radio" name="type" value="istorice" id="radio_29" />
              <label for="radio_29" class="radio"><span>istorice</span></label>
            </div>
			<div>
              <input  type="radio" name="type" value="spirituale" id="radio_30" />
              <label for="radio_30" class="radio"><span>spirituale</span></label>
            </div>
			<div>
              <input  type="radio" name="type" value="nu doresc o carte pentru timpul liber deci nu am o preferință" id="radio_31" />
              <label for="radio_31" class="radio"><span>nu doresc o carte pentru timpul liber deci nu am o preferință</span></label>
            </div>
          </div>
        </div>
		
		
		
		
        <div class="btn-block">
        <button  name="send" type="submit" >Trimite</button>
        </div>
      </form>
    </div>
  </body>
</html>