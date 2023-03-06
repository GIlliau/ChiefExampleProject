<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAction extends SearchableModel
{
    protected array $searchableFields = [
        'user_id',
        'description',
    ];

    public const ACTION_MAKE_ORDER = 'make_order';
    public const ACTION_DOWNLOAD_FILE = 'download_file';
    public const ACTION_VISIT_PAGE = 'visit_page';

    public const ACTIONS = [
        self::ACTION_MAKE_ORDER,
        self::ACTION_DOWNLOAD_FILE,
        self::ACTION_VISIT_PAGE,
    ];

    protected $fillable = [
        'user_id',
        'action',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getActions()
    {
        return self::ACTIONS;
    }
}
