let accounts = {};
let emails = {};
window.addEventListener('load',function(){
    document.getElementById("registerButton").addEventListener('click',function(){
         document.getElementById("logIn").style.opacity = 0;
         setTimeout(()=>{
            document.getElementById("logIn").style.display = 'none';
            document.getElementById("formContainer").style.height = 0;
            document.getElementById("formContainer").style.width = 0;
            setTimeout(()=>{
                document.getElementById("formContainer").style.height = "85%";
                document.getElementById("formContainer").style.width = "60%";
               setTimeout(()=>{
                document.getElementById("register").style.display = 'block';
                setTimeout(()=>{document.getElementById("register").style.opacity = 1}, 1);
               },500);
            },750);
         },300);
    });
    document.getElementById("logInButton").addEventListener('click', function(){
            document.getElementById("register").style.opacity = 0;
            setTimeout(()=>{
               document.getElementById("logIn").style.display = 'none';
               document.getElementById("formContainer").style.height = 0;
               document.getElementById("formContainer").style.width = 0;
               setTimeout(()=>{
                   document.getElementById("formContainer").style.height = "70%";
                   document.getElementById("formContainer").style.width = "40%";
                  setTimeout(()=>{
                   document.getElementById("logIn").style.display = 'block';
                   setTimeout(()=>{document.getElementById("logIn").style.opacity = 1}, 1);
                  },500);
               },750);
            },300);
    });

   document.getElementById("registerAccount").addEventListener("click", () => {
      let valArray = [validateUsername("registerUsername", "validationInfo"),
      validateString("registerEmri", "validationInfo", "Emri"),
      validateString("registerMbiemri", "validationInfo","Mbiemri"),
      validateEmail("registerEmail", "validationInfo"),
      validatePassword("registerPassword", "validationInfo"),
      validateString("registerQyteti", "validationInfo","Qyteti"),
      validateAge("registerDitelindja","validationInfo"),
      validatePhoneNumber("registerNumriTelefonit", "validationInfo")];
      for(let i = 0; i < valArray.length; i++)
        if(valArray[i] == false)return;
      let username = valArray[0];
      let format = ["username","name","surname","email","password","city","age","phoneNumber"];
      accounts[username] = {};
      for(let i = 0; i < valArray.length; i++)
        i == 4?accounts[username][format[i]] = valArray[i]:
        accounts[username][format] = valArray[i];
      emails[valArray[3]] = null;
      document.getElementById("validationInfo").innerHTML = "Keni regjistruar llogarine me sukses.";
   });
   document.getElementById("logInAccount").addEventListener('click', function(){
      let username = document.getElementById("logInUsername").value;
      let password = document.getElementById("logInPassword").value;
      if(username == null || username.length == 0){
         document.getElementById("logInValidationInfo").innerHTML = "Shenoni nje username.";
         return;
      }
      if(!(username in accounts)){
         document.getElementById("logInValidationInfo").innerHTML = "Username qe keni shenuar nuk ekziston";
         return;
      }
      if(password != accounts[username].password){
         document.getElementById("logInValidationInfo").innerHTML = "Password-i qe keni shenuar nuk ju perputhet username.";
         return;
      }
      window.location.href = "index.html";
   });
});
function validateUsername(id, msgId){
  let val = document.getElementById(id).value;
  if(val in accounts){
   document.getElementById(msgId).innerHTML = "Username eshte ne perdorim.";
   return false;
  } 
  if(val == "" || val == null){
     document.getElementById(msgId).innerHTML = "Username nuk eshte valid.";
     return false;
   }
  return val;
}
function validateString(id, msgId, str){
   let val = document.getElementById(id).value;
   if(val == null || val.length == 0) 
   {
      document.getElementById(msgId).innerHTML = str+" nuk eshte valid.";
      return false;
   }
   return val;
}
function validateEmail(id, msgId){
   let val = document.getElementById(id).value;
   let target = "@gmail.com";
   if(val in emails){
      document.getElementById(msgId).innerHTML = "Email eshte ne perdorim.";
      return false;
   }
   if(val == null|| val.length <= target.length){
       document.getElementById(msgId).innerHTML = "Email nuk eshte ne valid.";
       return false;
   }
   let isValid = false;
   while(!isValid){
      isValid = true;
      for(let i = val.length-1, j = target.length-1; i >= isValid.length-target.length; i--)
        if(val.charAt(i) != target.charAt(j--)){
         document.getElementById(msgId).innerHTML = "Email nuk eshte valid.";
         return false;
      }
   }
   return val;
}
function validatePassword(id, msgId){
   let val = document.getElementById(id).value;
   if(val == null || val.length < 6){
       document.getElementById(msgId).innerHTML = "Password-i nuk eshte valid.";
       return false;
   }
   return val;
}
function validateAge(id, msgId){
   let val = document.getElementById(id).value;
   if(val == null || val == undefined || val == ""){
      document.getElementById(msgId).innerHTML = "Duhesh te kesh nje ditelindje.";
      return;
   }
   let date = new Date();
   let stringDate = date.toISOString();
   let valTime = val.slice(0,4)+val.slice(5,7)+val.slice(8,10);
   let time = stringDate.slice(0,4)+stringDate.slice(5,7)+stringDate.slice(8,10);
   if(time < valTime){
      document.getElementById(msgId).innerHTML = "Duhesh te kesh nje ditelindje valide.";
      return;  
   }
   return val;
}
function validatePhoneNumber(id, msgId){
   let val = document.getElementById(id).value;
   if(val.length != 9){
      document.getElementById(msgId).innerHTML = "Numri i telefonit nuk eshte valid.";
      return false;
   }
   return val;
}
String.prototype.hashCode = function() {
   var hash = 0,
     i, chr;
   if (this.length === 0) return hash;
   for (i = 0; i < this.length; i++) {
     chr = this.charCodeAt(i);
     hash = ((hash << 5) - hash) + chr;
     hash |= 0;
   }
   return hash;
 }