<?php
namespace ToDoList\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Templates\Twig;
use ToDoList\Contracts\ToDoRepositoryContract;

class ContentController extends Controller
{
public function showToDo(Twig $twig, ToDoRepositoryContract $toDoRepo): string
{
  $toDoList = $toDoRepo->getToDoList();
  $templateData = array("tasks" => $toDoList);
  return $twig->render('ToDoList::content.todo', $templateData);
}

public function createToDo(Request $request, ToDoRepositoryContract $toDoRepo): string
{
  $newToDo = $toDoRepo->createTask($request->all());
  return json_encode($newToDo);
}

public function updateToDo(int $id, ToDoRepositoryContract $toDoRepo): string
{
  $updateToDo = $toDoRepo->updateTask($id);
  return json_encode($updateToDo);
}

public function deleteToDo(int $id, ToDoRepositoryContract $toDoRepo): string
{
  $deleteToDo = $toDoRepo->deleteTask($id);
  return json_encode($deleteToDo);
}
}
 ?>
