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
if (isset($_POST['author'])) $author = $_POST['author'];
  else $author = 'Rustam';

  print "<table border='2'>";
    $AuthorStorage = " <tr><th>Name</th><th>ISBN</th><th>Year</th><th>Publisher</th><th>Quantity</th></tr>";

    $coll=$tbl->find(["authors"=>$author],["projection"=>["_id"=>0]]);
          
    foreach ($coll as $col) {
      $nam=$col['name'];
      $isb=$col['ISBN'];
      $yea=$col['year'];
      $pub=$col['publisher'];
      $qua=$col['quantity'];
      $AuthorStorage=$AuthorStorage." <tr><td>$nam</td><td>$isb</td><td>$yea</td><td>$pub</td><td>$qua</td></tr>";
     
    }
    print $AuthorStorage;
    print"<script>localStorage.setItem('$author','$AuthorStorage')</script>";
?>
</body>
</html>
