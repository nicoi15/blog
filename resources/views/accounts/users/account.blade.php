<main class="py-4">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="list-group list-group-flush">
                <a href="/account/blogs" class="list-group-item list-group-item-action waves-effect">
                <i class="far fa-list-alt mdb-gallery-view-icon mr-3"></i>Your Blogs</a>
                <a href="/posts/create" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-table mr-3"></i>Create a Blog</a>
                <a href="/account/profile" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-user mr-3"></i>Your Profile</a>
                <a href="/account/changepass" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-key mr-3"></i>Change Password</a>
            </div>
        </div>
        <div class="col-md-9">
            @include('components.users.messages')
            @yield('content')
        </div>
    </div>
</div>
</main>