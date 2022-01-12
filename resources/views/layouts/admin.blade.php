@include('admin.section.header')
@section('styles')
    <style>

    </style>
@endsection
@include('admin.section.asidenav')
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-12">
                @include('admin.section.message')
            </div>
        </div>
        @yield('main-content')
    </div>
    <!-- END PAGE CONTENT-->
    @include('admin.section.footer')
</div>
</div>

@include('admin.section.scripts')
