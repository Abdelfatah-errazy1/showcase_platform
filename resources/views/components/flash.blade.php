@if (session()->has('success'))
<div x-data=" {show:true} " s-init="setTimeOut(()=>show=false,4000)" x-show="show" class="fixed bg-blue-500 rounded-md text-white bottom-3 right-3 py-2 px-3">
    <p>
        {{ session('success') }}
    </p>
</div>
@endif