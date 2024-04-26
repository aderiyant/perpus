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
  <div class="container">
    <label for="username"><b>Username</b></label><br>
    <input type="text" placeholder="Enter Username" name="username" required>
    <br>
    <label for="password"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="password" required>
    <br>
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
  </div>
</form>
</body>
</html>