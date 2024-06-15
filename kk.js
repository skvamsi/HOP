 //committee
   function Msg(arg) {
    var message = document.getElementById("message").value;
    var userdata = {
        id: arg,
        msg: message
      };
        $.ajax({
                url:"privateChat.php",
                method:"POST",
                data:{info:userdata},
                success:function(response){
                     if( response == "true"){
                        loadMessages();
                        document.getElementById("message").value = ""; 
                         
                     } else{
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
                     
                        } else {
                            // Handle empty response or error if needed
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX error if needed
                    }
                });
}
// Load messages initially
loadMessages();

// Update messages every 5 seconds (example)
setInterval(loadMessages, 5000);
