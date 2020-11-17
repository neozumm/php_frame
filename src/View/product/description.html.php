<?php
/** @var \Model\Entity\Product[] $productList */
$body = function () use ($productList, $path) {
    ?>
    <table cellpadding="40" cellspacing="0" border="0">
      <tr><td colspan="3" align="center">Наши курсы</td></tr>
<?php
            $position = 0;
    foreach ($productList as $key => $product) {
        ?>
      <td style="text-align: center"
      <?= ($position + 1); ?>)
        <p><?=$product->getName(); ?></p>
        <p></p>
        <br />
        <p> <?=$product->getDesc(); ?></p>
        </td>
      <?php
        echo($position + 1) % 3 ? '' : '</tr>';
        ++$position;
    }
    echo $position % 3 ? str_repeat('<td></td>', 3 - $position) . '</tr>' : ''; ?>
    </table>
<?php
};

$renderLayout(
    'main_template.html.php',
    [
        'title' => 'Описание курсов',
        'body' => $body,
    ]
);
