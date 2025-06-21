<?php
       session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sign Up</title>
</head>
<body>
    <header class="header">
    <div class="container header_container">
      <a href="index.php" class="logo">
        <img class="logo_img" src="img/logo_quas.png" alt="">
      </a>
      <nav class="menu">
        <ul class="menu_list">
          <li class="menu_item">
            <a class="menu_link" href="signin.php">
              SIGN IN
            </a>
          </li>
          <li class="menu_item">
            <a class="menu_link" href="signup.php">
              SIGN UP
            </a>
          </li>
        </ul>
      </nav>

    </div>
  </header>
    <div class="signin">
    <h1 class="Create_account">Create an account</h1>
    <form action="register.php" method="post">
      <label for="nickname">Nickname</label>
      <input type="text" id="nickname" name="nickname">

      <label for="password">Password</label>
      <input type="text" id="password" name="password">

      <label for="password">Repeat passwords</label>
      <input type="text" id="password" name="repeatpassword">

      <label for="email">Email address</label>
      <input type="text" id="password" name="email">

      <p class="msg">
        <?= $_SESSION['message'] ?? '' ?>
        <?php unset($_SESSION['message']); ?>
      </p>

      <button type="submit" class="create_button">Create</button>
    </form>
  </div> 
</body>
</html>