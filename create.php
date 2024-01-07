<?php


    $servername = "localhost";
    $username = "root";
    $passwprd = "";
    $database = "zapisnik";

    $connection = new mysqli($servername, $username, $passwprd, $database);

    $jmeno = "";
    $vaha = "";
    $pocet = "";

    $errorMessage = "";
    $succesMessage = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $jmeno = $_POST["jmeno"];
        $vaha = $_POST["vaha"];
        $pocet = $_POST["pocet"];

        do{
            if (empty($jmeno) || empty($vaha) || empty($pocet)){
                $errorMessage = "Vyplňte všechny pole";
                break;
            }

            $sql = "INSERT INTO zapisky (jmeno, vaha, pocet)" .
                    "VALUES('$jmeno', '$vaha', '$pocet')";
            $result = $connection->query($sql);

            if($result){
                $errorMessage = "Neplatné" . $connection->error;
                break;
            }

            $jmeno = "";
            $vaha = "";
            $pocet = "";
            
            $succesMessage = "Nový záznam byl přidán";

            header("location: database.php");
            exit;
        
        } while(false);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeFit.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="container my-5">
        <h2>Nový zápis</h2>
        <?php
        if (!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
            </div>    
            ";
        }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Název</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="jmeno" value='<?php echo $jmeno;?>'>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Váha</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="vaha" value='<?php echo $vaha;?>'>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Opakování</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="pocet" value='<?php echo $pocet;?>'>
                </div>
            </div>

            <?php
            if (!empty($successMessage)){
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                        </div>
                    </div>
                </div>    
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Přidat</button>
                </div>
                <div class="offset-sm-3 d-grid">
                    <a class="btn btn-outline.primary" href="database.php" role="button">Zpět</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>