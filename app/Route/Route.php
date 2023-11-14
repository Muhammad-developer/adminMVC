<?php
// Роутер админки
namespace app\Route;
include_once "vendor/autoload.php";

use app\Controller\ControllerMain;

class Route
{
    protected $routes;
    public string $uri;
    protected mixed $method;

    function __construct()
    {
        $this->uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    static function start(): void
    {
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'Index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем имя контроллера
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        // получаем имя View
        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        // добавляем префиксы
        $model_name = 'Model' . $controller_name;
        $controller_name = 'Controller' . $controller_name;
        $action_name = 'action' . $action_name;

        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = strtolower($model_name) . '.php';
        $model_path = "app/Model/" . $model_file;
        if (file_exists($model_path)) {
            include "app/Model/" . $model_file;
        }

        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "app/Controller/" . $controller_file;
        if (file_exists($controller_path)) {
            include "app/Controller/" . $controller_file;
        }
//        else
//        {
//            /*
//            Сделаем редирект на страницу 404
//            */
//            (new Route)->ErrorPage404();
//        }

        // Создаем контроллер
        $controller = new ControllerMain();
        $action = $action_name;

        if (method_exists($controller, $action)) {
            // Вызываем действие контроллера
            $controller->$action();
        }
//        else
//        {
//            // Страница не найдено
//            (new Route)->ErrorPage404();
//        }

    }

    function add($uri, $controller, $method): array
    {
        return $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function match(): void
    {
        $matches = false;
        foreach ($this->routes as $route) {

        }
        if ($route['uri'] == $this->uri) {
//            var_dump($route['uri']);
            include "app/View/" . $route['controller'];
//            require "app/View/DashboardView.php";
        }
    }

    public function get($uri, $controller): void
    {
        $this->add($uri, $controller, 'GET');
        $this->match();
    }

    public function post($uri, $controller): void
    {
        $this->add($uri, $controller, 'POST');
    }

    function delete($uri, $controller): void
    {
        $this->add($uri, $controller, 'DELETE');
    }

// Страница 404
    function ErrorPage404(): void
    {
        // Ещё в разработке ...
        header("Location: http://NotFound/404.html");
//        $host = 'https://' .$_SERVER['HTTP_HOST'].'/';
//        header('HTTP/1.1 404 Not Found');
//        header("Status: 404 Not Found");
//        header('Location:'.$host.'404');
    }
}