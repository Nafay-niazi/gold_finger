<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\customerMeasurement;

use Illuminate\Http\Request;
use Validator;
use DataTables;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone_no' => 'required|unique:users,phone_no',
            'status' => 'required',
            'address' => 'required',
            // 'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ];
        if ($request->measurement) {

            $measures = [
                'dress_length' => 'required',
                'dress_teera' => 'required',
                'dress_teera_style' => 'required',
                'dress_bazoo' => 'required',
                'dress_galla' => 'required',
                'dress_galla_style' => 'required',
                'dress_kandha' => 'required',
                'dress_kohni' => 'required',
                'dress_chaati' => 'required',
                'dress_darmean' => 'required',
                'dress_kamar' => 'required',
                'dress_hip' => 'required',
                'dress_shalwar_trouser' => 'required',
                'dress_pancha' => 'required',
                'dress_shalwar_ghaira' => 'required',
                'dress_thai' => 'required',
                'dress_godda' => 'required',
            ];

            $rules = array_merge($rules, $measures);
        }
        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json([
                "message" => $validate->errors()->first(),
                "error" => true
            ]);
        }

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            // dd(asset('assets/images'));
            $request->image->move(public_path('assets/images'), $imageName);
        } else {
            $imageName = $request->image;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'status' => $request->status,
            'address' => $request->address,
            'role' => $request->role,
            'cnic_no' => $request->cnic_no,
            'image' => $imageName

        ]);

        if ($request->measurement) {
            $measureQuery = customerMeasurement::create([
                'dress_length' => $request->dress_length,
                'dress_teera' => $request->dress_teera,
                'dress_teera_style' => $request->dress_teera_style,
                'dress_bazoo' => $request->dress_bazoo,
                'dress_galla' => $request->dress_galla,
                'dress_galla_style' => $request->dress_galla_style,
                'dress_kandha' => $request->dress_kandha,
                'dress_kohni' => $request->dress_kohni,
                'dress_chaati' => $request->dress_chaati,
                'dress_darmean' => $request->dress_darmean,
                'dress_kamar' => $request->dress_kamar,
                'dress_hip' => $request->dress_hip,
                'dress_shalwar_trouser' => $request->dress_shalwar_trouser,
                'dress_pancha' => $request->dress_pancha,
                'dress_shalwar_ghaira' => $request->dress_shalwar_ghaira,
                'dress_thai' => $request->dress_thai,
                'dress_godda' => $request->dress_godda,
                'customer_id' => $user->id,
            ]);
        }

        if ($user || $measureQuery) {
            return response()->json(["message" => "Added Successfully!", "error" => false]);
        } else {
            return response()->json(["message" => "data not inserted!", "error" => true]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $data = User::select("id", "name", "email", "phone_no", "address", "status", "role")->where("role", $request->role)->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn = "<a data-id=" . $row['id'] . " class='edit_" . $row['role'] . " btn btn-info mr-2 btn-sm'><i class='fas fa-edit'></i></a> <a  data-id=" . $row['id'] . " class='delete_" . $row['role'] . " btn btn-danger btn-sm'><i class='fa fa-trash' aria-hidden='true'></i></a>";
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $fetchUserData = User::find($request->id);

        if ($fetchUserData) {
            $editHtml = '';
            $editHtml .= '<form class="update_user_form" enctype="multipart/form-data">
            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                <div class="mb-3 space-y-2 w-full text-xs">
                    <label class="font-semibold text-gray-600 py-2">Your Name <abbr
                            title="required">*</abbr></label>
                    <input value="' . $fetchUserData->name . '"
                        class="appearance-none focus:ring-gold-400 block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                         type="text" name="name"
                        >
                </div>
                <div class="mb-3 space-y-2 w-full text-xs">
                    <label class="font-semibold text-gray-600 py-2">Your Email <abbr
                            title="required">*</abbr></label>
                    <input value="' . $fetchUserData->email . '"
                        class="appearance-none focus:ring-gold-400 block w-full bg-gray-light border border-grey-lighter rounded-lg h-10 px-4"
                         type="text" disabled
                        >
                </div>
            </div>

            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
            <div class="mb-3 space-y-2 w-full text-xs">
                                <label class="font-semibold text-gray-600 py-2 mb-0">Your CNIC <abbr
                                        title="required" class="text-red-500">*</abbr></label>
                                <input value="' . $fetchUserData->cnic_no . '"
                                    class="appearance-none focus:ring-gold-400 block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 cnic_no"
                                     type="text" name="cnic_no"
                                    >
                            </div>
                <div class="w-full flex flex-col mb-3">
                    <label class="font-semibold text-gray-600 py-2">Cell No</label>
                    <input value="' . $fetchUserData->phone_no . '"
                        class=" phone_no appearance-none focus:ring-gold-400 block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                        type="text" name="phone_no" >
                </div>

            </div>
            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                            <div class="mb-3 space-y-2 w-full text-xs">
                            <div class="flex items-center mb-3">
                            <img class="w-6 rounded z-10 img-fluid border " src="' . asset('assets/images') . '/' . ($fetchUserData->image != null ? $fetchUserData->image : '/avatar.png') . '">
                            <label class="pl-2 mb-0"> Profile photo <small>(Optional)</small> </label>
                            </div>

                                <div class="input-group mb-3">
                                <div class="custom-file">

                                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile02">
                                    <label class="custom-file-label" for="inputGroupFile02">' . ($fetchUserData->image != null ? $fetchUserData->image : "Choose file...") . '</label>
                                </div>

                                </div>

                            </div>
                            <div class="w-full flex flex-col mb-3">
                            <label class="font-semibold text-gray-600 py-2">Status<abbr
                                    title="required">*</abbr></label>
                            <select
                                class="block w-full bg-grey-lighter focus:ring-gold-400 text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full "

                                 name="status" id="user_status" style="width:100%">
                                <option disabled>Select Status</option>
                                <option ' . ($fetchUserData->status == "active" ? "selected" : "") . ' value="active">Active</option>
                                <option ' . ($fetchUserData->status == "inactive" ? "selected" : "") . ' value="inactive">Inactive</option>
                                <option ' . ($fetchUserData->status == "banned" ? "selected" : "") . ' value="banned">Banned</option>
                            </select>
                        </div>
                        </div>
            <div class="flex-auto w-full mb-1 text-xs">
                <label class="font-semibold text-gray-600 py-2">Address</label>
                <textarea id=""
                    class=" focus:ring-gold-400 min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4"
                    placeholder="Enter your complete Address" name="address">' . $fetchUserData->address . '</textarea>
            </div>';
            $customerMeasuersData = customerMeasurement::Where('customer_id', $request->id)->first();
            if ($customerMeasuersData) {

                $editHtml .= ' <div class="measurementBlock text-xs">
            <details>
  <summary class="text-md font-bold py-2 px-2 text-white bg-gold-500 my-4">Clict to see Measurements</summary>

            <div class="grid md:grid-cols-2 sm:grid-cols-2 grid-cols gap-x-6 w-full text-xs">
                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 pr-2">Length:</label>
                    <input value="' . $customerMeasuersData->dress_length . '" class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_length">

                </div>
                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Teera:</label>
                    <input value="' . $customerMeasuersData->dress_teera . '" class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_teera">
                </div>
                <div class="mb-3 space-y-2 w-full space-x-4 flex items-center">
                        <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Teera Style:</label>
                        <select class="block w-3/4 bg-grey-lighter focus:ring-gold-400 text-grey-darker placeholder-gray-400 text-xs  border border-grey-lighter rounded-lg h-10 px-2 required" name="dress_teera_style" style="width:100%">
                            <option value="">Select Teera Style</option>
                            <option ' . ($customerMeasuersData->dress_teera_style == "normal" ? "selected" : "") . ' value="normal">Normal</option>
                            <option ' . ($customerMeasuersData->dress_teera_style == "seeda" ? "selected" : "") . ' value="seeda">Seedha</option>
                            <option ' . ($customerMeasuersData->dress_teera_style == "full down" ? "selected" : "") . ' value="full down">Full downm</option>
                            <option ' . ($customerMeasuersData->dress_teera_style == "halka down" ? "selected" : "") . ' value="halka down">Halka down</option>
                        </select>
                </div>
                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Bazoo:</label>
                    <input value="' . $customerMeasuersData->dress_bazoo . '" class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_bazoo">
                </div>

                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Galla:</label>
                    <input value="' . $customerMeasuersData->dress_galla . '" class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_galla">
                </div>
                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Galla Style:</label>
                    <select class="block w-3/4 bg-grey-lighter focus:ring-gold-400 text-grey-darker placeholder-gray-400 text-xs  border border-grey-lighter rounded-lg h-10 px-2 required" name="dress_galla_style" style="width:100%">
                        <option value="">Select Galla Style</option>
                        <option ' . ($customerMeasuersData->dress_galla_style == "normal" ? "selected" : "") . ' value="normal">Normal</option>
                        <option ' . ($customerMeasuersData->dress_galla_style == "halka down" ? "selected" : "") . ' value="halka down">Halka down</option>
                    </select>
                </div>

                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">kandha:</label>
                    <input value="' . $customerMeasuersData->dress_kandha . '" class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_kandha">
                </div>
                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">kohni:</label>
                    <input value="' . $customerMeasuersData->dress_kohni . '" class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_kohni">
                </div>
                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">chaati:</label>
                    <input value="' . $customerMeasuersData->dress_chaati . '" class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_chaati">
                </div>
                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Darmean:</label>
                    <input value="' . $customerMeasuersData->dress_darmean . '" class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_darmean">

                </div>
                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">kamar:</label>
                    <input value="' . $customerMeasuersData->dress_kamar . '" class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_kamar">
                </div>
                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Hip:</label>
                    <input value="' . $customerMeasuersData->dress_hip . '" class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_hip">
                </div>
                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Shawlar/Trouser:</label>
                    <input value="' . $customerMeasuersData->dress_shalwar_trouser . '" class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 w-3/4 px-2" type="text" name="dress_shalwar_trouser">
                </div>
                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Pancha:</label>
                    <input value="' . $customerMeasuersData->dress_pancha . '" class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_pancha">
                </div>

                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Shalwar Ghaira:</label>
                    <input value="' . $customerMeasuersData->dress_shalwar_ghaira . '" class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_shalwar_ghaira">
                </div>
                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Thai:</label>
                    <input value="' . $customerMeasuersData->dress_thai . '" class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_thai">
                </div>
                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Godda:</label>
                    <input value="' . $customerMeasuersData->dress_godda . '" class="  focus:ring-gold-400 block bg-grey-lighter placeholder-gray-400 text-xs  text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_godda">
                </div>
            </div>
                <input type="hidden" value="' . ($customerMeasuersData ? "true" : "false") . '" name="isMeasureFormExist" />

          </details></div>';
            }
            $editHtml .= '<div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                <button  type="button" data-id="' . $fetchUserData->id . '"
                    class="update_' . $request->role . '_btn mb-2 md:mb-0 bg-gold-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-gold-500" >Click to Update</button>
            </div>
        </div></form>';
            return response()->json(["message" => "Data found!", "html" => $editHtml, "error" => false]);
        } else {

            return response()->json(["message" => "Data not found!",  "error" => true]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'name' => 'required',
            'phone_no' => 'required|unique:users,phone_no,' . $request->id . '',
            'status' => 'required',
            'cnic_no' => 'required|unique:users,cnic_no,' . $request->id . '',
            'address' => 'required',
        ];
        if ($request->measurement) {

            $measures = [
                'dress_length' => 'required',
                'dress_teera' => 'required',
                'dress_teera_style' => 'required',
                'dress_bazoo' => 'required',
                'dress_galla' => 'required',
                'dress_galla_style' => 'required',
                'dress_kandha' => 'required',
                'dress_kohni' => 'required',
                'dress_chaati' => 'required',
                'dress_darmean' => 'required',
                'dress_kamar' => 'required',
                'dress_hip' => 'required',
                'dress_shalwar_trouser' => 'required',
                'dress_pancha' => 'required',
                'dress_shalwar_ghaira' => 'required',
                'dress_thai' => 'required',
                'dress_godda' => 'required',
            ];

            $rules = array_merge($rules, $measures);
        }

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json([
                "message" => $validate->errors()->first(),
                "error" => true
            ]);
        }
        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            // dd(asset('assets/images'));
            $request->image->move(public_path('assets/images'), $imageName);
        } else {
            $imageName = $request->image;
        }

        $update = User::find($request->id);
        if ($update) {

            $update->name = $request->name;
            $update->phone_no = $request->phone_no;
            $update->address = $request->address;
            $update->status = $request->status;
            $update->cnic_no = $request->cnic_no;
            $update->image = $imageName;
            $update->save();

            if ($request->isMeasureFormExist == true) {

                $measureUpdate = customerMeasurement::where("customer_id", $request->id)->first();
                if (!$measureUpdate) {
                    return response()->json(["message" => "Data not found!",  "error" => true]);
                }
                $measureUpdate->dress_length = $request->dress_length;
                $measureUpdate->dress_teera = $request->dress_teera;
                $measureUpdate->dress_teera_style = $request->dress_teera_style;
                $measureUpdate->dress_bazoo = $request->dress_bazoo;
                $measureUpdate->dress_galla = $request->dress_galla;
                $measureUpdate->dress_galla_style = $request->dress_galla_style;
                $measureUpdate->dress_kandha = $request->dress_kandha;
                $measureUpdate->dress_kohni = $request->dress_kohni;
                $measureUpdate->dress_chaati = $request->dress_chaati;
                $measureUpdate->dress_darmean = $request->dress_darmean;
                $measureUpdate->dress_kamar = $request->dress_kamar;
                $measureUpdate->dress_hip = $request->dress_hip;
                $measureUpdate->dress_shalwar_trouser = $request->dress_shalwar_trouser;
                $measureUpdate->dress_pancha = $request->dress_pancha;
                $measureUpdate->dress_shalwar_ghaira = $request->dress_shalwar_ghaira;
                $measureUpdate->dress_thai = $request->dress_thai;
                $measureUpdate->dress_godda = $request->dress_godda;
                $measureUpdate->save();
                return response()->json(["message" => "Record Updated Successfully!",  "error" => false]);
            }

            return response()->json(["message" => "Record Updated Successfully!",  "error" => false]);
        } else {
            return response()->json(["message" => "Data not found!",  "error" => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $delete = User::find($request->id);
        if ($delete) {
            $delete->delete();
            return response()->json(["message" => "Deleted Successfully!", "error" => false]);
        } else {
            return response()->json(["message" => "Data not Deleted!", "error" => true]);
        }
    }
}
