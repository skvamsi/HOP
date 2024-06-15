function chargeSheet() {
    var inputDiv1 = document.getElementById('oc-id1');
    var inputDiv2 = document.getElementById('oc-id2');
    var inputDiv3 = document.getElementById('oc-id3');
    var inputDiv4 = document.getElementById('oc-id4');
    var inputDiv5 = document.getElementById('oc-id5');
    var inputDiv6 = document.getElementById('oc-id6');
    var inputDiv10 = document.getElementById('oc-id10');
    var inputDiv20 = document.getElementById('oc-id20');
    var div = document.querySelector('#mb4');
     var div7 = document.querySelector('#mb7');
    if (!div.classList.contains('visible')) {
        // If the #mb4 div is not visible, show it and hide the other elements
        div.classList.add('visible');
        div7.classList.remove('visible');
        
        inputDiv1.style.display = "none";
        inputDiv2.style.display = "none";
        inputDiv3.style.display = "none";
        inputDiv4.style.display = "none";
        inputDiv5.style.display = "none";
        inputDiv6.style.display = "none";
        inputDiv10.style.display = "none";
        inputDiv20.style.display = "none";

    } else {
        // If the #mb4 div is visible, hide it and show the other elements
        div.classList.remove('visible');
        div7.classList.remove('visible');
        inputDiv1.style.display = "block";
        inputDiv2.style.display = "none";
        inputDiv3.style.display = "none";
        inputDiv4.style.display = "none";
        inputDiv5.style.display = "none";
        inputDiv6.style.display = "none";
        inputDiv10.style.display = "none";
        inputDiv20.style.display = "none";
    }
}

 //mobile div users profile
function mb_profile() {
    var inputDiv1 = document.getElementById('oc-id1');
    var inputDiv2 = document.getElementById('oc-id2');
    var inputDiv3 = document.getElementById('oc-id3');
    var inputDiv4 = document.getElementById('oc-id4');
    var inputDiv5 = document.getElementById('oc-id5');
    var inputDiv6 = document.getElementById('oc-id6');
    var inputDiv10 = document.getElementById('oc-id10');
    var inputDiv20 = document.getElementById('oc-id20');
    var div = document.querySelector('#mb4');
     var div7 = document.querySelector('#mb7');

        // If the #mb4 div is not visible, show it and hide the other elements
        div.classList.remove('visible');
        div7.classList.add('visible');
        
        inputDiv1.style.display = "none";
        inputDiv2.style.display = "none";
        inputDiv3.style.display = "none";
        inputDiv4.style.display = "none";
        inputDiv5.style.display = "none";
        inputDiv6.style.display = "none";
        inputDiv10.style.display = "none";
        inputDiv20.style.display = "none";

    } 
