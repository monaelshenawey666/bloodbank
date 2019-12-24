<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use  App\Models\DonationRequest;
use App\Models\City;
use App\Models\BloodType;


class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $records = DonationRequest::paginate(5);

        return view('admin.donations.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.donations.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'patient_name' => 'required',
            'patient_phone' => 'required',
            'patient_age' => 'required',

            'hospital_name' => 'required',
            'bages_num' => 'required',
        ]);

        $records = DonationRequest::create($request->all());


        flash()->success("added successfully");
        //return redirect('admin/donation');
        return redirect(route('donation.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $records = DonationRequest::findOrFail($id);
        return view('admin.donations.edit', compact('records'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $records = DonationRequest::findOrFail($id);
        $records->update($request->all());
        flash()->success('Edited Successfully');
        return redirect(route('donation.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $records = DonationRequest::findOrFail($id);
        $records->delete();
        flash()->success('Deleted Successfully');
        return redirect(route('donation.index'));
    }
}
