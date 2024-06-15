  function imported(arg) {
        $.ajax({
                url:"imported.php",
                method:"POST",
                data:{info:arg},
                success:function(response){
                     if( response){
                       alert(response);
                     } else{
                        alert(response);
                     }
                }
            });
    }