<?php

namespace App\Twig;

use App\Service\MediaService;
use Twig\Extension\AbstractExtension;

/**
 * Class MediaTwigExtension
 * @package App\Twig
 */
class MediaTwigExtension extends AbstractExtension
{
    private $media;

    /**
     * MediaTwigExtension constructor.
     * @param MediaService $media
     */
    public function __construct(MediaService $media)
    {
        $this->media = $media;
    }

    /**
     * {@inheritdoc}
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('getMediaUploadPath', [$this, 'getMediaUploadPath']),
        ];
    }

    /**
     * @param $fileName
     *
     * @return string
     */
    public function getMediaUploadPath($fileName)
    {

        return $this->media->generateFilenameUploadPath($fileName);
    }
}
