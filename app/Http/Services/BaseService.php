<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


abstract class BaseService
{

  private $repository;
  protected $payload;

  abstract protected function getExcept(): array;
  abstract protected function getSearchFields(): array;
  abstract protected function getPerpage(): int;
  abstract protected function getSelectSimpleFilter(): array;
  abstract protected function getAge(): array;

  public function __construct($repository)
  {
    $this->repository = $repository;
    $this->payload = [];
  }


  private function paginationAgrument($request)
  {
    $sortBy = ($request->input('sort_by')) ? explode('_', $request->input('sort_by')) : ['id', 'desc'];

    return [
      'perpage' => $request->input('perpage') ?? $this->getPerpage(),
      'sort' => $sortBy,
      'keyword' => [
        'q' => $request->input('keyword'),
        'field' => $this->getSearchFields()
      ],
      'simpleFilter' => call_user_func_array('array_merge', array_map(function ($item) use ($request) {
        return [$item => $request->input($item)];
      }, $this->getSelectSimpleFilter())),
      'complexFilter' => [
        'age' => $request->input('age'),
      ],
      'dateFilter' => [
        'date_range' => $request->input('date_range'),
        'date_filter_field' => $request->input('date_filter_field'),
      ],
    ];
  }


  public function pagination($request)
  {
    $agrument = $this->paginationAgrument($request);
    return $this->repository->paginate($agrument);
  }

  protected function setPayload($request)
  {
    $this->payload = $request->except($this->getExcept());
    return $this;
  }

  protected function getPayload()
  {
    return $this->payload;
  }

  protected function preparePayload()
  {
    return $this;
  }


  public function save($request, $id = null): bool
  {
    DB::beginTransaction();
    try {
      $payload = $this->setPayload($request)
        ->preparePayload()
        ->getPayload();

      $data = $this->repository->save($payload, $id);

      DB::commit();
      return true;
    } catch (\Exception $e) {
      DB::rollBack();
      Log::error("Lỗi khi lưu dữ liệu: " . $e->getMessage());
      throw $e;
    }
  }
  //chaining method


  public function delete($id): bool
  {
    try {
      DB::beginTransaction();
      $this->repository->delete($id);
      DB::commit();
      return true;
    } catch (\Exception $e) {
      DB::rollBack();
      Log::error("Lỗi xóa dữ liệu: " . $e->getMessage());
      throw $e;
    }
  }


  public function findById($id)
  {
    return $this->repository->findById($id);
  }


  public function getAll()
  {
    return $this->repository->all();
  }


  public function updateByField($payload = [], string $repository = '')
  {
    try {
      DB::beginTransaction();
      $repositoryInstance = app($repository);
      $update[$payload['field']] = $payload['value'] == 1 ? 2 : 1;
      $modelId = $payload['id'];
      $repositoryInstance->save($update, $modelId);
      DB::commit();
      return true;
    } catch (\Exception $e) {
      DB::rollBack();
      Log::error("Lỗi xóa dữ liệu: " . $e->getMessage());
      // throw $e
      return false;
    }
  }


  public function deleteByField($payload = [], string $repository = '')
  {
    try {
      DB::beginTransaction();

      $repositoryInstance = app($repository); // Khởi tạo instance của repository

      // Lấy danh sách các ID từ payload
      $ids = $payload['ids'];

      // Kiểm tra nếu không có ID nào được truyền vào
      if (empty($ids)) {
        return false; // Trả về false nếu không có bản ghi nào được chọn
      }

      // Xóa các bản ghi theo ID
      $repositoryInstance->deleteByIds($ids);

      DB::commit();
      return true; // Trả về true nếu xóa thành công
    } catch (\Exception $e) {
      DB::rollBack();
      Log::error("Lỗi xóa dữ liệu: " . $e->getMessage());
    }
  }
}
