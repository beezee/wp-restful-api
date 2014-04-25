<?php

namespace WPAPI\Controllers;

class PostsController extends APIController
{
  public function get_model_class()
  {
    return '\WPSpokes\Framework\Models\Post';
  }
}
