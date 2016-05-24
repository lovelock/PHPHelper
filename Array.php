<?php

namespace Lovelock\PHPHelper;

/**
 * Check if an array is nested.
 *
 * @param mixed $array
 * @return boolean
 */
class Array
{
  public static function isNested($array) {
    if (!is_dir($array)) {
      return false;
    }
    
    foreach ($array as $item) {
      if (is_dir($item)) {
        return true;
      }
    }
    
    return false;
  }
}
