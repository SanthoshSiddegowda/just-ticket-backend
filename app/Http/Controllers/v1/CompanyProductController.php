<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\FetchResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyProductController extends Controller
{
    public function getDetailsByCompanyUuid(Request $request): FetchResource
    {
        $productDetails = Company::where([
            'uuid' => $request->uuid,
        ])
        ->first()
        ->products;

        return new FetchResource($productDetails);
    }
}
