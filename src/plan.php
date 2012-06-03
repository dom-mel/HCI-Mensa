<?php
include dirname(__FILE__).'/tpl/header.php';
?>

<div class="row">

    <div class="span12">
        <h2>
            Cafeteria FU Königin-Luise-Str.
            <img src="star_off.gif" class="favorite" alt="Favorit" style="margin-bottom: .5em;" />
        </h2>
        <p>
            Speiseplan für den <span class="date">1.5.2012</span>
        </p>
        <p>
            <label for="price">Preise für</label>
            <select id="price">
                <option>Studierende</option>
                <option>Hochschulangehörige</option>
                <option>Gäste</option>
            </select>
        </p>
    </div>

</div>

<div class="row">
    <div class="span12">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#">Heute</a>
            </li>
            <li><a href="#">Morgen</a></li>
            <li><a href="#">Donnerstag</a></li>
            <li><a href="#">Freitag</a></li>
            <li><a href="#">Montag</a></li>
            <li><a href="#">Dienstag</a></li>
        </ul>
    </div>
    <div class="span6">
        <table class="table table-striped">
            <caption>
                Hauptgerichte
            </caption>
            <tr>
                <td>Grünkern - Mozzarellasalat</td>
                <td>1.30 €</td>
            </tr>
            <tr>
                <td>Grünkern - Mozzarellasalat</td>
                <td>1.30 €</td>
            </tr>
            <tr>
                <td>Grünkern - Mozzarellasalat</td>
                <td>1.30 €</td>
            </tr>
        </table>
    </div>
    <div class="span6">
        <table class="table table-striped">
            <caption>Beilagen</caption>
            <tr>
                <td>Grünkern - Mozzarellasalat</td>
                <td>1.30 €</td>
            </tr>
            <tr>
                <td>Grünkern - Mozzarellasalat</td>
                <td>1.30 €</td>
            </tr>
            <tr>
                <td>Grünkern - Mozzarellasalat</td>
                <td>1.30 €</td>
            </tr>
        </table>
    </div>

</div>

<hr />

<?php include dirname(__FILE__).'/tpl/footer.php' ?>
