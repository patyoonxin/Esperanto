const footprintRoute = [
    { x: 11, y: 78, miniGameUrl: '..\\esperanto_small_game(rew)\\Pronoun_tran.html', modalSize: { width: 800, height: 600 } },
    { x: 22, y: 35, miniGameUrl: '..\\esperanto_small_game(rew)\\animal_crossword.html', modalSize: { width: 800, height: 600 } },
    { x: 40, y: 10, miniGameUrl: '..\\esperanto_small_game(rew)\\color_pic.html', modalSize: { width: 800, height: 600 } },
    { x: 52, y: 45, miniGameUrl: '..\\esperanto_small_game(rew)\\Conjunction_tran.html', modalSize: { width: 800, height: 600 } },
    { x: 42, y: 87, miniGameUrl: '..\\esperanto_small_game(rew)\\emotion(2)_wordsearch.html', modalSize: { width: 1000, height: 600 } },
    { x: 73, y: 83, miniGameUrl: '..\\esperanto_small_game(rew)\\family_crossword.html', modalSize: { width: 800, height: 600 } },
    { x: 78, y: 40, miniGameUrl: '..\\esperanto_small_game(rew)\\time(2)_wordsearch.html', modalSize: { width: 1000, height: 600 } },
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
  openMiniGame(miniGameUrl, modalSize);
}

function openMiniGame(miniGameUrl, modalSize) {
  // Open the mini-game in a new window or modal
  const modal = document.createElement('div');
  modal.classList.add('modal');

  const iframe = document.createElement('iframe');
  iframe.src = miniGameUrl;
  iframe.width = modalSize.width;
  iframe.height = modalSize.height;

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
    window.confirm("Congratulations, You Have Completed the games!");
  }
}

// function handleResize() {
//   const mapContainer = document.querySelector('.map-container');
//   const mapWidth = mapContainer.offsetWidth;
//   const mapHeight = mapContainer.offsetHeight;

//   footprintRoute.forEach(({ x, y }, index) => {
//     const footprintElement = document.elementFromPoint(
//       (x / 100) * mapWidth,
//       (y / 100) * mapHeight
//     );
//     footprintElement.style.left = `${x}%`;
//     footprintElement.style.top = `${y}%`;
//   });
// }

window.addEventListener('load', moveFootprint);

// window.addEventListener('resize', handleResize);