<?php
use rester\sql\db;
use rester\sql\rester;

if(!defined('__RESTER__')) exit;

$start = rester::param('start');
$rows = rester::param('rows');

$query = " SELECT * FROM `example` LIMIT {$start}, {$rows} ";
$pdo = db::get();

$list = [];
foreach($pdo->query($query,PDO::FETCH_ASSOC) as $row)
{
    $list[] = $row;
}

return $list;
