<?php

namespace App\DataFixtures\ORM\Traits;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Trait WithFileManagementTrait
 */
trait WithFileManagementTrait
{
    use WithContainerTrait;

    /**
     * @param int $from
     * @param int $to
     *
     * @return UploadedFile
     */
    protected function randomImage(string $type, $ext = '.jpeg', int $from = 1, int $to = 20)
    {
        $i = rand($from, $to);

        $originalFileName = $i. '-' . $type . $ext;
        $temporaryFileName = 'copy-' . $originalFileName;

        $originalFilePath = $this->filePath($originalFileName);
        $temporaryFilePath = $this->filePath($temporaryFileName);

        copy($originalFilePath, $temporaryFilePath);

        $file = new UploadedFile($temporaryFilePath, $temporaryFileName, 'image/' . $ext, null, null, true);

        return $file;
    }

    /**
     * @param $fileName
     *
     * @return string
     */
    protected function filePath($fileName)
    {
        return $this->fixturesPath().$fileName;
    }

    /**
     * @return string
     */
    protected function fixturesPath()
    {
        return __DIR__.'/../../Data/';
    }
}