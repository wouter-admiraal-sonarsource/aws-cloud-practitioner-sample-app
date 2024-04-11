<?php

require_once "lib/view.php";
require_once "lib/router.php";

get("/", function () {
  return render_view("views/home.php", ['title' => "Hello World"]);
});

print run();
