<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Diary</title>
</head>
<body>
    <h1>Delete Diary</h1>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $pdo = new PDO("pgsql:host=localhost;dbname=practice", "postgres", "postgres");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // データベースから対象の日記を取得
            $stmt = $pdo->prepare("SELECT * FROM diary WHERE id = :id");
            
            // バインドパラメータ
            $id = $_GET['id'];
            $stmt->bindParam(':id', $id);
            
            // クエリ実行
            $stmt->execute();
            $diary = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // 日記の情報をフォームにセットする
            $title = $diary['title'];
            $content = $diary['content'];
            $upddate = $diary['upddate'];
        }
    ?>
    
    <p>Are you sure that you want to delete the following diary?</p>
    <h2><?php echo $title; ?></h2>
    <p><?php echo $content; ?></p>
    <p><?php echo $upddate; ?></p>
    
    <form action="exedelete.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Delete">
    </form>
</body>
</html>
