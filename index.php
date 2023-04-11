<?php
    require_once __DIR__ . '/functions.php';

    $password_secure = checkPassword($_GET["password-length"]);

    session_start();
    if ($password_secure == "La tua password verrà generata a momenti...") {
        $format_password = $_GET["password-length"];
        $format_password = str_replace(' ', '', $format_password);
        $format_password = intval($format_password);

        $_SESSION = generatePassword($format_password);
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
        <?php echo $password_secure ?>
    </div>
    <!-- // Password generator -->
</body>

</html>