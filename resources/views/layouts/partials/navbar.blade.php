<nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-3">
    <a class="navbar-brand" href="#">Navbar</a>
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ">
                <a class="nav-link{{(Request::is('/') ? ' active' : (Request::is('edit-artikel/*'))? ' active' : (Request::is('artikel/*')) ? ' active' : '' )}}"
                    href="{{route('artikel.index')}}">Artikel</a>
                <a class="nav-link" href="{{route('artikel.create')}}">Tambah Artikel</a>
                <a class="nav-link" href="#">Pricing</a>
            </div>
        </div>
    </div>
</nav>