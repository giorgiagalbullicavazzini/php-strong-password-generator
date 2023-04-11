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

    // Generate a random password
    function generatePassword($length) {
        $random_password = "";

        while (strlen($random_password) < $length) {
            $category_choice = rand(1, 4);

            if ($category_choice == 1) {
                // Lowercase letters
                $letter = chr(rand(97, 122));
                $random_password .= $letter;
            } elseif ($category_choice == 2) {
                // Uppercase letters
                $letter_upper = chr(rand(65, 90));
                $random_password .= $letter_upper;
            } elseif ($category_choice == 3) {
                // Numbers
                $number = chr(rand(48, 57));
                $random_password .= $number;
            } else {
                // Symbols
                $symbol = chr(rand(40, 47));
                $random_password .= $symbol;
            }
        }

        return $random_password;
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
        <br>
        <?php echo generatePassword($_GET["password-length"]) ?>
    </div>
    <!-- // Password generator -->
</body>

</html>