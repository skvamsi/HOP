 //committee
function Msg(arg) {
    // alert("hi");
    var message = document.getElementById("message").value;
    var fileInput = document.getElementById("p-img");
    var fileInput1 = document.getElementById("p-vid");
    var file = fileInput.files[0];
    var file1 = fileInput1.files[0];
    // alert(file1);
    var userdata = new FormData();
    userdata.append('id', arg);
    userdata.append('msg', message);
    userdata.append('img', file);
    userdata.append('vid', file1);
    $.ajax({
        url: "roug.php",
        method: "POST",
        data: userdata,
        contentType: false,
        processData: false,
        success: function(response) {
          
            if (response == "true") {
                loadMessages();
                document.getElementById("message").value = "";
                 fileInput.value = ""; 
                fileInput1.value = ""; 
            } else {
                alert(response);
            }
        }
    });
}


function loadMessages() {

     $.ajax({
                url:"comments.php",
                method:"POST",
                success:function(response){

                     if (response.trim() !== "") {
                        
                            $("#oc-id11").html(response);

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
                           alert("no msgs found...");
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX error if needed
                    }
                });
}

function continuousLoadMessages() {
    var isVideoPlaying = false; 
    if ($('video').filter(function() { return !this.paused; }).length > 0) {
        // If video is playing, set flag and return without loading messages
        isVideoPlaying = true;
        return;
    }

    $.ajax({
        url: "newmsg.php",
        method: "POST",
        success: function(response) {             
            if (response == "true") {
                loadMessages();
            }
        },
        error: function(xhr, status, error) {
            // Handle AJAX error if needed
        }
    });
}

setInterval(function() {
    continuousLoadMessages();
}, 1000);


