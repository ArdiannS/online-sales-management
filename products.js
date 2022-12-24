
window.addEventListener('load',function(){
    for(let i = 1; i <= 7; i++){
    document.getElementById('preference'+i).addEventListener('click',function(){
       const element = document.getElementById('preference'+i);
       if(element.style.border == '4px solid rgb(50, 50, 50)')element.style.border = '4px solid green';
       else element.style.border = '4px solid rgb(50, 50, 50)';
    });
}});
