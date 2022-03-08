<?php
    // 建立連線
    $db_link = mysqli_connect('localhost', 'root', 'Ja18991024', 'MyFirstDB') or die(mysqli_error());

    // Query Database
    $result = mysqli_query($db_link, "SELECT * FROM students");
    
    // 將 query 結果取出
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "id: {$row['id']}, name: {$row['name']}, score: {$row['score']},\n";
        }
    } else {
        echo "0 row";
    }
    
    // 斷開連線
    mysqli_close($db_link);
?>