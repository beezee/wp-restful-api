<?php

namespace WPAPI\Controllers;

class TagsController extends APIController
{
  public function get_model_class()
  {
    return '\WPSpokes\Framework\Models\Tag';
  }
}

