<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Backend\UserCatalogue\StoreRequest;
use App\Http\Services\Impl\User\UserCatalogueService;
use App\Http\Controllers\Backend\BaseController;

class UserCatalogueController extends BaseController
{


  private $module = 'user_catalogue';
  private $userCatalogueService;


  public function __construct(
    UserCatalogueService $userCatalogueService
  ){
    $this->userCatalogueService = $userCatalogueService;
    parent::__construct(
      $this->userCatalogueService
    );
  }

  protected function getStoreRequest()
  {
    return new StoreRequest();
  }

  protected function getModule()
  {
    return $this->module;
  }

  protected function getConfig()
  {
    return [
      'filters' => $this->filterExtends(),
      'createRoute' => route($this->module.'.create'),
      'tableHead' => $this->tableHead(),
      'dataVariable' => $this->module .'s',
      'breadcrumb' =>  [
        'create' => 'Thêm mới thành viên',
        'index' => 'Danh sách thành viên',
        'update' => 'Cập nhật thành viên',
        'delete' => 'Xóa thành viên'
      ],
      'view' => [
        'create' => 'backend.'.$this->module.'.create',
        'index' => 'backend.'.$this->module.'.index'
      ],

    ];
  }



  private function tableHead()
  {
    return [
      'id' => 'ID',
      'name' => "Fullname",
    ];
  }

  private function filterExtends()
  {
    // return [
    //   0 => [
    //     'name' => 'user_catalogue_id',
    //     'options' => [
    //       0 => 'Chọn Nhóm Thành viên',
    //       1 => 'Admin',
    //       2 => 'Users',
    //       3 => 'Seller'
    //     ]
    //   ],
    //   1 => [
    //     'name' => 'province_id',
    //     'options' => [
    //       0 => 'Chọn Thành Phố',
    //       1 => 'Hà NỘi',
    //     ]
    //   ]
    // ];
  }



}
