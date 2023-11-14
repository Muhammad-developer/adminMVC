<?php

namespace app\View;

class View
{
    function __construct()
    {

    }

    function generate($content_view, $template_view = null, $data = null): void
    {
        /*
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }
        */
        if ($content_view != "") {
            include 'app/View/' . $content_view;
        }
        if ($template_view != "") {
            include 'app/View/' . $template_view;
        }

    }
}