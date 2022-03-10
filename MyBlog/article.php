<?php require_once('./conn.php'); 
    $id = $_GET['id'];
    $sql = "SELECT A.id, A.title, A.content, C.name FROM articles as A 
    LEFT JOIN categories as C ON A.category_id = C.id WHERE A.id=$id";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blog 部落格</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <nav class="nav">
            <h1>Blog</h1>
            <a href="./index.php" class="active">首頁</a>
            <a href="./about.php">關於我</a>
        </nav>
        <div class="container">
            <?php
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<div class='single-article'>";
                    echo "<h1>$row[title]</h1>";
                    echo "<h2>分類：$row[name]</h2>";
                    echo "<p>$row[content]</p>";
                    echo "</div>";
                } 
            ?>
        </div>
    </body>
</html>