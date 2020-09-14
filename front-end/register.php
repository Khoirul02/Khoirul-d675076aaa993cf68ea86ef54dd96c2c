<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Test MKM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div id="card">
    <div id="card-content">
      <div id="card-title">
        <h2>REGISTRASI</h2>
        <div class="underline-title"></div>
      </div>
      <form action="../back-end/action.php?action=register" method="post" class="form">
        <label for="user-username" style="padding-top:13px">
            Username
          </label>
        <input id="user-username" class="form-content" type="text" name="username" autocomplete="on" required />
        <div class="form-border"></div>
        <label for="user-password" style="padding-top:22px">Password
          </label>
        <input id="user-password" class="form-content" type="password" name="password" required />
        <div class="form-border"></div>
        <label for="user-password" style="padding-top:31px">Repeat Password</label>
        <input id="user-password" class="form-content" type="password" name="repeat-password" required />
        <div class="form-border"></div>
        <input id="submit-btn" type="submit" name="submit" value="REGISTRASI" />
      </form>
    </div>
  </div>
</body>

</html>