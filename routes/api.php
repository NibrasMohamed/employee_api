<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CompanyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/company', [CompanyController::class, 'saveCompany']);
Route::get('/companies', [CompanyController::class, 'getCompanies']);
Route::get('/company/{id}', [CompanyController::class, 'getCompanyById']);
Route::put('/company/{id}', [CompanyController::class, 'updateCompanyById']);
Route::delete('/company/{id}', [CompanyController::class, 'deleteCompanyById']);
