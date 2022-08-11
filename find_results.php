<?php
session_start();
date_default_timezone_set('Asia/Taipei');
// print_r($_POST);
$dsn = "mysql:host=localhost;charset=utf8;dbname=api_homework";
$pdo = new PDO($dsn, 'root', 'root');
// $dsn = "mysql:host=localhost;charset=utf8;dbname=s1110222";
// $pdo = new PDO($dsn, 'root', 'root');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Hejie.com</title>
  <link rel="stylesheet" href="./style.css">
  <style>
    .card-container {
      display: flex;
      flex-wrap: wrap;
    }

    /* body {
      background: white;
    } */
  </style>
</head>


<body>
  <h1><?php print("你查詢的區域為： " . $_POST['Region'] . " " . $_POST['Town']); ?></h1>
  <button onclick="location.href='./index.html'">重新查詢</button>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script src="./menu.js"></script>

  <div class="card-container">
    <?php
    $sql = "select Id, Name, Address, Picture1, LowestPrice, CeilingPrice, Tel from hotel where Region = '{$_POST['Region']}' and Town = '{$_POST['Town']}'";
    $results = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $result) {
    ?>
      <!-- <div class="card glass" onmouseover="cardHover1()" onmouseout="mouseOut()"> -->
      <div class="card glass" onmouseover="cardHover1()" onmouseout="mouseOut()">
        <div class="card-content">
          <h2><?php print($result['Name']); ?></h2>
          <p>價格： <?php print($result['LowestPrice'] . "~" . $result['CeilingPrice']); ?></p>
          <p>電話： <?php print($result['Tel']); ?></p><br>
          <p><?php print($result['Address']); ?></p><br>
          <!-- Button trigger modal -->
          <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            View
          </button> -->

          <!-- Modal -->
          <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  1111111111111111
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div> -->
          <button>View</button>
          <!-- <div class="modal-dialog modal-dialog-scrollable" id="detail">
            123
          </div> -->
        </div>
        <!-- <div class="image shadow" style="background-image: url('https://images.unsplash.com/photo-1549180030-48bf079fb38a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=654&q=80');"> -->
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





        <!-- <div class="card glass" onmouseover="cardHover1()" onmouseout="mouseOut()">
      <div class="card-content">
        <h2>Sydney</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
        <button>View</button>
      </div>
      <div class="image shadow" style="background-image: url('https://images.unsplash.com/photo-1549180030-48bf079fb38a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=654&q=80');">
      </div>
    </div> -->












        <!-- <div class="card glass" onmouseover="cardHover2()" onmouseout="mouseOut()">
      <div class="card-content">
        <h2>Tokyo</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
        <button>View</button>
      </div>
      <div class="image shadow" style="background-image: url('https://images.unsplash.com/photo-1536098561742-ca998e48cbcc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1072&q=80');">
      </div>
    </div> -->
        <!-- <div class="card glass" onmouseover="cardHover3()" onmouseout="mouseOut()">
      <div class="card-content">
        <h2>New York</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
        <button>View</button>
      </div>
      <div class="image shadow" style="background-image: url('https://images.unsplash.com/photo-1518798495352-92ac911fc5fe?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80');">
      </div>
    </div>
    <div class="card glass" onmouseover="cardHover3()" onmouseout="mouseOut()">
      <div class="card-content">
        <h2>New York</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
        <button>View</button>
      </div>
      <div class="image shadow" style="background-image: url('https://images.unsplash.com/photo-1518798495352-92ac911fc5fe?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80');">
      </div>
    </div>
    <div class="card glass" onmouseover="cardHover3()" onmouseout="mouseOut()">
      <div class="card-content">
        <h2>New York</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
        <button>View</button>
      </div>
      <div class="image shadow" style="background-image: url('https://images.unsplash.com/photo-1518798495352-92ac911fc5fe?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80');">
      </div>
    </div>
    <div class="card glass" onmouseover="cardHover3()" onmouseout="mouseOut()">
      <div class="card-content">
        <h2>New York</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
        <button>View</button>
      </div>
      <div class="image shadow" style="background-image: url('https://images.unsplash.com/photo-1518798495352-92ac911fc5fe?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80');">
      </div>
    </div> -->
      </div>

      <!-- partial -->
      <script src="./script.js"></script>

</body>

</html>