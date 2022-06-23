<?php

$numbers = 10;
function num(){
    global $numbers;
    echo $numbers;
}
num();

?>