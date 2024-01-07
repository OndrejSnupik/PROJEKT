<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>BeFit.</title>
</head>
<body>
    <div class="container my-5">
        <h2>Zápisník cviků</h2>
        <a class="btn btn-primary" href="create.php" role="button">Nový záznam</a>
        <br>
        <table class="table">
            <thread>
                <tr>
                    <th>ID</th>
                    <th>Název</th>
                    <th>Váha</th>
                    <th>Počet</th>
                </tr>
            </thread>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $passwprd = "";
                    $database = "zapisnik";

                    $connection = new mysqli($servername, $username, $passwprd, $database);

                    if($connection->connect_error){
                        die("Conestion failed". $connection->connect_error);
                    }

                    $sql = "SELECT * FROM zapisky";
                    $result = $connection->query($sql);

                    if(!$result){
                        die("invalid query: ".$connection->error);
                    }

                    while($row = $result->fetch_assoc()){
                        echo"
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[jmeno]</td>
                            <td>1$row[vaha]</td>
                            <td>$row[pocet]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Edit</a>
                                <a class='btn btn-primary btn-sm' href='delete.php?id=$row[id]'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                ?>
            </tbody>        
        </table>
    </div>
</body>
</html>