<?php
namespace Database\Seeders;
use App\Permission;
use App\Role;
// use App\User;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class Tableseeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		$users = ([
			'name' => 'super admin',
			'email' => 'master@admin.com',
			'password' => bcrypt('password'),
			'remember_token' => str_random(60),
			'role_id' => 1,
			'select_all'=>1
		]);
		$user = User::create($users);

		$role1 = Role::create(['name' => 'Admin', 'guard_name' => 'web']);
		$role2 = Role::create(['name' => 'Standard User', 'guard_name' => 'web']);

		// Assign role to user
		$user->assignRole($role1);

		$permission_array = [
			'View Users',
			'Create Users',
			'Edit Users',
			'Delete Users',
			'View Roles',
			'Create Roles',
			'Edit Roles',
			'Delete Roles',
			'View Permissions',
			'Create Permissions',
			'Edit Permissions',
			'Delete Permissions',
			'View Hospitals',
			'Create Hospitals',
			'Edit Hospitals',
			'Delete Hospitals',
			'View Equipments',
			'Create Equipments',
			'Edit Equipments',
			'Delete Equipments',
			'View Breakdown Maintenance',
			'Create Breakdown Maintenance',
			'Edit Breakdown Maintenance',
			'Delete Breakdown Maintenance',
			'Create Preventive Maintenance',
			'View Preventive Maintenance',
			'Edit Preventive Maintenance',
			'Delete Preventive Maintenance',
			'View Calibrations',
			'Create Calibrations',
			'Edit Calibrations',
			'Delete Calibrations',
			'View Time Indicator Report',
			'View Maintenance Cost',
			'Create Maintenance Cost',
			'Edit Maintenance Cost',
			'Delete Maintenance Cost',
			'View Departments',
			'Create Departments',
			'Edit Departments',
			'Delete Departments',
			'View Governorates',
			'Create Governorates',
			'Edit Governorates',
			'Delete Governorates',
			'View Directorates',
			'Create Directorates',
			'Edit Directorates',
			'Delete Directorates',

			'View QR Generate',
			'View QR Scan',
			'Create QR',
			'View Equipments Report',
			'View Calibration Stickers',
			'View type_of_healthfacility',
			'Create type_of_healthfacility',
			'Edit type_of_healthfacility',
			'Delete type_of_healthfacility',
			'View Evaluation_scans',
			'Create Evaluation_scans',
			'Edit Evaluation_scans',
			'Delete Evaluation_scans',
			'View ٍSpareparts',
			'Create ٍSpareparts',
			'Edit ٍSpareparts',
			'Delete ٍSpareparts',
			'View Test_and_calibrations',
			'Create Test_and_calibrations',
			'Edit Test_and_calibrations',
			'Delete Test_and_calibrations',
			'View Accessories',
			'Create Accessories',
			'Edit Accessories',
			'Delete Accessories',
			'View Equipments_name',
			'Create Equipments_name',
			'Edit Equipments_name',
			'Delete Equipments_name',
			'View EquipmentNames',
			'Create EquipmentNames',
			'Edit EquipmentNames',
			'Delete EquipmentNames',
			'View Suppliers',
			'Create Suppliers',
			'Edit Suppliers',
			'Delete Suppliers',
			'View Pieces',
			'Create Pieces',
			'Edit Pieces',
			'Delete Pieces',







		];
		foreach ($permission_array as $array) {
			$id = Permission::create([
				'name' => $array,
				'guard_name' => 'web',
			]);
		}

		// give permissions to Admin
		$role1->givePermissionTo(Permission::all());
		$user->givePermissionTo(Permission::all());

		// give permission to Standard User
		$role2->givePermissionTo(Permission::where('name', 'not like', '%User%')->get());

	}

}
