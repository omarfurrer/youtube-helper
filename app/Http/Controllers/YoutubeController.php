<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Youtube\GetLinkInfoRequest;
use App\Services\YoutubeService;

class YoutubeController extends Controller {

    /**
     * @var YoutubeService 
     */
    protected $youtubeService;

    /**
     * YoutubeController Constructor.
     * 
     * @param YoutubeService $youtubeService
     */
    public function __construct(YoutubeService $youtubeService)
    {
        $this->youtubeService = $youtubeService;
    }

    /**
     * Using a YT url get video or playlist info.
     * 
     * @param GetLinkInfoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function getLinkInfo(GetLinkInfoRequest $request)
    {
        $url = $request->get('url');
        $info = $this->youtubeService->getInfo($url);
        
        return view('youtube.linkInfo', compact('info'));
    }

}
