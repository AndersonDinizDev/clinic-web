<?php

class RenderView
{
  public function loadView($view)
  {
    require_once __DIR__ . "/../views/$view.php";
  }
}
