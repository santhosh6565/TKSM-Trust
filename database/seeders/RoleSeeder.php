<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Permissions structure based on requirements
        
        // Viewer role with limited permissions
        Role::create([
            'permission_array' => json_encode([
                'view_dashboard',
                'Gallery_view'
            ]),
        ]);

        // Editor role with permissions for CRUD and gallery management
        Role::create([
            'permission_array' => json_encode([
                'view_dashboard',
                'CRUD',
                'catergories_CRUD',
                'Gallery_view',
                'Gallery_CRUD',
                'Anoucement'
            ]),
        ]);

        // Manager role with permissions for managing enrollments and reports
        Role::create([
            'permission_array' => json_encode([
                'view_dashboard',
                'CRUD',
                'Enroll_Amount',
                'Enroll_Amount_CRUD',
                'Monthly_Report',
                'Gallery_view'
            ]),
        ]);

        // Full Access role with all permissions
        Role::create([
            'permission_array' => json_encode([
                "manage_roles",
                "manage_user",
                "catergories",
                "catergories_crud",
                "enroll_amount",
                "enroll_amount_crud",
                "monthly_report",
                "events",
                "events_crud",
                "developer_control",
                "Anoucement"
            ]),
        ]);
    }
}