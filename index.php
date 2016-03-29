<?php
/**
 * Created by PhpStorm.
 * User: Alpha
 * Date: 29.03.2016
 * Time: 4:42
 */
//classes included
include 'classes/router.php';
include 'classes/dataloader.php';
include 'classes/viewloader.php';
//classes namespace loaded
use \app\Macaw\Macaw;
use \app\ViewLoader\ViewLoader;
use \app\DataLoader\DataLoader as data;
// init path
Macaw::get('/', function() {
    // setup data storage switch on data.json (original source file)
    $data= new data(null,'data2.json');
    // load data
    $data = $data->loadData();
    // render view
    viewloader::loadTpl('app.php',$data);
});
Macaw::dispatch();
