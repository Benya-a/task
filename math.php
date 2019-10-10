<?php

session_start();

echo "Inserted number: " . $_POST['number'] . "<br>";
echo "Operation type: " . $_POST['math'] . "<br>";
echo "Filename: " . $_SESSION['filename'] . "<br>";

$extraction = file_get_contents($_SESSION['filename']);

$all_numbers = preg_replace('/\s+/', ' : ', $extraction);
echo "<strong>Numbers from file:</strong> <br>" . $all_numbers . "<br>";

$numbers = explode(" : ", $all_numbers);

echo "<strong>Math operation results:</strong><br>";

foreach ($numbers as $value) {

  $value =  intval($value);

  switch($_POST['math']){
      case '+':
          $result = $value + $_POST['number'];
          break;
      case '-':
          $result = $value - $_POST['number'];
          break;
      case '*':
          $result = $value * $_POST['number'];
          break;
      case '/':
          $result = $value / $_POST['number'];
          break;
      default:
          $result = 'undefined operation';
          break;
  }

  if ($result > 0) {

    $file = 'results/positive.txt';
    $current = file_put_contents($file, "$result\n", FILE_APPEND);

  } else {

    $file = 'results/negative.txt';
    $current = file_put_contents($file, "$result\n", FILE_APPEND);

  }

  echo $result  . " : ";

}


?>
