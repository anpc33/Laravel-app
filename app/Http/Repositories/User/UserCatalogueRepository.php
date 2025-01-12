<?php
namespace App\Http\Repositories\User;
use App\Models\UserCatalogue;

class UserCatalogueRepository {

  private $model;

  public function __construct(
    UserCatalogue $model
  )
  {
    $this->model = $model;
  }

  public function create(array $payload = []){
    return $this->model->create($payload);
  }

  public function all(){
    return $this->model->all();
  }

}


