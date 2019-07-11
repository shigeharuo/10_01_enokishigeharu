<?php
include('functions.php');
// var_dump($_POST);
// eixt();

// 入力チェック
if (
  !isset($_POST['NOWname']) || $_POST['NOWname'] == '' ||
  !isset($_POST['beforename']) || $_POST['beforename'] == '' ||
  !isset($_POST['comment']) || $_POST['comment'] == '' ||
  !isset($_POST['Uname']) || $_POST['Uname'] == ''
) {
  exit('ParamError');
}

//POSTデータ取得
$comment = $_POST['comment'];
$NOWname = $_POST['NOWname'];
$beforename = $_POST['beforename'];
$Uname = $_POST['Uname'];


// Fileアップロードチェック
if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
  // ファイルをアップロードしたときの処理
  // ①送信ファイルの情報取得
  $uploadedFileName = $_FILES['upfile']['name']; //ファイル名（アップロードファイルのネイムを取って）
  $tmpPathName = $_FILES['upfile']['tmp_name']; //tmpフォルダ（アップロードファイルのtmp_nameを取って）
  $fileDirectoryPath = 'upload/'; //アップロード先


  // ②File名の準備
  $extension = pathinfo($uploadedFileName, PATHINFO_EXTENSION); //手順１ファイルの拡張子の種類を取得．うまく行けば「PNGだけとれる」
  $uniqueName = date('YmdHis') . md5(session_id()) . "." . $extension; //手順２ファイルごとにユニークな名前を作成．（最後に拡張子を追加）
  $fileNameToSave = $fileDirectoryPath . $uniqueName; //手順３ファイルの保存場所をファイル名に追加．（完成！）


  // ③サーバの保存領域に移動&④表示

  if (is_uploaded_file($tmpPathName)) {
    if (move_uploaded_file($tmpPathName, $fileNameToSave)) {
      chmod($fileNameToSave, 0644); // 権限の変更
    } else {
      exit('保存に失敗しました');
    }
  } else {
    // ファイルをアップしていないときの処理
    exit('画像があがってないです');
  }
} else {
  // ファイルをアップしていないときの処理
  exit('画像が送信されていません');
}



// DB接続
$pdo = connectToDb();

// データ登録SQL作成
// imageカラムとバインド変数を追加
$sql = 'INSERT INTO HIP_TAKE_HIP(id, image, comment, Uname, NOWname, beforename, UP, DOWN, indate)
VALUES(NULL, :image,:a1, :a2, :a3, :a4, NULL, NULL, sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':image', $fileNameToSave, PDO::PARAM_STR);
$stmt->bindValue(':a1', $comment, PDO::PARAM_STR);
$stmt->bindValue(':a2', $Uname, PDO::PARAM_STR);
$stmt->bindValue(':a3', $NOWname, PDO::PARAM_STR);
$stmt->bindValue(':a4', $beforename, PDO::PARAM_STR);

// :imageを$file_nameで追加！
$status = $stmt->execute();

//データ登録処理後
if ($status == false) {
  showSqlErrorMsg($stmt);
} else {
  //select.phpへ移動
  header('Location: select.php');
}
