<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap-4.6.css') }}">
    <title>Test | CDC Polije</title>
</head>
<body class="bg-primary">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-9 container bg-white rounded shadow p-4">
            <div class="row justify-content-between">
                <div class="col-8">
                    <a href="/" class="btn btn-primary" id="btn-next">Register Now</a>

                </div>
                <div class="col-4 text-right">
                    <h4><span id="timer">00:00</span></h4>
        
                </div>

            </div>
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
                let button = document.getElementById('btn-next');
                button.click();
                }
            }, 1000);
        }
    </script>
</body>
</html>