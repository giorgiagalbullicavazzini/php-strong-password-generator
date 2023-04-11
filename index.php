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
            $generated_password = generatePassword($password_length);
            return "La tua password è: $generated_password";
        }
    }

    // Generate a random password
    function generatePassword($length) {
        $random_password = "";

        // Config to check if the password contains all categories 
        $check_values = [
            'check_letter' => false,
            'check_upper' => false,
            'check_number' => false,
            'check_symbol' => false
        ];

        while (strlen($random_password) < $length) {
            // Random dice selection to choose the category to pick from
            $category_choice = rand(1, 4);

            if ($category_choice == 1) {
                // ASCII lowercase letters
                $letter = chr(rand(97, 122));
                $random_password .= $letter;
                $check_values['check_letter'] = true;
            } elseif ($category_choice == 2) {
                // ASCII uppercase letters
                $letter_upper = chr(rand(65, 90));
                $random_password .= $letter_upper;
                $check_values['check_upper'] = true;
            } elseif ($category_choice == 3) {
                // ASCII numbers
                $number = chr(rand(48, 57));
                $random_password .= $number;
                $check_values['check_number'] = true;
            } else {
                // ASCII symbols
                $symbol = chr(rand(40, 47));
                $random_password .= $symbol;
                $check_values['check_symbol'] = true;
            }

            // When the length is reached, check if the password contains all the categories
            if (strlen($random_password) == $length) {
                if ($check_values['check_letter'] == true && $check_values['check_upper'] == true && $check_values['check_number'] == true && $check_values['check_symbol'] == true) {
                    return $random_password;
                } else {
                    $random_password = "";
                    $check_values['check_letter'] = false;
                    $check_values['check_upper'] = false;
                    $check_values['check_number'] = false;
                    $check_values['check_symbol'] = false;
                }
            }
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