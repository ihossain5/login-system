@extends('admin.layouts.master')
@section('title')
    Dashboard
@endsection


@section('content')

    <div class="page-content-wrapper pl-3">
        <div class="container-fluid">
            @if (session()->has('success'))
            <div class="alert alert-success text-center text-dark mt-3 alert-solid alert-dismissible shadow-sm p-3 mb-5 rounded"
                role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        </div><!-- container -->

    </div> <!-- Page content Wrapper -->

@endsection
