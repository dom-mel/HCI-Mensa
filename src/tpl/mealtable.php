<?php

function printTable($caption, $data, $types) {

    $id = 0;
    foreach ($data['meals'] as $day => $meals) {
        ob_start();
        $count = 0;
        ?>
    <div class="span6 day<?php echo $id ?>">
        <table class="table table-striped">
            <caption>
                <?php echo htmlspecialchars($caption) ?>
            </caption>
            <?php
            foreach ($types as $type) {
                if (isset($meals[$type])) {
                    foreach ($meals[$type] as $meal) {
                        $count++;
                        ?>
                        <tr>
                            <td><?php out($meal->name) ?></td>
                            <td class="priceRow">
                                <nobr>
                                    <span class="price1"><?php echo number_format($meal->preis_1, 2, ',', '.') ?> €</span>
                                    <span class="price2"><?php echo number_format($meal->preis_2, 2, ',', '.') ?> €</span>
                                    <span class="price3"><?php echo number_format($meal->preis_3, 2, ',', '.') ?> €</span>
                                </nobr>
                            </td>
                        </tr>
                        <?php
                    }
                }
            }
            ?>
        </table>
    </div>
    <?php
        if ($count == 0) ob_end_clean();
        else ob_end_flush();
        $id++;
    }
}
