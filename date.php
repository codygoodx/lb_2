<?php
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
   $fyear = $_POST['FYear'];
   $syear = $_POST['SYear'];
  print "<table border ='2'>";
  $yearStorage= " <tr><th>Name</th><th>Year</th><th>Type</th></tr>";
    $coll=$tbl->find(["year"=>['$gte' => (int)$fyear,'$lte' => (int)$syear]]);
          
    foreach ($coll as $col) {
      $nam=$col['name'];
      $yea=$col['year'];
      $type=$col['type'];
      $yearStorage=$yearStorage." <tr><td>$nam</td><td>$yea</td><td>$type</td></tr>";
    }
    print $yearStorage;
    $year=$fyear.$syear;
    print"<script>localStorage.setItem('$year','$yearStorage')</script>";
    
?>
</body>
</html>
