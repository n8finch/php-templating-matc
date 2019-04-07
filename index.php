<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>The form</h1>
    <form action="student_service.php" method="POST">
        <input type="text" name="name" value="Marge Simpson" />
        <input type="text" name="email" value="marge@simpsons.com" />
        <input type="submit" value="Send data via HTTP POST" />
    </form>
</body>
</html>