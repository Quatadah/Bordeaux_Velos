<?php
function getMoyNbrUsagers($result){
    if ($result->num_rows > 0) {
        echo "La moyenne du nombre d’usagers par vélo par jour est:";
        echo $result->fetch_assoc()["MOYENNE_NBR_USAGERS"];
    }
    else {
        echo "0 results";
    }
}

function getMoyDistParcourues($result){
    if ($result->num_rows > 0) {
        echo "La moyenne des distances parcourues par les vélos sur une semaine est:";
        echo $result->fetch_assoc()["DISTANCE_MOYENNE"];
    }
    else {
        echo "0 results";
    }
}

function getVelosByStation($result){
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Adresse station</th>";
        echo "<th>N° référence</th>";
        echo "<th>Marque</th>";
        echo "<th>Kilométrage</th>";
        echo "<th>Date de mise en service</th>";
        echo "<th>Niveau de charge</th>";
        echo "<th>N° station</th>";
        echo "</tr>";
        while($row = $result->fetch_assoc()) {
            
            echo "<tr>";
            echo "<td>" . $row["ADRESSE_STATION"] . "</td>";
            echo "<td>" . $row["NUMERO_REFERENCE"] . "</td>";
            echo "<td>" . $row["MARQUE"] . "</td>";
            echo "<td>" . $row["KILOMETRAGE"] . "</td>";
            echo "<td>" . $row["DATE_DE_MISE_EN_SERVICE"] . "</td>";
            echo "<td>" . $row["NIVEAU_CHARGE"] . "</td>";
            echo "<td>" . $row["NUMERO_STATION"] . "</td>";
        
           
            echo "</tr>";   
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}



?>