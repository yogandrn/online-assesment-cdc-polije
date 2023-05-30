<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Tes Minat Karir | CDC Polije</title>
  </head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Nunito:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');
    body {
        font-family: 'Inter', Arial, sans-serif
    }
    .p-l {
        padding: 1.5rem 1.8rem 1.5rem 1.8rem; 
    }

    .button {
        display: inline-block;
        font-weight: 400;
        color: #212529;
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.5rem 0.8rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn-outlined-dark {
        color: #343a40;
        border-color: #343a40;
    }

    .btn-outlined-dark:hover {
        color: #fff;
        background-color: #343a40;
        border-color: #343a40;
    }
</style>
  <body style="background-color: #494FBF;">

    
    <div class="row justify-content-center container mx-auto " style="margin-top: 5rem">
        <div class="col-xl-9 col-lg-9 col-md-10 p-l bg-light border rounded shadow-lg">
            <h2 class="font-weight-bold">Test Minat Karir</h2>
            <hr>
            <form action="/users/minatkarir/store" method="post">
            @csrf
                <div class="quiz">
                    <input type="hidden" name="test_history_id" value="{{ $test_id }}">
                    <input type="hidden" name="token" value="{{ $token }}">
                    @php
                        $no = 1 ;
                    @endphp
                    @foreach ($questions as $question)
                    <div class="container shadow-sm rounded mb-3 px-4 py-2" style="border: 0.8px solid #949494">
                        <div class="mb-1 mt-2">{{$question['pernyataan']}}</div>
                        @foreach ($question['answers'] as $item)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{$question['id']}}" id="option-{{ $question['id'] . '-' . $item['text'] }}" value="{{ intval($item['point']) }}" >
                            <label class="form-check-label" for="option-{{ $question['id'] . '-' . $item['text'] }}">
                                {{ $item['text'] }}
                            </label>
                        </div>

                        @php
                            $no++;
                        @endphp
                        @endforeach
                        
                    
                    </div>
                    @endforeach
                    {{-- <div id="question" class="mb-4">
                        question
                    </div>
                    <div id="answer-buttons" class="mb-2">
                        <button class="button btn-outlined-dark w-100 text-left mb-3">answer</button>
                    </div> --}}
                    <button type="submit" id="next-button" class="btn btn-primary ml-auto" style="display: block;">Next</button>
                </div>
            </form>
        </div>
    </div>
  </body>
</html>