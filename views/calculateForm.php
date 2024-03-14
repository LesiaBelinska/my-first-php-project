<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculate Form</title>
    <link href="../css/main.css" rel="stylesheet"/>
</head>
<body>
    <div class="wrapper">
        <div class="title-section">
            <h2 class="section-title">Calculating...</h2>
        </div>
        <div class="form-section">
            <div class="form-wrapper">
                <h3 class="form-title">Enter 2 numbers <br> and find their sum.</h3>
                <form action="/calculate" method="post">
                    <div class="input-wrapper">
                        <label class="label" for="first-number">First number</label>
                        <input class="input" type="number" name="first-number" id="first-number" required/>
                    </div>
                    <div class="input-wrapper">
                        <label class="label" for="second-number">Second number</label>
                        <input class="input" type="number" name="second-number" id="second-number" required/>
                    </div>
                    <button class="button" type="submit">Calculate sum</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>