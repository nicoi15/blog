<main class="py-4">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="list-group list-group-flush">
                <a href="/admin/user_accounts" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-users mdb-gallery-view-icon mr-3"></i>Users</a>
                <a href="/admin/blogs" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-list-alt mr-3"></i>Blogs</a>
                <a href="/admin/tags" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-tags mr-3"></i>Tags</a>
            </div>
        </div>
        <div class="col-md-9">
            @include('components.admin.messages')
            @yield('content')
        </div>
    </div>
</div>
</main>