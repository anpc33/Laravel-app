<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
  private $config;
  private $service;
  private $module;

  abstract protected function getConfig();
  abstract protected function getModule();
  abstract protected function getStoreRequest();
  abstract protected function getUpdateRequest();

  public function __construct($service)
  {
    $this->module = $this->getModule();
    $this->config = $this->getConfig();
    $this->service = $service;
  }

  public function index(Request $request)
  {
    $method = 'index';

    $data = $this->service->pagination($request);

    $breadcrumb = $this->config['breadcrumb'][$method];
    $config = $this->config;
    $module = $this->module;

    return view($this->config['view'][$method], compact(
      'breadcrumb',
      'data',
      'config',
      'module'
    ));
  }



  public function create()
  {
    $method = 'create';
    $breadcrumb = $this->config['breadcrumb'][$method];
    return view($this->config['view']['save'], compact(
      'breadcrumb',
      'method'
    ));
  }


  public function edit($id)
  {
    $method = 'edit';
    $breadcrumb = $this->config['breadcrumb'][$method];
    $data = $this->service->findById($id);
    return view($this->config['view']['save'], compact(
      'breadcrumb',
      'data',
      'method'
    ));
  }

  public function store(Request $request)
  {
    $rules = $this->getStoreRequest()->rules();
    $request->validate($rules);
    if ($this->service->save($request)) {
      return redirect()->route($this->module . '.index')->with('success', 'Tạo bản ghi thành công');
    }
    return redirect()->route($this->module . '.index')->with('error', 'Có lỗi xảy ra! Hãy thử lại');
  }

  public function update(Request $request, $id)
  {
    $rules = $this->getUpdateRequest()->rules();
    $request->validate($rules);
    if ($this->service->save($request, $id)) {
      return redirect()->route($this->module . '.index')->with('success', 'Cập nhật bản ghi thành công');
    }
    return redirect()->route($this->module . '.index')->with('error', 'Có lỗi xảy ra! Hãy thử lại');
  }


  public function destroy($id)
  {
    if ($this->service->delete($id)) {
      return redirect()->route($this->module . '.index')->with('success', 'Xóa bản ghi thành công!');
    }
    return redirect()->route($this->module . '.index')->with('error', 'Xóa bản ghi không thành công!');
  }
}
