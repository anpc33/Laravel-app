<?php
namespace App\Http\Traits;

Trait Query{

  public function scopeKeyword($query, array $params = []){

    if (isset($params['keyword']) && is_array($params['keyword']) && !empty($params['keyword']['q'])) {
      $searchField = $params['keyword']['field'];
      $keyword = $params['keyword']['q'];
      $query->where(function ($subQuery) use ($searchField, $keyword) {
        if (count($searchField)) {
          foreach ($searchField as $field) {
            $subQuery->orWhere($field, 'LIKE', '%' . $keyword . '%');
          }
        }
      });
    }
    return $query;
  }

  public function scopeSimpleFilter($query, array $params = []){
     if (isset($params['simpleFilter']) && is_array($params['simpleFilter']) && count($params['simpleFilter'])) {
      foreach ($params['simpleFilter'] as $key => $val) {
        if (!is_null($val) && $val != 0) {
          $query->where($key, '=', $val);
        }
      }
    }
    return $query;
  }

  public function scopeComplexFilter($query, array $params = []){
    if (isset($params['complexFilter']) && is_array($params['complexFilter']) && count($params['complexFilter'])) {
      foreach ($params['complexFilter'] as $key => $val) {
        if(!empty($val)){
          list($operator, $filterValue) = explode(':', $val); // destructoring --> explode: bung 1 chuooxi thanhf 1 mang dựa vào 1 kí tự nào đó trong chuỗi

          switch ($operator) {
            case 'gt':
              $query->where($key, '>', $filterValue);
              break;
            case 'gte':
                $query->where($key, '>=', $filterValue);
                break;
            case 'lt':
              $query->where($key, '<', $filterValue);
              break;
            case 'lte':
              $query->where($key, '<=', $filterValue);
              break;
            case 'between':
              $range = explode(',', $filterValue);

              $query->whereBetween($key, $range);
              break;
          }
        }
      }
    }

   return $query;
 }

}
