<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $pic
 * @property string $body
 */
class Article extends Model
{
    protected $guarded = [];
}
