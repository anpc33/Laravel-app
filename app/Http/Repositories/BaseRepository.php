<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;


class BaseRepository
{



  private $model;

  public function __construct(
    Model $model
  ) {
    $this->model = $model;
  }

  public function findById(int $id = 0)
  {
    return $this->model->find($id);
  }

  public function all()
  {
    return $this->model->all();
  }

  public function save(array $payload = [], $id = null)
  {

    return $id
      ? tap($this->findById($id))->update($payload)->fresh()
      : $this->model->create($payload);
  }

  public function paginate($params = [])
  {
    return $this->model
              ->keyword($params)
              ->simpleFilter($params)
              ->complexFilter($params)
              ->orderBy($params['sort'][0], $params['sort'][1])
              ->paginate($params['perpage'])->withQueryString();
  }
}


