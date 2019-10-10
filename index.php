<?php

session_start();

$filename = $_POST['filename'];
$_SESSION['filename'] = $filename;

if ($_POST['filename'] == '') {

  include('includes/form.html');

} else if (isset($_POST['filename'])) {

  $extraction = file_get_contents($_POST['filename']);

    if ($extraction == '') {

      echo 'File is not found';

    } else {

      echo "File name is " . $_POST['filename'] . "<br>";
      echo "Values are: " . $extraction . "<br>";
      include('includes/math.html');

  }

}

?>
