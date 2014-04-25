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
    $posts = \WPSpokes\Framework\Models\Post::all();
    echo $posts->toJSON();
  }
}
