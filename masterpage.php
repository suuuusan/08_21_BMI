<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>管理者画面</title>
</head>

<body>
    <header style='background-color: lightgray;font-size:large;'>管理者画面</header>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>

<?php
session_start();
include("funcs.php");
// loginCheck();

$pdo  = db_connect();

// データの取得 DESCは大きいものから降順に並べる
$sql = "SELECT * FROM BMI ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// 取得したデータを一覧表示
while ($row = $stmt->fetch()) {
    echo "<hr>{$row["id"]}:";
    echo $row["name"] . "/";
    echo $row["sex"] . "/";
    echo $row["grade"] . "/";
    echo "身長" . $row["height"] . "cm/";
    echo "体重" . $row["weight"] . "kg/";
    echo "BMI" . $row["bmi"] . "/";
    echo "(" . date("Y/m/d H:i", strtotime($row["dt"])) . ")";


    // 変更、削除、詳細表示へのリンク
    echo "<a href=update.php?id=" . $row["id"] . ">変更 </a>";
    echo "<a href=deleteCheck.php?id=" . $row["id"] . ">削除 </a>";
    echo "<a href=detail.php?id=" . $row["id"] . ">詳細 <a/>";
}
