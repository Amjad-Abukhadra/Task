    <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
        <div class="bg-dark p-4">
          @yield('button')
          <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
              <h2 class="navbar-brand" href="home">Riwaya</h2>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                    <a class="nav-link active" href="home">Home
                      <span class="visually-hidden">(current)</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="most_sales">Most Sales</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="basket">Basket</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="profile">Profile</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </li>
                </ul>
                <form class="d-flex">
                  <input class="form-control me-sm-2" type="search" placeholder="Search">
                  <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>
