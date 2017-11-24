<?php
namespace ToDoList\Providers;

use Plenty\Plugin\ToDoRouteServiceProvider;
use Plenty\Plugin\Routing\Router;

class ToDoRouteServiceProvider extends RouteServiceProvider
{
  public function map(Router $router)
  {
    $router->get('todo', 'ToDoList\Controllers\ContentController@showToDo');
    $router->post('todo', 'ToDoList\Controllers\ContentController@createToDo');
    $router->put('todo/{id}', 'ToDoList\Controllers\ContentController@updateToDo')->where('id','\d+');
    $router->delete('todo/{id}', 'ToDoList\Controllers\ContentController@deleteToDo')->where('id', '\d+');
  }
}
 ?>
