function search1(arg) {
    var message = document.getElementById("srch1").value;

    var userdata = new FormData();
    userdata.append('data', message);
    userdata.append('id', arg);

    $.ajax({
        url: "search.php",
        method: "POST",
        data: userdata,
        processData: false,  
        contentType: false,  
        success: function(response) {
            if (response.trim() !== "") {
                $("#oc-id101").html(response);
                // document.getElementById("srch").value = "";
            } else {
                alert("Not found...sorry");
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}
