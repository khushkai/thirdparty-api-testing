
<?php 
$url ="https://restcountries.com/v3.1/all";
$response= file_get_contents($url);

$data = json_decode($response, true); // Associative array
echo "Country Name: " . $data[85]['name']['common'] . "<br>";
echo "Flag: <img src='" . $data[85]['flags']['png'] . "' width='20' height='10'><br>";
echo "Capital: " . $data[85]['capital'][0] . "<br>";
echo "Population: " . number_format($data[85]['population']) . "<br>";
echo "Area:" . number_format($data[85]['area']) . "<br>";
echo "Region:" . $data[85]['region'] . "<br>";

echo "<pre>";
// print_r($data);
print_r(array_slice($data, 0, 5))
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Country Details</title>
    <style>
        table {
            width: 80%;
            margin: 50px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2 style="text-align: center;">All Country Details</h2>
<table>
    <tr>
        <th>Country Name</th>
        <th>Capital</th>
        <th>Region</th>
        <th>Population</th>
        <th>Area</th>
        <th>Flag</th>
    </tr>
    <?php
    // Loop through all countries and display their details
    $data = json_decode($response, true); // Associative array
    foreach($data as $country) {
        $country_name = $country['name']['common'] ?? 'N/A'; // Country name
        $capital = $country['capital'][0] ?? 'N/A'; // Capital (if exists)
        $region = $country['region'] ?? 'N/A'; // Region
        $population = number_format($country['population'] ?? 0); // Population
        $area = number_format($country['area'] ?? 0); // Area
        $flag = $country['flags']['png'] ?? ''; // Flag URL
        echo "<tr>";
        echo "<td>" . $country_name . "</td>";
        echo "<td>" . $capital . "</td>";
        echo "<td>" . $region . "</td>";
        echo "<td>" . $population . "</td>";
        echo "<td>" . $area . " sq km</td>";
        echo "<td><img src='" . $flag . "' alt='Flag' width='50' height='30'></td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
