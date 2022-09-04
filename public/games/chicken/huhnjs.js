//Damit alle Klassen square in squares aufgenommen wird//
const squares = document.querySelectorAll('.square')
const huhn = document.querySelector('.huhn')
const timeLeft = document.querySelector('#time-left')
const score = document.querySelector('#score')

//resultat, timer, und Anfangszeit//
let result = 0
let hitPosition
let currentTime = 15
let timerId = null

function randomSquare() {
  squares.forEach(square => {
    square.classList.remove('huhn')
  })

  let randomSquare = squares[Math.floor(Math.random() * 15)]
  randomSquare.classList.add('huhn')

  hitPosition = randomSquare.id
}


//falls Huhn getroffen wird geht das Resultat um 1 nach oben//
squares.forEach(square => {
  square.addEventListener('mousedown', () => {
    if (square.id == hitPosition) {
      result++
      score.textContent = result
      hitPosition = null
    }
  })
})

//Intervall in denen die Hühner spwanen//
function moveHuhn() {
  timerId = setInterval(randomSquare, 800)
}

moveHuhn()


//ganz am Schluss wenn Zeit abgelaufen//
function countDown() {
 currentTime--
 timeLeft.textContent = currentTime

 if (currentTime == 0) {
   clearInterval(countDownTimerId)
   clearInterval(timerId)
   alert('Runde vorbei, deine Punkte: ' + result)
   if(result>16){
     alert('Wow, Sie haben ja über 16 Punkte, KRASS')
   }
 }

}

//Wie schnell das Spiel gehen sollte desto grösser die Zahl desto langsamer wird das Spiel//
let countDownTimerId = setInterval(countDown, 1000)