<?php

static $_routes = ["GET" => ["/" => function () {
  return "home";
}], "POST" => []];

function get($route, $cb)
{
  global $_routes;
  $_routes["GET"][$route] = $cb;
}

function post($route, $cb)
{
  global $_routes;
  $_routes["POST"][$route] = $cb;
}

function run()
{
  global $_routes;

  $uri = '/';
  if (!empty($_SERVER['REQUEST_URI'])) {
    $uri = $_SERVER['REQUEST_URI'];
  } elseif (!empty($_SERVER['PATH_INFO'])) {
    $uri = $_SERVER['PATH_INFO'];
  } elseif (!empty($_SERVER['PHP_SELF']) && !empty($_SERVER['SCRIPT_NAME'])) {
    $uri = substr($_SERVER['PHP_SELF'], strlen($_SERVER['SCRIPT_NAME']));
  }

  if (!empty($_routes[$_SERVER['REQUEST_METHOD']][$uri])) {
    return $_routes[$_SERVER['REQUEST_METHOD']][$uri]();
  } else {
    die("No match found for route $uri and method {$_SERVER['REQUEST_METHOD']}");
  }
}
