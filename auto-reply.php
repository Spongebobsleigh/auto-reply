<?php
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    $page_flag = 0;

    if(!empty($_POST['btn_confirm'])){
        $page_flag = 1;
    }
    elseif(!empty($_POST['btn_submit'])){
        $page_flag = 2;

    }
?>
