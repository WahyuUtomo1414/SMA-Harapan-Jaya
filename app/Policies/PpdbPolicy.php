<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Ppdb;
use Illuminate\Auth\Access\HandlesAuthorization;

class PpdbPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Ppdb');
    }

    public function view(AuthUser $authUser, Ppdb $ppdb): bool
    {
        return $authUser->can('View:Ppdb');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Ppdb');
    }

    public function update(AuthUser $authUser, Ppdb $ppdb): bool
    {
        return $authUser->can('Update:Ppdb');
    }

    public function delete(AuthUser $authUser, Ppdb $ppdb): bool
    {
        return $authUser->can('Delete:Ppdb');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Ppdb');
    }

    public function restore(AuthUser $authUser, Ppdb $ppdb): bool
    {
        return $authUser->can('Restore:Ppdb');
    }

    public function forceDelete(AuthUser $authUser, Ppdb $ppdb): bool
    {
        return $authUser->can('ForceDelete:Ppdb');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Ppdb');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Ppdb');
    }

    public function replicate(AuthUser $authUser, Ppdb $ppdb): bool
    {
        return $authUser->can('Replicate:Ppdb');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Ppdb');
    }

}