<?php

function checkPermission($user_permissions, $permission)
{
    if($user_permissions == null) {
        return true;
    }

    return in_array($permission, $user_permissions);
}

function checkPermissionOr($user_permissions, $permissions)
{
    if($user_permissions == null) {
        return true;
    }

    foreach($permissions as $permission) {
        if(in_array($permission, $user_permissions)) {
            return true;
        }
    }

    return false;
}

function checkPermissionAnd($user_permissions, $permissions)
{
    if($user_permissions == null) {
        return true;
    }

    foreach($permissions as $permission) {
        if(!in_array($permission, $user_permissions)) {
            return false;
        }
    }

    return true;
}

function getFormRequestComplainPermissionSmallestLevel($user_permissions)
{
    if(checkPermissionOr($user_permissions, ['complain-create', 'complain-manager', 'complain-reject'])) {
        return 'creator';
    } else if(checkPermissionOr($user_permissions, ['complain-lawyer', 'complain-solve'])) {
        return 'manager';
    } else if(checkPermissionOr($user_permissions, ['complain-lawyer-accept', 'complain-lawyer-reject', 'complain-invitation1', 'complain-invitation2', 'complain-invitation3'])){
        return 'lawyer';
    }
}
