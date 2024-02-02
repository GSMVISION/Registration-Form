<?php
$conn = mysqli_connect("localhost", "root", "", "table");
if ($conn) {
    echo 'Connected';
} else {
    die("connect-ion Failed" . mysqli_connect_error());
}