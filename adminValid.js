function validateForm() {
    var data1 = $('#bid1').val().trim();
    var data2 = $('#bid2').val().trim();
    var data3 = $('#bid3').val().trim();
    var data5 = $('#did1').val().trim();
    var data6 = $('#did2').val().trim();
    var data7 = $('#did3').val().trim();

    // Regular expression to match whole numbers (positive or negative)
    var numericRegex = /^[+-]?\d+$/;

    // Function to validate whole number input
    function isWholeNumberInput(input) {
        return numericRegex.test(input);
    }

    // Validate each input field
    if (!isWholeNumberInput(data1) || !isWholeNumberInput(data2) || !isWholeNumberInput(data3) ||
        !isWholeNumberInput(data5) || !isWholeNumberInput(data6) || !isWholeNumberInput(data7)) {
        alert("Enter valid whole number data.");
        return false;
    }


    // Additional validation for specific range (less than or equal to 5)
    if (data1 > 2030 || data2 > 2030 || data3 > 2030) {
        alert('Enter valid years (less than or equal to 5).');
        return false;
    }

    // All validations passed
    return true;
}
function validateForm1() {
    var data1 = $('#bid4').val().trim();
    var data2 = $('#bid5').val().trim();
    var data3 = $('#bid6').val().trim();
    var data5 = $('#did4').val().trim();
    var data6 = $('#did5').val().trim();
    var data7 = $('#did6').val().trim();

    // Regular expression to match whole numbers (positive or negative)
    var numericRegex = /^[+-]?\d+$/;

    // Function to validate whole number input
    function isWholeNumberInput(input) {
        return numericRegex.test(input);
    }

    // Validate each input field
    if (!isWholeNumberInput(data1) || !isWholeNumberInput(data2) || !isWholeNumberInput(data3) ||
        !isWholeNumberInput(data5) || !isWholeNumberInput(data6) || !isWholeNumberInput(data7)) {
        alert("Enter valid whole number data.");
        return false;
    }


    // Additional validation for specific range (less than or equal to 5)
    if (data1 > 2030 || data2 > 2030 || data3 > 2030) {
        alert('Enter valid years (less than or equal to 5).');
        return false;
    }

    // All validations passed
    return true;
}

function emeValid() {
    var data1 = $('#Name0').val();
    var data2 = $('#Id0').val();
    var data3 = $('#city0').val();
    var data4 = $('#Em-txt').val();
    var data5 = $('#e-img').val(); // Assuming this is a file input

    // Check if any of the text fields are empty
    if (data1.trim().length === 0 || data2.trim().length === 0 || data3.trim().length === 0 || data4.trim().length === 0) {
        alert('All fields must be filled.');
        return false;
    }

    // Check if any of the text fields exceed the length limit
    if (data1.length > 15 || data2.length > 15 || data3.length > 15) {
        alert('Enter valid length (less than or equal to 15).');
        return false;
    }

    // Check if an image is uploaded
    if (data5.length === 0) {
        alert('Please upload an image.');
        return false;
    }

    return true;
}
function helValid() {
    var data1 = $('#Name1').val();
    var data2 = $('#Id1').val();
    var data3 = $('#city1').val();
    var data4 = $('#Em-txt2').val();
    var data5 = $('#h-img').val();
    var data6 = $('#campus1').val();

    // Check if any of the text fields are empty
    if (data1.trim().length === 0 || data2.trim().length === 0 || data3.trim().length === 0 || data4.trim().length === 0 || data6.trim().length === 0) {
        alert('All fields must be filled.');
        return false;
    }

    // Check if any of the text fields exceed the length limit
    if (data1.length > 15 || data2.length > 15 || data3.length > 15) {
        alert('Enter valid length (less than or equal to 15).');
        return false;
    }

    // Check if an image is uploaded
    if (data5.length === 0) {
        alert('Please upload an image.');
        return false;
    }

    return true;
}

function cmtValid() {
    var data1 = $('#Name2').val();
    var data2 = $('#Id2').val();
    var data3 = $('#core2').val();
    var data4 = $('#Em-txt3').val();
    var data5 = $('#c-img1').val();
    var data6 = $('#campus2').val();

    // Check if any of the text fields are empty
    if (data1.trim().length === 0 || data2.trim().length === 0 || data3.trim().length === 0 || data4.trim().length === 0 || data6.trim().length === 0) {
        alert('All fields must be filled.');
        return false;
    }

    // Check if any of the text fields exceed the length limit
    if (data1.length > 15 || data2.length > 15 || data3.length > 15) {
        alert('Enter valid length (less than or equal to 15).');
        return false;
    }

    // Check if an image is uploaded
    if (data5.length === 0) {
        alert('Please upload an image.');
        return false;
    }

    return true;
}






