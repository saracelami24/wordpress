<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <style>
    .container {
      max-width: 350px;
      margin: 50px auto;
      text-align: center;
    }

    input[type="submit"] {
      margin-bottom: 20px;
    }

    .select-block {
      width: 300px;
      margin: 110px auto 30px;
      position: relative;
    }

    select {
      width: 100%;
      height: 50px;
      font-size: 100%;
      font-weight: bold;
      cursor: pointer;
      border-radius: 0;
      background-color: #f0ffff;
      border: none;
      border: 2px solid #1A33FF;
      border-radius: 4px;
      color: black;
      appearance: none;
      padding: 8px 38px 10px 18px;
      -webkit-appearance: none;
      -moz-appearance: none;
      transition: color 0.3s ease, background-color 0.3s ease, border-bottom-color 0.3s ease;
    }

    /* For IE <= 11 */
    select::-ms-expand {
      display: none;
    }

    .selectIcon {
      top: 7px;
      right: 15px;
      width: 30px;
      height: 36px;
      padding-left: 5px;
      pointer-events: none;
      position: absolute;
      transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .selectIcon svg.icon {
      transition: fill 0.3s ease;
      fill: white;
    }

    select:hover,
    select:focus {
      color: #000000;
      background-color: white;
    }

    select:hover~.selectIcon,
    select:focus~.selectIcon {
      background-color: white;
    }

    select:hover~.selectIcon svg.icon,
    select:focus~.selectIcon svg.icon {
      fill: #1A33FF;
    }
  </style>
</head>

<body>

  <div class="container mt-5">


<form method="POST">
    <select name="Star" value="Star">
        <option selected="selected" disabled="disabled">Select a Starship</option>

<?php
 
/**
 
 * @package Sara
 
 */
 
/*
 
Plugin Name: Star Wars

Author: Sara

*/




$api_url = 'https://swapi.dev/api/starships';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// All user data exists in 'results' object
$starships = $response_data->results;

// Cut long data into small & select only first 10 records
$starships = array_slice($starships, 0, 10);

// Traverse array and display starships
foreach ($starships as $name) {

    echo "<option value='$name->name'>$name->name</option>";
	echo "<br />";
    echo "<br />";
	

}

    
?>

</select>
<br>


<input type="submit" name="submit" value="submit">
<br>
<?php
if(isset($_POST['submit'])){  
    if(!empty($_POST['Star'])) {  
        $selected = $_POST['Star'];  
        echo 'You have chosen: ' . $selected;  
    } else {  
        echo 'Please select the value.';  
    }  
    }  
?>

</form>

</div>

</body>

</html>


