<?php

$query = $_GET['query'];

$conn = new mysqli('localhost', 'popo', 'rootme', 'testing_db');

$sql = mysqli_query($conn, "SELECT * FROM contact WHERE name like '%" . $query . "%' OR email LIKE '%" . $query . "%' LIMIT 5");

if (mysqli_fetch_assoc($sql) > 0) {
    foreach ($sql as $i) {
        echo "<li class='p-2 bg-blue-300 inline-block w-64 rounded-md text-sm hover:bg-blue-200 duration-150 transition-all cursor-pointer'><i class='ri-user-3-line'></i> " . $i['name'] . " </br> @" . $i['email'] . "</li>";
    }
} else {
    echo "data not found";
}
