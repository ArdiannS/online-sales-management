// class SpecialOffers{
//     constructor(array, imageId, titleId, descriptionId){ 
//       this.offers = array;
//       this.index = 0;
//       this.ids = [imageId, titleId, descriptionId];
//     }
//     next(){
//        this.index++;
//        if(this.index >= this.offers.length) this.index = 0;
//        this.opacityChanger(0);
//        setTimeout(() => {
//         document.getElementById(this.ids[0]).src = this.offers[this.index][0];
//        for(let i = 1; i < this.offers[this.index].length; i++)
//          document.getElementById(this.ids[i]).innerHTML = this.offers[this.index][i];
//        this.opacityChanger(1);
//        }, 700);
//     }
//     opacityChanger(val){
//         for(let i = 0; i < this.offers[this.index].length-1; i++)
//            document.getElementById(this.ids[i]).style.opacity = val;
//     }
// }

window.addEventListener('load', function () {
  let offerIndex = 0;
  let offersArray = [
    ["../images/gaming-chair.png", "GAMING CHAIR", "A gaming chair is a type of chair designed for the comfort of gamers. They differ from most office chairs in having high backrest designed to support the upper back and shoulders"],
    ["../images/gaming-laptop.png", "GAMING LAPTOP", "A gaming laptop is one used primarily for the purpose of playing computer games. Unlike conventional laptops, they have higher-end graphics card that is not integrated or designed to conserve battery power. One of the most popular brands of gaming laptops on the market currently is the Alienware laptop manufactured and owned by Dell Corporation."]
  ];
  for (let i = 1; i <= 7; i++) {
    const element = document.getElementById('preference' + i);
    element.style.backgroundColor = 'whitesmoke';
    element.addEventListener('click', function () {
      if (element.style.backgroundColor == 'whitesmoke')
          element.style.backgroundColor = 'gray';
      else element.style.backgroundColor = 'whitesmoke';
    });
  }

  function next() {
    if (offerIndex == offersArray.length - 1) offerIndex = 0;
    else offerIndex++;
    opacityChanger(0);
    setTimeout(() => {
      document.getElementById("productImage").src = offersArray[offerIndex][0];
      document.getElementById("productTitle").innerHTML = offersArray[offerIndex][1];
      document.getElementById("productDescription").innerHTML = offersArray[offerIndex][2];

      opacityChanger(1);
    }, 700);
  }

  function opacityChanger(val) {
    document.getElementById("productImage").style.opacity = val;
    document.getElementById("productTitle").style.opacity = val;
    document.getElementById("productDescription").style.opacity = val;
  }
  document.getElementById("nextSpecialOffer").addEventListener('click', function () {
    next();
  });
});