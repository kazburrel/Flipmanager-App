<?php

namespace App\Enums;

enum PermissionEnum: string
{
        // case NAMEINAPP = 'name-in-database';

    case ManageCategories = 'manage categories';
    case ManageUsers = 'manage users';
    case ManagePermissions = 'manage permissions';
    case ManageFiles = 'manage files';
    case ViewFiles = 'view files';
    case UploadFiles = 'upload files';
    case EditFiles = 'edit files';
    case DeleteFiles = 'delete files';

    // extra helper to allow for greater customization of displayed values, without disclosing the name/value data directly
    public function label(): string
    {
        return match ($this) {
            static::ManageCategories => 'Manage Categories',
            static::ManageUsers => 'Manage Users',
            static::ManagePermissions => 'Manage Permissions',
            static::ManageFiles => 'Manage Files',
            static::ViewFiles => 'View Files',
            static::UploadFiles => 'Upload Files',
            static::EditFiles => 'Edit Files',
            static::DeleteFiles => 'Delete Files',
        };
    }
}
