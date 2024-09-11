<?php

namespace App\Models;

use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    // Define inverse relationship: A media item belongs to a folder
    public function folder()
    {
        return $this->belongsTo(Folder::class, 'collection_name');
    }
}
