<?php

use app\Controller\ControllerActiveUser;
use app\Controller\ControllerEndSince;
use app\Route\Route;


// Проверки на "Активность"
$out = new ControllerActiveUser();
$res = $out->result;
// Получение ключей массива данных
//session_start();
foreach ($res as $active) {

}
//echo session_id();
//echo $active['ses_id'];
$_SESSION['ses_id'] = session_id();
$_SESSION['name'] = $active['name'];
$_SESSION['login'] = $active['login'];
$_SESSION['name_role'] = $active['name_role'];
if ($active['ses_id'] === $_SESSION['ses_id']) {
    echo "successfully";
} else {
    (new Route())->ErrorPage404();
}
// Завершение сеанса
if ($_GET['page'] == 'end') {
    $o = new ControllerEndSince();
    header("Location: HTTP://adminMVC/");
}

?>


<script>
    $(function () {
        $("#datepicker").datepicker({
            autoClose: true,
            todayHighLight: 1
        });
    });
</script>
<script src=
        "https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity=
        "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous">
</script>
<script src=
        "https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity=
        "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous">
</script>
<script src=
        "../../style/bootstrap5/js/bootstrap-datepicker.min.js">
</script>


<link rel="stylesheet" href="https://snipp.ru/cdn/jqueryui/1.12.1/jquery-ui.min.css">


<script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
<script src="https://snipp.ru/cdn/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="../../style/bootstrap5/js/datepicker.js"></script>