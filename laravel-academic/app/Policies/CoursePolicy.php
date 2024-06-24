<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Course $course)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }

        if ($user->hasRole('Academic Head') && $course->status == 'draft') {
            return true;
        }

        if ($user->hasRole('Academic Head') && $course->status == 'publish') {
            return Carbon::now()->diffInHours($course->updated_at) <= 6;
        }

        return false;
    }

    public function delete(User $user, Course $course)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }

        if ($user->hasRole('Academic Head') && $course->status == 'draft') {
            return true;
        }

        if ($user->hasRole('Academic Head') && $course->status == 'publish') {
            return Carbon::now()->diffInHours($course->updated_at) <= 6;
        }

        return false;
    }
}
