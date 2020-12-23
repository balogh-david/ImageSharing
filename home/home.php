<!DOCTYPE html />

<html lang="hu">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
    <link rel="icon" type="image/png" href="../favicon.png" />
    <link rel="stylesheet" href="./home.css">
    <title><?php echo $headTitle ?></title>
</head>
<body>
    <main>
        <div class="title text-center">
            <h1 class="centered"><?php echo $title ?></h1>
        </div>

        <div class="text-center container">
            <div class="bottom-fix d-flex justify-content-between align-items-center">
                <p class="mb-0"><?php echo $bottomFixMsg ?></p>
            </div>

            <h4><?php echo $motto ?></h4>

            <div class="mt-5">
                <a class="btn bg-dark text-white" href="../login"><?php echo $loginLink ?></a>
            </div>

            <div class="mt-4 mb-5 pb-5">
                <a class="btn bg-dark text-white" href="../signup"><?php echo $signupLink ?></a>
            </div>
        </div>
    </main>
</body>
</html>