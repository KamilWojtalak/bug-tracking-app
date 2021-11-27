<?php
declare(strict_types = 1);

namespace App\Helpers;

use App\Exception\NotFoundException;

class Config {

  public static function get(string $filename, string $key = null)
  {
    $file_content = self::getFileContent($filename);

    if ($key == null) {
      return $file_content;
    }

    return (isset($file_content[$key])) ? $file_content[$key] : [];
  }

  public static function getFileContent(string $filename): array 
  {
    $file_content = [];
    $path = realpath( sprintf(__DIR__ . '/../Configs/%s.php', $filename) );
    try {
      if (file_exists($path)) {
        $file_content = require $path;
      }
    } catch ( \Throwable $ex ) {
      throw new NotFoundException(
        sprintf('The specified file: %s was not found', $filename), 
        [
          'not found file',
          'data is passed'
        ]
      );
    }
    
    return (array) $file_content;
  }
}