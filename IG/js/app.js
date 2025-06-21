const spells = {
    'QQQ': 'Cold Snap',
    'QQW': 'Ghost Walk',
    'QQE': 'Ice Wall',
    'WWW': 'EMP',
    'WWQ': 'Tornado',
    'WWE': 'Alacrity',
    'EEE': 'Sun Strike',
    'EEQ': 'Forge Spirit',
    'EEW': 'Chaos Meteor',
    'QWE': 'Deafening Blast'
  };
  
  let currentCombo = [];
  let currentSpellCode = '';
  let score = 0;
  let timer;
  let timeLeft = 10;
  let gameRunning = false;
  
  function getRandomSpell() {
    const keys = Object.keys(spells);
    return keys[Math.floor(Math.random() * keys.length)];
  }
  
  function setNewTarget() {
    currentSpellCode = getRandomSpell();
    document.getElementById('target-spell').textContent = spells[currentSpellCode];
    currentCombo = [];
    updateComboDisplay();
    resetTimer();
  }
  
  function pressKey(key) {
    if (!gameRunning) return;
  
    if (key === 'R') {
      const combo = currentCombo.join('');
      if (combo === currentSpellCode) {
        score++;
        document.getElementById('score').textContent = score;
        document.getElementById('game-status').textContent = '';
        setNewTarget();
      } else {
        endGame('Incorrect combination! Game Over!');
      }
    } else {
      if (currentCombo.length < 3) {
        currentCombo.push(key);
        updateComboDisplay();
      }
    }
  }
  
  function updateComboDisplay() {
    const display = currentCombo.join(' ') || '---';
    document.getElementById('current-combo').textContent = display;
  }
  
  function resetTimer() {
    clearInterval(timer);
    timeLeft = 10;
    document.getElementById('timer').textContent = timeLeft;
    timer = setInterval(() => {
      timeLeft--;
      document.getElementById('timer').textContent = timeLeft;
      if (timeLeft <= 0) {
        endGame('Time’s up! Game Over!');
      }
    }, 1000);
  }
  
  function endGame(message) {
    clearInterval(timer);
    gameRunning = false;
    document.getElementById('game-status').textContent = message;
    document.getElementById('restart-btn').style.display = 'inline-block';
    document.getElementById('start-btn').style.display = 'none';
    currentCombo = [];
    updateComboDisplay();
  }
  
  function startGame() {
    score = 0;
    gameRunning = true;
    document.getElementById('score').textContent = score;
    document.getElementById('game-status').textContent = '';
    document.getElementById('restart-btn').style.display = 'none';
    document.getElementById('start-btn').style.display = 'none';
    setNewTarget();
  }

  
  
