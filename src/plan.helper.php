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
    foreach ($meal->zusaetze as $addition) {
        plan_addition($addition->nr, $addition->name);
    }
}

function plan_addition($nr, $name) {
    printf('<sup title="%2$s">%1$s</sup> ',
        htmlspecialchars($nr),
        htmlspecialchars($name)
    );
}