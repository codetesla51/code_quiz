<?php
function findDuplicate($arr) {
  $dictionary = [];
  $left = 0;
  $right = 1;
  
  while ($right < count($arr)) {
    if ($arr[$right] == $arr[$left]) {
      if (isset($dictionary[$arr[$left]])) {
        $dictionary[$arr[$left]]++;
      } else {
        $dictionary[$arr[$left]] = 2; // Start with 2 since it's a duplicate
      }
    } else {
      $left = $right;
    }
    $right++;
  }
  return $dictionary;
}

$arr = [1, 2, 2, 3, 3, 3, 4, 5, 5, 5, 5];
print_r(findDuplicate($arr));
