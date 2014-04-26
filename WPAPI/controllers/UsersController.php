<?php

namespace WPAPI\Controllers;

class UsersController extends APIController
{
  public function get_model_class()
  {
    return '\WPSpokes\Framework\Models\User';
  }
}

