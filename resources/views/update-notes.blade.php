<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Notes</title>
</head>
<body>
    <div class="container my-5 mx-5">
        <h1 class="my-5 mx-5">Update My Notes</h1>
        <form action="/update-notes/{{$note->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="title" name="title" value="{{$note->title}}">
                <label for="title">Notes Title</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" id="notes" style="height: 100px" name="description">{{$note->description}}</textarea>
                <label for="notes">Your Notes</label>
            </div>
            <button type="submit" class="btn btn-primary">Save Note</button>
        </form>
    </div>
</body>
</html>
