<?php
namespace phpp;

$options = getopt('h::',['help::'], $rest_index);
$arguments = array_slice($argv, $rest_index);

$usage =<<<EOS
usage: php Phpp.php [-h] <target php source file>

EOS;

if (isset($options['h'])) {
    fputs(STDERR, $usage);
    exit(-1);
}

$filename = array_shift($arguments);
if (empty($filename)) {
    fputs(STDERR, "ERROR: not specified php source file.\n");
    fputs(STDERR, $usage);
    exit(-1);
}

include_once './vendor/autoload.php';
use phpp\PhppReflection;

$reflection = new PhppReflection($filename);
$data = $reflection->dump();
echo json_encode($data) . "\n";
