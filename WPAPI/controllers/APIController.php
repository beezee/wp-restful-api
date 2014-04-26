<?php

namespace WPAPI\Controllers;

abstract class APIController extends \WPSpokes\Framework\Controller
{
  public function before()
  {
    header('Content-Type: application/json');
  }

  public abstract function get_model_class();
  
  public function index()
  {
    $class = $this->model_class;
    $q = $class::query();
    foreach($_GET as $key => $val)
      $q->where($key, '=', $val);
    $items = $q->get();
    echo $items->toJSON();
  }

  public function show($id)
  {
    $class = $this->model_class;
    if (!$instance = $class::find($id))
      return $this->set404();
    echo $instance->toJSON();
  }
}

