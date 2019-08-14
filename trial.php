<?php
 $sizes = array("Large", "Medium", "Small");
 $size_prices = array("Large" => "1200", "Medium" => "700",
                      "Small" => "600");
 $topping_prices = array("Large" => "125", "Medium" => "100",
                         "Small" => "75");
 $toppings = array("pepperoni" => "Pepperoni",
                   "sausage" => "Italian Sausage",
                   "peppers" => "Green Bell Peppers",
		   "onions" => "Onions",
		   "olives" => "Black Olives",
		   "mushrooms" => "Mushrooms",
		   "anchovy" => "Anchovy");

 if (isset($_POST["order"]))
 {
   confirmPage ($sizes, $size_prices, $topping_prices, $toppings);
 }
 elseif (isset($_POST["confirm"]))
 {
   thanksPage();
 }
 else
 {
    orderForm ($sizes, $size_prices, $topping_prices, $toppings);
 }

#######################################################################

 function orderForm ($sizes, $size_prices, $topping_prices, $toppings)
 {
  $script = $_SERVER['PHP_SELF'];
  print <<<TOP
  <html>
  <head>
  <title> Pizza Order Form </title>
  <link rel="stylesheet" href="trial.css">
  </head>
  <body>
  
  <h3> Pizza Order Form </h3>
  <form method = "post" action = "$script">
  <table border = "1" >
    <tr><td><b>Select Size</b></td><td><b>Select Toppings</b></td></tr>
    <tr><td>
TOP;

  $len = sizeof($sizes);
  for ($i = 0; $i < $len; $i++)
  {
    $size = $sizes[$i];
    if ($size == "Large")
    {
      $checked = 'checked = "checked"';
    }
    else
    {
      $checked = "";
    }
    print <<<SIZE
    <input type = "radio" name = "size" value = "$size" $checked />
    <b> $size </b><br />
    Base Price: Kshs $size_prices[$size] <br />
    Each Topping: Kshs $topping_prices[$size] <br /><br />
SIZE;
  }
  print "</td><td>";

  foreach ($toppings as $key => $val)
  {
    print <<<TOPPING
    <input type = "checkbox" name = "top[]" value = "$key" />
    $val <br /><br />
TOPPING;
  }
  print "</td></tr>\n";

  print <<<BOTTOM
  <tr>
  <td><input type = "submit" name = "order" value = "Submit Order" /></td>
  <td><input type = "reset" value = "Reset" /></td>
  </tr>
  </table>
  </form>
  </body>
  </html>
BOTTOM;
  }

#######################################################################

  function confirmPage ($sizes, $size_prices, $topping_prices, $toppings)

  {
    $size = $_POST["size"];
    $script = $_SERVER['PHP_SELF'];
    print <<<PAGE2_TOP
    <html>
    <head>
    <title> Confirm Order </title>
    <link rel="stylesheet" href="master.css">
    </head>
    <body>
    <p>
    You ordered a <b>$size</b> pizza.
    </p>
PAGE2_TOP;

    $total = (float)$size_prices[$size];
    if (isset($_POST["top"]))
    {
      $priceTopping = (float)$topping_prices[$size];
      $top = $_POST["top"];
      print "<p> With the following toppings: </p> \n";
      print "<ul>";
      foreach ($top as $key => $val)
      {
        print "<li>";
        print $val;
	print "</li>";
	$total += $priceTopping;
      }
      print "</ul>";
    }
    $totalCost = sprintf ("%.2f", $total);
    print <<<PAGE2_BOTTOM
    <p>
    Total cost: $totalCost <br /><br />
    Please confirm.
    </p>
    <p>
    <form method = "post" action = "$script">
    <input type = "submit" name = "confirm" value = "Confirm Order" />
    </form>
    </p>
    </body>
    </html>
PAGE2_BOTTOM;
  }

#######################################################################

  function thanksPage()
  {
    print <<<PAGE3
    <html>
    <head>
    <title> Place Order </title>
    <link rel="stylesheet" href="master.css">
    </head>
    <body>
    <h2>
      Thank You for your Order.
    </h2>
    </body>
    </html>
PAGE3;
  }
?>
