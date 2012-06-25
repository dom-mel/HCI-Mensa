<?php

require dirname(__FILE__) . '/plan.class.php';
require dirname(__FILE__) . '/tpl/mealtable.php';
require dirname(__FILE__) . '/plan.helper.php';
$plan = new Plan();
$data = $plan->getMeals();

$additionalJs ='plan.js';
include dirname(__FILE__).'/tpl/header.php';
?>

<div class="row">

    <div class="span12">
        <h2>
            <?php out($data['name']) ?>
            <img src="star_off.gif" class="favorite" alt="Favorit" style="margin-bottom: .5em;" />
        </h2>
        <p>
            <label style="display: inline;" for="price">Speiseplan mit Preisen für</label>
            <select id="price" class="inline">
                <option value="1">Studierende</option>
                <option value="2">Hochschulangehörige</option>
                <option value="3">Gäste</option>
            </select>
        </p>
    </div>

</div>

<div class="row">
    <div class="span12">
        <ul class="nav nav-tabs">
            <?php $first = true ?>
            <?php $i = 0 ?>
            <?php foreach ($plan->getDays() as $day): ?>
                <li<?php if ($first) echo ' class="active"' ?>>
                    <a href="#" id="day<?php out($i) ?>"><?php out($day) ?></a>
                </li>
                <?php $first = false ?>
                <?php $i++ ?>
            <?php endforeach ?>
        </ul>
    </div>
</div>

<div class="row">
    <?php printTable('Hauptgerichte', $data, array('4', '5', '6', '90')) ?>
    <?php printTable('Beilagen', $data, array('7')) ?>
</div>
<div class="row">
    <?php printTable('Salate', $data, array('2', '3')) ?>
    <?php printTable('Dessert', $data, array('8', '94')) ?>
</div>

<hr />

<?php include dirname(__FILE__).'/tpl/footer.php' ?>
