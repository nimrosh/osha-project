//Logout button for hazard.php this will call the same logout function used 
//in the welcome.php logout button
logoutHazard.addEventListener('click', logoutbtn);

//Button will redirect the user to the welcome.php
backBtn.addEventListener('click', function(){
    window.location.replace("welcome.php");
})

function scanClick(divid) {
    console.log("Redirection to image.php");
    var date = new Date();
    date.setTime(date.getTime()+(24 * 60 * 60 * 1000));
    var expiry = '; expires=' + date.toUTCString();
    document.cookie = 'sID=' + divid + expiry+'; path=/';

    window.location.replace("image.php");
}
