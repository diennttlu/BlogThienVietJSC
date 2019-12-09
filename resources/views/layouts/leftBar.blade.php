<div class="box-small">
    <div class="add-ask-question">
        @if (Auth::check())
            <a href="javascript:void(0)" data-toggle="modal" data-target="#ask_question">
                <span>Ask a Question</span>
                <i class="fa fa-plus-circle"></i>
            </a>
        @else 
            <a href="#" id="login_form" data-toggle="modal" data-target="#signin">
                <span>Ask a Question</span>
                <i class="fa fa-plus-circle"></i>
            </a>
        @endif
    </div>
    <div class="box-menu-left">
        <ul class="list-links">
            <?php  $array_url = explode('/', Request::url()) ?>
            <li class="{{ isset($array_url[3]) && $array_url[3] == 'posts' || !isset($array_url[3]) ? 'active' : ''}}">
                <a href="{{route('index')}}">
                <i class="fa fa-question-circle"></i> 
                Question
                </a>
            </li>
            <li>             
            <li class="{{ isset($array_url[3]) && $array_url[3] == 'tag' ? 'active' : ''}}">
                <a href="{{ route('tag.show') }}">
                <i class="fa fa-tags"></i> 
                Tags
                </a>
            </li>
            <li class="{{ isset($array_url[3]) && $array_url[3] == 'badges' ? 'active' : ''}}">
                <a href="{{route('categories.point')}}">
                <i class="fa fa-trophy"></i> 
                Badges
                </a>
            </li>
            <li class="{{ isset($array_url[3]) && $array_url[3] == 'categories' ? 'active' : ''}}">
                <a href="{{ route('categories.index') }}">
                <i class="fa fa-th-list"></i> 
                Categoties
                </a>
            </li>
            <li class="{{ isset($array_url[3]) && $array_url[3] == 'ListUser' ? 'active' : ''}}">
                <a href="{{route('customer.getlistuser')}}">
                <i class="fa fa-users"></i> 
                Users
                </a>
            </li>
        </ul>
    </div>
</div>