<?php

namespace App\Enum;

enum FileType: string
{
    case Png = '.png';
    case Jpg = '.jpg';
    case Gif  = '.gif';
    case Jpeg  = '.jpeg';
    case Mp3 = '.mp3';
    case Flac = '.FLAC';
    case Wav = '.WAV';
}
