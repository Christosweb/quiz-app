<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <title>score</title>
</head>
<body>
    <div class="row d-flex justify-content-center ">
        <div class="shadow-lg mt-5 w-50 d-flex flex-column justify-content-center align-items-center">
              <div>
                <h3  class="text-center mt-5">{{auth()->user()->name}}</h3>
                <p class="text-center">your score is</p>
                <h3 class=" text-center {{ $score >= 80 ? 'text-info': 'text-danger'}}">{{$score}}%</h3>
                <p class="text-center">pass mark is 80%</p>

                <div>
                    @if ($score >= 80)
                    <h3 class="text-center">congratulations</h3>
                    <p class="text-center">you pass the quiz</p>
                    <p class="text-center">celebrate yourself</p>
                    @else
                    <h3 class="text-center text-danger">you failed</h3>
                    <p class="text-center">you did not meet up with the pass mark.</p>
                    <p class="text-center"> you can try the quiz again.</p>
                    @endif
                </div>

              </div>

        
              <a href="{{url('/')}}" class="btn btn-primary mb-5" id="score">Retake Quiz</a>
        </div>
    </div>

<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>