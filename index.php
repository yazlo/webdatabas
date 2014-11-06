<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "datorspel");

$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);


if (isset($_POST["action"])) {
    if ($_POST["action"] == "Radera") {
        $sql = "DELETE FROM `spel` WHERE id='{$_POST["id"]}'";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        header("Location:?");
        exit();
    } elseif ($_POST["action"] == "Spara") {

        $sql = "UPDATE spel SET namn='" . filter_input(INPUT_POST, "namn", FILTER_SANITIZE_SPECIAL_CHARS) . "' WHERE id={$_POST["id"]}";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        header("Location:?");
        exit();
    } elseif ($_POST["action"] == "Skicka") {
        $sql = "INSERT INTO `spel`(`id`, `namn`) VALUES ('','" . filter_input(INPUT_POST, "nytt", FILTER_SANITIZE_SPECIAL_CHARS) . "')";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        header("Location:?");
        exit();
    }
}

$sql = "SELECT * FROM spel";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$spel = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Spel!</title>
    </head>
    <body>
        <?php
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

        foreach ($spel as $saker) {
            echo "<tr>";
            echo "<form method='POST'>";
            echo "<td>";
            echo $saker["id"];
            echo "<input type='hidden' name='id' value='{$saker["id"]}'>";
            echo "</td>";
            echo "<td>";

            if (isset($_POST["action"])&&$_POST["action"] == "Redigera" && $_POST["id"] == $saker["id"]) {
                echo "<input type='text' name='namn' value='" . $saker["namn"] . "'>";
            } else {
                echo $saker["namn"];
            }

            echo "</td>";
            if (isset($_POST["action"])&&$_POST["action"] == "Redigera" && $_POST["id"] == $saker["id"]) {
                echo "<td>";
                echo "<input type='submit' name='action' value='Spara'>";
                echo "</td>";
                echo "<td>";
            } else {
                echo "<td>";
                echo "<input type='submit' name='action' value='Redigera'>";
                echo "</td>";
                echo "<td>";
                echo "<input type='submit' name='action' value='Radera'>";
                echo "</td>";
            }
            echo "</form>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<form method='POST'>";
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
