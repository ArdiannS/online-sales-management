
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
});