<?php
namespace Sunnanbei\WorstPassword;

use Closure;
class FileLoader
{
    protected $segmentName = 'worst_passwords_%s.php';

    protected $paths = [];

    public function __construct($paths = []){
        $this->paths = $paths;
        $this->paths[] = dirname(__DIR__) . '/data/'.sprintf($this->segmentName, 0);
    }

    public function map(Closure $callback)
    {
        foreach($this->paths as $path){
            if (file_exists($path)){
                $dictionary = (array) include $path;
                $callback($dictionary);
            }
        }
    }
}