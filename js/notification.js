window.setTimeout(slideOut, 5000);

function slideOut(){
    notification = 0;
    document.getElementById('notification-container').style.animation = 'slideOut 1.5s backwards';
    if(window.setTimeout(function(){
        document.getElementById('notification-main-container').style.display = 'none';
    }, 1500));
}

function animateNotification(msg){
    document.getElementById('notification-main-container').style.display = 'block';
    var notificationContainer = document.getElementById('notification-container');
    notificationContainer.style.animation = 'slideIn 0.9s forwards';
    document.getElementById('notification-text').innerHTML = msg;
}

function callNotification(msg){
    window.addEventListener('load', function() {
        animateNotification(msg);
    });

    animateNotification(msg);
}