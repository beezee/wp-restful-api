<?php

namespace WPAPI\Controllers;

class PostsController extends \WPSpokes\Framework\Controller
{
  public function before()
  {
    header('Content-Type: application/json');
  }
  
  public function index()
  {
    $q = \WPSpokes\Framework\Models\Post::query();
    foreach($_GET as $key => $val)
      $q->where($key, '=', $val);
    $posts = $q->get();
    echo $posts->toJSON();
  }
}
