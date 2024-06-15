  function triggerFileInput() {
      // Trigger the file input dialog
      $('#profilePicInput').click();      
  }

  $(document).on('change', '#profilePicInput', function() {
        handleUpload();
    });

  function handleUpload() {
      // Get the input element
      var input = document.getElementById('profilePicInput');
      // Check if any file is selected
      if (input.files && input.files[0]) {
          var file = input.files[0];
          var userdata = new FormData();
          userdata.append('img', file);

           $.ajax({
              url: "update.php",
              method: "POST",
              data: userdata,
              contentType: false,
              processData: false,
              success: function(response) {
             
                  if (response == "true") {
                      alert("updated..successfully");
                      document.getElementById('profilePicInput').value = ""; 
                       window.location.href = window.location.href;
                  } else {
                      alert(response);
                  }
              }
          });
        }
      }