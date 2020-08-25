<?php

use Angujo\PhpDiff\PhpDiff;

include "../autoload.php";

$from = 'The Quick brow fox';
$to   = 'Jumped over the fence';

$pd  = new PhpDiff($from, $to, PhpDiff::$characterGranularity);
$out = $pd->renderDiffToHTML();

print_r($out);