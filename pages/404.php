<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Error Page</title>
    <style>
        .browser-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f8f8;
        }

        .error-container {
            text-align: center;
            max-width: 800px;
            padding: 3rem;
            background-color: #fff;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .error-code {
            font-size: 10rem;
            font-weight: 900;
            color: #333;
            margin-bottom: 1rem;
        }

        .error-message {
            font-size: 2.5rem;
            color: #666;
            margin-bottom: 2rem;
        }

        .btn {
            display: inline-block;
            padding: 1.2rem 2.5rem;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2rem;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <div class="error-message">Oops, the page you're looking for could not be found.</div>
        <a href="/" class="btn">Go back to Home</a>
    </div>
</body>

</html>