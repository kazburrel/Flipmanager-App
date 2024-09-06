<?php

namespace App\Enums;

enum RoleEnum: string
{
    case Admin = 'admin';
    case Editor = 'editor';
    case User = 'user';

    // extra helper to allow for greater customization of displayed values, without disclosing the name/value data directly
    public function label(): string
    {
        return match ($this) {
            static::Admin => 'Admin',
            static::Editor => 'Editor',
            static::User => 'User',
        };
    }
}
