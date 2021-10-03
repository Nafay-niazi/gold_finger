@section('plugins.BsCustomFileInput', true)
<div class="relative min-h-screen flex justify-center py-6 px-2 sm:px-6 lg:px-8  items-center">
    <div class="absolute opacity-60 inset-0 z-0"></div>
    <div class=" w-full space-y-8 rounded-xl z-10">
        <div class="grid  gap-8 grid-cols-1">
            <div class="flex flex-col ">
                    <form class="add_user_form" enctype="multipart/form-data">
                        @csrf
                        <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                            <div class="mb-3 space-y-2 w-full text-xs">
                                <label class="font-semibold text-gray-600 py-2">Your Name <abbr
                                        title="required" class="text-red-500">*</abbr></label>
                                <input placeholder="Your full name"
                                    class="appearance-none focus:ring-gold-400 block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                     type="text" name="name"
                                    >
                            </div>
                            <div class="mb-3 space-y-2 w-full text-xs">
                                <label class="font-semibold text-gray-600 py-2">Your Email <abbr
                                    title="required" class="text-red-500">*</abbr></label>
                                <input placeholder="Your Email Address"
                                    class="appearance-none focus:ring-gold-400 block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                     type="text" name="email"
                                    >
                            </div>
                        </div>

                        <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                            <div class="w-full flex flex-col mb-3">
                                <label class="font-semibold text-gray-600 py-2">Cell No<abbr
                                    title="required" class="text-red-500">*</abbr></label>
                                <input placeholder="0301-2345-678"
                                    class="appearance-none focus:ring-gold-400 block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 phone_no"
                                    type="text" name="phone_no" >
                            </div>
                            <div class="mb-3 space-y-2 w-full text-xs">
                                <label class="font-semibold text-gray-600 py-2 mb-0">Your CNIC <abbr
                                        title="required" class="text-red-500">*</abbr></label>
                                <input placeholder="38302-1234567-8"
                                    class="appearance-none focus:ring-gold-400 block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 cnic_no"
                                     type="text" name="cnic_no"
                                    >
                            </div>
                        </div>
                        <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                            <div class="mb-3 space-y-2 w-full text-xs">
                                <label class="font-semibold text-gray-600 py-2 mb-0">Your Photo <small
                                        title="Optional">(Optional)</small></label>
                                        <x-adminlte-input-file name="image" class="h-10 " igroup-size="md" placeholder="Choose a image...">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text bg-lightblue">
                                                    <i class="fas fa-upload"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-file>

                            </div>
                            <div class="w-full flex flex-col mb-3">
                                <label class="font-semibold text-gray-600 py-2">Status<abbr
                                    title="required" class="text-red-500">*</abbr></label>
                                <select
                                    class="block w-full bg-grey-lighter focus:ring-gold-400 text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full required"

                                     name="status" id="user_status">
                                    <option value="">Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="banned">Banned</option>
                                </select>

                            </div>
                        </div>
                        <div class="flex-auto w-full mb-1 text-xs">
                            <label class="font-semibold text-gray-600 py-2">Address<abbr
                                title="required" class="text-red-500">*</abbr></label>
                            <textarea id=""
                                class=" focus:ring-gold-400 min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4"
                                placeholder="Enter your complete Address" name="address" spellcheck="false"></textarea>
                        </div>

                        <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                            <button
                                class="mb-2 md:mb-0 bg-gold-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-gold-500 add_user_button">Click to Add</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
