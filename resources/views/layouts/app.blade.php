<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> @yield('Title') </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body
        style="background-color: #6482AD; color: #E2DAD6; margin: 0 75px; display: grid; grid-template-areas: 'header header header header header header'   'menu menu main main right right'   'footer footer footer footer footer footer'; gap: 10px; padding: 10px;">
        <nav class="header navbar navbar-expand-lg rounded-3 my-1 py-3"
            style="grid-area: header; background-color: #7FA1C3;">
            <div class="container-fluid">
                <a class="navbar-brand" style="color: #E2DAD6;" href="#">ReeJa Website</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" style="color: #E2DAD6;" aria-current="page" href="{{ route('posts.index') }}">All
                                posts</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- <menu class="menu" style="background-color: #F1F0E8; ">
        @yield('Menu')
    </menu>

    <section class="right" style="background-color: #F1F0E8;">
        @yield('Right')
    </section> -->
        <div class="sticky-right my-2 py-2"
            style="grid-area: menu; justify-self: flex-end;  display: flex; flex-direction: column; justify-content: flex-start; align-content: flex-end;">
            <div class="sticky-top w-100 py-5 rounded-5"
                style="justify-self: flex-end; display: flex; flex-direction: column; justify-content: center; align-content: center; background-color: #7FA1C3;">
                <div class=" card border-0" style="min-hight: 20rem; background-color: transparent;">
                    <div class="card-body d-flex align-items-center flex-column bd-highlight">
                        <div class="d-flex align-items-start flex-column bd-highlight h1">
                            <div class="p-2 bd-highlight"><a href="https://www.linkedin.com/"><i
                                        style="color: #E2DAD6;" class="bx bxl-linkedin"></i> </a></div>
                            <div class="p-2 bd-highlight"><a href="https://www.github.com/"><i
                                        style="color: #E2DAD6;" class='bx bxl-github'></i> </a></div>
                            <div class="p-2 bd-highlight"><a href="https://www.gmail.com/"><i
                                        style="color: #E2DAD6;" class='bx bxl-gmail'></i> </a></div>
                            <div class="p-2 bd-highlight"><a href="https://www.facebook.com/"><i
                                        style="color: #E2DAD6;" class='bx bxl-facebook-circle'></i> </a></div>
                            <div class="p-2 bd-highlight"><a href="https://www.telegram.org/"><i
                                        style="color: #E2DAD6;" class="bx bxl-telegram"></i> </a></div>
                            <div class="p-2 bd-highlight"><a href="https://www.instagram.com/"><i
                                        style="color: #E2DAD6;" class='bx bxl-instagram-alt'></i> </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main class="main rounded-3 my-2 py-2"
            style="grid-area: main; max-width: 47rem; justify-self: center; align-self: center;">
            @yield('Body')
        </main>

        <div class="sticky-right my-2 py-2"
            style="grid-area: right; justify-self: self-start; display: flex; flex-direction: column; justify-content: flex-start; align-content: flex-start;">
            <div class="sticky-top w-100 p-3 rounded-4"
                style="min-hight: 20rem; justify-self: center; display: flex; flex-direction: column; justify-content: center; align-content: center; background-color: #7FA1C3;">
                <div class=" card border-0 rounded-4" style="width: 18rem; background-color: transparent; color: #E2DAD6;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Show Profile</a>
                        <a href="#" class="btn btn-primary">Login-signup</a>
                    </div>
                </div>
            </div>
        </div>

        <footer
            class="d-flex flex-wrap justify-content-between align-items-center p-3 my-3 border-top footer text-center rounded-3"
            style="grid-area: footer; background-color: #7FA1C3;">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1"">
                    <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <span>© 2021 Company, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex h3">
                <div class="p-2 bd-highlight"><a href="https://www.linkedin.com/" style="color: #E2DAD6;"><i
                            class="bx bxl-linkedin"></i> </a></div>
                <div class="p-2 bd-highlight"><a href="https://www.github.com/" style="color: #E2DAD6;"><i
                            class='bx bxl-github'></i> </a></div>
                <div class="p-2 bd-highlight"><a href="https://www.gmail.com/" style="color: #E2DAD6;"><i
                            class='bx bxl-gmail'></i> </a></div>
                <div class="p-2 bd-highlight"><a href="https://www.facebook.com/" style="color: #E2DAD6;"><i
                            class='bx bxl-facebook-circle'></i> </a></div>
                <div class="p-2 bd-highlight"><a href="https://www.telegram.org/" style="color: #E2DAD6;"><i
                            class="bx bxl-telegram"></i> </a></div>
                <div class="p-2 bd-highlight"><a href="https://www.instagram.com/" style="color: #E2DAD6;"><i
                            class='bx bxl-instagram-alt'></i> </a></div>
            </ul>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    </body>

</html>
