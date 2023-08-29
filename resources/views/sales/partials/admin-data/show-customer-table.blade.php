<table class="w-full border">
    <tr>
        <th class="text-left py-2 px-2 border w-3/12">Identity Card No</th>
        <td class="w-3/4 border px-2">{{ $sales->customer_identity_card_no }}</td>
    </tr>
    <tr>
        <th class="text-left py-2 px-2 border w-3/12 bg-slate-200">Family Card No</th>
        <td class="w-3/4 border px-2 bg-slate-200">{{ $sales->customer_family_card_no }}</td>
    </tr>
    <tr>
        <th class="text-left py-2 px-2 border w-3/12">Name</th>
        <td class="w-3/4 border px-2">{{ $sales->customer_name }}</td>
    </tr>
    <tr>
        <th class="text-left py-2 px-2 border w-3/12 bg-slate-200">Address</th>
        <td class="w-3/4 border px-2 bg-slate-200">{{ $sales->customer_full_address }}</td>
    </tr>
    <tr>
        <th class="text-left py-2 px-2 border w-3/12">Phone No</th>
        <td class="w-3/4 border px-2">{{ $sales->customer_phone_no }}</td>
    </tr>
    <tr>
        <th class="text-left py-2 px-2 border w-3/12 bg-slate-200">Status</th>
        <td class="w-3/4 border px-2 bg-slate-200">{{ $sales->sales_status }}</td>
    </tr>
</table>
