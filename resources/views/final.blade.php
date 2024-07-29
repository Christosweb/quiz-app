<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <title>finish</title>
</head>
<body>
    <div class="row d-flex justify-content-center ">
        <div class="shadow-lg mt-5 w-50 d-flex flex-column justify-content-center align-items-center">
              <h3 class="mb-3 mt-5">congratulations</h3>  
              <h4 class="mb-3">you have</h4>
              <h4 class="mb-3">successfully</h4>
              <h4 class="mb-3">completed</h4>
              <h4 class="mb-3">your quiz.</h4>
              <h3 class="mb-3">completed</h3>
              <h3 class="mb-3">{{ $answers}}/{{$question}}</h3>
              <h3 class="mb-3">Questions</h3>
              <button class="btn btn-primary mb-5" id="score">view your score</button>
        </div>
    </div>

<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>