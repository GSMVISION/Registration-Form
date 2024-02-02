<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
    

    .gsmt table {
        border-collapse: collapse;
        width: 100%;
    }

    .gsmt th, .gsmt td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    .gsmt th {
        background-color: #f2f2f2;
    }

    .gsmt input[type="text"], .gsmt input[type="date"] {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        margin: 4px 0;
    }

    .gsmt input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .gsmt input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

<div class="gsmt">
            <form action="insert.php" method="post">
                <table border="1">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="prenom[]" required></td>
                        <td><input type="text" name="nom[]" required></td>
                        <td><input type="date" name="date_of_birth[]" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="prenom[]" required></td>
                        <td><input type="text" name="nom[]" required></td>
                        <td><input type="date" name="date_of_birth[]" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="prenom[]" required></td>
                        <td><input type="text" name="nom[]" required></td>
                        <td><input type="date" name="date_of_birth[]" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="prenom[]" required></td>
                        <td><input type="text" name="nom[]" required></td>
                        <td><input type="date" name="date_of_birth[]" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="prenom[]" required></td>
                        <td><input type="text" name="nom[]" required></td>
                        <td><input type="date" name="date_of_birth[]" required></td>
                    </tr>



                </table>

                <input type="submit" value="Insert Data">
            </form>
        </div>
</body>
</html>
