<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        if ($user) {
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
        $fetchData = User::find($request->id);

        if ($fetchData) {
            $editHtml = '';
            $editHtml .= '<form class="update_user_form" enctype="multipart/form-data">
            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                <div class="mb-3 space-y-2 w-full text-xs">
                    <label class="font-semibold text-gray-600 py-2">Your Name <abbr
                            title="required">*</abbr></label>
                    <input value="' . $fetchData->name . '"
                        class="appearance-none focus:ring-gold-400 block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                         type="text" name="name"
                        >
                    <p class="text-red text-xs hidden">Please fill out this field.</p>
                </div>
                <div class="mb-3 space-y-2 w-full text-xs">
                    <label class="font-semibold text-gray-600 py-2">Your Email <abbr
                            title="required">*</abbr></label>
                    <input value="' . $fetchData->email . '"
                        class="appearance-none focus:ring-gold-400 block w-full bg-gray-light border border-grey-lighter rounded-lg h-10 px-4"
                         type="text" disabled
                        >
                    <p class="text-red text-xs hidden">Please fill out this field.</p>
                </div>
            </div>

            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
            <div class="mb-3 space-y-2 w-full text-xs">
                                <label class="font-semibold text-gray-600 py-2 mb-0">Your CNIC <abbr
                                        title="required" class="text-red-500">*</abbr></label>
                                <input value="' . $fetchData->cnic_no . '"
                                    class="appearance-none focus:ring-gold-400 block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 cnic_no"
                                     type="text" name="cnic_no"
                                    >
                            </div>
                <div class="w-full flex flex-col mb-3">
                    <label class="font-semibold text-gray-600 py-2">Cell No</label>
                    <input value="'. $fetchData->phone_no . '"
                        class=" phone_no appearance-none focus:ring-gold-400 block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                        type="text" name="phone_no" >
                </div>

            </div>
            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                            <div class="mb-3 space-y-2 w-full text-xs">
                            <div class="flex items-center mb-3">
                            <img class="w-6 rounded z-10 img-fluid border " src="' . asset('assets/images') . '/' . ($fetchData->image != null ? $fetchData->image : '/avatar.png') . '">
                            <label class="pl-2 mb-0"> Profile photo <small>(Optional)</small> </label>
                            </div>

                                        <div class="input-group mb-3">
                                        <div class="custom-file">

                                          <input type="file" name="image" class="custom-file-input" id="inputGroupFile02">
                                          <label class="custom-file-label" for="inputGroupFile02">' . ($fetchData->image != null ? $fetchData->image : "Choose file...") . '</label>
                                        </div>

                                      </div>

                            </div>
                            <div class="w-full flex flex-col mb-3">
                            <label class="font-semibold text-gray-600 py-2">Status<abbr
                                    title="required">*</abbr></label>
                            <select
                                class="block w-full bg-grey-lighter focus:ring-gold-400 text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full "

                                 name="status" id="user_status">
                                <option disabled>Select Status</option>
                                <option ' . ($fetchData->status == "active" ? "selected" : "") . ' value="active">Active</option>
                                <option ' . ($fetchData->status == "inactive" ? "selected" : "") . ' value="inactive">Inactive</option>
                                <option ' . ($fetchData->status == "banned" ? "selected" : "") . ' value="banned">Banned</option>
                            </select>
                            <p class="text-sm text-red-500 hidden mt-3" id="error">Please fill out this field.</p>
                        </div>
                        </div>
            <div class="flex-auto w-full mb-1 text-xs">
                <label class="font-semibold text-gray-600 py-2">Address</label>
                <textarea id=""
                    class=" focus:ring-gold-400 min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4"
                    placeholder="Enter your complete Address" name="address">' . $fetchData->address . '</textarea>
            </div>

            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                <button type="button" data-id="' . $fetchData->id . '"
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
