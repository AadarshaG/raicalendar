@if(isset($errors) && $errors->count()>0)
    <div class="alert alert-danger alert-bordered alert-dismissible fade show">
        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
        You have an error while publishing content.
    </div>
@endif

@if(Session::get('success'))
    <div class="alert alert-success alert-bordered alert-dismissible fade show">
        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
        {{session('success')}}
    </div>
@endif

@if(Session::get('error'))
    <div class="alert alert-danger alert-bordered alert-dismissible fade show">
        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
        {{session('error')}}
    </div>
@endif
