'use strict';

var url_site = 'http://localhost:8000'

var slides = [
    {image: url_site + '/images/slides/slide_1.jpg', title: 'title 1'},
    {image: url_site + '/images/slides/slide_2.jpg', title: 'title 2'},
    {image: url_site + '/images/slides/slide_3.jpg', title: 'title 3'},
    {image: url_site + '/images/slides/slide_4.jpg', title: 'title 4'},
    {image: url_site + '/images/slides/slide_5.jpg', title: 'title 5'}
];

var state;
const time = 2000


function init()
{   
    if(state.timer == null)
        state.timer = window.setInterval(next, time);
}

function stop()
{
    // stop carousel
    window.clearInterval(state.timer);

    state.timer = null; // init value
}


function switchButton(e)
{
    // Codes des touches du clavier.
    let BT_SPACE = 32;
    let BT_LEFT = 39;
    let BT_RIGHT = 37;

    //console.log(e.keyCode)  
    switch(e.keyCode)
    {
        case BT_LEFT:
            next();
            break;
        case BT_RIGHT:
            prev();
            break;
        case BT_SPACE:
            stop();
            break;
    }
}

function refresh(state)
{
    let slide = document.querySelector('.slide img');
    let title = document.querySelector('.title');
    slide.src = slides[state.index].image;
    title.textContent = slides[state.index].title;
}

function next(e)
{
    let index = (state.index+1) % slides.length;
    state.index = index
    //console.log(index)
    refresh(state)
}

function prev(e)
{
    state.index--;
    if(state.index < 0) state.index = slides.length - 1 ;
    //console.log(state.index)
    refresh(state)
}

// init

state = {};
state.index = 0;
state.timer = null;

let nextElement = document.querySelector('#next')
let prevElement = document.querySelector('#prev')
let startElement = document.querySelector("#start")
nextElement.addEventListener('click', next)
prevElement.addEventListener('click', prev)
startElement.addEventListener('click', init)
document.addEventListener('keyup', switchButton)

refresh(state);