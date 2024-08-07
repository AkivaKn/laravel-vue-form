<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return ['customers' => $customers];
    }

    public function store(Request $request)
    {
        $validatedCustomer = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:320',
            'phone_number' => 'required|max:14',
            'address' => 'required',
        ]);
        $customer = Customer::create($validatedCustomer);
        return [ 'customer' => $customer ];
        
    }

    public function show(Customer $customer)
    {
        return ['customer' => $customer];
    }

    public function update(Request $request, Customer $customer)
    {
        $validatedCustomer = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:320',
            'phone_number' => 'required|max:14',
            'address' => 'required',
        ]);

        $customer->update($validatedCustomer);
        return ['customer'=> $customer ];
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return ['message'=> 'Successfully deleted customer.' ];
    }
}
