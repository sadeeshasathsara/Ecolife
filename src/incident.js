let incidentHero = document.getElementById("incident-hero");

const images = [
   "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(./images/jungle.jpg)",
   "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(./images/jungle-2.jpg)",
   "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(./images/jungle-3.jpg)",
];

let curr = 0;

function move() {
   if (curr === 2) {
      curr = 0;
   } else {
      curr++;
   }
   incidentHero.style.backgroundImage = images[curr];
}

let moveInt;
moveInt = setInterval(move, 3000);
