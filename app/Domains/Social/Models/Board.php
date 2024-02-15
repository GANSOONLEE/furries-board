<?php

namespace App\Domains\Social\Models;

use App\Domains\Social\Models\Traits\Scope\BoardScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Boards.
 * #TODO <complete the content of the this model>
 */
class Board extends Model
{

    use BoardScope;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'boards';

    /**
     * The primary key in this model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillabel = [
        'author_id',
        'title',
        'content'
    ];
}