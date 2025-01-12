<?php
namespace App\Http\Services\Impl\User;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\User\UserCatalogueRepository;
use Illuminate\Support\Facades\Log;

class UserCatalogueService {


  private $userCatalogueRepository;

  public function __construct(
    UserCatalogueRepository $userCatalogueRepository
  )
  {
    $this->userCatalogueRepository = $userCatalogueRepository;
  }

  //- Atomicity: Tính nguyên tử
  public function create($request): bool {
    try {
      DB::beginTransaction();
      $payload = $request->except(['_token']);
      $userCatalogue = $this->userCatalogueRepository->create($payload);
      DB::commit();
      die();
      return true;

    } catch (\Exception $e) {
      DB::rollBack();
      echo "Lỗi transaction " . $e->getMessage(). "tại dòng" . $e->getCode();die();
      Log::error("Lỗi transaction " . $e->getMessage(). "tại dòng" . $e->getCode());
      return false;
    }
  }


  public function getAll(){
    return $this->userCatalogueRepository->all();
  }

}

