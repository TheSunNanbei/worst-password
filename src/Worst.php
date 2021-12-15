<?php
namespace NanBei\WorstPassword;

class Worst
{
    protected $loaderName;

    protected $loader;

    protected $dataPath;

    public function __construct($dataPath = [])
    {
        $this->loaderName = FileLoader::class;
        $this->dataPath = $dataPath;
    }

    public function check($password)
    {
        $loader = $this->getLoader();
        $loader->map(function($dictionary) use (&$password) {
            $password = in_array($password, $dictionary, false) ? false : $password;
        });
        return $password;
    }

    /**
     * @return string
     */
    public function getLoader()
    {
        if (is_null($this->loader)){
            $loaderName = $this->loaderName;
            $this->loader = new $loaderName($this->dataPath);
        }
        return $this->loader;
    }
}