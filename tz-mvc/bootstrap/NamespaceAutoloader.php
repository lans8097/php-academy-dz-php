<?php
class NamespaceAutoloader
{

    // карта для соответствия неймспейса пути в файловой системе
    protected $namespacesMap = [
        'App'            =>ROOT.'App',
        'App\Models'     =>ROOT.'App'.DS.'Models',
        'App\Controllers'=>ROOT.'App'.DS.'Controllers',
        'App\Views'      =>ROOT.'App'.DS.'Views',
        'Libs'           =>ROOT.'Libs',
    ];

    public function addNamespace($namespace, $rootDir)
    {
        if (is_dir($rootDir)) {
            $this->namespacesMap[$namespace] = $rootDir;
            return true;
        }

        return false;
    }

    public function register()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    private function autoload($class)
    {

        $pathParts = explode('\\', $class);

        if (is_array($pathParts)) {
            $namespace = array_shift($pathParts);
            if (!empty($this->namespacesMap[$namespace])) {
                $filePath = $this->namespacesMap[$namespace].DS.implode(DS, $pathParts).'.php';
                require_once $filePath;
                return true;
            }
        }

        return false;
    }

}