<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css">

</head>

<body style="position: relative" >
        <div style="width: 684px; height: 457px; left: 373px; top: 90px; position: relative; background: #D9D9D9"></div>
        <p class="paragraf">Selamat Datang</p>
        <div class="div1">
            <form action="{{ route('postlogin') }}" method="post">
                {{ @csrf_field() }}
                <label for="username" style="left: 50px; top: 10px; position:  relative;">Username:</label><br>
                <input type="text" id="username" name="username"
                    style="width: 160px; height: 15px; left: 50px; top: 10px; position:  relative;" required><br>

                <label for="password" style="left: 50px; top: 10px; position:  relative;">Password:</label><br>
                <input type="password" id="password" name="password" color: #270E3F
                    style="width: 160px; height: 15px; left: 50px; top: 10px; position:  relative;" required ><br>

                <button type="submit" class="btnlogin btn-primary">LOGIN</button>
            </form>
        </div>

</body>
</html>