<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .container {
            display: flex;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            animation: fadeIn 1s ease-in-out;
        }
        .illustration {
            background: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
            padding: 20px;
        }
        .illustration img {
            max-width: 80%;
            height: auto;
            border-radius: 10px;
        }
        .login-card {
            background-color: #fdfdfd;
            flex: 1;
            padding: 40px;
        }
        .nav-tabs .nav-link {
            border: none;
            color: #495057;
            background-color: #e9ecef;
            border-radius: 50px;
            padding: 10px 15px;
        }
        .nav-tabs .nav-link.active {
            background-color: #2575fc;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-login {
            background-color: #2575fc;
            color: white;
            padding: 12px 20px;
            border-radius: 50px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-login:hover {
            background-color: #6a11cb;
        }
        input.form-control {
            border-radius: 10px;
        }
        a.text-decoration-none {
            color: #2575fc;
            font-weight: bold;
            text-decoration: underline;
            transition: color 0.3s ease;
        }
        a.text-decoration-none:hover {
            color: #6a11cb;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .illustration {
                display: none;
            }
            .login-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="illustration">
            <img src="https://blogger.googleusercontent.com/img/a/AVvXsEhlNB6snLy0RoXUiXy93E3V755AZ7Hn_Nn6pdBroKZmkK2tXHN5qVHCsI5WFkbMO74A8jJ1tLRHeoSqoeaggs1rwFbzn6eO_7y7nbs8xTNdYnnci3qoKSpm8t7q6a69ydkJ4fg0Gn3reADquVAm4CrgSiW8kVOe2OvcPUpqJsjdMLt0tlFpqPFWyerK=s342-h228" alt="Ilustrasi PKL">
        </div>
        <div class="login-card">
            <h3 class="text-center mb-4">Form Login</h3>
            <div class="tab-content " id="loginTabContent">
                <div class="tab-pane fade show active">
                    <form>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                        </div>
                        <div class="mb-3 text-end">
                            <a href="#" class="text-decoration-none">Lupa password? Hubungi Admin Disini</a>
                        </div>
                        <button type="submit" class="btn btn-login w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
