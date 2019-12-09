
<section class="banner">
    <div class="container">
        <div class="form-search">
            <form action="{{ route('posts.search') }}" method="POST">
                @csrf
                <input type="text" name="search" id="search_name" placeholder="Enter keywords...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</section>

