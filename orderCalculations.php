<?php
   // Assign values to constants
   // tax rate
   define('TAX_RATE', 0.13);
   // Burrito sizes (price)
   define('SMALL', 8.9);
   define('MEDIUM', 10.9);
   define('LARGE', 12.9);
   // Drink sizes (price)
   define('SMALL_DRINK', 3.59);
   define('MEDIUM_DRINK', 4.59);
   define('LARGE_DRINK', 6.59);
   // Topping prices
   define('MEAT_PRICE', 2.22);
   define('CILANTRO_PRICE', 0.77);
   define('LETTUCE_PRICE', 0.77);
   define('CHEESE_PRICE', 1.05);
   define('PEPPER_PRICE', 1.11);
   define('GUACAMOLE_PRICE', 1.25);

   // Function to get the subtotal of the entire order
   // Set subtotal to 0
   function getSubTotal($POST) {
     $subtotal = 0;
     // Determine if variable is set (burrito size), then get size of burrito if it is
     if(isset($POST['sizeBurrito']) )
     {
       if ( $POST['sizeBurrito'] == "small") {
       // if the burrito is small, add the price of a small burrito to the subtotal 
           $subtotal = $subtotal + SMALL;
       } elseif ( $POST['sizeBurrito'] == "medium") {
       // if the burrito is medium, add the price of a medium burrito to the subtotal 
           $subtotal = $subtotal + MEDIUM;
       } elseif ( $POST['sizeBurrito'] == "large") {
       // if the burrito is large, add the price of a large burrito to the subtotal 
           $subtotal = $subtotal + LARGE;
       }
     }
     // If variable is set and equal to yes, add price of topping
     if(isset($POST['meat']) && $POST['meat'] == 'Yes')
     {
         // Add meat price
         $subtotal = $subtotal + MEAT_PRICE;
     }
     // If variable is set and equal to yes, add price of topping
     if(isset($POST['Cilantro']) && $POST['Cilantro'] == 'Yes')
     {
        // Add cilantro price
         $subtotal = $subtotal + CILANTRO_PRICE;
     }
     // If variable is set and equal to yes, add price of topping
     if(isset($POST['Lettuce']) && $POST['Lettuce'] == 'Yes')
     {
         // Add lettuce price
         $subtotal = $subtotal + LETTUCE_PRICE;
     }
     // If variable is set and equal to yes, add price of topping
     if(isset($POST['Cheddar-Cheese']) && $POST['Cheddar-Cheese'] == 'Yes')
     {
         // Add cheese price
         $subtotal = $subtotal + CHEESE_PRICE;
     }
     // If variable is set and equal to yes, add price of topping
     if(isset($POST['Bell-Pepper']) && $POST['Bell-Pepper'] == 'Yes')
     {
        // Add pepper price
         $subtotal = $subtotal + PEPPER_PRICE;
     }
     // If variable is set and equal to yes, add price of topping
     if(isset($POST['Guacamole']) && $POST['Guacamole'] == 'Yes')
     {
         // Add guacamole price
         $subtotal = $subtotal + GUACAMOLE_PRICE;
     }
    
     // Determine if variable is set (drink size), then get size of drink if it is
     if(isset($POST['sizeDrink']) )
     {
         $drinkSize = $POST['sizeDrink'];
       if ($drinkSize == "small") {
           // if the drink size is small, add the price of a small drink to the subtotal 
           $subtotal = $subtotal + SMALL_DRINK;
       } elseif ($drinkSize == "medium") {
           // if the drink size is medium, add the price of a medium drink to the subtotal 
           $subtotal = $subtotal + MEDIUM_DRINK;
       } elseif ($drinkSize == "large") {
           // if the drink size is large, add the price of a large drink to the subtotal 
           $subtotal = $subtotal + LARGE_DRINK;
       }
     }
     // Return the cost of the subtotal
     return $subtotal;
   }
   
   function getTax($subtotal) {
     // Return the cost of the tax
     return $subtotal * TAX_RATE;
   }
   
   function getTotal($subtotal) {
     // Return the cost of the total
     return $subtotal + getTax($subtotal);
   }
   
   // Function for the overall summary of the order
   function getOrderSummary($POST) {
     $orderSummary = "Order: ";
     
     // Determine if variable is set (burrito size), then update the order summary
     if(isset($POST['sizeBurrito']) )
     {
       if ($POST['sizeBurrito'] == "small") {
           // Update order summary to display that user ordered a small burrito
           $orderSummary = $orderSummary . "<br><b>Small Burrito ___________ $" . number_format(SMALL, 2) . "</b>";
       } elseif ($POST['sizeBurrito'] == "medium") {
           // Update order summary to display that user ordered a medium burrito
           $orderSummary = $orderSummary = $orderSummary . "<br><b>Medium Burrito _________ $" . number_format(MEDIUM, 2) . "</b>";
       } elseif ($POST['sizeBurrito'] == "large") {
           // Update order summary to display that user ordered a large burrito
           $orderSummary = $orderSummary = $orderSummary . "<br><b>Large Burrito __________ $" . number_format(LARGE, 2) . "</b>";
       }
     }
     // If variable (meat) is set and equal to yes, add it to the order summary
     if(isset($POST['meat']) && $POST['meat'] == 'Yes')
     {
         $orderSummary = $orderSummary . "<br>  - Meat (Chicken/Beef) _ + $" . number_format(MEAT_PRICE, 2);
     }
     // If variable (cilantro) is set and equal to yes, add it to the order summary
     if(isset($POST['Cilantro']) && $POST['Cilantro'] == 'Yes')
     {
         $orderSummary = $orderSummary . "<br>  - Cilantro ____________ + $" . number_format(CILANTRO_PRICE, 2);
     }
     // If variable (lettuce) is set and equal to yes, add it to the order summary
     if(isset($POST['Lettuce']) && $POST['Lettuce'] == 'Yes')
     {
         $orderSummary = $orderSummary . "<br>  - Lettuce _____________ + $" . number_format(LETTUCE_PRICE, 2);
     }
     // If variable (cheese) is set and equal to yes, add it to the order summary
     if(isset($POST['Cheddar-Cheese']) && $POST['Cheddar-Cheese'] == 'Yes')
     {
         $orderSummary = $orderSummary . "<br>  - Cheddar Cheese ______ + $" . number_format(CHEESE_PRICE, 2);
     }
     // If variable (pepper) is set and equal to yes, add it to the order summary
     if(isset($POST['Bell-Pepper']) && $POST['Bell-Pepper'] == 'Yes')
     {
         $orderSummary = $orderSummary . "<br>  - Bell Pepper _________ + $" . number_format(PEPPER_PRICE, 2);
     }
     // If variable (guacamole) is set and equal to yes, add it to the order summary
     if(isset($POST['Guacamole']) && $POST['Guacamole'] == 'Yes')
     {
         $orderSummary = $orderSummary . "<br>  - Guacamole ___________ + $" . number_format(GUACAMOLE_PRICE, 2);
     }
    
     // Determine if variable is set (burrito size), then update the order summary
     if(isset($POST['sizeDrink']) )
     {
       $drinkSize = $POST['sizeDrink'];
       if ($drinkSize == "small") {
           // Update order summary to display that user ordered a small drink
           $orderSummary = $orderSummary . "<br><b>Small Drink _____________ $" . number_format(SMALL_DRINK, 2) . "</b>";
       } elseif ($drinkSize == "medium") {
           // Update order summary to display that user ordered a medium drink
           $orderSummary = $orderSummary . "<br><b>Medium Drink ____________ $" . number_format(MEDIUM_DRINK, 2) . "</b>";
       } elseif ($drinkSize == "large") {
           // Update order summary to display that user ordered a large drink
           $orderSummary = $orderSummary . "<br><b>Large Drink _____________ $" . number_format(LARGE_DRINK, 2) . "</b>";
       } else {
           // Update order summary to display that user ordered no drink
           $orderSummary = $orderSummary . "<br><b>No Drink</b>";
       }
     }
     // Display subtotal
     $orderSummary = $orderSummary . "<br><br>__Subtotal : $" . number_format(getSubTotal($POST), 2);
     // Display tax
     $orderSummary = $orderSummary . "<br>_______Tax : $" . number_format(getTax(getSubTotal($POST)), 2);
     // Display total
     $orderSummary = $orderSummary . "<br>_____Total : $" . number_format(getTotal(getSubTotal($POST)), 2);
     // Return all of the prices for subtotal, tax, and total
     return $orderSummary;
   }
   ?>