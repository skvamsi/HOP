function delH(arg) {
    $.ajax({
        url: "dele1.php",
        method: "POST",
        data: { id: arg },
        success: function(response) {
            if (response) {
                alert(response); // If response is not empty, show the response message
            } else {
                alert(response); // If response is empty, show an alert
            }
        }
    });
}
