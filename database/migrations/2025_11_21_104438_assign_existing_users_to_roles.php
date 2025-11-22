<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Assign existing users to Spatie roles based on their current role column
        $users = User::all();

        foreach ($users as $user) {
            if ($user->role) {
                $role = Role::firstOrCreate(['name' => $user->role]);
                $user->assignRole($role);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove all role assignments
        $users = User::all();

        foreach ($users as $user) {
            $user->syncRoles([]);
        }
    }
};
