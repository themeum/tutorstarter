/**
 * File signin.js.
 *
 * Handles sign in for new user
 */
( function () { 
   
    const tutor_signin_form = document.querySelector('.tutor-signin-form');
    if(null != tutor_signin_form) {

        tutor_signin_form.addEventListener('submit', userLogin);
        
        function userLogin(e) {

            e.preventDefault(); 
            
            let request                 =  new XMLHttpRequest();
            let ajaxurl                 =  tutorstarter_vars.ajaxurl;
            let authRedirectUrl          =  tutorstarter_vars.authRedirectUrl;

            let reg_status       =  document.querySelector('.signup-status');
            let data             =  new FormData();
            let email            =  document.querySelector('#login_email').value;
            let password         =  document.querySelector('#login_password').value;

            data.append('email', email);
            data.append('password', password);
            data.append('action', 'ajaxlogin'); console.log(email, password);

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
