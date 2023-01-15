<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseApiController;
use App\Repositories\CompanyRepository;
use App\Http\Validators\CompanyValidator;

class CompanyController extends BaseApiController
{
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepository){
        $this->companyRepository = $companyRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveCompany(Request $request){
        try {
            $validateRequest = CompanyValidator::saveCompany($request->all());

            if($validateRequest->fails()){
                return $this->returnValidatorMessage($validateRequest);
            }

            $this->companyRepository->saveCompany($request->toArray());
            return response()->json([
                'error' => false,
                'message' => 'Company successfully created.',
            ], 201);
        } catch (\Throwable $th) {
            return $this->returnErrorMessage($th);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCompanies(Request $request){
        try {
            $data = $this->companyRepository->getCompanies();
            return response()->json([
                'error' => false,
                'message' => $data,
            ], 201);
        } catch (\Throwable $th) {
            return $this->returnErrorMessage($th);
        }
    }

    /**
     * @param @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCompanyById($id){
        try {
            $data = $this->companyRepository->getCompanyById($id);
            return response()->json([
                'error' => false,
                'data' => $data,
            ], 201);
        } catch (\Throwable $th) {
            return $this->returnErrorMessage($th);
        }
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCompanyById(Request $request, $id){

        try {
            $validateRequest = CompanyValidator::saveCompany($request->all());
            if($validateRequest->fails()){
                return $this->returnValidatorMessage($validateRequest);
            }
            $response = $this->companyRepository->updateCompanyById($request->toArray(), $id);
            return response()->json([
                'error' => !$response,
                'message' => !$response ? 'Company Not Found' : 'Company successfully updated.',
            ], !$response ? 400 : 201);
        } catch (\Throwable $th) {
            return $this->returnErrorMessage($th);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCompanyById($id){

        try {
            $this->companyRepository->deleteCompanyById($id);
            return response()->json([
                'error' => false,
                'message' => 'Company successfully deleted.',
            ], 201);
        } catch (\Throwable $th) {
            return $this->returnErrorMessage($th);
        }
    }
}
