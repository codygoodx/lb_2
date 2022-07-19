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
if (isset($_POST['publisher'])) $author = $_POST['publisher'];
  else $author = 'RANOK';

  print "<table border ='2'>";
  $publisherStorage = " <tr><th>Name</th><th>ISBN</th><th>Year</th><th>Publisher</th><th>Quantity</th></tr>";
    $coll=$tbl->find(["publisher"=>$author],["projection"=>["_id"=>0]]);
      
    foreach ($coll as $col) {
      $nam=$col['name'];
      if (isset($col['ISBN'])) $isb = $col['ISBN'];
        else $isb = '-';
      if (isset($col['year']))$yea=$col['year'];
        else $yea = '-';
      if (isset($col['publisher']))$pub=$col['publisher'];
        else $pub = '-';
      if (isset($col['quantity']))$qua=$col['quantity'];
        else $qua = '-';
        $publisherStorage = $publisherStorage. " <tr><td>$nam</td><td>$isb</td><td>$yea</td><td>$pub</td><td>$qua</td></tr>";
    }
    print $publisherStorage;
    print"<script>localStorage.setItem('$author','$publisherStorage')</script>";
?>
</body>
</html>