<?php

namespace App\Services;

use Masih\YoutubeDownloader\YoutubeDownloader;
use Exception;

class YoutubeService {

    /**
     * @var YoutubeDownloader 
     */
    protected $youtubeDownloader;

    /**
     * @var String 
     */
    protected $url;

    /**
     * Youtube Service Constructor.
     */
    public function __construct()
    {
        
    }

    /**
     * Using a YT url, get info for either video or playlist.
     * 
     * @param type $url
     * @return Object
     */
    public function getInfo($url, $withDownloadLinks = false)
    {
        $this->setUrl($url);
        $this->init();
        return $this->youtubeDownloader->getInfo($withDownloadLinks);
    }

    /**
     * Using a YT video/playlist url, download video or playlist.
     * 
     * @param type $url
     * @return Object
     */
    public function download($url)
    {
        $this->setUrl($url);
        $this->init();
        return $this->youtubeDownloader->download();
    }

    /**
     * Check if url property is not empty.
     * 
     * @return boolean
     * @throws Exception
     */
    public function checkUrl()
    {
        if (empty($this->url)) {
            throw new Exception("Url cannot be empty");
        }
        return true;
    }

    /**
     * Getter for url property.
     * 
     * @return String
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set YT url into service.
     * 
     * @param String $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Init function.
     */
    public function init()
    {
        $this->checkUrl();
        $this->youtubeDownloader = new YoutubeDownloader($this->url);
        $this->sanitizeFileName();
    }

    /**
     * Sanitize file names for downloading.
     */
    public function sanitizeFileName()
    {
        $this->youtubeDownloader->sanitizeFileName = function ($fileName) {
            // Remove anything which isn't a word, whitespace, number
            // or any of the following caracters -_~,;[]().
            // If you don't need to handle multi-byte characters
            // you can use preg_replace rather than mb_ereg_replace
            // Thanks @Łukasz Rysiak!
            $fileName = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $fileName);
            // Remove any runs of periods (thanks falstro!)
            $fileName = mb_ereg_replace("([\.]{2,})", '', $fileName);
            return $fileName;
        };
    }

}
