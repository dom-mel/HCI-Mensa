<?php

function plan_icons($meal) {
    if ($meal->is_bio == 1) {
        plan_icon('bio', 'Bio');
    }
    if ($meal->is_vegan == 1) {
        plan_icon('vegan', 'Vegan');
    } elseif ($meal->is_vegetarisch == 1) {
        plan_icon('nomeat', 'Vegetarisch');
    }
    if ($meal->is_msc == 1) {
        plan_icon('fish', 'Fisch');
    }
}

function plan_icon($img, $title) {
    printf('<img src="img/additions/%1$s.jpg" title="%2$s" alt="%2$s" />',
        htmlspecialchars($img),
        htmlspecialchars($title)
    );
}

function plan_additions($meal) {
    if (count($meal->zusaetze) === 0) {
        return;
    }
    echo '<div class="addition">';
    foreach ($meal->zusaetze as $addition) {
        plan_addition($addition->nr, $addition->name);
    }
    echo '<div class="addition-hover">';
    plan_addition_list($meal);
    echo '</div>';
    echo '</div>';
}

function plan_addition($nr, $name) {
    printf('<sup title="%2$s">%1$s</sup> ',
        htmlspecialchars($nr),
        htmlspecialchars($name)
    );
}

function plan_addition_list($meal) {
    echo '<ul>';
    foreach ($meal->zusaetze as $addition) {
        echo '<li>'.htmlspecialchars($addition->name).'</dd>';
    }
    echo '</ul>';
}

function isFavorite($id) {
    if (!isset($_COOKIE['fav_mensa'])) {
        return false;
    }
    return ($_COOKIE['fav_mensa'] === $id);
}

function favoriteIcon($id) {
    if (isFavorite($id)) {
        echo '<img id="fav" src="star_on.png" class="favorite" title="Klicken um Favorit zu entfernen" alt="Favorit" style="margin-bottom: .5em;" />';
    } else {
        echo '<img id="fav" src="star_off.gif" class="favorite" title="Klicken um zum Favorit zu machen" alt="Favorit" style="margin-bottom: .5em;" />';
    }
}