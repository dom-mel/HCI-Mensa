<?php
$additionalJs ='index.js';
include dirname(__FILE__).'/tpl/header.php';
if (isset($_COOKIE['fav_mensa']) && !isset($_GET['force'])) {
    header('Location: plan.php?id='.urlencode($_COOKIE['fav_mensa']));
    exit;
}
?>


<div class="row">
    <div class="span12">
        <h2>Mensen in Berlin</h2>
        <p>
            Bitte wählen sie eine Mensa
        </p>
    </div>
</div>

<div class="row">
    <div class="span6">
        <p>
            <label for="district">Bezirk:</label>
            <select id="district">
            </select>
        </p>
    </div>
    <div class="span6">
        <p>
            <label for="form_search">Mensa suchen:</label>
            <input id="form_search" type="text" />
        </p>
    </div>
</div>

<div class="row">
    <div class="span6" tabstop="-1">
        <h2>Karte</h2>
        <div id="map_canvas"></div>
    </div>

    <div class="span6">
        <h2>Mensen</h2>
        <ul id="resultList">
        </ul>
    </div>
</div>


<hr>

<?php include dirname(__FILE__).'/tpl/footer.php' ?>