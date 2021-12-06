<?php
function getUsagers($result){
    if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>N° usager</th>";
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
}

function getVelos($result){
    if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>N° référence</th>";
                echo "<th>Marque</th>";
                echo "<th>Kilométrage</th>";
                echo "<th>Date de mise en service</th>";
                echo "<th>Niveau de charge</th>";
                echo "<th>N° station</th>";

                while($row = $result->fetch_assoc()) {
                    echo "</tr>";
                    echo "<tr>";
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

function getStations($result){
    if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>N° station</th>";
                echo "<th>Adresse</th>";
                echo "<th>Nombre de bornes</th>";
                echo "<th>Commune</th>";
            
                while($row = $result->fetch_assoc()) {
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $row["NUMERO_STATION"] . "</td>";
                    echo "<td>" . $row["ADRESSE_STATION"] . "</td>";
                    echo "<td>" . $row["NOMBRE_BORNES"] . "</td>";
                    echo "<td>" . $row["COMMUNE"] . "</td>";
                    echo "</tr>";   
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
}

function getEmprunts($result){
    if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>N° emprunt</th>";
                echo "<th>Date départ</th>";
                echo "<th>Date retour</th>";
                echo "<th>N° usager</th>";
                echo "<th>N° référence</th>";
                echo "<th>N° station départ</th>";
                echo "<th>N° station arrivée</th>";

                while($row = $result->fetch_assoc()) {
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $row["NUMERO_EMPRUNT"] . "</td>";
                    echo "<td>" . $row["DATE_DEPART"] . "</td>";
                    echo "<td>" . $row["DATE_RETOUR"] . "</td>";
                    echo "<td>" . $row["NUMERO_USAGER"] . "</td>";
                    echo "<td>" . $row["NUMERO_REFERENCE"] . "</td>";
                    echo "<td>" . $row["NUMERO_STATION_DEPART"] . "</td>";
                    echo "<td>" . $row["NUMERO_STATION_ARRIVEE"] . "</td>";
                    echo "</tr>";   
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
}

function getEtreDistant($result){
    if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>N° station départ</th>";
                echo "<th>N° station arrivée</th>";
                echo "<th>Distance</th>";

                while($row = $result->fetch_assoc()) {
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $row["NUMERO_STATION_DEPART"] . "</td>";
                    echo "<td>" . $row["NUMERO_STATION_ARRIVEE"] . "</td>";
                    echo "<td>" . $row["DISTANCE"] . "</td>";
                    echo "</tr>";   
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
}


?>