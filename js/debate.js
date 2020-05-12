// get modal element (yt)
var modal=document.getElementById('editDebate');

//get open modal button
var edit_button=document.getElementById('edit');

//get clode button
var closeBtn2=document.getElementsByClassName('closeBtn')[0];

//listen for open click
edit_button.addEventListener('click',openmodal);

//listen for clode click
closeBtn2.addEventListener('click',closemodal);

//outside click
window.addEventListener('click', Outsideclick2);

//function to open modal
function openmodal(){
    modal.style.display='block';
}

//function to close modal
function closemodal(){
    modal.style.display='none';
}

//function to close modal if outside click
function Outsideclick2(e){
    if(e.target == modal){
    modal.style.display='none';
}
}
