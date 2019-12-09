@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    Badges List
                </div>
                <div class="kt-subheader__toolbar">
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table_badges">
                        <table class="table text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = getSTTPage($badges) ?>
                                @foreach ($badges as $badge)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $badge->full_name }}</td>
                                        <td>
                                            {{ $badge->point }}
                                            <i class="fa fa-star" aria-hidden="true" style="color: blue"></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pag">
                            {{ $badges->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection