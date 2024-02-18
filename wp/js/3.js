function funcall() {
    var name = document.getElementById('name').value;
    var dob = document.getElementById('dob').value;
    var gender = document.querySelector('input[name="gender"]:checked').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var address = document.getElementById('address').value;
    var state = document.getElementById('state').value;
    var education = document.getElementById('education').value;

    var displayText = "<h2>Registration Information</h2>";
    displayText += "<p><strong>Name:</strong> " + name + "</p>";
    displayText += "<p><strong>Date of Birth:</strong> " + dob + "</p>";
    displayText += "<p><strong>Gender:</strong> " + gender + "</p>";
    displayText += "<p><strong>Email:</strong> " + email + "</p>";
    displayText += "<p><strong>Phone:</strong> " + phone + "</p>";
    displayText += "<p><strong>Address:</strong> " + address + "</p>";
    displayText += "<p><strong>State:</strong> " + state + "</p>";
    displayText += "<p><strong>Education:</strong> " + education + "</p>";

    document.write(displayText);
}