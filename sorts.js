function Sort(arg) {

		var inputDiv20 = document.getElementById("oc-id20");
    	var inputDiv1=document.getElementById('oc-id1');
        var inputDiv2=document.getElementById('oc-id2');
        var inputDiv3=document.getElementById('oc-id3');
        var inputDiv4=document.getElementById('oc-id4');
        var inputDiv5=document.getElementById('oc-id5');
        var inputDiv6=document.getElementById('oc-id6');
        var inputDiv10=document.getElementById('oc-id10');
        var div = document.querySelector('#mb4');
        if(inputDiv20.style.display==="none"||inputDiv20.style.display==="")
        {
        	div.classList.remove('visible');
            inputDiv1.style.display="none";
            inputDiv2.style.display="none";
            inputDiv3.style.display="none";
            inputDiv4.style.display="none";
            inputDiv5.style.display="none";
            inputDiv6.style.display="none";
            inputDiv10.style.display="none";
            inputDiv20.style.display="block";
        }

	$.ajax({
	    url: "sorts.php",
	    method: "POST",
	    data: { info: arg },
	    success: function(response) {
	        if (response.trim() !== "") { // Check if the response is not empty
	            $("#oc-id21").html(response); // Update the HTML content of the element with ID "oc-id21"
	        } else {
	            // Handle empty response if needed
	        }
	    },
	    error: function(xhr, status, error) {
	        // Handle AJAX error if needed
	    }
	});


}