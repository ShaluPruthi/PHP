<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            height: 100vh;
            display: flex;
            overflow: hidden;
            position: relative;
        }
        .left {
            width: 50%;
            background: #fdfaf6;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 2;
        }
        .login-box {
            width: 80%;
            max-width: 400px;
        }
        .login-box h2 {
            font-size: 34px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .login-box p {
            margin-bottom: 30px;
            color: #555;
        }
        .input-group {
            margin-bottom: 20px;
            position: relative;
        }
        .input-group input {
            width: 100%;
            padding: 15px 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
        }
        .input-group input:focus {
            border-color: #7a5cf0;
            box-shadow: 0 0 5px rgba(122, 92, 240, 0.4);
        }
        .login-btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.4s;
            box-shadow: 0 4px 15px rgba(118, 75, 162, 0.5);
            position: relative;
            overflow: hidden;
        }
        .login-btn::before {
            content: "";
            position: absolute;
            top: 0; left: -75%;
            width: 50%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transform: skewX(-25deg);
            transition: all 0.5s ease;
        }
        .login-btn:hover::before {
            left: 130%;
        }
        .login-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 25px rgba(118, 75, 162, 0.8);
            background: linear-gradient(135deg, #5a67d8, #6b46c1);
        }
        .right {
            width: 50%;
            position: relative;
            overflow: hidden;
        }
        .right::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            mask-image: linear-gradient(to left, black 0%, black 40%, transparent 100%);
            -webkit-mask-image: linear-gradient(to left, black 0%, black 40%, transparent 100%);
        }
    </style>
</head>
<body>

<div class="left">
    <div class="login-box">
        <h2>Welcome back!</h2>
        <p>Login</p>
        <form method="POST">
            <div class="input-group">
                <input type="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <input type="submit" name="login" value="Login Now" class="login-btn">
        </form>
    </div>
</div>

<div class="right"></div>

</body>
</html>
