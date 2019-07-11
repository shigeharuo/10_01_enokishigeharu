<?php
include('functions.php');

//DB接続
$pdo = connectToDb();

//データ表示SQL作成
$sql = 'SELECT * FROM HIP_TAKE_HIP ORDER BY id DESC limit 1';
// $sql = 'SELECT * FROM HIP_TAKE_HIP ORDER BY indate DESC';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//データ表示
if ($status == false) {
    showSqlErrorMsg($stmt);
} else {
    $view = ''; //白紙に戻るって感じリセットする意味
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<li class="list-group-item" align="center">';
        // $view .= '<p> このイラストのしりとりワードは？？ →→→ 次のしりとって！</p>';
        // imgタグで出力しよう！
        $view .= '<img src="' . $result['image'] . '" alt="" width="400px" >';
        $view .= '<p>ヒント:' . $result['comment'] . '</p>';
        $view .= '</li></br>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HIP! TAKE! HIP!</title>
    <link rel="stylesheet" href="css/my.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

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
            pa: 0px 0px 0px 10px;
        }

        .YYY {
            font-size: 30px;
            font-family: 'Barlow', sans-serif;
            text-align: center;
            color: #006400;
            padding: 0px 0px 0px 0px;
            margin: 0px 0px 0px 0px;
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

    <!-- 必要な属性を追加 -->
    <div class="toptext"> このイラストのしりとりワードは？？ →→→ 次のしりとって！</div>
    <?= $view ?>
    <form method="post" action="insert_file.php" enctype="multipart/form-data">

        <div class="form-group">
            <label for="task">このイメージのしりとりワードはなに？？</label>
            <input type="text" class="form-control" id="beforename" name="beforename" placeholder="このしりとりワードを入力">
        </div>
        <div class="form-group">
            <label for="upfile">しりとりイメージ</label>

            <!-- input type="file"を追記 -->
            <input type="file" name="upfile" accept="image/*" capture="camera">
            <!-- inputを追加 -->
        </div>
        <div class="form-group">
            <label for="task">今回のしりとりワード</label>
            <input type="text" class="form-control" id="NOWname" name="NOWname" placeholder="今回のしりとりワードをいれて！">
        </div>
        <div class="form-group">
            <label for="comment">ヒント（次の人にヒント入れて！）</label>
            <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="しりとりワードのヒントをちょうだい！"></textarea>
        </div>
        <div class="form-group">
            <label for="task">ニックネーム</label>
            <input type="text" class="form-control" id="Uname" name="Uname" placeholder="あなたの名前をおしえて！">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">しりとりアタック</button>
        </div>
    </form>

</body>

</html>