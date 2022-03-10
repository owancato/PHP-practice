<?php require_once('./conn.php'); ?>
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
                $sql = "SELECT * FROM articles ORDER BY created_at DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='article'>";
                        echo "<h1><a href='./article.php?id=$row[id]'>";
                        echo $row['title'];
                        echo "</a></h1>";
                        echo "</div>";
                    }
                } 
            ?>
            <!---
            <div class="article">
                <h1><a href="./article.php">標題</a></h1>
            </div>
            <div class="article">
                <h1><a href="./article.php">標題</a></h1>
            </div>
            --->
        </div>
    </body>
</html>