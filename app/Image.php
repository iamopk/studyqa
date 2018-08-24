<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $url
 */
class Image extends Model
{
    protected $guarded = [];
}
