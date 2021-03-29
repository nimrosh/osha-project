//Function when the user clicks sign in button
login.addEventListener('click' ,function(){
  if(!firebase.auth().currentUser)
    {
        const provider = new firebase.auth.GoogleAuthProvider();
        firebase.auth().signInWithPopup(provider)
        .then((result) => {
            var token = result.credential.accessToken;
            window.sessionStorage.setItem("token", token);
    
            console.log(result)
            var username = result.additionalUserInfo.profile.given_name;
            var em = result.user.email;    

            sessionStorage.setItem("username", username);
            sessionStorage.setItem("em", em);
            doWelcome();        
        })
        .catch((error) => {
            var errorCode = error.code;
            var errorMessage = error.message;
            var email = error.email;
            var credential = error.credential;
            if(errorCode === 'auth/account-exists-wtih-different-credential'){
                alert("You have already signed up with a different auth provider for that email");
            }else{
                console.error(error);
            }
        });
    }else{
        firebase.auth().signOut();
    }
}) 

//function that will direct user to the welcome page
var doWelcome = function(){
    window.location.replace("welcome.php");
    
}

signInBtn.addEventListener('click', function(){
    window.location.replace("signin.php");
})

