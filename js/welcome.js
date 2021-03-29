//Customizing the title of the welcome page
welcomeTitle.style.fontSize ="70px";
welcomeTitle.style.textAlign = "center";
welcomeTitle.style.paddingLeft = "1em";
welcomeTitle.style.paddingRight = "1em";
welcomeTitle.innerHTML = "Welcome!";

//Calling the displayDates function
//displayDates();

//This will save the user's email as cookie
document.cookie = "email=" + em;

//Logs out the user when sign out button is clicked
logout.addEventListener('click', logoutbtn);

//Function to call when user clicked sign out
//This will also customize the index.php 
function logoutbtn(){
    console.log("Success!");
    window.location.replace("index.php");
    title.innerText = "OSHA \r\n";
    title.innerText+= "HAZARD \r\n";
    title.innerText+= "IDENTIFICATION \r\n";
    login.style.display="block";
    logout.classList.add('hide');
    title.style.fontSize ="80px";

}

//Function to for displaying the dates. 
/*function displayDates(){
    dates.innerHTML=" ";

    var table = document.createElement('TABLE');
    table.style.margin = "auto";

    var tbody = document.createElement('TBODY');
    tbody.style.fontFamily ="Oswald";
    tbody.style.fontSize = "30px";
    tbody.style.textAlign = "center";

    table.appendChild(tbody);

        for (let i=0; i<jArray.length; i++){
            
            let tr = document.createElement('TR');
            let td1 = document.createElement('TD');
            let td2 = document.createElement('TD');
        

            tr.style.height= "90px";

            let btn = document.createElement('button');
            btn.innerHTML = "<i class='fas fa-angle-double-right' style='color:black; font-size: 18px'></i>";
            btn.style.borderRadius="8px";
            btn.style.backgroundColor="white";
            btn.style.borderColor="black";
            btn.style.outline ="none";
            btn.id = jArray[i];

            td1.appendChild(document.createTextNode(jArray[i]));
            td2.appendChild(btn);

            tr.appendChild(td1);
            tr.appendChild(td2);
            tbody.appendChild(tr);

            //EventListener for when a specific date is clicked.
            //The date will be passed to the hazard.php using sDate
            btn.addEventListener("click", function(){
                if(btn.id){
                    console.log("Redirecting to hazard.php");
                    sDate = btn.id;
                    window.location.replace("hazard.php");
                }
                else{
                    console.log("There was an error");
                }

            }); 
        }
        
    dates.appendChild(table);
}
*/

function dateClick(btnID) {
    console.log("Redirection to hazard.php");
    var date = new Date();
    date.setTime(date.getTime()+(24 * 60 * 60 * 1000));
    var expiry = '; expires=' + date.toUTCString();
    document.cookie = 'sDate=' + btnID + expiry+'; path=/';

    window.location.replace("hazard.php");
}

