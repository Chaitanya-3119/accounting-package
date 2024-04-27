function callNow() {
    alert("Calling now..."); 
}

function learnMore() {
    alert("Learn more clicked"); 
}
let div = document.getElementById('main');
let display = 1;
function hideshow(){
    if(display==0)
    {
        div.style.display = 'block';
        display = 1;
    }
    else{
        div.style.display = 'none';
        display = 0;
    }
}
function toggle()
{
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');
    var popup = document.getElementById('popup');
    popup.classList.toggle('active');
}
