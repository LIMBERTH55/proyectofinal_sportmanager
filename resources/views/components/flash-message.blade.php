@if(session('success'))

<div
class="mb-6 rounded-lg border border-green-300 bg-green-100 p-4 text-green-800">

    {{ session('success') }}

</div>

@endif

@if(session('error'))

<div
class="mb-6 rounded-lg border border-red-300 bg-red-100 p-4 text-red-800">

    {{ session('error') }}

</div>

@endif

@if(session('warning'))

<div
class="mb-6 rounded-lg border border-yellow-300 bg-yellow-100 p-4 text-yellow-800">

    {{ session('warning') }}

</div>

@endif