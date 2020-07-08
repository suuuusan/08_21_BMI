<?php

// 送信データのチェック
// var_dump($_GET);
// exit();

session_start();

include("funcs.php");



// 変更データのIDを取得
$id = $_GET['id'];

//IDを$_SESSIONへ
$_SESSION["id"] = $id;

$pdo  = db_connect();

//変更するデータを取得する
$sql = "SELECT * FROM BMI WHERE id = :id";



$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は指定の1レコードを取得
    // fetch()関数でSQLで取得したレコードを取得できる
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
}


$_SESSION["sex"] = $record["sex"];
?>

<!-- 処理結果の表示 -->

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>更新画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <header style='background-color: gray;'>変更画面</header>
    <form action="updateCheck.php" method="POST">
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ログインID</th>
                        <th>パスワード</th>
                        <th>名前</th>
                        <th>MAIL</th>
                        <th>性別</th>
                        <th>学年</th>
                        <th>身長</th>
                        <th>体重</th>
                        <th>BMI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><input type="text" name="lid" size="15" value="<?php echo $record["u_id"]; ?>"> </th>
                        <td> <input type="text" name="lpw" size="15" value="<?php echo $record["u_pw"]; ?>"> </td>
                        <td> <input type="text" name="name" size="15" value="<?php echo $record["name"]; ?>"> </td>
                        <td> <input type="text" name="mail" size="20" value="<?php echo $record["mail"]; ?>"> </td>
                        <td> <?php echo $record["sex"]; ?></td>
                        <td><select name="grade">
                                <option value=""><?php echo $record["grade"]; ?></option>
                                <option>中学1年生</option>
                                <option>中学2年生</option>
                                <option>中学3年生</option>
                                <option>高校1年生</option>
                                <option>高校2年生</option>
                                <option>高校3年生</option>
                                <option>大学1年生</option>
                                <option>大学2年生</option>
                                <option>大学3年生</option>
                                <option>大学4年生</option>
                                <option>一般の方</option>
                            </select></td>
                        <td> <input type="number" name="height" value="<?php echo $record["height"]; ?>">cm </td>
                        <td> <input type="number" name="weight" value="<?php echo $record["weight"]; ?>">kg </td>
                        <td><?php echo $record["bmi"]; ?></td>

                    </tr>
                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-success">変更する</button>

    </form>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>