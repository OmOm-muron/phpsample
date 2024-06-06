<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Diary App</title>
</head>
<body>
    <h1>Diary App</h1>

    <?php
        // PostgreSQL PDO取得
        $pdo = new PDO("pgsql:host=localhost;dbname=practice", "postgres", "postgres");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // データベースから日記を取得
        $stmt = $pdo->query("SELECT * FROM diary ORDER BY id");
        
        // 日記を表示
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<h2>" . $row["title"] . "</h2>";
            echo "<p>" . $row["content"]. "</p>";
            echo "<p>" . $row["upddate"]. "</p>";
            echo "<a href='update.php?id={$row['id']}'>update</a>";
            echo "&nbsp;&nbsp;";
            echo "<a href='delete.php?id={$row['id']}'>delete</a>";
            echo "<hr>";
        }
    ?>
</body>
</html>
