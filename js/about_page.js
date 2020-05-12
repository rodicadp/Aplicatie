// get modal element
var modal=document.getElementById('simpleModal');
var modal2=document.getElementById('simpleModal2');
//get open modal button
var login_button=document.getElementById('login_button');
var sign_button=document.getElementById('sign_button');

//get clode button
var closeBtn=document.getElementsByClassName('closeBtn')[0];
var closeBtn2=document.getElementsByClassName('closeBtn2')[0];

//listen for open click
login_button.addEventListener('click',openModal);
sign_button.addEventListener('click',openModal2);

//listen for clode click
closeBtn.addEventListener('click',closeModal);
closeBtn2.addEventListener('click',closeModal2);

//outside click
window.addEventListener('click', Outsideclick);
window.addEventListener('click', Outsideclick2);

//function to open modal
function openModal(){
    modal.style.display='block';
}
function openModal2(){
    modal2.style.display='block';
}

//function to close modal
function closeModal(){
    modal.style.display='none';
}
function closeModal2(){
    modal2.style.display='none';
}

//function to close modal if outside click
function Outsideclick(e){
    if(e.target == modal){
    modal.style.display='none';
}
}
function Outsideclick2(e){
    if(e.target == modal2){
    modal2.style.display='none';
}
}
