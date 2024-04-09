<?php

function render_view($file, $vars)
{
  extract($vars, EXTR_SKIP);
  ob_start();
  require_once($file);
  $html = ob_get_contents();
  ob_end_clean();
  return $html;
}
