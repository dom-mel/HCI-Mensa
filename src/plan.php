<?php
include dirname(__FILE__).'/tpl/header.php';
?>

<div class="row">

    <div class="span12">
        <h2>
            Cafeteria FU Königin-Luise-Str.
            <img src="star_off.gif" alt="Favorit" style="margin-bottom: .5em;" />
        </h2>
        <p>
            Lorim Ipsum Dolor...

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
        <table class="table table-condens">
            <tr>
                <td colspan="2">Grünkern - Mozzarellasalat</td>
                <td>1.30 €</td>
            </tr>
            <tr>
                <td rowspan="2" style=""> </td>
                <td>Zwei Kartoffelklöße</td>
                <td>0.70 €</td>
            </tr>
            <tr>
                <td>Gemüsereis</td>
                <td>0.50 €</td>
            </tr>
        </table>
    </div>
</div>

<hr />

<?php include dirname(__FILE__).'/tpl/footer.php' ?>