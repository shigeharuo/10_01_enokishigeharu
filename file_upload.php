<?php
//Fileアップロードチェック

//{ ファイルをアップロードしたときの処理（しかもエラーゼロだよ）
if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
    // ファイルをアップロードしたときの処理
    // ①送信ファイルの情報取得

    // var_dump($_FILES);
    // 情報例
    // array(1){ 
    // ["upfile"] => array (5) {
    // ["name"] => string (21) "plant_mikaduki_mo.png" ["type"] => string (9) "image/png" ["tmp_name"] => string (36) "/Applications/MAMP/tmp/php/phpmXFUZb" ["error"] => int (0) ["size"] => int (202450)
    // }
    // }

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
            $img = '<img src="' . $fileNameToSave . '" >'; // imgタグを設定
        } else {
            $img = '保存に失敗しました';
        }
    } else {
        // ファイルをアップしていないときの処理
        $img = '画像が送信されていません';
    }
}
// var_dump($fileNameToSave);
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FileUploadテスト</title>
</head>

<body>
    <?= $img ?>
</body>

</html>