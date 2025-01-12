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
}
