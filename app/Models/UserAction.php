<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAction extends Model
{
    public const ACTION_MAKE_ORDER = 'make_order';
    public const ACTION_DOWNLOAD_FILE = 'download_file';
    public const ACTION_VISIT_PAGE = 'visit_page';

    protected $fillable = [
        'user_id',
        'action',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
