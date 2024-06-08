let slideContainer = document.querySelector(".slide-container");

const images = [
   {
      img: "url(images/slide1.jpg)",
   },
   {
      img: "url(images/slide2.jpg)",
   },
   {
      img: "url(images/slide3.jpg)",
   },
];

let curr = 0;

function slider() {
   let item = images[curr];
   if (curr === 2) {
      curr = 0;
   } else {
      curr++;
   }
   slideContainer.style.backgroundImage = item.img;
}

let setInt;
setInt = setInterval(slider, 3000);
