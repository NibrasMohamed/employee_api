<?php

namespace App\Repositories;

use Config;
use DB;
use App\Models\Company;

class CompanyRepository{
    public function saveCompany($data){
        try {
            $company = Company::create([
                'name' => $data['name']
            ]);
    
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getCompanies(){
        try {
            return Company::get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getCompanyById($id){
        try {
            return Company::find($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateCompanyById($data,$id){
        try {
            $company = Company::find($id);
            if(!$company){
                return false;
            }
            $company->name = $data['name'];
            $company->save();
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteCompanyById($id){
        try {
            return Company::where('id', $id)->delete();;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    
}
