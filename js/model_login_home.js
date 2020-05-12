// get modal element (yt)
var modal2=document.getElementById('simpleModal2');

//get open modal button
var login_button=document.getElementById('login_button');

//get clode button
var closeBtn2=document.getElementsByClassName('closeBtn')[0];

//listen for open click
login_button.addEventListener('click',openModal2);

//listen for clode click
closeBtn2.addEventListener('click',closeModal2);

//outside click
window.addEventListener('click', Outsideclick2);

//function to open modal
function openModal2(){
    modal2.style.display='block';
}

//function to close modal
function closeModal2(){
    modal2.style.display='none';
}

//function to close modal if outside click
function Outsideclick2(e){
    if(e.target == modal2){
    modal2.style.display='none';
}
}
