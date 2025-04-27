<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserCompany;
use App\Models\UserRole;
use Arr;
use Illuminate\Database\Seeder;
use App\Models\Users;
use App\Models\Companies;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UsersSeeder::class,
            CompaniesSeeder::class,
            RoleSeeder::class,
            ProjectsSeeder::class
        ]);

        $users = Users::all();
        $companies = Companies::all();


        foreach ($users as $key) {

            $randomRole = rand(2,3);
            $userRole = new UserRole();
            $userRole->user_id = $key->id;

            if($key->id == 1){
                $userRole->role_id = 1;
            } else{
                $userRole->role_id = $randomRole;
            }
            $userRole->timestamps = false;
            $userRole->save();

            $userCompany = new UserCompany();
            $userCompany->user_id = $key->id;

            foreach ($companies as $company) {
                if (rand(0, 100) > 90) {
                    $userCompany->company_id = $company->id;


                }

            }
            $userCompany->company_admin = 0;
            $userCompany->timestamps = false;
            $userCompany->save();
        }

    }
}
