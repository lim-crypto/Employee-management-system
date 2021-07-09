<div>
@if(session()->has('message'))
<div class="alert alert-success py-4 px-2 bg-green-400 ">{{session()->get('message')}}</div>
@elseif(session()->has('error'))
<div class="alert alert-danger  py-4 px-2 bg-red-400 ">{{session()->get('error')}}</div>
@endif


</div>
 