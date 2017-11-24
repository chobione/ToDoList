<?php
namespace ToDoList\Models;
use Plenty\Modules\Plugin\DataBase\Contracts\Model;

/**
 *  Class ToDo
 */
class ToDo extends Model
{
  public $id = 0;
  public $taskDescription = '';
  public $userId = 0;
  public $isDone = false;
  public $createdAt = 0;

  public function getTableName(): string
  {
    return 'ToDoList::ToDo';
  }
}

 ?>
