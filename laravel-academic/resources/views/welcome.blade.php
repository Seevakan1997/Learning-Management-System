<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Your Application</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('https://img.freepik.com/premium-photo/frame-notepads-colored-pencils-watercolors-pen-blue-background-copy-space_121837-5170.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            padding: 20px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);/
        }

        .card-header {
            background-color: #007bff;
            font-size: 24px;
            font-weight: bold;
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 15px 0;
        }

        .card-body {
            padding: 2rem;
        }

        .card-text {
            font-size: 1.1rem;
            color: #555;
        }

        .btn-primary,
        .btn-secondary {
            width: 150px;
            margin: 10px;
            border-radius: 25px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome to Learning Environment</div>
                    <div class="card-body">
                        <p class="card-text">Manage courses and modules efficiently with our platform.</p>
                        <div class="text-center">
                            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                            <a class="btn btn-secondary" href="{{ route('register') }}">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
