@extends('layouts.master')
@section('title') Verifiy code email @endsection
@section('content')
    <form action="{{ route('customer.verify.code',$id) }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label >Code</label>
            <div class="box-pass">
                <input type="text" name="codeforget"  class="form-control" >
                @if( session('errorcode') )
                    <div class="alert alert-danger">{{ session('errorcode') }}</div>
                @endif
            </div>
        </div>
        <div class="box-btn">
            <button type="submit">send</button>
        </div>
    </form>
@endsection