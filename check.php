<?php

function check_in_array(array $array, $callback)
    {
    $value = call_user_func($callback, $array);
    if ($value !== null)
    return $value;
        
}
print_r(check_in_array($data1, function($i){ 
    $ans = array();
    foreach ($i as $index => $v) { 
        if ($v['status'] == 1) {
            $ans[] = $v;
        }
    }
    return (count($ans) == 0?null:$ans);            
    }));
?>