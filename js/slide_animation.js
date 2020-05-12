var sIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
    }
    sIndex++;
    if (sIndex > x.length) {sIndex = 1}
    x[sIndex-1].style.display = "block";
    setTimeout(carousel, 3000);
    }
