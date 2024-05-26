{{-- Parent Page --}}
@section('title', 'home')
@include('template.header')
<div class="wrapper">
    @include('template.navbar')
    @include('template.sidebar')
    <div class="content-wrapper">
        @include('template.breadcumb')
        <section class="content">
            <div class="container-fluid">
                @include('template.widget')
                {{-- all content in here --}}
                @yield('content')
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.4
        </div>
    </footer>
</div>
@include('template.footer')
