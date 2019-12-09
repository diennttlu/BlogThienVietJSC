@foreach ($users as $user)
    <div id="item" class="col-lg-4" style="margin-bottom: 20px">
        <div class="form-group">
            <div style="width: 35%; display: inline-block; float: left">
                <label>Full Name: </label>
                <p>{{ $user->full_name }}</p>
                <label>Point: </label>
                <p>
                    {{ $user->point }}
                    <i class="fa fa-star" aria-hidden="true" style="color:blue;"></i>
                </p>
            </div>
            <div style="width: 65% ; display: inline-block; float: left">
                <img class="rounded-circle" src="{{ URL::to('/') }}/images/icon/{{ $user->image }}" width="100px" height="100px" title="{{$user->description}}">
            </div>
        </div>
        @if (Auth::guard('admin')->user()->can('changePassword', $user))
            <div class="form-group" style="clear: both;">
                <a href="{{ route('admin.account_createChangepassword', ['id' => $user->id]) }}">Change password</a>
            </div>
            <div class="form-group" style="clear: both;">
                <a href="{{ route('admin.account_editAdmin', ['id' => $user->id]) }}">Edit</a>
            </div>
        @endif
    </div>
@endforeach
<div class="col-lg-12">
    {{ $users->appends(Request::except('page'))->links() }}
</div>