<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

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

  public function delete(int $id): bool
  {
    return (bool) $this->model->destroy($id);
  }

  public function deleteByIds(array $ids)
{
    // Xóa các bản ghi có ID trong danh sách $ids
    return $this->model->whereIn('id', $ids)->delete();
}




  public function paginate($params = [])
  {
    return $this->model
      ->keyword($params)
      ->simpleFilter($params)
      ->complexFilter($params)
      ->dateRangeFilter($params) // Sử dụng scope lọc thời gian
      ->orderBy($params['sort'][0], $params['sort'][1])
      ->paginate($params['perpage'])->withQueryString();
  }
}
