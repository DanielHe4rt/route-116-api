<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customers\HandleCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CustomersController extends Controller
{
    public function getCustomers(): JsonResponse
    {
        return response()->json(Customer::paginate());
    }

    public function postCustomer(HandleCustomerRequest $request): JsonResponse
    {
        return response()->json(Customer::create($request->validated()), Response::HTTP_CREATED);
    }

    public function putCustomer(HandleCustomerRequest $request, Customer $customer): JsonResponse
    {
        $customer->update($request->validated());
        return response()->json($customer->refresh());
    }

    public function deleteCustomer(Customer $customer): \Illuminate\Http\Response
    {
        $customer->delete();
        return response()->noContent();
    }
}
