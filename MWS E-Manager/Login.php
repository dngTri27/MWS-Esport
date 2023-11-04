<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #231f20;
        }

        .login-container {
            width: 500px;
            padding: 50px;
            border: 1px solid #ddd;
            border-radius: 5px;
            color: #ffffff;
        }

        .login-container h2 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 0px;
        }

        .input-group {
            margin-bottom: 15px;
        }
        .logo {
            width: 100%;
            text-align: center;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input[type="text"],
        .input-group input[type="password"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .input-group input[type="submit"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: #3a5f3a;
            color: #fff;
            cursor: pointer;
        }

        .input-group input[type="submit"]:hover {
            background-color: #231f20;
        }
    </style>
</head>
<body>
    
    <div class="login-container">
        <h2>Login</h2>
        <div class="logo">
            <img src="images/logo.png" alt="Logo" width="200" height="200">
        </div>
        <form id="loginForm" action="#" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <input type="submit" value="Login" name="login">
            </div>
            <a href="register.php">You're new? Sign up!</a>
        </form>
    </div>

    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == 'admin' && $password == 'admin') {
            header("Location: userindex.php");
            exit;
        } else {
            echo '<span style="color:#AFA;text-align:center;">Request has been sent. Please wait for my reply!</span>';
        }
    }
    ?>
</body>
</html>
