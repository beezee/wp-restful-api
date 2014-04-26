<?php

namespace WPAPI\Controllers;

class CategoriesController extends APIController
{
  public function get_model_class()
  {
    return '\WPSpokes\Framework\Models\Category';
  }
}

