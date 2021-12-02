

<?php
    include "connect.php"; /* Le fichier connect_oracle.php contient les identifiants de connexion */
    $sql = "SELECT * from FLOTTE_DE_VELOS.USAGER";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<table>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Nom</th>";
        echo "<th>Prénom</th>";
        echo "<th>Adresse</th>";
        echo "<th>Date d'adhésion</th>";
      while($row = $result->fetch_assoc()) {
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . $row["NUMERO_USAGER"] . "</td>";
        echo "<td>" . $row["NOM_USAGER"] . "</td>";
        echo "<td>" . $row["PRENOM_USAGER"] . "</td>";
        echo "<td>" . $row["ADRESSE_USAGER"] . "</td>";
        echo "<td>" . $row["DATE_ADHESION"] . "</td>";
        echo "</tr>";
        
      }
      echo "</table>";
    } else {
      echo "0 results";
    }

    $conn->close();
    
?>
