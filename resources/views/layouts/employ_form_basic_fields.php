<div class="md:flex flex-row md:space-x-4 w-full text-xs">
    <div class="mb-3 space-y-2 w-full text-xs">
        <label class="font-semibold text-gray-600 py-2">Your Name <abbr title="required" class="text-red-500">*</abbr></label>
        <input placeholder="Your full name" class="appearance-none focus:ring-gold-400 block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="name">
    </div>
    <div class="mb-3 space-y-2 w-full text-xs">
        <label class="font-semibold text-gray-600 py-2">Your Email <abbr title="required" class="text-red-500">*</abbr></label>
        <input placeholder="Your Email Address" class="appearance-none focus:ring-gold-400 block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="email">
    </div>
</div>

<div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
    <div class="w-full flex flex-col mb-3">
        <label class="font-semibold text-gray-600 py-2">Cell No<abbr title="required" class="text-red-500">*</abbr></label>
        <input placeholder="0301-2345-678" class="appearance-none focus:ring-gold-400 block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 phone_no" type="text" name="phone_no">
    </div>
    <div class="mb-3 space-y-2 w-full text-xs">
        <label class="font-semibold text-gray-600 py-2 mb-0">Your CNIC <abbr title="required" class="text-red-500">*</abbr></label>
        <input placeholder="38302-1234567-8" class="appearance-none focus:ring-gold-400 block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 cnic_no" type="text" name="cnic_no">
    </div>
</div>
<div class="md:flex flex-row md:space-x-4 w-full text-xs">
    <div class="mb-3 space-y-2 w-full text-xs">
        <label class="font-semibold text-gray-600 py-2 mb-0">Your Photo <small title="Optional">(Optional)</small></label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="image" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>


    </div>
    <div class="w-full flex flex-col mb-3">
        <label class="font-semibold text-gray-600 py-2">Status<abbr title="required" class="text-red-500">*</abbr></label>
        <select class="block w-full bg-grey-lighter focus:ring-gold-400 text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full required" name="status" id="user_status" style="width:100%">
            <option value="">Select Status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            <option value="banned">Banned</option>
        </select>

    </div>
</div>
<div class="flex-auto w-full mb-1 text-xs">
    <label class="font-semibold text-gray-600 py-2">Address<abbr title="required" class="text-red-500">*</abbr></label>
    <textarea id="" class=" focus:ring-gold-400 min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Enter your complete Address" name="address" spellcheck="false"></textarea>
</div>
