<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe</title>
<!--

TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

     <style>
        .div_center{

            text-align: center;
            padding-top:10px;
            margin-top: 40px;
        }
        .h2_font{
            margin-top: 40px;

            font-size: 40px;
            padding-bottom: 10px;
        }
    </style>

    </head>

    <body>

        @if (session()->has('message'))

            <script>
                alert('{{ session()->get('message') }}')
            </script>


        @endif

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>


                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
                            <li class="scroll-to-section"><a href="#">Contact Us</a></li>

                            <li class="scroll-to-section"><a href="{{ url('/showcart',Auth::user()->id) }}">

                                @auth
                                    Cart[{{ $count }}]
                                @endauth

                            </a>
                                @guest
                                 Cart[0]
                                @endguest

                        </li>
                            <li>
                                @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                     <li>
                                        <x-app-layout>

                                        </x-app-layout>
                                     </li>
                                      @else
                                        <li>
                                            <a href="{{ url('/login') }}" class="text-sm text-gray-700 underline">Login</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li>
                                                <a href="{{ url('/register') }}" class="text-sm text-gray-700 underline">Register</a>
                                            </li>
                                        @endif
                                    @endauth
                                </div>


                                @endif
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->

    <div class="main-panel">
          <div class="content-wrapper">

            <div class="div_center">
                    <h2 class="h2_font">All Orders</h2>
            </div>

            <div class="container">
                    <table class="table table-striped table-dark">
                            <thead>
                                <tr align="center">
                                    <th >Food Name </th>
                                    <th >Price</th>
                                    <th >Quantity</th>
                                    <th >Image</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr align="center">
                                    <td> {{ $item->title }} </td>
                                    <td> ${{ $item->price }} </td>
                                    <td> {{ $item->quantity }} </td>
                                    <td> <img height="70" width="55" style="border-radius: 10px; " src="/foodimage/{{ $item->image }}" alt=""> </td>
                                    <td>
                                        <a href="{{ url('/update_view',$item->id) }}" class="btn btn-primary">Update</a>
                                        <a onclick="return confirm('Are You Sure To Delete This ?')" href=" {{ url('/delete_food',$item->id) }}" class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                    </table>
            </div>

          </div>






    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);

            });
        });

    </script>
  </body>
</html>
