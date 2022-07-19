<?php
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LB2</title>
    <script>
      function getAuthor(){
      let out = document.getElementById('author').value;
      let res = localStorage.getItem(out);
      document.getElementById('result').innerHTML = res;
    }
    function getPublisher(){
      let out = document.getElementById('publisher').value;
      let res = localStorage.getItem(out);
      document.getElementById('result').innerHTML = res;
    }
    function getYear(){
      let out = document.getElementById('FYear').value;
      out += document.getElementById('SYear').value;
      let res = localStorage.getItem(out);
      document.getElementById('result').innerHTML = res;
    }
    </script>
</head>
<body>
<div">
<form action="authors.php" method="post">
      <label>Выберите имя автора:</label>
      <select name='author' id='author' onchange onclick="getAuthor()">
        <?php
          $coll=$tbl->find(["type"=>"book"],["projection"=>["_id"=>0,"authors" => 1]]);
          foreach ($coll as $col) {
            $nam=$col['authors'];
            var_dump($col);
            print "<option value = '$nam'>$nam</option>";
          }
        ?>
      </select>
      <br>
      <input type="submit" value="Отправить" >
    </form>
    <br>
    <form action="year.php" method="post">
      <label>Введите временной период (в годах):</label>
      C <input style="width: 50px;" name='FYear' id='FYear' onchange = "getYear()"></input>
      ПО <input style="width: 50px;" name='SYear' id='SYear' onchange = "getYear()"></input>
      <br>
      <input type="submit" value="Отправить">
    </form>
    <br>
    <form action="publisher.php" method="post">
      <label>Выберите издательство:</label>
      <select name = 'publisher' id = 'publisher' onchange onclick = "getPublisher()" >
        <?php
         $coll=$tbl->find(["publisher"=>['$exists'=>true]]);
          
         foreach ($coll as $col) {
           $nam=$col['publisher'];
           var_dump($col);
           print "<option value = '$nam'>$nam</option>";
         }
        ?>
      </select>
      <br>
      <input type="submit" value="Отправить">
    </form>
  </div>
  <div>
    <table border='2' id='result'></table>
  </div>
 </body>
</html>
