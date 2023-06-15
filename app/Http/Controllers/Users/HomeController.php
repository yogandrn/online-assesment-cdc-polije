<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    // halaman beranda utama
    public function index()
    {
        $slides = [
            [
                'image' => 'carousel-1.jpg',
                'caption' => 'foto 1',
            ],
            [
                'image' => 'carousel-2.jpg',
                'caption' => 'foto 2',
            ],
            [
                'image' => 'carousel-3.jpg',
                'caption' => 'foto 3',
            ],
        ];
        return view('users.index', ['title' => 'Online Asessment Tes CDC Polije', 'slides' => $slides]);
    }

    public function active ()
    {
        return view('users.index', compact('slides'));
        return view('users.index', compact('slides'), ['title' => 'Online Asessment Tes CDC Polije']);
    }

    



    // function carousel-inner() {
        // var carousel slide = document.getElementsByClassName('carousel slide');
    //     var currentSlide = 0;      
    //     setInterval(function() {
    //       for (var i = 0; i < slides.length; i++) {
    //         slides[i].classList.remove('active');
    //       }
      
    //       currentSlide = (currentSlide + 1) % slides.length;
    //       slides[currentSlide].classList.add('active');
    //     }, 3000); // Ganti angka 3000 dengan interval waktu yang diinginkan (dalam milidetik)
    //   }
      
    //   carousel();
}
