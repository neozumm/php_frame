<?php


/** @var \Model\Entity\User $user */
$body = function () use ($user, $path){
?>
  <table cellpadding="40" cellspacing="0" border="0">
    <tr>
      <td align="center">Личный кабинет</td>
    </tr>
      <tr>
        <td>Имя: <?=$user->getName() ?></td>
      </tr>
      <tr>
        <td>День рождения: <?=$user->getBdate()->format("Y-m-d")?></td>
      </tr>
      <tr>
        <td>Сумма последней покупки: <?=$user->getPurchase()?></td>
      </tr>
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
