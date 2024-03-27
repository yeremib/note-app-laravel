<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

    @auth
    <form action="/logout" method="POST" class="my-5 mx-5">
        @csrf
        <button class="btn btn-secondary">Log out</button>
    </form>

    <div class="my-5 mx-5">
        <h2 style="text-align: center">Create New Notes</h2>
        <form action="/create-notes" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="title" name="title">
                <label for="title">Notes Title</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" id="notes" style="height: 100px" name="description"></textarea>
                <label for="notes">Your Notes</label>
            </div>
            <button type="submit" class="btn btn-primary">Save Note</button>
        </form>
    </div>

    <div class="my-5 mx-5">
        <h2 style="text-align: center">My Notes</h2>


        <div class="container">
            <div class="row g-4">
                @foreach ($notes as $note)
                <div class="col-12 col-md-4">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$note['title']}}</h5>
                            <p class="card-text">{{$note['description']}}</p>
                            <div style="display: flex">
                                <form action="/update-notes/{{$note->id}}" style="margin-right: 5px">
                                    @csrf
                                    <button class="btn btn-warning text-light">Update</button>
                                </form>
                                <form action="/delete-notes/{{$note->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                </div>
                <!-- You can add more 'col' divs with cards here -->
            </div>
        </div>



    </div>

    @else
    <header>
        <h1 style = "text-align: center">Notes Application</h1>
    </header>
    {{-- <div class="my-5 mx-5 border border-3 border-primary" style="position: relative, width: 50%">
        <h2 class="my-5 mx-5">Register</h2>
        <form class="my-5 mx-5" action="/register" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control border-2 border-black" id="name" name="name" placeholder="Fabian Wright">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control border-2 border-black" id="email" name="email" placeholder="example@gmail.com" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control border-2 border-black" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    <div class="my-5 mx-5 border border-3 border-success" style="display: flex, width:50%">
        <h2 class="my-5 mx-5">Login</h2>
        <form class="my-5 mx-5" action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control border-2 border-black" id="email" name="email" placeholder="example@gmail.com" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control border-2 border-black" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-success">Login</button>
        </form>
    </div> --}}

    <div class="d-flex">
        <div class="my-5 mx-5 border border-3 border-primary" style="flex: 1;">
            <h2 class="my-5 mx-5">Register</h2>
            <form class="my-5 mx-5" action="/register" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control border-2 border-black" id="name" name="name" placeholder="Fabian Wright">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control border-2 border-black" id="email" name="email" placeholder="example@gmail.com" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control border-2 border-black" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
        <div class="my-5 mx-5 border border-3 border-success" style="flex: 1;">
            <h2 class="my-5 mx-5">Login</h2>
            <form class="my-5 mx-5" action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control border-2 border-black" id="email" name="email" placeholder="example@gmail.com" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control border-2 border-black" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-success">Login</button>
            </form>
        </div>
    </div>
    @endauth

</body>
</html>
