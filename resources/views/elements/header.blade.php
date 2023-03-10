<header>
    <div class="container">
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="{{ route('dashboard') }}">
                    <span>
                        <strong>CRUD</strong>
                    </span>
                </a>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbar">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbar" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="{{ route('challenge.index') }}">
                        Challenges
                    </a>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <span>
                            Logged in : {{ auth()->user()->username }}
                        </span>
                    </div>
                    <div class="navbar-item">
                        <a class="button is-info" href="{{ route('logout') }}">Log out</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
