<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <title>Dashboard</title>
</head>

<body class="">

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-4 shadow">
        <div>
            <h3 class="text-light">Quiz App</h3>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">

            <main class="w-50 mx-auto col-lg-10 px-md-4" id="main">
                <div class="shadow-lg mt-5">


                    <form class="bg-light shadow-lg"
                        action="{{$questions->lastPage() > $questions->currentPage() ? url($questions->nextPageUrl()) : null}}"
                        method="POST" id="myForm">
                        <div class="d-flex justify-content-center align-items-center p-3">
                            <div class="text-mute me-2">Progress:</div>
                            <div class="progress w-50 align-middle">
                                <div class="progress-bar text-center align-self-center" data-current-page="{{$questions->currentPage()}}" data-last-page="{{$questions->lastPage()}}" id="progress-bar">{{100/$questions->lastPage() * $questions->currentPage()}}%</div>
                            </div>
                            <div class="ms-3">
                                Question {{$questions->currentPage()}} out of {{$questions->lastPage()}}
                            </div>
                        </div>
                        

                        @foreach ($questions as $question )
                        <h3 class="text-center text-capitalize pt-0 mb-5">{{ $question->test}}</h3>
                        @foreach ($question->options->shuffle() as $option )
                        @csrf
                        <div class="card">
                            <div class="card-body d-flex gap-2 align-items-center">
                                <input class="radio form-check-input userSelect" 
                                       type="checkbox" name="answer_id"
                                       data-question-id="{{$option->question_id}}"
                                       data-option-id="{{$option->id}}"
                                       data-is-correct="{{ $option->correct }}"
                                       value="{{$option->id}}"
                                    {{$answer->pluck('option_id')->contains($option->id)? 'checked' : null}}>
                                <span class="text-capitalize">{{$option->choices}}</span>
                            </div>
                        </div>
                        
                        <input type="hidden" name="question_id" value="{{$option->question_id}}">

                        @endforeach
                        @endforeach
                    </form>
                    <a class="btn btn-primary {{$questions->currentPage() > 1 ?'d-inline-flex':'d-none'}} "
                        href="{{ $questions->previousPageUrl()}}">previous</a>
                    <input class="btn btn-primary  float-end"
                        type="{{$questions->lastPage() == $questions->currentPage()?'button':'submit'}}"
                        value="{{$questions->lastPage() == $questions->currentPage()?'submit':'next'}}" form="myForm"
                        id="{{$questions->lastPage() == $questions->currentPage()?'submit':null}}">


                </div>
            </main>
        </div>
    </div>

    <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>