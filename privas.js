 //personal chat info

   function Msg1(arg1) {
    var message = document.getElementById("message1").value;
    var arg = document.getElementById("chater").value;
    var fileInput = document.getElementById("pimg");
    var fileInput1 = document.getElementById("pvid");
    var file = fileInput.files[0];
    var file1 = fileInput1.files[0];
    // alert(file1);
    var userdata = new FormData();
    userdata.append('id2', arg);
    userdata.append('id1', arg1);
    userdata.append('msg', message);
    userdata.append('img', file);
    userdata.append('vid', file1);
       $.ajax({
        url: "privateChat.php",
        method: "POST",
        data: userdata,
        contentType: false,
        processData: false,
        success: function(response) {
          
            if (response == "true") {

                loadMessages1(arg);
                document.getElementById("message1").value = "";
                 fileInput.value = ""; 
                fileInput1.value = ""; 
            } else {
                alert(response);
            }
        }
    });
}
function loadMessages1(arg2) {
        $.ajax({
                url:"comments1.php",
                method:"POST",
                data:{otid:arg2},
                success:function(response){
                     if (response.trim() !== "") {
                            $("#oc-id12").html(response);
                            
                           $(document).ready(function() {
                          $('.hover-video').hover(
                            function() {
                              $(this).get(0).play();
                              $(this).prop('muted', false);
                            },
                            function() {
                              $(this).get(0).pause();
                              $(this).get(0).currentTime = 0;
                              $(this).prop('muted', true);
                            }
                          );
                        });
                           
                      
                        } else {
                           alert(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX error if needed
                    }
                });
}

function continuousLoadMessage(arg1) {
    // alert(arg1);
    var isVideoPlaying = false; 
    if ($('video').filter(function() { return !this.paused; }).length > 0) {
        // If video is playing, set flag and return without loading messages
        isVideoPlaying = true;
        return;
    }

    $.ajax({
    url: "newmsg1.php",
    method: "POST",
    data:{chater : arg1},
    success: function(response) {
       if(response == "true") {
        loadMessages1(arg1);
       }
    },
    error: function(xhr, status, error) {
        // Handle AJAX error if needed
    }
});
    
}



     function Chat(arg) {
    
    // Initial calls
    interface(arg);
    loadMessages1(arg);
    continuousLoadMessage(arg);
    document.getElementById("chater").value = arg;

    // Manage display logic
    var inputDiv13 = document.getElementById('oc-id13');
    var inputDiv14 = document.getElementById('oc-id14');
    if (inputDiv14.style.display === "none" || inputDiv14.style.display === "") {
        inputDiv13.style.display = "none";
        inputDiv14.style.display = "block";
    }

    // Set up the interval to continuously load messages every 5 seconds
    var intervalId = setInterval(function() {
        continuousLoadMessage(arg);
    }, 1000);

    // If needed, clear the interval when done
    // clearInterval(intervalId);
}

// Example usage:
// Chat('someArgument');


   function reverse(){
    var inputDiv13=document.getElementById('oc-id13');
        var inputDiv14=document.getElementById('oc-id14');
        if(inputDiv13.style.display==="none"||inputDiv13.style.display==="")
        {
            inputDiv14.style.display="none";
            inputDiv13.style.display="block";
        }
   }