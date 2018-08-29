<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $pic
 * @property string $body
 * @property integer $user_id
 */
class Article extends Model
{
    protected $guarded = [];
}
