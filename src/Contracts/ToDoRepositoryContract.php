<?php
namespace ToDoList\Contracts;
use ToDoList\Models\ToDo;

interface ToDoRepositoryContract
{
  public function createTask(array $data): ToDo;
  public function getToDoList(): array;
  public function updateTask($id): ToDo;
  public function deleteTask($id): ToDo;
}
 ?>
