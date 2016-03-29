<?php
namespace app\DataLoader;

/**
 * Class DataLoader
 * @package app\DataLoader
 */
class DataLoader
{
    /**
     * for remote host or null
     * @var
     */
    public $source;
    /**
     * file name
     * @var
     */
    public $file;

    /**
     * @param $source
     * @param $file
     */
    function __construct($source, $file)
    {
        $this->source = $source;
        $this->file = $file;
    }

    /**
     * load data from remote or local storage
     * @return mixed
     */
    public function loadData()
    {
        if (empty($source)) {
            $full_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $this->file;
        } else {
            $full_path = $this->source . '/' . $this->file;
        }
        $data = file_get_contents($full_path);
        return json_decode($data);
    }

    /**
     *
     */
    static function getVersion()
    {
        echo '0.1';
    }
}