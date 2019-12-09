@extends('layouts.master')
@section('content')
    <div class="box-content-head">
        <h3>Badges</h3>
    </div>
    <div class="body-content-all ">
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
                        <td>
                            <a href="{{ route('customer.detaiprofile', ['id' => $badge->id]) }}">
                                {{ $badge->full_name }}
                            </a>
                        </td>
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
@endsection