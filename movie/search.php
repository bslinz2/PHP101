<html>
<head>
    <!-- This will be displayed in the browser tab (at least on Chrome) -->
    <title>Filmsuche</title>
</head>
<body>
<!-- The headline of the Website -->
<h1>Filmsuche</h1>
<?php
// Include the nav.php to display the navigation bar
include "nav.php";
?>
<!-- This form performs a post method to the page searchResult.php. The sent data is part of the $_POST[] -->
<form method="post" action="searchResult.php">
    <!-- The form contains a table, this makes formatting easier -->
    <table>
        <!-- A Table contains rows and every row contains data (column in the row) -->
        <tr>
            <td>Suche nach Produktionsfirma:</td>
            <td>
                <!-- This data contains an required input element from type "text" with the name "produktionsFirma" -->
                <!-- The name is the key of the $_POST[], use it like $_POST['produktionsFirma'] to get the value
                <!-- Type text means that the user needs to input text -->
                <!-- required means that the user needs to fill in this field to submit the form, or an error will display -->
                <input name="produktionsFirma" type="text" required/>
            </td>
        </tr>
        <!-- Next row of the table -->
        <tr>
            <td>
                <!-- This button submits the form, if every required input field is filled in the POST request to the action will occure -->
                <button type="submit">Suchen</button>
            </td>
            <td>
                <!-- This button resets the form, so resets every input field -->
                <button type="reset">Abbrechen</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
