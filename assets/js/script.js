// author assignment members

var btn = document.getElementById('order');
var order = document.getElementsByClassName('order')[0];
var devs = document.getElementById('devs');

function popUp(){
    order.classList.add('active');
}

function hide(e){
    if(e.target.tagName === 'DIV'){
        order.classList.remove('active');
    }
}

btn && (btn.onclick = popUp);
order && (order.onclick = hide);

// Smooth scroll for 'Group Members' section
// devs.onclick = function (e){
//     e.preventDefault();
//     document.querySelector('#devs-sec').scrollIntoView({
//         behavior:'smooth'
//     });
// }