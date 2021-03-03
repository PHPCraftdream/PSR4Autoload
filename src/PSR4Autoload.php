<?php
    namespace PHPCraftdream\PSR4Autoload;

    class PSR4Autoload
    {
        public $paths = [];

        public function makeDirPath($dir)
        {
            $ds = DIRECTORY_SEPARATOR;

            $dir = str_replace(['\\', '/'], $ds, $dir);
            $dir = realpath($dir);
            $dir = rtrim($dir, $ds) . $ds;

            return $dir;
        }

        public function setPaths(array $paths)
        {
            foreach ($paths as $namespace => $path)
                $this->paths[$namespace] = $this->makeDirPath($path);
        }

        public function register()
        {
            spl_autoload_register([$this, 'loadClass']);
        }

        public function loadClass($class)
        {
            foreach ($this->paths as $namespace => $path)
            {
                $found = $this->loadClassByNsAndPath($class, $namespace, $path);
                if (!$found) continue;

                return;
            }
        }

        public function loadClassByNsAndPath($class, $namespace, $path)
        {
            $ds = DIRECTORY_SEPARATOR;

            $len = strlen($namespace);

            if (substr($class, 0, $len) !== $namespace)
                return false;

            $className = substr($class, 1 + $len);
            $className = str_replace(['/', '\\'], $ds, $className);

            $path = $path . $className . '.php';

            if (!is_file($path))
                return false;

            require_once $path;

            return true;
        }
    }
