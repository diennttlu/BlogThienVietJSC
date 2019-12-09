<div class="box-small hidden-mb">
    <div class="all-tag-links-l">
        <div class="box-item">
            <div class="question">
                <p class="number">{{ count($post) }}</p>
                <p>Questions</p>
            </div>
            <div class="members">
                <p class="number">{{ count($user) }} +</p>
                <p>Members</p>
            </div>
        </div>
        <div class="box-item">
            <h4>Most Used  Tags</h4>
            <ul>

                @foreach($listtag as $tag)
                <li>
                    <span class="tag"><a href="{{ route('tag.show',['search'=> $tag->name ]) }}">{{ $tag->name }} </a></span>
                </li>

                @endforeach
            </ul>
            <div>
                <a href="{{ route('tag.show') }}" class="seemore">See more tags</a>
            </div>
        </div>
        <div class="box-item">
            <h4>Hot question</h4>
            <ul>
                @foreach($postsort as $post)
                <li>
                    <span><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></span>
                </li>
                 @endforeach

            </ul>
        </div>
        <div class="box-item">
            <h4>Top users(Points)</h4>
            <ul class="list-top">
                @foreach($userpoint as $use)
                    <a href="{{ route('customer.detaiprofile',$use->id) }} ">
                        <li>
                            <span>{{ $use->full_name }}</span>
                            <span class="top">{{ $use->point }}<i class="fa fa-question-circle"></i></span>
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>
        <div class="box-item">
            <h4>Top users(Question)</h4>
            <ul class="list-top">
                @foreach($userpost as $user)
                     <a href="{{ route('customer.detaiprofile',$user->id) }}">
                         <li>
                             <span>{{ $user->full_name }}</span>
                             <span class="top">{{ count($user->userPosts) }}<i class="fa fa-question-circle"></i></span>
                         </li>
                     </a>
                @endforeach
            </ul>
        </div>
        <div class="box-item">
            <h4>Top users(Answer)</h4>
            <ul class="list-top">
                @foreach($usercomment as $user)
                    <a href="{{ route('customer.detaiprofile',$user->id) }}">
                        <li>
                            <span>{{ $user->full_name }}</span>
                            <span class="top">{{ count($user->userComments) }}  <i class="fa fa-comment"></i></span>
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
</div>