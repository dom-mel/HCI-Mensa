<?php
include dirname(__FILE__).'/tpl/header.php';
$districts = array('Mitte', 'Friedrichshain-Kreuzberg', 'Pankow', 'Charlottenburg-Wilmersdorf', 'Spandau',
    'Steglitz-Zehlendorf', 'Tempelhof-Schöneberg', 'Neukölln', 'Treptow-Köpenick', 'Marzahn-Hellersdorf',
    'Lichtenberg', 'Reinickendorf');
?>


<div class="row">
    <div class="span12">
        <h2>Mensa in Berlin</h2>
        <p>
            lorem ipsum
        </p>
    </div>
</div>

<div class="row">
    <div class="span6">
        <p>
            Filter:
            <select>
                <option value="">Bezirk</option>
                <?php foreach ($districts as $district): ?>
                    <option><?php echo htmlspecialchars($district) ?></option>
                <?php endforeach ?>
            </select>
        </p>
    </div>
    <div class="span6">
        <p>
            Suchen
            <input type="text" />
        </p>
    </div>
</div>

<div class="row">
    <div class="span6">
        <h2>Karte</h2>
        <img class="map" src="http://maps.google.com/maps/api/staticmap?center=52.489397,13.410437&zoom=11&size=500x500&sensor=false" alt="Berlin Übersicht" />
    </div>

    <div class="span6">
        <h2>Mensen</h2>
        <ul>
            <?php foreach ($districts as $district): ?>
            <li><?php echo htmlspecialchars($district) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>


<hr>

<?php include dirname(__FILE__).'/tpl/footer.php' ?>