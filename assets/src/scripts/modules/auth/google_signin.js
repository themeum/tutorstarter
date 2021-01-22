/**
 * File google_signin.js.
 *
 * Handles google_signin in for new user
 */
( function () { 

        let googleSignInBtn      =   document.getElementById('gSignIn2');
        let google_client_ID     =   tutorstarter_vars.google_client_ID;
        var googleUser = {};
        var startApp = function() {
            gapi.load('auth2', function(){
                // Retrieve the singleton for the GoogleAuth library and set up the client.
                auth2 = gapi.auth2.init({
                    //373496230444-uf119vqdp0hsrkujdjt6ucms3scp4v0d.apps.googleusercontent.com
                    client_id: google_client_ID,
                    cookiepolicy: 'single_host_origin',
                    // Request scopes in addition to 'profile' and 'email'
                    //scope: 'additional_scope'
                });
                attachSignin(document.getElementById('gSignIn2'));
            });
		};

		function attachSignin(element) {
			auth2.attachClickHandler(element, {},
                function(googleUser) {
					var profile = googleUser.getBasicProfile();
					var id_token = googleUser.getAuthResponse().id_token;

					let request          =  new XMLHttpRequest();
					let ajaxurl          =  tutorstarter_vars.ajaxurl;
					let authRedirectUrl  =  tutorstarter_vars.authRedirectUrl;

					let data             =  new FormData();
					data.append('id_token', id_token);
					data.append('useremail', profile.getEmail());
					data.append('userfirst', profile.getGivenName());
					data.append('userlast', profile.getFamilyName());
					data.append('action', 'ajaxgoogleauth');

					request.open("POST", ajaxurl);
					
					request.onreadystatechange = function(data) {
						if(this.readyState === 4 && this.status === 200) {
							let response = JSON.parse(this.responseText);
							let reg_status  =  document.querySelector('.signup-status');
							if(null !== reg_status) {
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
						}
					};
					request.send(data);

                }, function(error) {
                    console.log(JSON.stringify(error, undefined, 2));
                });
        };
        
		if(null !== googleSignInBtn) {
            startApp();
        }
        
})();