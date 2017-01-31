<html>
<head>
    <!-- This will be displayed in the browser tab (at least on Chrome) -->
    <title>Suchergebniss</title>
</head>
<body>
<!-- The headline of the Website -->
<h1>Suchergebniss</h1>
<?php
// Include the nav.php to display the navigation bar
include "nav.php";
// Only continue if the required variables firstName and lastName are set
// The data in the $_POST[] comes from the searchActor.php script
if (isset($_POST["firstName"]) && isset($_POST["lastName"])) {
    // Set the variables $firstName and $lastName with the values from the $_POST[]
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
} else {
    // if firstName and lastName is not set we echo an error message and kill the script (This prevents any further execution)
    echo "<h3>Bitte Vor- und Nachname eingeben!</h3>";
    // This kills the script and prevents any further execution.
    die();
}
?>
<!-- The table makes formatting much easier -->
<table>
    <!-- A Table contains rows and every row contains data (column in the row) -->
    <tr>
        <td>Gefundene Schauspieler: </td>
        <td>
            <?php
            // Include the database to be able to use the $connection variable
            include "database.php";

            // This is our SQL Select we want to execute
            // The two ? placeholder after each LIKE is essential for security reasons. It prevents SQL injections
            // We can bind parameter with a specific type to the placeholder. Check $stmt->bind_param.
            $sql = "SELECT f.Titel, p.Bezeichnung, s.Vorname, s.Nachname
                    FROM film f, film_schauspieler fs, schauspieler s, produktionsfirma p
                    WHERE fs.Schauspieler_ID = s.Schauspieler_ID
                    AND fs.Film_ID = f.Film_ID
                    AND p.Produktionsfirma_ID = f.Produktionsfirma_ID
                    AND s.Vorname LIKE ?
                    AND s.Nachname LIKE ?";

            // Preparing the sql select with the connection
            $stmt = $connection->prepare($sql);

            // Create the parameters you want to bind to the placeholders
            // $firstName and $lastName will be replaced by its value
            $firstNameQuery = "%$firstName%";
            $lastNameQuery = "%$lastName%";
            // Binding the parameter as datatype string, hence the ss, both params are from type string
            // 1st Parameter: The datatypes of the parameters
            // 2, 3, 4, 5... Parameter: The actual parameters you want to bind
            $stmt->bind_param('ss', $firstNameQuery, $lastNameQuery);

            // Execute the sql statement
            $stmt->execute();

            // Get the result of the sql statement
            $result = $stmt->get_result();

            // Then fetch the result as an array, so index is a row
            $actorRows = $result->fetch_all(MYSQLI_ASSOC);

            // We check if we have some rows/ results
            if (count($actorRows) == 0) {
                // Display an error message if no result has been found
                echo "Keine Schauspieler gefunden!";
                // Kill the script, so it stops executing here
                die();
            }

            // Handle the data that you want.
            // We only need te first row in this example
            $firstRow = $actorRows[0];
            echo $firstRow["Vorname"]." ".$firstRow["Nachname"];
            ?>
        </td>
    </tr>
    <tr>
        <td>Film</td>
        <td>Produktionsfirma</td>
    </tr>
    <?php
    // This echos table rows with its table datas containing the rows attributes
    foreach ($actorRows as $row) {
        echo "<tr>";
        echo "  <td>";
        echo $row["Titel"];
        echo " </td>";
        echo "  <td>";
        echo $row["Bezeichnung"];
        echo " </td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
