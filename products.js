
window.addEventListener('load',function(){
    for(let i = 1; i <= 7; i++){
        document.getElementById('preference'+i).addEventListener('click',function(){
              const element = document.getElementById('preference'+i);
              if(element.style.backgroundColor == 'whitesmoke')
              element.style.backgroundColor = 'gray';
              else element.style.backgroundColor = 'whitesmoke';
        });
      }
});
