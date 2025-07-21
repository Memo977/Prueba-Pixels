<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Model::preventLazyLoading();

        // Gate comentado - se usa Policy en su lugar
        // Gate::define('edit-job', function (User $user, Job $job) {
        //     return $job->employer->user->is($user);
        // });
    }
}