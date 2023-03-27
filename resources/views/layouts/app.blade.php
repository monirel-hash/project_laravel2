<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        a{
            text-decoration: none;
            color: black    
        }
    </style>
</head>
<body>

    <div>

        <header class="p-3" style="background-color:#f6f6f6">
            <div class="d-flex justify-content-between align-items-center">
                <a href="/">
                    <h2>Home</h2>
                </a>

                <a href="/products/create">
                    Add New Product
                </a>
            </div>
        </header>
        <div class="container">

            @yield('content')

        </div>
    </div>

</body>
</html>
