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
    if (strpos($param, '../')) {
      self::$counter++;
      $newParam = substr($param, 3);
      $this->cd($newParam);
    }
    elseif (self::$counter) {
      // @todo Remove $counter times of folder from back and glue new path.
    }
    else {
      $this->setCurrentPath($param);
    }

  }

}