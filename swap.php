<?
function array_swap(&$arr, $num) {
    list($arr[0], $arr[$num]) = [$arr[$num], $arr[0]];
}

function array_right(&$arr) {
    $buf = $arr[ count($arr) - 1 ];
    for ($i = count($arr) - 1; $i > 0; $i--) {
        $arr[$i] = $arr[$i - 1];
    }

    $arr[0] = $buf;

}

function maх_search($arr, $i) {
    $max = $arr[$i];
    $e = $i;
    for ($j = $i; $j < count($arr); $j++) {
        if ($arr[$j] > $max) {
            $max = $arr[$j];
            $e = $j;
        }
    }

    return $e;
}

function array_sort(&$arr) {

    array_swap($arr, maх_search($arr, 0));
    for ($i = 1; $i < count($arr); $i++) {
        $buf = maх_search($arr, $i);
        array_right($arr);
        ($buf == count($arr) - 1) 
            ? array_swap($arr, 0)
            : array_swap($arr, $buf + 1);
    }
    return $arr;
}

$array = [6, 3, 8, 15, 24, 1];

print_r(array_sort($array));