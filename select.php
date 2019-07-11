<?php
include('functions.php');

//DB接続
$pdo = connectToDb();

//データ表示SQL作成
// $sql = 'SELECT * FROM HIP_TAKE_HIP ORDER BY id limit 1';
$sql = 'SELECT * FROM HIP_TAKE_HIP ORDER BY indate ASC';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//データ表示
if ($status == false) {
  showSqlErrorMsg($stmt);
} else {
  $view = ''; //白紙に戻るって感じリセットする意味
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $view .= '<li class="list-group-item" align="center">';
    $view .= '<p>（'  . $result['Uname'] . '）　　' . $result['beforename'] . '→→→' . $result['NOWname'] .  '</p>';
    // imgタグで出力しよう！
    $view .= '<img src="' . $result['image'] . '" alt"" width="250px" margin="auto">';
    // $view .= '<p>' . $result['Uname'] . '</p>';
    // $view .= '<div><a href="detail.php?id=' . $result['id'] . '" class="badge badge-primary">Edit</a>';
    // $view .= '<a href="delete.php?id=' . $result['id'] . '" class="badge badge-danger">Delete</a></div>';
    $view .= '</li>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HIP! TAKE! HIP!</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="css/my.css">
  <link href="https://fonts.googleapis.com/css?family=Barlow:700,700i|M+PLUS+1p&display=swap" rel="stylesheet">
  <style>
    div {
      padding: 0px 10px;
      font-size: 16px;
    }

    .SSS {
      font-size: 95px;
      font-family: 'Barlow', sans-serif;
      text-align: center;
      color: #006400;
      padding: 0px 0px 0px 0px;
    }

    .YYY {
      font-size: 30px;
      font-family: 'Barlow', sans-serif;
      text-align: center;
      color: #006400;
      padding: 0px 0px 0px 0px;
      margin: 10px 0px 10px 0px;
    }
  </style>
</head>

<body class="body">

  <h1 class="SSS">
    HIP! TAKE! HIP!</h1>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light ">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">しりとり登録</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="select.php">いままでしりとり一覧</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div>
    <ul class="list-group">
      <ul class="YYY">
        <a href="#under">GO!NOW! HIP!TAKE!HIP! </a>
      </ul>
  </div>
  <?= $view ?>
  </ul>
  </div>
  <div id="under">
    <ul class="YYY">
      <a href="index.php">NEXT! HIP! TAKE! HIP!</a>
    </ul>
  </div>
</body>

</html>