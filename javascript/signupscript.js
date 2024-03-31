        function userInfo() {
            var name = document.forms["SignUpForm"]["name"].value.trim();
            var lastname = document.forms["SignUpForm"]["lastname"].value.trim();
            var phone = document.forms["SignUpForm"]["phone"].value.trim();
            var address = document.forms["SignUpForm"]["address"].value.trim();
            var username = document.forms["SignUpForm"]["username"].value.trim();
            var password = document.forms["SignUpForm"]["password"].value.trim();

            if (name === "" || lastname === "" || phone === "" || address === "" || username === "" || password === "") {
                alert("All fields must be filled out");
                return false;
            }
            else {
                alert("You have succesfully created an account!")
            }
        }