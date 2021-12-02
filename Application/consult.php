

<?php
    include "connect.php"; /* Le fichier connect_oracle.php contient les identifiants de connexion */
    $sql = "SELECT * from FLOTTE_DE_VELOS.USAGER
            WHERE FLOTTE_DE_VELOS.USAGER.NUMERO_USAGER = 10 ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo " <strong>Id</strong> " . $row["NUMERO_USAGER"]. " <strong>Nom</strong> " . $row["NOM_USAGER"]. " <strong>Prenom</strong> " . $row["PRENOM_USAGER"]. " <strong>Adresse</strong> " . $row["ADRESSE_USAGER"] . " <strong>Date d'adhésion</strong> " . $row["DATE_ADHESION"]."<br>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    
?>
