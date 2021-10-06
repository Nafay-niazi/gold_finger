@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <p class="mb-0 text-white font-bold">Add New Customer</p>
@stop
@section('content')

    <div class="relative min-h-screen flex justify-center py-6 px-2 sm:px-6 lg:px-8  items-center">
        <div class="absolute opacity-60 inset-0 z-0"></div>
        <div class=" w-full space-y-8 rounded-xl z-10">
            <div class="grid  gap-8 grid-cols-1">
                <div class="flex flex-col ">
                    <form class="add_user_form" enctype="multipart/form-data">
                        @csrf

                        @include('layouts.employ_form_basic_fields')
                        <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                            <div class="my-3 w-full text-xs">
                                    <label class="inline-flex cursor-pointer items-center">
                                      <input type="checkbox" class="form-checkbox text-gold-500 focus:ring-gold-500 rounded checkboxMeasurement" >
                                      <span class="ml-2">Check to Add meassuement Detail</span>
                                    </label>
                            </div>
                        </div>

                        <div class="d-none measurementBlock card shadow p-4 text-xs">
                            <p class="text-md font-bold text-center text-gold-600 my-4">Customer Measurements Form</p>
                            {{-- <h5 class="text-center font-bold"></h5>
                            <label class="font-semibold w-1/4 text-gray-600 py-2 mb-0">Select Dress Type:</label> --}}
                            {{-- <div class="grid md:grid-cols-6 sm:grid-cols-3 grid-cols-2 md:place-items-center my-3">
                              <div>
                                <label class="inline-flex cursor-pointer items-center">
                                  <input type="radio" class="form-radio text-gold-500 focus:ring-gold-500" name="dress_type" value="Shalwar Qameez">
                                  <span class="ml-2">Shalwar Qameez</span>
                                </label>
                              </div>
                              <div>
                                <label class="inline-flex cursor-pointer items-center">
                                  <input type="radio" class="form-radio text-gold-500 focus:ring-gold-500" name="dress_type" value="Trouser Qameez">
                                  <span class="ml-2">Trouser Qameez</span>
                                </label>
                              </div>
                              <div>
                                <label class="inline-flex cursor-pointer items-center">
                                  <input type="radio" class="form-radio text-gold-500 focus:ring-gold-500" name="dress_type" value="Wastcoat">
                                  <span class="ml-2">Wastcoat</span>
                                </label>
                              </div>
                              <div>
                                <label class="inline-flex cursor-pointer items-center">
                                  <input type="radio" class="form-radio text-gold-500 focus:ring-gold-500" name="dress_type" value="Coat">
                                  <span class="ml-2">Coat</span>
                                </label>
                              </div>
                              <div>
                                <label class="inline-flex cursor-pointer items-center">
                                  <input type="radio" class="form-radio text-gold-500 focus:ring-gold-500" name="dress_type" value="Pent">
                                  <span class="ml-2">Pent</span>
                                </label>
                              </div>
                              <div>
                                <label class="inline-flex cursor-pointer items-center">
                                  <input type="radio" class="form-radio text-gold-500 focus:ring-gold-500" name="dress_type" value="Shirt">
                                  <span class="ml-2">Shirt</span>
                                </label>
                              </div>
                            </div> --}}

                            <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols gap-x-6 w-full text-xs">
                                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 pr-2">Length:</label>
                                    <input placeholder="Dress length.." class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_length">

                                </div>
                                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Teera:</label>
                                    <input placeholder="Dress Teera.." class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_teera">
                                </div>
                                <div class="mb-3 space-y-2 w-full space-x-4 flex items-center">
                                        <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Teera Style:</label>
                                        <select class="dd block w-3/4 bg-grey-lighter focus:ring-gold-400 text-grey-darker placeholder-gray-400 text-xs  border border-grey-lighter rounded-lg h-10 px-2 required" name="dress_teera_style" style="width:75%">
                                            <option value="">Select Teera Style</option>
                                            <option value="normal">Normal</option>
                                            <option value="seeda">Seedha</option>
                                            <option value="full down">Full downm</option>
                                            <option value="halka down">Halka down</option>
                                        </select>
                                </div>
                                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Bazoo:</label>
                                    <input placeholder="Dress bazoo.." class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_bazoo">
                                </div>

                                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Galla:</label>
                                    <input placeholder="Dress galla.." class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_galla">
                                </div>
                                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Galla Style:</label>
                                    <select class="block w-3/4 bg-grey-lighter focus:ring-gold-400 text-grey-darker placeholder-gray-400 text-xs  border border-grey-lighter rounded-lg h-10 px-2 required" name="dress_galla_style" style="width:75%">
                                        <option value="">Select Galla Style</option>
                                        <option value="normal">Normal</option>
                                        <option value="halka down">Halka down</option>
                                    </select>
                                </div>

                                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">kandha:</label>
                                    <input placeholder="Dress kandha.." class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_kandha">
                                </div>
                                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">kohni:</label>
                                    <input placeholder="Dress kohni.." class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_kohni">
                                </div>
                                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">chaati:</label>
                                    <input placeholder="Dress chaati.." class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_chaati">
                                </div>
                                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Darmean:</label>
                                    <input placeholder="Dress darmean.." class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_darmean">

                                </div>
                                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">kamar:</label>
                                    <input placeholder="Dress kamar.." class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_kamar">
                                </div>
                                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Hip:</label>
                                    <input placeholder="Dress hip.." class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_hip">
                                </div>
                                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Shawlar/Trouser:</label>
                                    <input placeholder="Dress shalwar trouser.." class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 w-3/4 px-2" type="text" name="dress_shalwar_trouser">
                                </div>
                                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Pancha:</label>
                                    <input placeholder="Dress pancha.." class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_pancha">
                                </div>

                                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Shalwar Ghaira:</label>
                                    <input placeholder="Dress shalwar ghaira.." class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_shalwar_ghaira">
                                </div>
                                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Thai:</label>
                                    <input placeholder="Dress thai.." class=" focus:ring-gold-400 placeholder-gray-400 text-xs block bg-grey-lighter text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_thai">
                                </div>
                                <div class="mb-3 space-y-2 space-x-4 w-full  flex items-center">
                                    <label class="font-semibold w-1/4  text-gray-600 py-2 mb-0 inline pr-2">Godda:</label>
                                    <input placeholder="Dress godda.." class="  focus:ring-gold-400 block bg-grey-lighter placeholder-gray-400 text-xs  text-grey-darker w-3/4 border border-grey-lighter rounded-lg h-10 px-2" type="text" name="dress_godda">
                                </div>
                            </div>


                          </div>

                        <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                            <button
                                class="mb-2 md:mb-0 bg-gold-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-gold-500 add_user_button">Click
                                to Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @stop
    @section('css')
        <style>
            .add_user_form label.error {
                color: red;
                margin: 8px 0px 0px 4px;
            }

        </style>
    @stop
    @section('js')
    @section('plugins.Sweetalert2', true)
    @section('plugins.jqueryValidation', true)
    @section('plugins.jqueryMaskPlugin', true)
    @section('plugins.Select2', true)
    <script src="{{ asset('assets/js/gold_finger_custom.js') }}"></script>
    <script defer>
        $(document).ready(function() {


        $(document).on("change",".checkboxMeasurement",function(){

            if($(this).is(":checked"))
            {

                $(this).parents(".add_user_form").find(".measurementBlock").removeClass("d-none");
            }
            else{
                $(this).parents(".add_user_form").find(".measurementBlock").addClass("d-none");
            }
        });
        var route= "{{ route('add.customer') }}";
        var userRole = "customer";
        add_new_user(route,userRole);

        });
    </script>
@stop
