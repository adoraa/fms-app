<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\Facility;
use App\Models\Role;
use App\Models\Room;
use App\Models\User;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('approve_room_complaints', function(User $user){
            return Room::where('user_id', $user->id)->count();
        });

        Gate::define('approve_facility_complaints', function(User $user){
            return Facility::where('user_id', $user->id)->count(); 
        });

        Gate::define('assign_techincician', function(User $user){
            if ($user->role_id == Role::IS_CIVIL || $user->role_id == Role::IS_ELECTRICAL || 
            $user->role_id == Role::IS_MECHANICAL || $user->role_id == Role::IS_WATER_AND_SEWAGE 
            || $user->role_id == Role::IS_WOOD_WORKS )
                return true;
        });

        Gate::define('unit_complaints', function(User $user){
            if ($user->role_id == Role::IS_CIVIL || $user->role_id == Role::IS_ELECTRICAL || 
            $user->role_id == Role::IS_MECHANICAL || $user->role_id == Role::IS_WATER_AND_SEWAGE 
            || $user->role_id == Role::IS_WOOD_WORKS || $user->role_id == Role::IS_ESTATE_MANAGER){
            
                return true;
            }
        });

        Gate::define('assigned_complaints', function(User $user){
            if ($user->role_id == Role::IS_ESTATE_MANAGER)
                return true;
        });

        Gate::define('assign_to_unit', function(User $user){
            if ($user->role_id == Role::IS_ESTATE_MANAGER)
                return true;
        });
        
        Gate::define('dashboard', function(User $user){
            if ($user->role_id == Role::IS_ESTATE_MANAGER || $user->role_id == Role::IS_FACILITY_MANAGER)
                return true;
        });

        Gate::define('staff_student', function(User $user){
            if ($user->role_id == Role::IS_STAFF || $user->role_id == Role::IS_STUDENT )
                return true;
        });
    }
}
