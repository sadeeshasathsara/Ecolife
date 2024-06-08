function deletePopup(){
    document.getElementById('account-delete-dialog-box-container').style.visibility = 'visible';
}

function deleteClosePopup(){
    window.setTimeout(function(){
        document.getElementById('account-delete-dialog-box-container').style.visibility = 'hidden';
    }, 500)
}

function sure(){
    var response = confirm("Are you sure to delete your account?");
    return response;
}

function openSettings(){
    document.getElementById('account-settings-container').style.top = "50%";
    document.getElementById('account-settings-container').style.transform = "translate(-50%, -50%) scale(1)";
}

function closeSettings(){
    
    document.getElementById('account-settings-container').style.top = "-50%";
    document.getElementById('account-settings-container').style.transform = "translate(-50%, -50%) scale(0.1)";
}

function displayName(fName, lName){
    document.getElementById('user-name').innerHTML = fName + " " + lName;
}

function displayEmail(email){
    document.getElementById('user-email').innerHTML = email;
}

document.getElementById('profile-pic').onclick = function(){
    var input = document.createElement('input');
    input.type = 'file';

    input.addEventListener('change', function(){
        var file = input.files[0];
        if (file){
            handleFile(file);
        }
    })
}

function handleFile(file){
    console.log('Selected file:', file);
}

function emailChange(){
    window.setTimeout(function(){
        callNotification("You will be logged out in 3s");
    }, 3000)
}