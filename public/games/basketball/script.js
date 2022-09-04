const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
const image = document.getElementById('source');
const ballImage = document.getElementById("ballImage");
const backgound = document.getElementById("court");
const scoreText = document.getElementById("score");
const startButton = document.getElementById("start")


canvas.height = document.documentElement.clientHeight * 0.8;  //Responsive canvas size
canvas.width = document.documentElement.clientWidth * 0.6;    //==  

let currentScore = 0;
var ballArr = new Array();

let random;
let ballIndex;
let animationId;




function getRndInteger(min, max) {
  return Math.floor(Math.random() * (max - min) ) + min;
}

class player {
  constructor(){
    this.w = 90;
    this.h = 70;
    this. x = canvas.width / 2;
    this.y = canvas.height;
    this.speed = canvas.width /100;//responsive speed
    this.dx = 0;
  }
  checkCatch(enemy){//check if catched the ball
    let myleft = this.x;
    let myright = this.x + (this.w);
    let mytop = this.y;
    let mybottom = this.y + (this.h);
    let otherleft = enemy.x;
    let otherright = enemy.x + (enemy.w);
    let othertop = enemy.y;
    let otherbottom = enemy.y + (enemy.h);
    let collision = true;
    if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
       collision = false;
    }
    else {return collision;}
  }
};
const hero = new player();//initialising player

class balls{
  constructor(x){
    this.w = 20;//width
    this.h = 20;//height
    this.x = x; //random number between 5 and width of canvas
    this.y = 40;//y position = always the top of the canvas
    this.speed = 2;
  }
  drawBall(){
    ctx.drawImage(ballImage, this.x, this.y, this.w, this.h);
  }
  updateBall(ballIndex){
    ballArr[ballIndex].y += this.speed;
    this.drawBall();  
  }
}

function detectWalls() {
  
  if (hero.x < 0) {                     // Left wall
    hero.x = 0;
  }
  if (hero.x + hero.w > canvas.width){  // Right Wall
    hero.x = canvas.width - hero.w;
  }
  if (hero.y + hero.h > canvas.height){ // Bottom Wall 
    hero.y = canvas.height - hero.h;
  }
}


function createBalls(){
  random = getRndInteger(5, canvas.width - 5);//random number between 5 and width of canvas
  ballArr.push(new balls(random));            //adding initialised balls to array at random x-point
}

function ballMove(){
  ballArr.forEach((value, index, array) => { //For each ball in array, following things happen
    value.drawBall();
    value.updateBall(index);
    if(hero.checkCatch(value)){           //if Ball is catched 
      array.splice(index, 1);             //Remove ball from array
      value.h = 0;                        //Remove ball from screen
      currentScore+= 20;                  //Add 20 to score
      scoreText.innerHTML = currentScore; //Display current score
    } 
    else if(value.y >= canvas.height){    //If ball touches ground -> Game Over
      array.splice(0, array.length);
      cancelAnimationFrame(animationId);
      document.getElementById("gameOverScreen").style.display = "flex";                     //display Game Over screen
      document.getElementById("gameOverScore").innerText = "Your score is " + currentScore; //display final score
    }
  })
}

//Game-Update (once per frame)
function update() {                     
  animationId = requestAnimationFrame(update);
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.drawImage(image, hero.x, hero.y, hero.w, hero.h);
 
  hero.x += hero.dx;
  detectWalls();
  ballMove();
}

function moveRight() {
  hero.dx = hero.speed;
}

function moveLeft() {
 hero.dx = -hero.speed;
}

function keyDown(e) {
  if (e.key === 'ArrowRight') {
    moveRight();
  } 
  else if (e.key === 'ArrowLeft') {
    moveLeft();
  }
}

function keyUp(e) {
  if (e.key == 'ArrowRight' || e.key == 'ArrowLeft') {
    hero.dx = 0;
  }
}


function startCanvas(){
  canvas.style.display = "block";
  scoreText.style.display = "inline";
  startButton.style.display = "none";
  setInterval(createBalls, 1500);     //Creating balls
  update();                           //Update canvas
}


document.addEventListener('keydown', keyDown);
document.addEventListener('keyup', keyUp);
