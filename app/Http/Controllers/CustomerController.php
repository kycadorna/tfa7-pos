<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:customers,email'],
        ]);

        Customer::create($validated);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                Rule::unique('customers', 'email')->ignore($customer->id),
            ],
        ]);

        $customer->update($validated);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }
}