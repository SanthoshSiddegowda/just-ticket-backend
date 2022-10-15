<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Company\GetCompanyRequest;
use App\Http\Resources\FetchResource;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index(GetCompanyRequest $request): FetchResource
    {
        $company = Company::with('categories')->where([
            'domain' => $request->domain,
        ])
        ->first();

        return new FetchResource($company);
    }
}
