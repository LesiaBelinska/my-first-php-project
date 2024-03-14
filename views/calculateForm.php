<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculate Form</title>
</head>
<body>
 <form action="/calculate" method="post">
     <div>
         <label for="first-number">First number</label>
         <input type="number" name="first-number" id="first-number" required/>
     </div>
     <div>
         <label for="second-number">Second number</label>
         <input type="number" name="second-number" id="second-number" required/>
     </div>
     <button type="submit">Calculate sum</button>
 </form>
</body>
</html>