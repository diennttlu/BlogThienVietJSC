@extends('layouts.master')
@section('title') Contact @endsection
@section('content')
    <div class="box-content-head">
        <h3>Contact</h3>
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session('success') }}
        </div>
    @endif
    <form method="post" action="{{route('contact.add')}}">
        <div class="box-form-contact">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group names">
                <label>First name *</label>
                <input type="text" class="form-control" name="first_name" required>
            </div>
            <div class="form-group names">
                <label>Last name *</label>
                <input type="text" class="form-control" name="last_name" required>
            </div>
            <div class="form-group">
                <label>Word email *</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label>Phone *</label>
                <input type="number" class="form-control" name="phone" required>
            </div>
            <div class="form-group">
                <label>Title *</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label>Description *</label>
                <textarea name="note" class="form-control" rows="5" required></textarea>
            </div>
            <div class="box-btn">
                <button>Send</button>
            </div>
            <div class="box-contact-us">
                <h4>Contact Us</h4>
                <p><span>Address:</span>  Hà Nội, Việt Nam</p>
                <p><span>Email:</span>  BLOG@gmail.com</p>
                <p><span>Phone:</span>  0987654321</p>
                <p><span>Mobie:</span>  0987654321</p>
                <p><span>Fax:</span>  1234567890</p>
            </div>
        </div>
    </form>
@endsection