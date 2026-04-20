<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sevinch - 475-chi bolalar bog'chasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="icon" href="/image/sevinch-logo.png" type="image/png">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'unipix-blue': '#161179',
            'unipix-light': '#2a2a9e',
            'unipix-dark': '#0c0950',
            'turin-green': '#16A34A',
            'turin-dark': '#003366',
          },
          fontFamily: {
            'serif': ['Playfair Display', 'serif'],
            'sans': ['Poppins', 'sans-serif'],
          },
          boxShadow: {
            'elegant': '0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
          }
        }
      }
    }
  </script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .hero-text-shadow {
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    .gradient-overlay {
      background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, rgba(22,17,121,0.7) 100%);
    }
    .btn-glow:hover {
      box-shadow: 0 0 15px rgba(22, 17, 121, 0.6);
    }
    .nav-indicator::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 3px;
      background-color: #161179;
      transition: width 0.3s ease;
    }
    .nav-indicator:hover::after {
      width: 70%;
    }
    .active-nav::after {
      width: 70%;
    }

    /* Team slider styles */
    .slides2 {
      display: flex;
      gap: 24px;
      width: max-content;
    }
    .slider2 {
      overflow: hidden;
    }
    .slider2 .slides2 > div {
      flex-shrink: 0;
      min-width: auto;
      max-width: 240px;
    }

    /* Main Slider */
    .main-slider {
      position: relative;
      width: 100%;
      height: 100vh;
      overflow: hidden;
    }
    .main-slides {
      display: flex;
      width: 100%;
      height: 100%;
      transition: transform 0.5s ease-in-out;
    }
    .main-slide {
      flex: 0 0 100%;
      position: relative;
    }

    /* Footer styles */
    .footer {
      background-color: #003366;
      color: white;
    }
    .footer i {
      margin-right: 8px;
    }
    .footer a:hover {
      color: #cfcfcf;
    }
  </style>
    <style>
        .stat-box {
            transition: transform 0.3s ease-in-out;
        }
        .stat-box:hover {
            transform: scale(1.05);
        }

        /* Team Slider Styles */
        .slider-container {
            overflow: hidden;
            position: relative;
            width: 100%;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .slider-images {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            padding: 2rem;
        }

        .slider-img {
            position: relative;
            height: 450px;
            width: 300px;
            border-radius: 20px;
            overflow: hidden;
            cursor: pointer;
            flex-shrink: 0;
            transition: all 0.5s ease;
            opacity: 0.6;
            transform: scale(0.9);
        }

        .slider-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slider-img h1 {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: white;
            font-size: 24px;
            opacity: 0;
            transition: all 0.5s ease;
            z-index: 1;
        }

        .slider-img .details {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: all 0.5s ease;
        }

        .slider-img.active {
            opacity: 1;
            transform: scale(1);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
        }

        .slider-img.active h1 {
            opacity: 1;
        }

        .slider-img:hover .details {
            opacity: 1;
        }

        .slider-controls {
            position: absolute;
            bottom: 30px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .slider-controls button {
            background: transparent;
            border: 2px solid white;
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .slider-controls button:hover {
            background: white;
            color: black;
        }

        .slider-dots {
            display: flex;
            gap: 8px;
            margin-top: 20px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dot.active {
            background: white;
            transform: scale(1.3);
        }

        .spoon-icon {
            width: 24px;
            height: 24px;
            margin-right: 8px;
            display: inline-block;
            vertical-align: middle;
        }

        .favorite-spoon {
            background: rgba(255, 255, 255, 0.1);
            padding: 6px 12px;
            border-radius: 20px;
            margin-top: 8px;
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        .spoon-collection {
            position: absolute;
            bottom: 80px;
            left: 0;
            right: 0;
            text-align: center;
        }

        .spoon-collection img {
            display: inline-block;
            height: 40px;
            margin: 0 5px;
            filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.7));
            transition: all 0.3s ease;
        }

        .spoon-collection img:hover {
            transform: rotate(30deg) scale(1.2);
        }

        @media (max-width: 768px) {
            .slider-img {
                height: 350px;
                width: 250px;
            }
        }
    </style>
    <style>
        :root {
            --primary-color: #0a4480;
            --secondary-color: #1a6cb4;
            --text-color: #333;
            --light-bg: #f5f7fa;
            --white: #ffffff;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            color: var(--text-color);
        }

        header {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 1rem 0;
            box-shadow: var(--shadow);
            position: relative;
            z-index: 1000;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo img {
            height: 60px;
            width: auto;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: bold;
            white-space: nowrap;
        }

        /* Hamburger Menu Button */
        .mobile-menu-btn {
            display: none;
            background: transparent;
            border: none;
            color: var(--white);
            font-size: 1.8rem;
            cursor: pointer;
            padding: 0.5rem;
            z-index: 1002;
            transition: all 0.3s ease;
            position: relative;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
        }

        .mobile-menu-btn:hover {
            opacity: 0.8;
            transform: scale(1.1);
        }

        .mobile-menu-btn .menu-icon,
        .mobile-menu-btn .close-icon {
            position: absolute;
            transition: all 0.3s ease;
            font-size: 1.5rem;
        }

        .mobile-menu-btn .close-icon {
            opacity: 0;
            transform: rotate(90deg);
        }

        .mobile-menu-btn.active .menu-icon {
            opacity: 0;
            transform: rotate(90deg);
        }

        .mobile-menu-btn.active .close-icon {
            opacity: 1;
            transform: rotate(0deg);
        }

        nav {
            position: relative;
        }

        nav ul {
            display: flex;
            gap: 2rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav a {
            color: var(--white);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 0;
            display: block;
        }

        nav a:hover {
            color: #b8d8ff;
        }

        .lang-switcher {
            display: flex;
            gap: 0.5rem;
        }

        .lang-switcher a {
            color: var(--white);
            text-decoration: none;
            font-size: 0.9rem;
        }

        .gallery-section {
            padding: 3rem 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--primary-color);
            font-size: 2rem;
            position: relative;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: var(--secondary-color);
        }

        .main-slider {
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow);
            border-radius: 8px;
            overflow: hidden;
        }

        .main-slider .slide {
            position: relative;
            height: 500px;
        }

        .main-slider img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slide-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
            color: white;
            padding: 1.5rem;
        }

        .slide-info h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .nav-slider .slide {
            height: 100px;
            margin: 0 10px;
            cursor: pointer;
            border-radius: 4px;
            overflow: hidden;
            opacity: 0.6;
            transition: all 0.3s ease;
        }

        .nav-slider .slide:hover,
        .nav-slider .slick-current .slide {
            opacity: 1;
            transform: scale(1.05);
        }

        .nav-slider img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery-categories {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin: 2rem 0;
        }

        .category-btn {
            background-color: var(--white);
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .category-btn:hover,
        .category-btn.active {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .slick-prev, .slick-next {
            z-index: 1;
            width: 40px;
            height: 40px;
        }

        .slick-prev {
            left: 15px;
        }

        .slick-next {
            right: 15px;
        }

        .slick-prev:before, .slick-next:before {
            font-size: 30px;
        }

        /* Mobile Navigation Styles */
        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: flex;
            }

            header {
                position: relative;
            }

            nav {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                width: 100%;
                background-color: var(--primary-color);
                transform: translateY(-100%);
                transition: transform 0.4s ease-in-out;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
                z-index: 1001;
                padding-top: 80px;
                padding-bottom: 2rem;
                max-height: 100vh;
                overflow-y: auto;
            }

            nav.active {
                transform: translateY(0);
            }

            nav ul {
                flex-direction: column;
                gap: 0;
                padding: 0 1rem;
            }

            nav ul li {
                width: 100%;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            nav ul li:last-child {
                border-bottom: none;
            }

            nav a {
                padding: 1rem;
                font-size: 1.1rem;
                width: 100%;
            }

            .logo {
                flex: 1;
                min-width: 0;
            }

            .logo img {
                height: 50px;
                width: auto;
            }

            .logo-text {
                font-size: 0.9rem;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .header-content {
                gap: 1rem;
            }

            .main-slider .slide {
                height: 350px;
            }

            .nav-slider .slide {
                height: 70px;
            }
        }

        @media (max-width: 480px) {
            .logo-text {
                font-size: 0.75rem;
            }

            .logo img {
                height: 40px;
            }

            .container {
                padding: 0 0.5rem;
            }

            .mobile-menu-btn {
                width: 35px;
                height: 35px;
                font-size: 1.5rem;
            }

            nav {
                padding-top: 70px;
            }

            nav a {
                font-size: 1rem;
                padding: 0.875rem;
            }
        }
    </style>
</head>
<body x-data @keydown.escape.window="$store.modal?.showModal = false">
  <!-- Navigation Bar -->
  <header>
      <div class="container">
          <div class="header-content">
              <div class="logo">
                  <img src="/image/sevinch-logo.png" alt="Sevinch Logo">
                  <div class="logo-text">Sevinch - 475-chi bolalar bog'chasi</div>
              </div>
              <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle menu">
                  <i class="fas fa-bars menu-icon"></i>
                  <i class="fas fa-times close-icon"></i>
              </button>
              <nav id="mainNav">
                  <ul>
                      <li><a href="{{route('home')}}">Home</a></li>
                      <li><a href="{{route('about')}}">Maktab haqida</a></li>
                      <!-- <li><a href="{{route('photo')}}">Yangiliklar</a></li> -->
                      <li><a href="{{route('teachers')}}">O'qituvchilar</a></li>
                      <li><a href="{{route('subject')}}">Dars jarayonlari</a></li>
                      <li><a href="{{route('achievements')}}">Yutuqlar</a></li>
                      <li><a href="{{route('contact')}}">Aloqa</a></li>
                  </ul>
              </nav>
          </div>
      </div>
  </header>

  <script>
      document.addEventListener('DOMContentLoaded', function() {
          const mobileMenuBtn = document.getElementById('mobileMenuBtn');
          const mainNav = document.getElementById('mainNav');
          const navLinks = mainNav.querySelectorAll('a');

          // Toggle menu on hamburger click
          mobileMenuBtn.addEventListener('click', function() {
              mainNav.classList.toggle('active');
              mobileMenuBtn.classList.toggle('active');
              // Prevent body scroll when menu is open
              if (mainNav.classList.contains('active')) {
                  document.body.style.overflow = 'hidden';
              } else {
                  document.body.style.overflow = '';
              }
          });

          // Close menu when clicking on a link (mobile)
          navLinks.forEach(link => {
              link.addEventListener('click', function() {
                  if (window.innerWidth <= 768) {
                      mainNav.classList.remove('active');
                      mobileMenuBtn.classList.remove('active');
                      document.body.style.overflow = '';
                  }
              });
          });

          // Close menu when clicking outside (mobile)
          document.addEventListener('click', function(event) {
              const isClickInsideNav = mainNav.contains(event.target);
              const isClickOnButton = mobileMenuBtn.contains(event.target);

              if (window.innerWidth <= 768 && !isClickInsideNav && !isClickOnButton && mainNav.classList.contains('active')) {
                  mainNav.classList.remove('active');
                  mobileMenuBtn.classList.remove('active');
                  document.body.style.overflow = '';
              }
          });

          // Handle window resize
          window.addEventListener('resize', function() {
              if (window.innerWidth > 768) {
                  mainNav.classList.remove('active');
                  mobileMenuBtn.classList.remove('active');
                  document.body.style.overflow = '';
              }
          });
      });
  </script>

  <!-- Hero Slider Section -->
  <section class="main-slider">
    <div class="main-slides">
      <!-- Slide 1 -->
      <div class="main-slide">
        <img src="/image/orig.jpeg" alt="Campus Building" class="w-full h-full object-cover">
        <div class="absolute inset-0 gradient-overlay flex flex-col items-center justify-center text-white">
          <p class="text-white mb-4 flex items-center font-light tracking-widest uppercase text-sm">
            <span class="mr-2"><i class="fas fa-graduation-cap"></i></span>
              bilim innovatsiyaga yo‘li
          </p>
            <h3 class="text-5xl md:text-6xl font-serif mb-10 text-center hero-text-shadow">Sevinch - 475-chi sonli bolalar bog'chasi bilan</h3>
            <h2 class="text-6xl md:text-7xl font-serif mb-4 text-center hero-text-shadow font-bold">Kelajagingni kashf et</h2>
          <p class="text-lg max-w-2xl text-center mb-12 font-light">Zehinlilarni tarbiyalaymiz, yetakchilarni voyaga yetkazamiz. Bugunoq jonli va faol akademik hamjamiyatimizga qo‘shiling.</p>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="main-slide">
        <img src="/image/photo_1_2025-03-24_00-16-14.jpg" alt="Student Life" class="w-full h-full object-cover">
        <div class="absolute inset-0 gradient-overlay flex flex-col items-center justify-center text-white">
          <p class="text-white mb-4 flex items-center font-light tracking-widest uppercase text-sm">
            <span class="mr-2"><i class="fas fa-users"></i></span>
              Birlik va mukammallik
          </p>
            <h3 class="text-5xl md:text-6xl font-serif mb-10 text-center hero-text-shadow">Biz bilan</h3>
            <h2 class="text-6xl md:text-7xl font-serif mb-4 text-center hero-text-shadow font-bold">O‘z ishtiyoqingni angla</h2>
          <p class="text-lg max-w-2xl text-center mb-12 font-light">Huradan tortib fanlargacha – bizning qo‘llab-quvvatlovchi muhitimizda o‘z yo‘lingizni toping.</p>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="main-slide">
        <img src="/image/photo_6_2025-03-24_00-16-14.jpg" alt="Research Lab" class="w-full h-full object-cover">
        <div class="absolute inset-0 gradient-overlay flex flex-col items-center justify-center text-white">
          <p class="text-white mb-4 flex items-center font-light tracking-widest uppercase text-sm">
            <span class="mr-2"><i class="fas fa-microscope"></i></span>
              Tadqiqot va innovatsiya
          </p>
          <h2 class="text-6xl md:text-7xl font-serif mb-4 text-center hero-text-shadow font-bold">Ertangi kuningni</h2>
          <h3 class="text-5xl md:text-6xl font-serif mb-10 text-center hero-text-shadow">Bugun qur</h3>
          <p class="text-lg max-w-2xl text-center mb-12 font-light">Zamonaviy jihozlangan infratuzilmamiz ilg‘or tadqiqotlar va innovatsiyalarni qo‘llab-quvvatlaydi.</p>
        </div>
      </div>
    </div>

    <!-- Navigation Dots -->
    <div class="absolute bottom-12 left-0 right-0 flex justify-center space-x-6">
      <div class="flex space-x-2 slide-dots">
        <span class="w-8 h-2 bg-white rounded-full bg-opacity-80 dot active" data-index="0"></span>
        <span class="w-2 h-2 bg-white rounded-full bg-opacity-50 dot" data-index="1"></span>
        <span class="w-2 h-2 bg-white rounded-full bg-opacity-50 dot" data-index="2"></span>
      </div>
    </div>

    <!-- Navigation Arrows -->
    <button class="slider-prev absolute left-6 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white bg-opacity-10 backdrop-blur-sm rounded-full border border-white text-white flex items-center justify-center focus:outline-none hover:bg-white hover:bg-opacity-20 transition-all duration-300">
      <i class="fas fa-chevron-left"></i>
    </button>
    <button class="slider-next absolute right-6 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white bg-opacity-10 backdrop-blur-sm rounded-full border border-white text-white flex items-center justify-center focus:outline-none hover:bg-white hover:bg-opacity-20 transition-all duration-300">
      <i class="fas fa-chevron-right"></i>
    </button>
  </section>


  <section class="py-20 bg-gray-50" x-data="{ showModal: false, imageUrl: '' }">
      <div class="container mx-auto px-4">
          <h3 class="text-4xl font-extrabold text-blue-900 mb-12 text-center">Tadbir Rasmlari</h3>

          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-10">
              @foreach($qabulrasmis as $rasm)
                  <div class="bg-white shadow-2xl rounded-3xl p-6 hover:shadow-3xl transition-shadow duration-300">
                      <div class="w-full aspect-[4/5] overflow-hidden rounded-2xl border-2 border-blue-200 cursor-pointer"
                           @click="showModal = true; imageUrl = '{{ asset('storage/' . $rasm->image) }}'">
                          <img src="{{ asset('storage/' . $rasm->image) }}"
                               alt="Qabul rasmi"
                               class="w-full h-full object-cover hover:scale-110 transition-transform duration-500 rounded-2xl">
                      </div>
                  </div>
              @endforeach
          </div>
      </div>

      <!-- Modal -->
      <div x-show="showModal"
           class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50"
           x-transition>
          <div class="relative">
              <button @click="showModal = false"
                      class="absolute top-2 right-2 text-white text-3xl font-bold">&times;</button>
              <img :src="imageUrl" class="max-w-screen-md max-h-screen rounded-xl border-4 border-white">
          </div>
      </div>
  </section>

  <!-- About Section -->
  <section id="about" class="bg-gray-100 py-12">
    <div class="container mx-auto px-6">
      <div class="bg-white rounded-lg shadow-lg p-8">
        <h2 class="text-4xl font-bold text-unipix-blue text-center mb-8">Biz Haqimizda</h2>
        <p class="text-gray-600 text-lg mb-6">
            Sevinch - 475-chi sonli bolalar bog'chasi ta'lim, innovatsiya va rivojlanish markazi. Bizning asosiy maqsadimiz nafaqat bolalarga bilim berish, balki ularni kelajakdagi muvaffaqiyatli hayotga tayyorlashdir.
        </p>
        <h3 class="text-2xl font-semibold text-unipix-blue mb-4">Bizning Afzalliklarimiz</h3>
        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
          <li><strong>Professional tarbiyachilar:</strong>Bog'chamiz o'z sohalari bo'yicha yuqori malakaga ega bo'lgan tajribali pedagoglar.</li>
          <li><strong>Innovatsion metodologiyalar:</strong> O'qitish zamonaviy texnologiyalar va interfaol ta'lim usullaridan foydalangan holda amalga oshiriladi.</li>
          <li><strong>Amaliy o'quv jarayoni:</strong> Haqiqiy loyihalar va amaliy mashg'ulotlar orqali nazariy bilimlarni mustahkamlash imkoniyati.</li>
          <li><strong>Global yondashuv:</strong> Talabalarga xalqaro standartlarga javob beradigan bilim va ko'nikmalar beriladi.</li>
        </ul>
        <h3 class="text-2xl font-semibold text-unipix-blue mb-4">Bizning Tariximiz</h3>
        <p class="text-gray-600 text-lg mb-6">
            2023 yilda tashkil etilgan Sevinch - 475-chi sonli bolalar bog'chasi O'zbekiston yoshlariga sifatli ta'lim berish maqsadida tashkil etilgan. 450 nafar bolaga mo'ljallangan bog'cha milliy ta'lim standartlariga asoslangan zamonaviy o'quv muhitini taklif etadi. Sevinch bog'chasi bolalarni kuchli ilmiy asoslar va professional ustozlik orqali akademik maqsadlariga va kelajakdagi hayotiga erishishda g'urur bilan qo'llab-quvvatlaydi.
        </p>
        <h3 class="text-2xl font-semibold text-unipix-blue mb-4">Bizning Missiyamiz</h3>
        <p class="text-gray-600 text-lg mb-6">
            Bizning vazifamiz bolalarga akademik salohiyati va shaxsiy o'sishini ta'minlaydigan yuqori sifatli ta'lim berishdir. Biz bolalar fan va ijod bo'yicha chuqur bilim olishlari mumkin bo'lgan dinamik o'quv muhitini ta'minlashga intilamiz.
        </p>
      </div>
    </div>
  </section>

  <!-- Team Section -->
  <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
          <h3 class="text-3xl font-bold text-blue-900 mb-10 text-center">Sevinch 475 Rahbariyati</h3>

          <div class="swiper teacherSwiper">
              <div class="swiper-wrapper">
                  @foreach($homes as $home)
                      <div class="swiper-slide">
                          <div class="staff-card relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-6 text-center max-w-xs mx-auto cursor-pointer transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl"
                               data-name="{{ e($home->name) }}"
                               data-role="{{ e($home->subject) }}"
                               data-bio="{{ e($home->bio) }}"
                               data-image="{{ asset('storage/' . $home->image) }}">
                              <div class="w-28 h-28 mx-auto mb-4 overflow-hidden rounded-full border-4 border-blue-200 bg-blue-50">
                                  <img src="{{ asset('storage/' . $home->image) }}"
                                       class="w-full h-full object-cover"
                                       alt="{{ $home->name }}">
                              </div>
                              <h4 class="text-xl font-semibold text-blue-900">{{ $home->name }}</h4>
                              <p class="text-blue-600 font-medium">{{ $home->subject }}</p>
                              <p class="text-gray-600 text-sm mt-2 line-clamp-3">{{ $home->bio }}</p>
                          </div>
                      </div>
                  @endforeach
              </div>
          </div>
      </div>

      <div id="staffModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/90 p-6">
          <div class="relative w-full max-w-5xl overflow-hidden rounded-[2rem] bg-white shadow-2xl">
              <button id="staffModalClose" class="absolute right-6 top-6 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white text-slate-600 shadow-lg transition hover:bg-red-50 hover:text-red-600">
                  <i class="fas fa-times text-2xl"></i>
              </button>

              <div class="md:flex">
                  <div class="md:w-1/3 bg-gradient-to-b from-blue-50 to-white p-10 text-center">
                      <div class="relative mx-auto mb-8 h-72 w-72 overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-2xl">
                          <img id="staffModalImage" src="" alt="Staff image" class="h-full w-full object-cover">
                      </div>
                      <h3 id="staffModalName" class="text-3xl font-black text-blue-900 leading-tight mb-3"></h3>
                      <p id="staffModalRole" class="mx-auto inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm uppercase tracking-[0.2em] text-white shadow-lg"></p>
                      <div class="mt-10 inline-flex w-full items-center justify-center gap-3 rounded-2xl bg-yellow-400 px-8 py-4 text-sm font-black uppercase tracking-widest text-blue-900 shadow-xl transition hover:bg-yellow-500">
                          <i class="fas fa-phone-alt text-xl"></i>
                          Bog'lanish
                      </div>
                  </div>

                  <div class="md:w-2/3 p-10 md:p-14">
                      <div class="grid gap-4 sm:grid-cols-2 mb-10">
                          <div class="rounded-3xl border border-blue-100 bg-blue-50 p-6 text-left">
                              <p class="text-[10px] font-black uppercase tracking-widest text-blue-600 mb-2">Tajrib</p>
                              <p class="text-lg font-bold text-blue-900">10+ yillik malaka</p>
                          </div>
                          <div class="rounded-3xl border border-yellow-100 bg-yellow-50 p-6 text-left">
                              <p class="text-[10px] font-black uppercase tracking-widest text-yellow-600 mb-2">Tillar</p>
                              <p class="text-lg font-bold text-blue-900">O'zbek, Rus</p>
                          </div>
                      </div>

                      <h4 class="mb-6 text-2xl font-black text-blue-900 uppercase tracking-widest">Biografiya</h4>
                      <p id="staffModalBio" class="text-gray-600 text-lg leading-relaxed"></p>

                      <div class="mt-10 flex flex-wrap gap-3">
                          <span class="rounded-full border border-slate-200 bg-slate-50 px-5 py-3 text-sm font-bold text-slate-700">Oliy ma'lumotli</span>
                          <span class="rounded-full border border-slate-200 bg-slate-50 px-5 py-3 text-sm font-bold text-slate-700">Toifali mutaxassis</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- SwiperJS Script -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script>
      const swiper = new Swiper('.teacherSwiper', {
          slidesPerView: 3,
          spaceBetween: 30,
          loop: true,
          autoplay: {
              delay: 2500,
              disableOnInteraction: false
          },
          breakpoints: {
              0: {
                  slidesPerView: 1
              },
              768: {
                  slidesPerView: 2
              },
              1024: {
                  slidesPerView: 3
              }
          }
      });

      document.addEventListener('DOMContentLoaded', function () {
          const staffCards = document.querySelectorAll('.staff-card');
          const staffModal = document.getElementById('staffModal');
          const staffModalClose = document.getElementById('staffModalClose');
          const staffModalImage = document.getElementById('staffModalImage');
          const staffModalName = document.getElementById('staffModalName');
          const staffModalRole = document.getElementById('staffModalRole');
          const staffModalBio = document.getElementById('staffModalBio');

          staffCards.forEach(card => {
              card.addEventListener('click', function () {
                  staffModalImage.src = card.dataset.image;
                  staffModalName.textContent = card.dataset.name;
                  staffModalRole.textContent = card.dataset.role;
                  staffModalBio.textContent = card.dataset.bio;
                  staffModal.classList.remove('hidden');
              });
          });

          staffModalClose.addEventListener('click', function () {
              staffModal.classList.add('hidden');
          });

          staffModal.addEventListener('click', function (event) {
              if (event.target === staffModal) {
                  staffModal.classList.add('hidden');
              }
          });
      });
  </script>


  <!-- JS for Auto Sliding -->
  <script>
      const slider = document.getElementById("team-slider");
      const prevBtn = document.getElementById("team-prev");
      const nextBtn = document.getElementById("team-next");
      let scrollAmount = 0;
      const scrollStep = 300;

      function scrollNext() {
          if (scrollAmount >= slider.scrollWidth - slider.clientWidth) {
              scrollAmount = 0;
          } else {
              scrollAmount += scrollStep;
          }
          slider.scrollTo({ left: scrollAmount, behavior: "smooth" });
      }

      function scrollPrev() {
          scrollAmount -= scrollStep;
          if (scrollAmount < 0) {
              scrollAmount = slider.scrollWidth - slider.clientWidth;
          }
          slider.scrollTo({ left: scrollAmount, behavior: "smooth" });
      }

      nextBtn.addEventListener("click", scrollNext);
      prevBtn.addEventListener("click", scrollPrev);

      setInterval(scrollNext, 4000); // har 4 sekundda avtomatik suriladi
  </script>


  <!-- Footer -->
  <!-- Footer with improved design -->
      <x-footer></x-footer>


  <!-- JavaScript for Sliders -->
  <script>
    // Main Hero Slider
    const mainSlides = document.querySelector('.main-slides');
    const mainSlideCount = document.querySelectorAll('.main-slide').length;
    const dots = document.querySelectorAll('.dot');
    const prevButton = document.querySelector('.slider-prev');
    const nextButton = document.querySelector('.slider-next');
    let currentMainSlide = 0;

    function updateMainSlider() {
      mainSlides.style.transform = `translateX(-${currentMainSlide * 100}%)`;
      dots.forEach((dot, index) => {
        dot.classList.toggle('active', index === currentMainSlide);
        dot.classList.toggle('w-8', index === currentMainSlide);
        dot.classList.toggle('w-2', index !== currentMainSlide);
      });
    }

    nextButton.addEventListener('click', () => {
      currentMainSlide = (currentMainSlide + 1) % mainSlideCount;
      updateMainSlider();
    });

    prevButton.addEventListener('click', () => {
      currentMainSlide = (currentMainSlide - 1 + mainSlideCount) % mainSlideCount;
      updateMainSlider();
    });

    dots.forEach(dot => {
      dot.addEventListener('click', () => {
        currentMainSlide = parseInt(dot.dataset.index);
        updateMainSlider();
      });
    });

    // Auto-slide every 5 seconds
    setInterval(() => {
      currentMainSlide = (currentMainSlide + 1) % mainSlideCount;
      updateMainSlider();
    }, 5000);

    // Team Slider
    const teamSlides = document.querySelector('.slides2');
    const teamPrev = document.getElementById('team-prev');
    const teamNext = document.getElementById('team-next');
    const teamSlideWidth = 264; // Width of each team member card (240px + 24px gap)
    const teamVisibleSlides = 3; // Number of visible slides
    let currentTeamSlide = 0;
    const totalTeamSlides = document.querySelectorAll('.slides2 > div').length;

    teamNext.addEventListener('click', () => {
      if (currentTeamSlide < totalTeamSlides - teamVisibleSlides) {
        currentTeamSlide++;
        teamSlides.style.transform = `translateX(-${currentTeamSlide * teamSlideWidth}px)`;
      }
    });

    teamPrev.addEventListener('click', () => {
      if (currentTeamSlide > 0) {
        currentTeamSlide--;
        teamSlides.style.transform = `translateX(-${currentTeamSlide * teamSlideWidth}px)`;
      }
    });
  </script>
</body>
</html>
