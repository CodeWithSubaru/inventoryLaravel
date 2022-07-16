<?php

namespace App\Http\Controllers\Pos;

use Image;
use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('admin.customer.all-customer', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.add-customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');

        if ($image) {
            $generateNameImage = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $destination = 'uploads/customer_img/' . $generateNameImage;

            Image::make($image)->resize(200, 200)->save($destination);

            Customer::insert([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'image' => $destination,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
        } else {
            Customer::insert([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
        }

        session()->flash('message', 'Customer Created Successfully');
        return redirect('admin/customer/all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.edit-customer', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $id = $request->id;
        $image = $request->file('image');

        if ($image) {
            $generateNameImage = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $destination = 'uploads/customer_img/' . $generateNameImage;

            Image::make($image)->resize(200, 200)->save($destination);

            Customer::findOrFail($id)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'image' => $destination,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);
        } else {
            Customer::findOrFail($id)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);
        }

        session()->flash('message', 'Customer Updated Successfully');
        return redirect('admin/customer/all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();

        session()->flash('message', 'Customer Deleted Successfully');
        return redirect()->back();
    }
}
