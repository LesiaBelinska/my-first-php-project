<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
<h3>Register</h3>
<form action="/register" method="post">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name"/>
    </div>
    <div>
        <label for="age">Age</label>
        <input type="number" step="1" min="1" max="200" name="age" id="age"/>
    </div>
    <div>
        <label for="gender">Gender</label>
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email"/>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"/>
    </div>
    <input  type="submit" value="Send" />
</form>
</body>
</html>