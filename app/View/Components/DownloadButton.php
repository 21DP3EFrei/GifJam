<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DownloadButton extends Component
{
    public $media;

    public function __construct($media)
    {
        $this->media = $media;
    }

    public function render()
    {
        return view('components.download-button');
    }
}
