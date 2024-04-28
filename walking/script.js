const footprintRoute = [
    { x: 11, y: 78, miniGameUrl: '..\\esperanto_small_game(rew)\\Pronoun_tran.html', modalSize: { width: 800, height: 600 } },
    { x: 20, y: 35, miniGameUrl: '..\\esperanto_small_game(rew)\\animal_crossword.html', modalSize: { width: 800, height: 600 } },
    { x: 38, y: 6, miniGameUrl: '..\\esperanto_small_game(rew)\\color_pic.html', modalSize: { width: 800, height: 600 } },
    { x: 50, y: 45, miniGameUrl: '..\\esperanto_small_game(rew)\\Conjunction_tran.html', modalSize: { width: 800, height: 600 } },
    { x: 40, y: 89, miniGameUrl: '..\\esperanto_small_game(rew)\\emotion(2)_wordsearch.html', modalSize: { width: 1000, height: 600 } },
    { x: 71, y: 83, miniGameUrl: '..\\esperanto_small_game(rew)\\family_crossword.html', modalSize: { width: 800, height: 600 } },
    { x: 76, y: 38, miniGameUrl: '..\\esperanto_small_game(rew)\\time(2)_wordsearch.html', modalSize: { width: 1000, height: 600 } },
    { x: 83, y: 5, miniGameUrl: '..\\esperanto_small_game(rew)\\weather_anagram.html', modalSize: { width: 800, height: 600 } },
];

const footprint = document.querySelector('.footprint');
let currentIndex = 0;
let isGameInProgress = false;
let mapContainer, mapWidth, mapHeight;

function moveFootprint() {
  if (isGameInProgress) return;

  const { x, y, miniGameUrl, modalSize } = footprintRoute[currentIndex];
  footprint.style.left = `${x}%`;
  footprint.style.top = `${y}%`;
  footprint.style.transition = 'left 2s, top 2s';

  isGameInProgress = true;
  setTimeout(() => {
    openMiniGame(miniGameUrl, modalSize);
  }, 2100); 
}

function openMiniGame(miniGameUrl, modalSize) {

  const modal = document.createElement('div');
  modal.classList.add('modal');

  const modalContent = document.createElement('div');
  modalContent.classList.add('modal-content');

  const iframe = document.createElement('iframe');
  iframe.src = miniGameUrl;
  iframe.width = modalSize.width;
  iframe.height = modalSize.height;
  iframe.style.border = 'none';

  modalContent.appendChild(iframe);
  modal.appendChild(modalContent);

  const closeButton = document.createElement('button');
  closeButton.textContent = 'Close';
  closeButton.addEventListener('click', () => {
    modal.remove();
    isGameInProgress = false;
    setTimeout(continueFootprintAnimation, 2000);
  });

  modal.appendChild(iframe);
  modal.appendChild(closeButton);
  document.body.appendChild(modal);
}
  
function continueFootprintAnimation() {
  if (currentIndex < footprintRoute.length - 1) {
    currentIndex++;
    moveFootprint();
  } else {
    if(window.confirm("Congratulations, You Have Completed the games!") == true){
      window.location.replace("../index.html");
    };
  }
}

window.addEventListener('load', moveFootprint);