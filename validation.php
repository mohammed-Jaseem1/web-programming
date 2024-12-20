<html>
<head>
    <title>Form Validation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            font-size: 2em;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            width: 60%;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"], input[type="tel"], input[type="email"], input[type="password"], textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            font-size: 0.9em;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        .error-message {
            margin-top: 15px;
            color: red;
            text-align: center;
        }

        /* Styling for the form inputs */
        input[type="text"]:focus, input[type="tel"]:focus, input[type="email"]:focus, input[type="password"]:focus, textarea:focus, select:focus {
            border-color: #4CAF50;
            outline: none;
        }
    </style>
</head>

<body>

    <center>
        <form method="POST">
            <h1>Form Registration</h1>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Name">
            
            <label for="phone">Telephone:</label>
            <input type="tel" id="phone" name="phone" placeholder="Telephone (e.g., 1234567890)">
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email">
            
            <label for="address">Address:</label>
            <textarea id="address" name="address" placeholder="Address"></textarea>
            
            <label for="qlf">Qualification:</label>
            <select id="qlf" name="qlf">
                <option value="">Select a Qualification</option>
                <option value="bachelors">Bachelor's Degree</option>
                <option value="masters">Master's Degree</option>
            </select>
            
            <label for="pass">Password:</label>
            <input type="password" id="pass" name="pass" placeholder="Password">
            
            <label for="cpass">Confirm Password:</label>
            <input type="password" id="cpass" name="cpass" placeholder="Confirm Password">
            
            <button type="submit">Register</button>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name'] ?? '';
                $phone = $_POST['phone'] ?? '';
                $email = $_POST['email'] ?? '';
                $qlf = $_POST['qlf'] ?? '';
                $pass = $_POST['pass'] ?? '';
                $cpass = $_POST['cpass'] ?? '';
                $address = $_POST['address'] ?? '';

                $errors = [];

                if (empty($name)) {
                    $errors['name'] = "Name is required.";
                }
                if (empty($phone)) {
                    $errors['phone'] = "Phone is required.";
                } else if (!preg_match("/^[0-9]{10}$/", $phone)) {
                    $errors['phone'] = "Phone number must be a valid 10-digit number.";
                }
                if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "Valid email is required.";
                }
                if (empty($qlf)) {
                    $errors['qlf'] = "Qualification is required.";
                }
                if (empty($address)) {
                    $errors['address'] = "Address is required.";
                }
                if (empty($pass) || empty($cpass)) {
                    $errors['pass'] = "Password is required.";
                } else if ($pass != $cpass) {
                    $errors['cpass'] = "Passwords do not match.";
                } else if (strlen($pass) < 8) {
                    $errors['pass'] = "Password must be at least 8 characters.";
                }

                echo "<script>";
                if (!empty($errors)) {
                    foreach ($errors as $field => $message) {
                        echo "
                        if (document.getElementById('{$field}')) {
                            var errorElement = document.createElement('p');
                            errorElement.className = 'error';
                            errorElement.textContent = '{$message}';
                            document.getElementById('{$field}').insertAdjacentElement('afterend', errorElement);
                        }";
                    }
                } else {
                    echo "alert('Registration successful!');";
                }
                echo "</script>";
            }
            ?>
        </form>
    </center>

</body>
</html>

