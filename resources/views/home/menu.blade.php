@if (Auth::user())
    <div id="sidebar-wrapper">
        <nav id="spy">
            <ul class="sidebar-nav nav">
                <li>
                    <h2><a href="/home">Home</a></h2>
                </li>
                <li>
                    <a href="#" >Posts</span></a>
                    <div>
                        <ul class="nav nav-list">
                            <li><a href="/post/create">Add Post</a></li>
                            <li><a href="/post/{{Auth::user()->id}}">View My Posts</a></li>
                            <li><a href="/post">View All Posts</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" >Comments</span></a>
                    <div>
                        <ul class="nav nav-list">
                            <li><a href="/comment/create">Add Comment</a></li>
                            <li><a href="/comment/{{Auth::user()->id}}">View My Post's Comments</a></li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" data-scroll="">
                        <span>Users  <b></b></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endif