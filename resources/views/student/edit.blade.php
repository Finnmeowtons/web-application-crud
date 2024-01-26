<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <p class="h1 text-center my-5">Edit Student Data</p>
    <div>
        @if($errors->all())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-width: 100vh;">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <form method="post" action="{{route('student.update', ['student' => $student])}}">
                @csrf
                @method('put')
                <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $student->name }}" />
                </div>

                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" class="form-control" id="age" name="age" placeholder="Age" value="{{ $student->age }}" />
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address"
                        value="{{ $student->address }}" />
                </div>

                <div class="form-group">
                    <label for="course">Course</label>
                    <input type="text" class="form-control" id="course" name="course" placeholder="Course"
                        value="{{ $student->course }}" />
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject"
                        value="{{ $student->subject }}" />
                </div>

                <button type="submit" class="btn btn-primary btn-block">Edit Student Data</button>

            </form>
        </div>
    </div>
    <br>
    <div class="text-muted mt-2">
        <a href="{{route('index')}}" style="color: gray">Cancel Edit</a>
    </div>
    
    </div>

    


</body>

</html>