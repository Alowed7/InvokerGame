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
    <title>InvokerGame</title>
</head>
<body>
  
  <!-- Navigation Bar + Burger -->

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


  <div class="containerr">
    <!-- Controls -->
    <div class="sidebar">
      <?php if (isset($_SESSION['user'])): ?>
    <h2><?= htmlspecialchars($_SESSION['user']['nickname']) ?></h2>
    <a href="logout.php" class="logout-button">Exit</a>
  <?php else: ?>
    <h2>Guest</h2>
  <?php endif; ?>
      <h2>CONTROLS</h2>
      <ul>
        <li>Q - Quas</li>
        <li>W - Wex</li>
        <li>E - Exort</li>
        <li>R - Invoke</li>
        <li>D - Spell 1</li>
        <li>F - Spell 2</li>
      </ul>
    </div>

    <!-- Main Game UI -->
    <div class="main">
      <h1 class="by">INVOKER GAME</h1>
      <h2>CHOOSE YOUR GAME, WISELY!</h2>
      <div class="game-area">
        <h2>Invoke This Spell:</h2>
        <div id="target-spell" class="spell-name">---</div>
      
        <div class="input-buttons">
          <button onclick="pressKey('Q')">Q</button>
          <button onclick="pressKey('W')">W</button>
          <button onclick="pressKey('E')">E</button>
          <button onclick="pressKey('R')">Invoke</button>
        </div>
      
        <p>Current input: <span id="current-combo">---</span></p>
        <p>Correct: <span id="score">0</span></p>
        <p>Time left: <span id="timer">10</span>s</p>
        <p id="game-status"></p>
      
        <button id="start-btn" onclick="startGame()">Start Game</button>
        <button id="restart-btn" onclick="startGame()" style="display: none;">Restart Game</button>
      </div>
    </div>

    <!-- Spells & Stats -->
    <div class="sidebar right">
      <h2>SPELLS</h2>
      <ul class="spells">
        <li><span>Cold Snap</span> - Q Q Q</li>
        <li><span>Ghost Walk</span> - Q Q W</li>
        <li><span>Ice Wall</span> - Q Q E</li>
        <li><span>EMP</span> - W W W</li>
        <li><span>Tornado</span> - W W Q</li>
        <li><span>Alacrity</span> - W W E</li>
        <li><span>Sun Strike</span> - E E E</li>
        <li><span>Forge Spirit</span> - E E Q</li>
        <li><span>Chaos Meteor</span> - E E W</li>
        <li><span>Deafening Blast</span> - Q W E</li>
      </ul>
    </div>
  </div>
  <script src="js/app.js"></script>
</body>
</html>