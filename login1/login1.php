<?php
include("connection.php");
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM staff WHERE email='$email'";
    $data = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($data);

    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['staff_id'] = $row['id'];
        $_SESSION['staff_name'] = $row['fname'];
        echo "<script>alert('Login Successful'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        :root {
            --primary-color: #4F46E5;
            --secondary-color: #9333EA;
            --bg-color: #F3F4F6;
            --text-color: #111827;
            --text-light: #6B7280;
            --white: #ffffff;
            --shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            --radius: 16px;
            --transition: 0.3s ease;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            position: relative;
            min-height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @keyframes gradientBG {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: 0;
        }

        .floating {
            position: absolute;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            opacity: 0.3;
            border-radius: 50%;
            animation: float 10s infinite ease-in-out;
            z-index: 0;
        }

        .floating:nth-child(1) { top: 10%; left: 10%; }
        .floating:nth-child(2) { top: 70%; left: 80%; width: 200px; height: 200px; }
        .floating:nth-child(3) { top: 50%; left: 50%; width: 150px; height: 150px; }

        @keyframes float {
            0% { transform: translateY(0px) translateX(0px); }
            50% { transform: translateY(-20px) translateX(20px); }
            100% { transform: translateY(0px) translateX(0px); }
        }

        .login-card {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 50px 40px;
            width: 100%;
            max-width: 420px;
            text-align: center;
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .login-card h2 {
            margin-bottom: 10px;
            font-size: 30px;
            color: var(--white);
            font-weight: 600;
        }

        .login-card p {
            margin-bottom: 30px;
            color: #e5e7eb;
            font-size: 14px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 15px 45px 15px 15px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: var(--radius);
            font-size: 16px;
            background: rgba(255, 255, 255, 0.2);
            color: var(--white);
            transition: var(--transition);
            backdrop-filter: blur(5px);
        }

        .input-group input::placeholder {
            color: rgba(255,255,255,0.7);
        }

        .input-group input:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 3px rgba(147, 51, 234, 0.3);
            outline: none;
        }

        .input-group i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255,255,255,0.7);
            font-size: 18px;
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            color: var(--white);
            font-weight: 600;
            font-size: 18px;
            border-radius: var(--radius);
            cursor: pointer;
            transition: var(--transition);
        }

        .login-btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }


        @media (max-width: 480px) {
            .login-card {
                padding: 40px 20px;
            }
        }
    </style>
</head>
<body>

<div class="floating"></div>
<div class="floating"></div>
<div class="floating"></div>

<div class="login-card">
    <h2>Welcome Back</h2>
    <p>Login to your staff account</p>
    <form method="POST">
        <div class="input-group">
            <input type="email" name="email" placeholder="Email Address" required>
            <i class="fas fa-envelope"></i>
        </div>
        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
            <i class="fas fa-lock"></i>
        </div>
        <input type="submit" name="login" value="Login" class="login-btn">
    </form>
    
</div>

</body>
</html>
