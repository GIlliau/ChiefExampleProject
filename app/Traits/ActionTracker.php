<?php

namespace App\Traits;

use App\Models\User;

trait ActionTracker
{
    public function recordAction(int $userId, string $action, ?string $description = null)
    {
        User::find($userId)->action()->create([
            'action' => $action,
            'description' => $description
        ]);
    }
}
