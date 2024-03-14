<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculate Result</title>
    <link href="../css/main.css" rel="stylesheet"/>
</head>
<body>
    <div class="wrapper">
        <?php if (isset($sum)): ?>
            <h1 class="sum-title">Sum of two numbers is: <span><?= $sum ?></span></h1>
        <?php endif; ?>
    </div>
</body>
</html>