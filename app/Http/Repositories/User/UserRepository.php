<?php

namespace App\Http\Repositories\User;

use App\Models\User;
use App\Http\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{

  private $model;

  public function __construct(
    User $model
  ) {
    $this->model = $model;
    parent::__construct($model);
  }



  // public function pagination(array $filters, int $perPage = 10)
  // {
  //   $query = $this->model->query();

  //   // Tìm kiếm theo trạng thái
  //   if (isset($filters['status']) && $filters['status'] !== null) {
  //     $query->where('status', $filters['status']);
  //   }
  //   //Keyword
  //   if (!empty($filters['search'])) {
  //     $query->where(function ($q) use ($filters) {
  //       $q->where('name', 'LIKE', '%' . $filters['search'] . '%')
  //         ->orWhere('email', 'LIKE', '%' . $filters['search'] . '%');
  //     });
  //   }

  //   // **Logic sắp xếp**
  //   if (!empty($filters['sort_by'])) {
  //     switch ($filters['sort_by']) {
  //       case 'name_asc':
  //         $query->orderBy('name', 'asc');
  //         break;
  //       case 'name_desc':
  //         $query->orderBy('name', 'desc');
  //         break;
  //       case 'date_asc':
  //         $query->orderBy('created_at', 'asc');
  //         break;
  //       case 'date_desc':
  //         $query->orderBy('created_at', 'desc');
  //         break;
  //     }
  //   }


  //   // Lọc theo khoảng thời gian
  //   if (!empty($filters['start_date']) && !empty($filters['end_date'])) {
  //     $query->whereBetween('created_at', [$filters['start_date'], $filters['end_date']]);
  //   }


  //   if (isset($filters['age'])) {
  //     $ageRange = $filters['age'];
  //     switch ($ageRange) {
  //       case '1': // Từ 13 đến 20
  //         $query->whereBetween('age', [13, 20]);
  //         break;
  //       case '2': // Từ 21 đến 30
  //         $query->whereBetween('age', [21, 30]);
  //         break;
  //       case '3': // Từ 31 đến 40
  //         $query->whereBetween('age', [31, 40]);
  //         break;
  //       case '4': // Trên 40
  //         $query->where('age', '>', 40);
  //         break;
  //     }
  //   }

  //   // Phân trang và giữ lại bộ lọc trong URL
  //   return $query->paginate($perPage)->appends($filters);
  // }
}
