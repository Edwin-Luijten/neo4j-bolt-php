<?php

require_once(__DIR__.'/vendor/autoload.php');

use GraphAware\Bolt\Driver as Bolt;

$bolt = new Bolt('localhost', 7687);

$session = $bolt->getSession();
$response = $session->run('MATCH (n:Person) WHERE n.born in {years} RETURN n', array('years' => array(1975, 1940)));
$session->run('MATCH (n:Person) WHERE n.processed = {val} RETURN n', array('val' => true));
$session->run('MATCH (n:Person) SET n += {props}', array('props' => ['active' => false, 'admin' => 1]));
//print_r($response);