<?php

namespace App\Http\Traits;

trait Query
{

  public function scopeKeyword($query, array $params = [])
  {

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

  public function scopeSimpleFilter($query, array $params = [])
  {
    if (isset($params['simpleFilter']) && is_array($params['simpleFilter']) && count($params['simpleFilter'])) {
      foreach ($params['simpleFilter'] as $key => $val) {
        if (!is_null($val) && $val != 0) {
          $query->where($key, '=', $val);
        }
      }
    }
    return $query;
  }

  public function scopeComplexFilter($query, array $params = [])
  {
    if (isset($params['complexFilter']) && is_array($params['complexFilter']) && count($params['complexFilter'])) {
      foreach ($params['complexFilter'] as $key => $val) {
        if (!empty($val)) {
          list($operator, $filterValue) = explode(':', $val);
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
  public function scopeDateRangeFilter($query, array $params = [])
  {
    // Kiểm tra nếu có tham số lọc theo ngày
    if (isset($params['dateFilter']) && is_array($params['dateFilter']) && count($params['dateFilter'])) {
      $dateRange = explode('to', $params['dateFilter']['date_range']);

      // dd($dateRange);
      if (count($dateRange) == 2) {
        $startDate = \Carbon\Carbon::parse($dateRange[0])->startOfDay(); // Thời gian bắt đầu của ngày
        $endDate = \Carbon\Carbon::parse($dateRange[1])->endOfDay(); // Thời gian kết thúc của ngày

        $query->whereBetween($params['dateFilter']['date_filter_field'], [$startDate, $endDate]);
      }
    }

    // In ra câu lệnh SQL thực thi
    dd($query->toSql(), $query->getBindings());

    return $query;
  }
}
