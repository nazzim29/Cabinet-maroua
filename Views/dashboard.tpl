<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    Bienvenue {{$_SESSION['currentUser']->adresse_mail}} {{$_SESSION['currentUser']->role}}
    <a href="/logout">logout</a>
</body>
</html>