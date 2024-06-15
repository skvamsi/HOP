function admi() {

  // Getting values from input fields
  var name = document.getElementById('ad-1').value;
  var password = document.getElementById('ad-2').value;

  // Creating an object to hold the user data
  var userdata = {
    name: name,
    password: password
  };

  // AJAX request
  $.ajax({
    url: "admin.php",
    method: "POST",
    data: { adminData: userdata }, 
    success: function (response) {
      // Check if the response is "true"
      if(response == "true") {
        // If response is "true", display certain elements
        var inputDiv6 = document.getElementById('oc-id6');
        var inputDiv10 = document.getElementById('oc-id10');
        if(inputDiv10.style.display === "none" || inputDiv10.style.display === "") {
          inputDiv6.style.display = "none";
          inputDiv10.style.display = "block";
        }
      } else {
        // If response is not "true", show an alert
        alert("Sorry, something went wrong."); // Modified the alert message
      }
    }
  });
}
