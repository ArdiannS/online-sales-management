
window.addEventListener('load',function(){
      for(let i = 1; i <= 7; i++){
            const element = document.getElementById('preference'+i);
            element.style.backgroundColor = 'whitesmoke';
            element.addEventListener('click',function(){
                  if(element.style.backgroundColor == 'whitesmoke')
                  element.style.backgroundColor = 'gray';
                  else element.style.backgroundColor = 'whitesmoke';
         });
       }
});
