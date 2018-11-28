<!DOCTYPE html>
<html>
　<head>
　  <title>みんなの投稿</title>
    <meta charset="utf-8">
  </head>
  <body>
    <input type="button" onClick="location.href='http://192.168.33.10:3000/index.php'" value="みんなの投稿">
    <input type="button" onClick="location.href='http://192.168.33.10:3000/new.php'" value="一日一善の投稿">
    <h1>みんなの一日一善</h1>

    <?php
    $password = 'hoge';
    $pdo=new PDO('mysql:host=127.0.0.1;dbname=one_luck;charset=utf8', 'root', $password);
    $sql = "SELECT id, content FROM lucks";
    error_log("sql=" . $sql);
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $record_list = $stm->fetchAll();


    echo "<table border='10'>";
    foreach($record_list as $record) {
        echo "<tr>";
        echo "<td>" . $record['id'] . "</td>";
        echo "<td>" . $record['content'] . "</td>";

       print('<td><form method="POST" action="delete.php">');
       print('<input type="hidden" name="id" value="'.htmlspecialchars($record['id'], ENT_QUOTES | ENT_HTML5, 'UTF-8').'">');
       print('<input type="submit" value="削除"></form></td>');

       print('<td><form method="POST" action="edit.php">');
       print('<input type="hidden" name="id" value="'.htmlspecialchars($record['id'], ENT_QUOTES | ENT_HTML5, 'UTF-8').'">');
       print('<input type="submit" value="変更"></form></td>');
       echo "</tr>";
    }
    echo "</table>";
    ?>
  </body>
</html>
