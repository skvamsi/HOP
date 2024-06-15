function smd_people(){
      // alert("jo");
        var inputDiv13 = document.getElementById('oc-id11');
        
        var div = document.querySelector('#smd-people');
        if (!div.classList.contains('visible')) {
            inputDiv13.style.display = "none";
        
            div.classList.add('visible');
        } else {
            div.classList.remove('visible');
            inputDiv13.style.display = "block";
        }
    }