<?php

use App\Models\User;

if (!function_exists('authenticated')) {
    function authenticated($relations = []): User | null
    {
        return User::with($relations)->find(auth()->id());
    }
}
