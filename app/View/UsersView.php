<?php

use app\Controller\ControllerFetchData;

$out = new ControllerFetchData();
$res = $out->result;
?>
<h2>Пользователи</h2>
<div class="table-responsive">
    <div class="container bg-body mw-100">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Логин</th>
                <th scope="col">Полное имя пользователя</th>
                <th scope="col">Роль</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($res as $r){
                ?>
                <tr>
                    <th scope="row"><?php echo $r['id']; ?></th>
                    <td><?php echo $r['login'];?></td>
                    <td><?php echo $r['fullName'];?></td>
                    <td><a href="?role=<?php echo $r['name_role'];?>" class="link-info text-decoration-none">@<?php echo $r['name_role'];?></a></td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>
