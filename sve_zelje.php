<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: black">
    <table class="table table-dark table-bordered table-striped table-hover">   
        <tr> 
            <th class="text-center"> Ime </th>
            <th class="text-center"> Prezime </th>
            <th class="text-center"> Grad </th>
            <th class="text-center"> Da li je bio dobar/a? </th>
            <th class="text-center"> Zelje </th>
        </tr>
</body>
</html>

<?php

   $folder = "./zelje_db";
   $files = scandir($folder);
   

  $novi = array_slice($files, 2);
  foreach($novi as $file)
  {
      $a = fopen($folder."/".$file, "r");
      while(! feof($a)) {
        $line = fgets($a);
        $json=json_decode($line);
        echo "
                <tr> 
                    <td class='text-center'> $json->ime </td>
                    <td class='text-center'> $json->prezime </td>
                    <td class='text-center'> $json->izabrano </td>
                    <td class='text-center'> $json->da_ne </td>
                    <td class='text-center'> $json->zelje </td>
                </tr>
             ";
      }
      
      fclose($a);
  }
?>