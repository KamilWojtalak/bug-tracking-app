<?php
declare(strict_types = 1);

namespace App\Helpers;

class Config {

  public static function get(string $filename, string $key = null)
  {
    $file_content = self::getFileContent($filename);

    if ($key === null) {
      return $file_content;
    }

    return isset($file_content[$key]) ? $file_content[$key] : [];
  }

  public static function getFileContent(string $filename): array 
  {
    $file_content = [];
    $path = realpath( sprintf(__DIR__ . '/../Configs/%s.php', $filename) );
    try {
      if (file_exists($path)) {
        $file_content = require_once $path;
      }
    } catch ( \Throwable $ex ) {
      throw new \RuntimeException(
        sprintf('The specified file: %s was not found', $filename)
      );
    }

    return $file_content;
  }
}