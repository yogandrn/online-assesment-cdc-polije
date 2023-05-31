
  @extends('users.layout-test')
  
  @section('container')

  <div class="row justify-content-center mx-auto " style="margin-top: 3rem; margin-bottom:4rem;">
      <div class="col-xl-9 col-lg-9 col-md-10 px-5 py-5 border rounded shadow-lg" style="background-color: #fff; color: #00081d;">
          <h2 class="font-weight-bold" style="color: #00081d">Test Minat Karir</h2>

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
                      <div class="mb-1 mt-2" style="color: #00081d">{{$question['pernyataan']}}</div>
                      @foreach ($question['answers'] as $item)
                      <div class="form-check">
                          <input style="color: #00081d" class="" type="radio" name="{{$question['id']}}" id="option-{{ $question['id'] . '-' . $item['text'] }}" value="{{ intval($item['point']) }}" >
                          <label style="color: #00081d" class="" for="option-{{ $question['id'] . '-' . $item['text'] }}">
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
                  <button type="submit" id="next-button" class="btn btn-info mx-auto mt-4" style="display: block;">Submit</button>
              </div>
          </form>
      </div>
  </div>
    
@endsection