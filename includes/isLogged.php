<?php

function loggedIn(){
    return isset($_SESSION['user_id']);
}
function logout() {
    unset($_SESSION['user_id']);
    unset($_SESSION['alreadyLogged']);
    session_destroy();
}