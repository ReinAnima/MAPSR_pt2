<?php
spl_autoload_register(function (string $class){
  echo "Try load: {$class}<br>";

  $confing = require 'conf.php';
  foreach($confing as $namespace=>$value)
  {
    if(str_contains($class,$namespace))
    {
      $path=$confing[$namespace];

      $classPath=__DIR__ .DIRECTORY_SEPARATOR.$path;
      $classPath = str_replace($namespace,'', $classPath);
      $classPath = $classPath."{$class}.php";
      $classPath = str_replace('\\',DIRECTORY_SEPARATOR, $classPath);
      $classPath = preg_replace('/\s+/','', $classPath);
      
      if(is_readable($classPath)){
        echo "File was found: {$classPath} <br /> \n";
        require $classPath;
      }
      break;
    }
  }

});
