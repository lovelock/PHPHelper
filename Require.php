<?php

namespace Lovelock\PHPHelper;

/**
 * Require all php files in a directory.
 * 
 * @param array $dir
 * @return null
 */
class Require
{
  public static function requireAll($dir)
  {
    if (!is_dir($dir)) {
      throw new InvalidArgumentException('Argument ' . $dir . ' must be a directory.');
    }
  
    $dh = opendir($dir);
  
    while (($file = readdir($dh)) !== false) {
      $realFile = $dir . '/' . $file;
      if (!is_dir($realFile)) {
        if ($realFile !== '.' && $realFile !== '..' && is_file($realFile) && is_readable($realFile)) {
          require_once $realFile;
        }
      } else {
        self::requireAll($realFile);
      }
    }
    
    closedir($dh);
  }
}
