@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h4>Contatcs</h4>
                </div>
                <div class="kt-subheader__toolbar">
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session('success') }}
            </div>
            @endif
            <div class="row">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = getSTTPage($contacts); ?>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $contact['first_name'] }}</td>
                                    <td>{{ $contact['last_name'] }}</td>
                                    <td>{{ $contact['phone'] }}</td>
                                    <td>{{ $contact['email'] }}</td>
                                    <td>{{ $contact['title'] }}</td>
                                    <td>{{ $contact['description'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div><a class="btn btn-primary btn-sm" href="{{ route('admin.contact_new') }}"
                        style="position: fixed; bottom: 100px; left:305px;">Add Contact</a></div>
                    <div style="position: fixed ; bottom: 40px;">
                        {{ $contacts->links() }}
                    </div>
            </div>
        </div>
    </div>
@endsection