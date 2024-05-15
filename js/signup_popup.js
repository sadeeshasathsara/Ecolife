popup = document.getElementById('signup-main-container');
var popupVisibility;

// open popup
function openPopup(){
    popup.style.visibility = "visible";
    popup.style.top = "50%";
    popup.style.transform = "translate(-50%, -50%) scale(1)";
    popupVisibility = true;
}

// close popup
function closePopup(){
    popup.style.visibility = "hidden";
    popup.style.top = "-50%";
    popup.style.transform = "translate(-50%, -50%) scale(0.1)";
    popupVisibility = false;
}