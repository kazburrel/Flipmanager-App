<?php

namespace App\Enums;

enum RoleEnum: string
{
    case Admin = 'admin';
    case Editor = 'editor';
    case User = 'user';
}
