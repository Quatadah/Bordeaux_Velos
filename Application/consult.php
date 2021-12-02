<?php
    include "connect.php"; /* Le fichier connect_oracle.php contient les identifiants de connexion */
    $sql = "SELECT * from FLOTTE_DE_VELOS.VELO";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "id: " . $row["NUMERO_REFERENCE"]. " - Marque: " . $row["MARQUE"]. " -Kilometrage " . $row["KILOMETRAGE"]. " date de mise en service " . $row["DATE_DE_MISE_EN_SERVICE"] . " niveau de charge " . $row["NIVEAU_CHARGE"]. " numero de station " .$row["NUMERO_STATION"]  ."<br>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    
?>
