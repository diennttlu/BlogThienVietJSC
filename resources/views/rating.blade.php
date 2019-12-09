@if (isset($vote))
    <span class="vote active" >
@else
    <span class="vote" >
@endif
    <i class="fa fa-star"></i>
</span>&nbsp;{{ count($post->postVotes) }} <span class="hidden-mb">votes</span>