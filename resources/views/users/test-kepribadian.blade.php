
  @extends('users.layout-test')
  
  @section('container')
  <div class="row justify-content-center mx-auto " style="margin-top: 3rem; margin-bottom:4rem;">
      <div class="col-xl-9 col-lg-9 col-md-10 px-5 py-5 border rounded shadow-lg" style="background-color: #fff; color: #00081d;">
        <div class="row justify-content-between">
            {{-- // Judul Test  --}}
            <div class="col-lg-8 col-md-7 col-sm-12">
                <h2 class="font-weight-bold" style="color: #00081d">Test Gaya Kepribadian</h2>
            </div>

            {{-- Timer  --}}
            <div class="col-lg-4 col-md-5 col-sm-12 text-center w-50" >
                <h3 class="text px-3 py-2 rounded " style="background-color: #1a3c9250"><span id="timer" style="; align-self: center">00:00</span></h3>
            </div>
        </div> 
          
          <form action="/users/gayakepribadian/store" method="post">
          @csrf
              <div class="quiz ">
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
                          <input class="" type="radio" name="{{$question['id']}}" id="option-{{ $question['id'] . '-' . $item['text'] }}" value="{{ intval($item['point']) }}" style="color: #00081d">
                          <label class="" for="option-{{ $question['id'] . '-' . $item['text'] }}" style="color: #00081d;">
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

  <script>
    let timerDuration = 60 * 5; // 30 menit dalam detik
    let timerDisplay = document.getElementById('timer');
    startTimer(timerDuration, timerDisplay);
    function startTimer(duration, display) {
        let timer = duration, hours, minutes, seconds;
        setInterval(function () {
            hours = parseInt(timer / 3600, 10);
            minutes = parseInt((timer % 3600) / 60, 10);
            seconds = parseInt((timer % 3600) % 60, 10);

            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent =  minutes + ":" + seconds;

            if (--timer < 0) {
            // Timer berakhir, lakukan tindakan sesuai kebutuhanmu
            // Contoh: Munculkan peringatan, kirim jawaban otomatis, dll.
            // Untuk menghentikan timer setelah mencapai 0, tambahkan kode berikut:
            // clearInterval(timerInterval);
            let button = document.getElementById('next-button');
            button.click();
            }
        }, 1000);
    }
</script>
    
@endsection