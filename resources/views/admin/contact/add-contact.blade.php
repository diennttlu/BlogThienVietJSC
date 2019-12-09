@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h5>Add Contact</h5>
                </div>
                <div class="kt-subheader__toolbar">
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-lg-12">
                    @include('admin.layouts.errors')
                    <form action="{{ route('admin.contact_add') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First Name: </label>
                            <input id="first_name" type="text" name="first_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name: </label>
                            <input id="last_name" type="text" name="last_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input id="email" type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone: </label>
                            <input id="phone" type="number" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Title: </label>
                            <input id="title" type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description: </label>
                            <input id="description" type="text" name="description" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Contact</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection