<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Do You Like Me?</title>
  <style>
    body {
      background-color: #fff0f5;
      font-family: 'Segoe UI', sans-serif;
      text-align: center;
      overflow: hidden;
      margin: 0;
      padding: 0;
      height: 100vh;
      position: relative;
    }

    .title {
      font-size: 36px;
      color: #d63384;
      margin-top: 60px;
      height: 50px;
    }

    .typewriter {
      display: inline-block;
      border-right: 2px solid #d63384;
      white-space: nowrap;
      overflow: hidden;
      animation: typing 4s steps(40, end), blink 0.75s step-end infinite;
    }

    @keyframes typing {
      from { width: 0 }
      to { width: 100% }
    }

    @keyframes blink {
      50% { border-color: transparent }
    }

    .image-container {
      margin-top: 40px;
    }

    .image-container img {
      width: 200px;
      border-radius: 20px;
    }

    .buttons {
      margin-top: 40px;
      position: relative;
      height: 200px;
    }

    button {
      padding: 15px 30px;
      font-size: 18px;
      margin: 20px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
    }

    #yes {
      background-color: #ff69b4;
      color: white;
      position: relative;
    }

    #no {
      background-color: #999;
      color: white;
      position: fixed; /* Changed to fixed for better control */
      top: 300px; /* Initial position */
      left: calc(50% + 70px); /* Near center, right side */
      transition: left 0.3s ease, top 0.3s ease;
    }

    #message {
      margin-top: 20px;
      font-size: 24px;
      font-weight: bold;
      color: #c2185b;
      font-family: 'Comic Sans MS', cursive;
      animation: none;
      min-height: 35px;
    }

    #warning {
      margin-top: 20px;
      font-size: 20px;
      font-weight: bold;
      color: #d00000;
      font-family: 'Comic Sans MS', cursive;
      animation: none;
      min-height: 28px;
    }

    @keyframes pop {
      0% { transform: scale(0.5); opacity: 0; }
      50% { transform: scale(1.1); opacity: 1; }
      100% { transform: scale(1); }
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-5px); }
      50% { transform: translateX(5px); }
      75% { transform: translateX(-5px); }
    }

    .shake {
      animation: shake 0.5s infinite;
    }

    /* 💖 Heart Animation */
    .heart {
      position: fixed;
      width: 20px;
      height: 20px;
      background-color: red;
      transform: rotate(45deg);
      animation: fall 5s linear infinite;
      pointer-events: none;
      z-index: 9999;
    }

    .heart::before,
    .heart::after {
      content: '';
      position: absolute;
      width: 20px;
      height: 20px;
      background-color: red;
      border-radius: 50%;
    }

    .heart::before {
      top: -10px;
      left: 0;
    }

    .heart::after {
      left: -10px;
      top: 0;
    }

    @keyframes fall {
      0% { top: -10%; opacity: 1; }
      100% { top: 110%; opacity: 0; }
    }
  </style>
</head>
<body>

  <!-- ✨ Animated Title with Name -->
  <div class="title">
    <div class="typewriter">Do you like me, ?  💞</div>
  </div>

  <!-- Cute Image -->
  

  <!-- Buttons -->
  <div class="buttons">
    <button id="yes">Yes 💖</button>
    <button id="no">No 😢</button>
  </div>

  <!-- Messages -->
  <div id="message"></div>
  <div id="warning"></div>

  <script>
    const noBtn = document.getElementById('no');
    const yesBtn = document.getElementById('yes');
    const msg = document.getElementById('message');
    const warning = document.getElementById('warning');

    let noClickCount = 0;

    // No button moves only after 5th click onwards
    noBtn.addEventListener('mouseover', () => {
      if (noClickCount >= 5) {
        const btnWidth = noBtn.offsetWidth;
        const btnHeight = noBtn.offsetHeight;
        const maxX = window.innerWidth - btnWidth - 20;
        const maxY = window.innerHeight - btnHeight - 20;

        const x = Math.floor(Math.random() * maxX);
        const y = Math.floor(Math.random() * maxY);

        noBtn.style.left = x + 'px';
        noBtn.style.top = y + 'px';
      }
    });

    yesBtn.addEventListener('click', () => {
      msg.innerText = "Awww! Love you too! 💕💍";
      msg.style.animation = "none";
      msg.offsetHeight; // trigger reflow
      msg.style.animation = "pop 0.4s ease";

      warning.innerText = "";
      warning.classList.remove('shake');

      startHearts();
    });

    noBtn.addEventListener('click', () => {
      noClickCount++;

      if (noClickCount === 1) {
        msg.innerText = "Please think again 🙏";
        warning.innerText = "";
        warning.classList.remove('shake');
      } else if (noClickCount === 2) {
        msg.innerText = "Ek aur baar soch lo! 🤔";
      } else if (noClickCount === 3) {
        msg.innerText = "Baby maan jao na 😢";
      } else if (noClickCount === 4) {
        msg.innerText = "Kitna bhav khaogi 😩";
      } else {
        msg.innerText = "";
        warning.innerText = "⚠️ Ab toh haan kar do warna dil toot jayega!";
        warning.classList.add('shake');
      }

      // Animate message
      msg.style.animation = "none";
      msg.offsetHeight;
      msg.style.animation = "pop 0.4s ease";
    });

    function startHearts() {
      setInterval(() => {
        const heart = document.createElement("div");
        heart.className = "heart";
        heart.style.left = Math.random() * 100 + "vw";
        heart.style.animationDuration = 3 + Math.random() * 2 + "s";
        document.body.appendChild(heart);
        setTimeout(() => {
          heart.remove();
        }, 5000);
      }, 200);
    }
  </script>
</body>
</html>
