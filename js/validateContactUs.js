


function validate(){
    var name = document.getElementById("name");
    var surname = document.getElementById("LastName");
    var username = document.getElementById("username");
    var email = document.getElementById("email");

    if(name.value.trim() == ""){
        name.style.border = "solid 3px red";
        setTimeout(function(){
            name.style.border = "none";
        }, 3000);
        document.getElementById("error").innerHTML = "U need to fill up all the fields.";
        return false;
    }
    else if(surname.value.trim() == ""){
        surname.style.border = "solid 3px red";
        document.getElementById("error").innerHTML = "U need to fill up all the fields.";
        setTimeout(function(){
            surname.style.border = "none";
        }, 3000);
        return false;
    } else if(username.value.trim() == "" || username.value.length < 3){
        username.style.border = "solid 3px red";
        setTimeout(function(){
            username.style.border = "none";
        }, 3000);
        document.getElementById("error").innerHTML = "U need to fill up all the fields.";
        return false;
    } else if(email.value.trim() == "" || (!email.value.includes("@"))){
        email.style.border = "solid 3px red";
        setTimeout(function(){
            email.style.border = "none";
        }, 3000);
        document.getElementById("error").innerHTML = "U need to fill up all the fields.";
        return false;
    }
}