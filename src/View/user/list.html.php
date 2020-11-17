<?php

/** @var \Model\Entity\User[] $userList */
$body = function () use ($userList, $path) {
    ?>
  <table cellpadding="40" cellspacing="0" border="0">
    <tr>
      <td colspan="3" align="center">Список пользователей</td>
    </tr>

    <?php
    foreach ($userList as $key => $user) {
        ?>
      <tr style="text-align: center">
                               <td>
        <p>Пользователь: <?= $user->getName() ?></p>
        <p>Роль: <?= $user->getRole()->getTitle() ?>
                               </td>
      </tr>

    <?php
    } ?>
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
