<?php

set_include_path(join(PATH_SEPARATOR, [
    get_include_path(),
    TEMPLATEPATH
]));

$autoload = TEMPLATEPATH.'/vendor/autoload.php';
if (is_file($autoload)) require $autoload;
