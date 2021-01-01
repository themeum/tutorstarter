
(function () { 

    const tutor_signin_form = document.querySelector('.tutor-signin-form');
    tutor_signin_form.addEventListener('submit', registerUser);
    
    function registerUser(e) {

        e.preventDefault();
        
        let request          =  new XMLHttpRequest();
        let ajaxurl          =  tutorstarter_vars.ajaxurl;

        let reg_status       =  document.querySelector('.signup-status');
        let data             =  new FormData();
        let username         =  document.querySelector('#fullname').value;
        let email            =  document.querySelector('#email').value;
        let password         =  document.querySelector('#password').value;
        let confirm_password =  document.querySelector('#confirm-password').value;
        data.append('username', username);
        data.append('email', email);
        data.append('password', password);
        data.append('confirm_password', confirm_password);
        data.append('action', 'ajaxregister');

        request.open("POST", ajaxurl);
        
        request.onreadystatechange = function() {
            
            if(this.readyState === 4 && this.status === 200) {
                let response = JSON.parse(this.responseText);
                reg_status.style.visibility = "visible";
                if (response.loggedin == true) {
                    reg_status.style.color = "#4285F4";
                    reg_status.innerText = response.message;
                } else {
                    reg_status.style.color = "#dc3545";
                    reg_status.innerText = response.message;
                }
            }
        };      
        request.send(data);
    }    

})();
