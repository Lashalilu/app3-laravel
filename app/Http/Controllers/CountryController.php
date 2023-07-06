<?php

namespace App\Http\Controllers;

use App\Http\Requests\Country\CountryStoreRequest;
use App\Http\Resources\Country\CountryIndexResource;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        return CountryIndexResource::collection(Country::all());
    }

    public function store(CountryStoreRequest $countryStoreRequest)
    {
        $data = $countryStoreRequest->validated();

        Country::create($data);

        return response()->json(["success" => true]);
    }
}
