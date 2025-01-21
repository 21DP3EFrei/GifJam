<?php

namespace App\Enum;

enum UploadType: string
{
    case Media = 'medija';
    case Sound = 'skana';
    case Music = 'muzika';
}
