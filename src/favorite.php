<?php

if (isset($_GET['id'])) {
    setFavorite($_GET['id']);
} else {
    unsetFavorite();
}


function setFavorite($id) {
    setcookie('fav_mensa', $id, time()+60*60*24*60);
}

function unsetFavorite() {
    setcookie('fav_mensa', '', 1);
}