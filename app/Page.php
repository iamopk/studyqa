<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $text
 */
class Page extends Model
{
    protected $guarded = [];
}
