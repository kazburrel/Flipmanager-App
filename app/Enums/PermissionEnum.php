<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case ManageCategories = 'manage categories';
    case ManageUsers = 'manage users';
    case ManagePermissions = 'manage permissions';
    case ManageFiles = 'manage files';
    case ViewFiles = 'view files';
    case UploadFiles = 'upload files';
    case EditFiles = 'edit files';
    case DeleteFiles = 'delete files';
}
