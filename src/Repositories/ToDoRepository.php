<?php
namespace ToDoList\Repositories;
use Plenty\Exceptions\ValidationException;
use Plenty\Modules\Plugin\DataBase\Contracts\DataBase;
use ToDoList\Contracts\ToDoRepositoryContract;
use ToDoList\Models\ToDo;
use ToDoList\Validators\ToDoValidator;
use Plenty\Modules\Frontend\Services\AccountService;

/**
 *
 */
class ToDoRepository implements ToDoRepositoryContract
{
  private $accountService;

  public function __construct(AccountService $accountService)
  {
    $this->accountService = $accountService;
  }

  public function getCurrentContactId(): int
  {
    return $this->accountService->getAccountContactId();
  }

  public function createTask(array $data): ToDo
  {
    try{
      ToDoValidator::validateOrFail($data);
    } catch (ValidationException $e){
      throw $e:
    }
    $database = pluginApp(DataBase::class);
    $toDo = pluginApp(ToDo::class);
    $todo->taskDescription = $data['taskDescription'];
    $toDo->userId = $this->getCurrentContactId();
    $toDo->createdAt = time();
    $database->save($todo);

    return $toDo;
  }

  public function getToDoList():array
  {
    $database = pluginApp(DataBase::class);
    $id = $this->getCurrentContactId();
    $toDoList = $database->query(ToDo::class)->where('userId','=',$id)->get();
    return $toDoList;
  }

  public function updateTast($id): ToDo
  {
    $database = pluginApp(DataBase::class);
    $toDoList = $database->query(ToDo::class)
    ->where('id','=', $id)
    ->get();

    $toDo = $toDoList[0];
    $toDo->isDone = true;
    $database->save($toDo);

    return $toDo;
  }

  public function deleteTast($id): ToDo
  {
    $database = pluginApp(DataBase::class);
    $toDoList = $database->query(ToDo::class)
    ->where('id','=',$id)
    ->get();

    $toDo = $toDoList[0];
    $database->delete($toDo);

    return $toDo;
  }

}

 ?>
