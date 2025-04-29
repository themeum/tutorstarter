/**
 * File signup.js.
 *
 * Handles sign up for new user
 */
( function () {
    
    const tutor_signup_form = document.querySelector('.tutor-signup-form');

    if(null !== tutor_signup_form) {
        tutor_signup_form.addEventListener('submit', registerUser);
        
        function registerUser(e) {

            e.preventDefault();
            
            let request             =   new XMLHttpRequest();
            let ajaxurl             =   tutorstarter_vars.ajaxurl;
            let authRedirectUrl     =   tutorstarter_vars.authRedirectUrl;

            let reg_status          =   document.querySelector('.signup-status');
            let data                =   new FormData();
            let username            =   document.querySelector('#fullname').value;
            let email               =   document.querySelector('#email').value;
            let password            =   document.querySelector('#password').value;
            let confirm_password    =   document.querySelector('#confirm-password').value;
            let signupNonce         =   document.querySelector('#signup-nonce').value;
            data.append('username', username);
            data.append('email', email);
            data.append('password', password);
            data.append('confirm_password', confirm_password);
            data.append('action', 'ajaxregister');
            data.append('signupNonce', signupNonce);

            request.open("POST", ajaxurl);
            
            request.onreadystatechange = function() {
                if(this.readyState === 4 && this.status === 200) {
                    let response = JSON.parse(this.responseText);
                    reg_status.style.visibility = "visible";
                    if (response.loggedin == true) {
                        reg_status.style.color = "#4285F4";
                        reg_status.innerText = response.message;
                        window.location.replace(authRedirectUrl);
                    } else {
                        reg_status.style.color = "#dc3545";
                        reg_status.innerText = response.message;
                    }
                }
            };
            request.send(data);
        }
    }   

})();
