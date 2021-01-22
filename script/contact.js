var cForm = document.forms.cForm;
var fName = cForm.fName;
var lName = cForm.lName;
var email = cForm.email;
var catInId = [];

for (i=0; i<3; i++){
catInId.push(cForm.catInId[i]);}

var roleId = cForm.roleId;
var time = cForm.time;
var h1 = document.querySelector("h1");
var p = document.querySelector("p");


cForm.addEventListener("submit", contact, false);

function contact(event) {
    
    event.preventDefault();
    
    var xhr = new XMLHttpRequest(); 

    xhr.onreadystatechange = function(e){     
        if(xhr.readyState === 4){        
            // console.log(xhr.responseText);
            var response = JSON.parse(xhr.responseText); 
            // console.log(response.success);
            if(response.success) {
            cForm.remove();
            p.remove();
            h1.innerHTML = "Thank you!";}
            // console.log(catInId[0].checked);
            // console.log(catInId[1].checked);
            // console.log(catInId[2].checked);
            // console.log(roleId.value);
            // console.log(fName.value);
            // console.log(lName.value);
            // console.log(email.value);
            // console.log(time.value);            
           } 
    };
    xhr.open("POST","process-contact.php",true); 
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
    xhr.send("fName=" + fName.value + "&lName=" + lName.value + "&email=" + email.value+ "&catInId0=" + catInId[0].checked + "&catInId1=" + catInId[1].checked + "&catInId2=" + catInId[2].checked  + "&roleId=" + roleId.value + "&time=" + time.value);




}
