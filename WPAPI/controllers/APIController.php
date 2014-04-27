<?php

namespace WPAPI\Controllers;

abstract class APIController extends \WPSpokes\Framework\Controller
{
  public $instance;

  public function before()
  {
    header('Content-Type: application/json');
  }

  public abstract function get_model_class();

  public function find_or_404($id)
  {
    $class = $this->model_class;
    if (!$this->instance = $class::find($id))
      $this->set404();
  }

  public function get_params()
  {
    return json_decode(file_get_contents('php://input'), true);
  }
  
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
    $this->find_or_404($id);
    echo $this->instance->toJSON();
  }

  public function create_new()
  {
    $class = $this->model_class;
    $instance = new $class($this->params);
    $instance->save();
    echo $instance->toJSON();
  }

  public function update($id)
  {
    $this->find_or_404($id);
    $this->instance->fill($this->params);
    $this->instance->save();
    echo $this->instance->toJSON();
  }

  public function delete_instance($id)
  {
    $this->find_or_404($id);
    $this->instance->delete();
    echo $this->instance->toJSON();
  }
}

