<?php

function render_view($file, $vars)
{
  extract($vars, EXTR_SKIP);
  ob_start();
  require_once($file);
  $content = ob_get_contents();
  ob_end_clean();

  $vars['view_content'] = $content;
  extract($vars, EXTR_SKIP);
  ob_start();
  require_once("views/layout.php");
  $html = ob_get_contents();
  ob_end_clean();

  return $html;
}
