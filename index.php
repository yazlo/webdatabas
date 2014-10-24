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
        
        if(isset($_GET)){
            if($_GET["action"]=="Radera"){
                $sql = "DELETE FROM `spel` WHERE id='{$_GET["id"]}'";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();   
            }
            elseif($_GET["action"]=="Redigera"){
                
            }
            elseif($_GET["action"]=="Skicka"){
                $sql = "INSERT INTO `spel`(`id`, `namn`) VALUES ('','{$_GET["nytt"]}')";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
            }
        }
        
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
            echo "<form>";
            echo "<td>";            
            echo $saker["id"];
            echo "<input type='hidden' name='id' value='{$saker["id"]}'>";
            echo "</td>";
            echo "<td>";
            echo $saker["namn"];
            echo "</td>";
            echo "<td>";            
            echo "<input type='submit' name='action' value='Redigera'>";         
            echo "</td>";
            echo "<td>";
            echo "<input type='submit' name='action' value='Radera'>";                        
            echo "</td>";
            echo "</form>";
            echo "</tr>";                      
        }
        echo "<tr>";
        echo "<form>";
        echo "<td>";
        echo "</td>";
        echo "<td>";
        echo "<input type='text' name='nytt' value=''>";
        echo "</td>";
        echo "<td>";
        echo "<input type='submit' name='action' value'add'>";
        echo "</td>";
        echo "</form>";
        echo "</tr>";          
        echo "</table>";
        echo "</div>";
        ?>
    </body>
</html>
