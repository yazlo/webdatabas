<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Spel!</title>
    </head>
    <body>
        <?php
        define("DB_SERVER","localhost");
        define("DB_USER","root");
        define("DB_PASSWORD","");
        define("DB_NAME","datorspel");

        $dbh = new PDO('mysql:dbname='.DB_NAME.';host='.DB_SERVER.';charset=utf8',DB_USER, DB_PASSWORD);
        
        $sql = "SELECT * FROM spel";

        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $spel = $stmt->fetchAll();
        
        echo "<div>";
        echo "<h1>Datorspel:</h1>";
        
        echo "<table>";
            echo "<tr>";
            echo "<td>";
            echo "ID";
            echo "</td>";
            echo "<td>";
            echo "Namn";
            echo "</td>";
            echo "</tr>";
            
        foreach($spel as $saker){
            echo "<tr>";
            echo "<td>";
            echo $saker["id"];
            echo "</td>";
            echo "<td>";
            echo $saker["namn"];
            echo "</td>";
            echo "<td>";
            echo "<form>";
            echo "<input type='submit' name='action' value='Redigera'>";         
            echo "</td>";
            echo "<td>";
            echo "<input type='submit' name='action' value='Ta bort'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        ?>
    </body>
</html>
