<html>
  <head>
    <title>Suchergebniss</title>
  </head>
  <body>
    <h1>Suchergebniss</h1>
    <?php
      include "nav.php";
      if (isset($_POST["produktionsFirma"])) {
        $prodName = $_POST["produktionsFirma"];
        $prodNameCnt = strlen($prodName);
        if ($prodNameCnt < 3) {
            echo "<h3>Please enter more then 3 characters!</h3>";
            die();
        }
      } else {
          echo "<h3>Keine Produktionsfirma angegeben!</h3>";
          die();
      }
    ?>
    <table>
      <tr>
        <td>Gesuchte Produktionsfirma: </td>
        <td>
          <?php
            echo "<span>".$prodName."</span>";
          ?>
        </td>
      </tr>
      <tr>
        <td>Gefundene Produktionsfirma: </td>
        <td>
          <?php
            require "database.php";

            $sql = "SELECT p.Bezeichnung, p.Produktionsfirma_ID
                    FROM produktionsfirma p
                    Where p.Produktionsfirma_ID
                    AND p.Bezeichnung Like ?";

            $stmt = $connection->prepare($sql);
            $query = "%".$prodName."%";
            $stmt->bind_param('s', $query);

            $stmt->execute();
            $result = $stmt->get_result();
            $prodRows = $result->fetch_all(MYSQLI_ASSOC);

            if (count($prodRows) == 0) {
              echo "Keine Produktionsfirma gefunden!";
              die();
            }
            $foundProdCompany = $prodRows[0]["Bezeichnung"];
            $foundProdCompanyId = $prodRows[0]["Produktionsfirma_ID"];

            echo $foundProdCompany;
          ?>
        </td>
      </tr>
      <tr>
        <td>Gefundene Filmtitel: </td>
        <td>
          <?php

            $sql = "SELECT f.Titel, f.`Erscheinungs-Datum`, p.Bezeichnung
                    FROM film f, produktionsfirma p
                    Where f.Produktionsfirma_ID = ?
                    AND f.Produktionsfirma_ID = p.Produktionsfirma_ID
                    ORDER By f.`Erscheinungs-Datum` ASC";

            $stmt = $connection->prepare($sql);

            $stmt->bind_param('i', mysql_real_escape_string(like($foundProdCompanyId, "%")));

            $stmt->execute();
            $result = $stmt->get_result();
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            echo count($rows);

            function like($s, $e) {
                return str_replace(array($e, '_', '%'), array($e.$e, $e.'_', $e.'%'), $s);
            }
          ?>
        </td>
      </tr>
      <tr>
        <td>
          <div style="height: 50px;"></div>
        </td>
      </tr>
      <tr>
        <td>Titel</td>
        <td>Erscheinungs-Datum</td>
        <td>Produktionsfirma</td>
      </tr>
      <?php
        foreach ($rows as $row) {
          echo "<tr>";
          echo "  <td>";
          echo $row["Titel"];
          echo " </td>";
          echo "  <td>";
          echo date("d.m.Y", strtotime($row["Erscheinungs-Datum"]));
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
