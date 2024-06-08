let loading = document.querySelector(".loading");

function animation() {
   window.addEventListener("DOMContentLoaded", function () {
      loading.style.display = "flex";
   });
}

let ani;
ani = setInterval(animation, 2000);
