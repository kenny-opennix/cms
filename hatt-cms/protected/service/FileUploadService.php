<?php
/**
 * User: dimka3210
 * Date: 23.12.13
 * Time: 22:18
 */

class FileUploadService extends YiiBase
{

    /** @var FileUploadService $instance - Singleton */
    private static $instance = null;

    /**
     * @return FileUploadService
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Получить список загруженных файлов
     * @return array
     */
    public function getFileList()
    {
        return $_FILES;
    }

    /**
     * @param $filename - из массива $this->getFileList()
     * @return bool
     */
    public function saveFile($filename)
    {
        $fileList = $this->getFileList();
        if (!isset($fileList[$filename])) {
            return false;
        }

            $filePath = realpath('.') . Yii::app()->params->uploadPath['torrents'];
        $this->checkPath($filePath);
    }

    /**
     * Проверка каталога на валидность
     * @param $path
     * @throws Exception
     */
    private function checkPath($path)
    {
        if (!file_exists($path)) {
            throw new Exception('Каталог ' . $path . ' не существует!');
        }

        if (!is_writeable($path)) {
            throw new Exception('Каталог ' . $path . ' защищён от записи!');
        }
    }
}