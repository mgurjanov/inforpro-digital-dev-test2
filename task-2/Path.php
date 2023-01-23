<?php

declare(strict_types = 1);


class Path {

  private $path = '/';
  private static $counter = 0;

  public function __construct(string $path) {
    // Check if valid Linux folder path. Not needed in the task.
    if (preg_match('^/|//|(/[\w-]+)+$', $path)) {
      $this->path = $path;
    }
  }

  public function currentPath(): string {
    return $this->path;
  }

  public function setCurrentPath(string $newPath) {
    $this->path = $newPath;
  }

  public function cd(string $param) {
    $newParam = '';
    if (strpos($param, '../')) {
      self::$counter++;
      $newParam = substr($param, 3);
      $this->cd($newParam);
    }
    elseif (self::$counter) {
      // Remove $counter times of folders from back of the current path and glue new path part.
      $exploded_new_path = explode("/", $newParam);
      $exploded_current_path = explode('/', $this->currentPath());
      array_splice($exploded_current_path, count($exploded_current_path) - self::$counter, self::$counter);
      $this->setCurrentPath(implode('/', array_merge($exploded_current_path, $exploded_new_path)));
    }
    else {
      $this->setCurrentPath($param);
    }

  }

}
