<!DOCTYPE html>
<html lang="en-ca">
   <head>
      <!-- Metadata -->
      <meta charset="utf-8" />
      <meta name="description" content="Assign-04-HTML-FoodOrder" />
      <meta name="keywords" content="immaculata, ics2o" />
      <meta name="author" content="Marcus Wehbi" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <!-- Link for Favicon -->
      <link rel="icon" href="./fav_index/favicon.ico">
      <link rel="manifest" href="./fav_index/site.webmanifest">
      <!-- Material Design Lite -->
      <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
      <!-- Link for Stylesheet -->
      <link rel="stylesheet" href="./css/style.css" />
      <!-- Webpage title -->
      <title>Burrito Broz</title>
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
      <!-- Material Design icon font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   </head>
   <body>
      <!-- php echo to print the html to the page / including the php file -->
      <?php include './orderCalculations.php';?>
      <h1>Burrito Broz</h1>
      <h2>Order a Burrito</h2>
      <!-- Form to retrieve information (the size of burrito the user wants, the toppings the user wants, and the drink size hte user wants if they want one) -->
      <form method="post">
         <p>Please select the <i>Size</i> of Burrito you want.</p>
         <!-- Dropdown select element to get size of burrito that the user wants -->
         <select name="sizeBurrito" id="sizeBurrito">
            <option value="">--Order Burrito Size--</option>
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="large">Large</option>
         </select>
         <br><br><br>
         <p>Please select the <i>Toppings</i> you want on your Burrito.</p>
         <!-- Multiple checkboxes for each topping available that the user can choose from -->
         <input type="checkbox" id="meat" name="meat" value="Yes">
         <label for="Meat">Meat (Chicken/Beef)</label><br>
         <input type="checkbox" id="Cilantro" name="Cilantro" value="Yes">
         <label for="Cilantro">Cilantro</label><br>
         <input type="checkbox" id="Lettuce" name="Lettuce" value="Yes">
         <label for="Lettuce">Lettuce</label><br>
         <input type="checkbox" id="Cheddar-Cheese" name="Cheddar-Cheese" value="Yes">
         <label for="Cheddar Cheese">Cheddar Cheese</label><br>
         <input type="checkbox" id="Bell-Pepper" name="Bell-Pepper" value="Yes">
         <label for="Bell Pepper">Bell Pepper</label><br>
         <input type="checkbox" id="Guacamole" name="Guacamole" value="Yes">
         <label for="Guacamole">Guacamole</label><br>
         <br>
         <p><i>Side Order? (Drink)</i></p>
         <br>
         <!-- Dropdown menu for drink size or no drink -->
         <select name="sizeDrink" id="sizeDrink">
            <option value="">--Order Drink Size--</option>
            <option value="noDrink">No Drink</option>
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="large">Large</option>
         </select>
         <br><br><br>
         <!-- Submit/order button -->
         <input type="submit" value="Order">
      </form>
      <br>
      <?php
      // Example taking from PHP form validation example on W3 schools and modified appropriately
         // define variables 
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
           $orderSubTotal = getSubTotal($_POST);
           $orderTax = getTax($orderSubTotal);
           $orderTotal = getTotal($orderSubTotal);
           $orderSummary = getOrderSummary($_POST);
           // echo to print to page the order summary, subtotal, tax, and total
           echo "<h4>" . $orderSummary . "</h4>";
           echo "<p>The order's subtotal is $" . round($orderSubTotal, 2) . ".</p>";
           echo "<p>The order's tax is $" . round($orderTax, 2) . ".</p>";
           echo "<p>The order will cost $" . round($orderTotal, 2) . ".</p>";          
         }
         ?>
      <!-- Area for text and images -->
      <h3>Thank you for ordering a Burrito. We hope you enjoy and come again to <i><b>Burrito Broz</b></i></h3>
      <!-- Image of burrito being made -->
      <center><img src="./images/bbm2.jpeg" alt="burrito-being-made" style="width:50%" style="max-height:20%"></center>
      <h3>Here is your Burrito!</h3>
      <!-- Image of final burrito -->
      <center><img src="./images/bo2.jpeg" alt="burrito-product" style="width:40%" style="max-height:20%"></center>
      <br><br><br>
      <h3>As you eat your <i>Burrito</i>, learn about what is in it, and why it is a great meal!</h3>
      <center>
         <!-- Table from googles mdl about the ingredients in burritos -->
         <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
            <thead>
               <tr>
                  <th class="mdl-data-table__cell--non-numeric">Ingredients</th>
                  <th>Quantity</th>
                  <th>Healthy?</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="mdl-data-table__cell--non-numeric">Meat</td>
                  <td>100 Calories</td>
                  <td>Lean meats are an excellent source of iron, zinc, and B12, and they are easily absorbed.</td>
               </tr>
               <tr>
                  <td class="mdl-data-table__cell--non-numeric">Plywood (Birch)</td>
                  <td>75 Calories</td>
                  <td>It is high in fibre, iron, folate, and vitamin C. </td>
               </tr>
               <tr>
                  <td class="mdl-data-table__cell--non-numeric">Laminate (Gold on Blue)</td>
                  <td>50 Calories</td>
                  <td>Guacamole is high in monounsaturated fat, which improves brain function and health.</td>
               </tr>
            </tbody>
         </table>
      </center>
      <br><br><br>
      <h3>Now learn why <i><b>Burrito Broz</b></i> started.</h3>
      <!-- Text about the history of Burrito Broz -->
      <h5 style="color:purple;">Growing up, I always loved food that had a vast variety of toppings and ingredients that blend to create tasteful and appetizing foods. At the age of 8, I tried a Burrito for the first time, and it became my favourite food right away. It was then that I decided I wanted to learn how to make them so that I could end up eating them whenever I pleased. After making burrito after burrito, and tasting different kinds, it's safe to say that I became an expert. A few years later, I went to culinary competitions where I would amek my special dish; burrito's. Resulting form the success I had and reviews I got, I officially opened up ... <i><b>Burrito Broz</b></i>. Ten years later, <i><b>Burrito Broz</b></i> is one of the most succesful and popular restaurants in Canada. This is <i><b>Burrito Broz</b></i> story, join the community.</h5>
      <h3>Rate your your time here at Burrito Broz using this slider.</h3>
      <!-- Default Slider from googles mdl -->
      <input class="mdl-slider mdl-js-slider" type="range"
         min="0" max="100" value="0" tabindex="0">
      <br><br><br>
      <!-- Mega footer form googles mdl -->
      <footer class="mdl-mega-footer">
         <div class="mdl-mega-footer__middle-section">
            <div class="mdl-mega-footer__drop-down-section">
               <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
               <h6 class="mdl-mega-footer__heading">Features</h6>
               <ul class="mdl-mega-footer__link-list">
                  <li><a href="#">About</a></li>
                  <li><a href="#">Terms</a></li>
                  <li><a href="#">Partners</a></li>
                  <li><a href="#">Updates</a></li>
               </ul>
            </div>
            <div class="mdl-mega-footer__drop-down-section">
               <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
               <h6 class="mdl-mega-footer__heading">Details</h6>
               <ul class="mdl-mega-footer__link-list">
                  <li><a href="#">Specs</a></li>
                  <li><a href="#">Tools</a></li>
                  <li><a href="#">Resources</a></li>
               </ul>
            </div>
            <div class="mdl-mega-footer__drop-down-section">
               <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
               <h6 class="mdl-mega-footer__heading">Technology</h6>
               <ul class="mdl-mega-footer__link-list">
                  <li><a href="#">How it works</a></li>
                  <li><a href="#">Patterns</a></li>
                  <li><a href="#">Usage</a></li>
                  <li><a href="#">Products</a></li>
                  <li><a href="#">Contracts</a></li>
               </ul>
            </div>
            <div class="mdl-mega-footer__drop-down-section">
               <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
               <h6 class="mdl-mega-footer__heading">FAQ</h6>
               <ul class="mdl-mega-footer__link-list">
                  <li><a href="#">Questions</a></li>
                  <li><a href="#">Answers</a></li>
                  <li><a href="#">Contact us</a></li>
               </ul>
            </div>
         </div>
         <div class="mdl-mega-footer__bottom-section">
            <div class="mdl-logo"><i><b>Burrito Broz</div>
            <ul class="mdl-mega-footer__link-list">
               <li><a href="#">Help</a></li>
               <li><a href="#">Privacy & Terms</a></li>
            </ul>
         </div>
      </footer>
      </center>  
   </body>
</html>