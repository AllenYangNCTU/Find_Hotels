<?php
session_start();
date_default_timezone_set('Asia/Taipei');
// print_r($_POST);
$dsn = "mysql:host=localhost;charset=utf8;dbname=api_homework";
$pdo = new PDO($dsn, 'root', 'root');
// $dsn="mysql:host=localhost;charset=utf8;dbname=s1110222";
// $pdo=new PDO($dsn,'s1110222','s1110222');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Hejie.com</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .card-container {
      display: flex;
      flex-wrap: wrap;
      margin-top: 50px;
      height: 100vh;
      overflow: scroll;
    }

    .modal_carousel {
      width: 80%;
      overflow: scroll;
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
      /* margin: 10px auto; */
    }
  </style>
</head>



<body>
  <!-- <div style="position:fixed;"> -->
  <div>

    <h1><?php print("你查詢的區域為： " . $_POST['Region'] . " " . $_POST['Town']); ?></h1>
    <button onclick="location.href='./index.html'">重新查詢</button>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script src="./menu.js"></script>

  <div class="card-container">
    <?php
    $sql = "select Id, Name, Address, Picture1, LowestPrice, CeilingPrice, Tel from hotel where Region = '{$_POST['Region']}' and Town = '{$_POST['Town']}'";
    $results = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $id = [];
    foreach ($results as $key => $result) {
      $id[$key] = $result['Id'];
    ?>
      <!-- <div class="card glass" onmouseover="cardHover1()" onmouseout="mouseOut()"> -->
      <div class="card glass" onmouseover="cardHover1()" onmouseout="mouseOut()">
        <div class="card-content">
          <h2><?php print($result['Name']); ?></h2>
          <p>價格： <?php print($result['LowestPrice'] . "~" . $result['CeilingPrice']); ?></p>
          <p>電話： <?php print($result['Tel']); ?></p><br>
          <p><?php print($result['Address']); ?></p><br>
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">View</button>
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">旅館名稱</h4>
                </div>
                <div class="modal-body">
                  <div class="modal_carousel">
                    <div>
                      <p>描述</p>
                      <p>地址</p>
                      <p>電話</p>
                      <p>電子信箱</p>
                      <p>停車資訊</p>
                      <p>服務項目</p>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        if ($result['Picture1'] == "") {
        ?>
          <div class="image shadow" style="background-image: url('https://images.unsplash.com/photo-1549180030-48bf079fb38a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=654&q=80');">
          <?php
        } else {
          ?>
            <div class="image shadow" style="background-image: url('<?php print($result['Picture1']); ?>');">
            <?php
          }
            ?>
            </div>
          </div>
        <?php
      }
        ?>
      </div>
      <script src="./script.js"></script>

</body>

</html>