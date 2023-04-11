<?php
    // Check if the password length is valid
    function checkPassword ($password) {
        // Password length transformation into an integer without white spaces
        $password_length = str_replace(' ', '', $password);
        $password_length = intval($password_length);

        if ($password_length == 0) {
            return "Inserisci un numero!";
        } elseif ($password_length < 8) {
            return "La password deve contenere almeno 8 caratteri.";
        } else {
            return "La tua password è lunga $password_length caratteri.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong Password Generator</title>
</head>

<body>
    <!-- Choose password length -->
    <form action="index.php" method="get">
        <label for="password-length">Lunghezza della password:</label>
        <input type="text" name="password-length" id="password-length">
        <button>Invia</button>
    </form>
    <!-- // Choose password length -->

    <!-- Password generator -->
    <div class="password">
        <?php echo checkPassword($_GET["password-length"]) ?>
    </div>
    <!-- // Password generator -->
</body>

</html>