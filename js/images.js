/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//wedding
function showHover(img) {
   if(img) {
        img.src = './img/wedding_1.png';
   }
}
function showNormal(img) {
   if(img) {
        img.src = './img/wedding.png';
   }
}
$(document).ready(function() {
    $('#wedding').mouseover(function(){
	showHover(this);
    }).mouseout(function(){
	showNormal(this);
    });
});
//apple
function showHover1(img) {
   if(img) {
        img.src = './img/yellow_apple.png';
   }
}
function showNormal1(img) {
   if(img) {
        img.src = './img/pink_apple.png';
   }
}
$(document).ready(function() {
    $('#nutricion').mouseover(function(){
	showHover1(this);
    }).mouseout(function(){
	showNormal1(this);
    });
});
//flower
function flower1(img) {
   if(img) {
        img.src = './img/flower_1.png';
   }
}
function flower(img) {
   if(img) {
        img.src = './img/flower.png';
   }
}
$(document).ready(function() {
    $('#flower').mouseover(function(){
	flower1(this);
    }).mouseout(function(){
	flower(this);
    });
});
//cake
function cake1(img) {
   if(img) {
        img.src = './img/cake_1.png';
   }
}
function cake(img) {
   if(img) {
        img.src = './img/cake.png';
   }
}
$(document).ready(function() {
    $('#cake').mouseover(function(){
	cake1(this);
    }).mouseout(function(){
	cake(this);
    });
});
//teddy_bear
function teddy_bear1(img) {
   if(img) {
        img.src = './img/toy_1.png';
   }
}
function teddy_bear(img) {
   if(img) {
        img.src = './img/toy.png';
   }
}
$(document).ready(function() {
    $('#teddy_bear').mouseover(function(){
	teddy_bear1(this);
    }).mouseout(function(){
	teddy_bear(this);
    });
});
//card
function card1(img) {
   if(img) {
        img.src = './img/pink_card.png';
   }
}
function card(img) {
   if(img) {
        img.src = './img/yellow_card.png';
   }
}
$(document).ready(function() {
    $('#card').mouseover(function(){
	card1(this);
    }).mouseout(function(){
	card(this);
    });
});


