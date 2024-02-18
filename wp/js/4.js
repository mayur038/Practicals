import { funcall } from './3.js';
        function validateForm() {
            var name = document.getElementById('name').value;
            var dob = document.getElementById('dob').value;
            var gender = document.querySelector('input[name="gender"]:checked');
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;
            var address = document.getElementById('address').value;
            var state = document.getElementById('state').value;
            var education = document.getElementById('education').value;
            var image = document.getElementById('image').value;

            // Email validation using regex
            var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!emailRegex.test(email)) {
                alert("Email Error");
                return false;
            } 

            // Phone number validation using regex
            var phoneRegex = /^\d{10}$/;
            if (!phoneRegex.test(phone)) {
                alert("Phone Error");
                return false;
            } 

            // Image file validation
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(image)) {
                alert("image Error");
                return false;
            } 
            // Other required fields validation
            if (name === "" || dob === "" || gender === null || address === "" || state === "" || education === "") {
                alert("Please fill out all required fields.");
                return false;
            }
            funcall();
            return true;
        }
