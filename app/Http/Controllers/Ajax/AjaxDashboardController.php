<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxDashboardController extends Controller
{
  public function __construct() {}

  public function ajaxUpdateByField(Request $request)
  {
    $payload = $request->all(); // Lấy toàn bộ dữ liệu từ request
    $service = $this->setupService($payload['model']); // Tạo tên class service
    $repository = $this->setupRepository($payload['model']); // Tạo tên class repository
    $serviceInstance = app($service); // Khởi tạo instance của service

    // dd($serviceInstance);

    if ($serviceInstance->updateByField($payload, $repository)) {
      return response()->json('Cập nhật thành công'); // Trả về phản hồi thành công
    }
    return response()->json('Cập nhật không thành công'); // Trả về phản hồi thất bại
  }

  private function setupService(string $model = '')
  {
    return 'App\\Http\\Services\\Impl\\' . ucfirst($model) . '\\' . ucfirst($model . 'Service');
  }
  private function setupRepository(string $model = '')
  {
    return 'App\\Http\\Repositories\\' . ucfirst($model) . '\\' . ucfirst($model . 'Repository');
  }



  public function deleteRecords(Request $request)
  {
    $payload = $request->all(); // Lấy tất cả dữ liệu từ request
    $service = $this->setupService($payload['model']); // Tạo tên class service
    $repository = $this->setupRepository($payload['model']); // Tạo tên class repository
    $serviceInstance = app($service); // Khởi tạo instance của service
    try {
      // Gọi phương thức deleteByField từ service để xóa bản ghi
      $result = $serviceInstance->deleteByField($payload, $repository);

      if ($result) {
        return response()->json('Xóa thành công'); // Trả về phản hồi thành công
      } else {
        return response()->json('Xóa không thành công', 400); // Trả về phản hồi lỗi
      }
    } catch (\Exception $e) {
      // Nếu có lỗi trong quá trình xử lý, trả về lỗi
      return response()->json('Có lỗi xảy ra: ' . $e->getMessage(), 500);
    }
  }
}
