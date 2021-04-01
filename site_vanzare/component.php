<?php


function component($name, $price, $img){
    $element = "
	<figure class=\"col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item\">
         <a href=\"#\">
          <div class=\"tm-gallery-item-overlay\">
               <img src=\"$img\" alt=\"Image\" class=\"img-fluid tm-img-center\">
           </div>
            <p class=\"tm-figcaption\">$name</p>
			
			<p class=\"tm-figcaption\">$price lei</p>
			<div class=\"cart-action\"><input type=\"text\" class=\"product-quantity\" name=\"quantity\" value=\"1\" size=\"2\" /><input type=\"submit\" value=\"Adaugă în coș\" class=\"btnAddAction\" /></div>
         </a>
    </figure>
	
    ";
    echo $element;
}

