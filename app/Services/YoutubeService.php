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
    public function getInfo($url)
    {
        $this->setUrl($url);
        $this->checkUrl();
        return $this->youtubeDownloader->getInfo();
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
        $this->youtubeDownloader = new YoutubeDownloader($this->url);
    }

}
