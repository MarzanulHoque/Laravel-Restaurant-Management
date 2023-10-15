<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')
    <style>
        .div_center{

            text-align: center;
            padding-top:10px;
        }
        .h2_font{
            font-size: 40px;
            padding-bottom: 10px;
        }
    </style>

  </head>
  <body>
    <div class="container-scroller">

        @if (session()->has('message'))

            <script>alert( '{{ session()->get('message') }}' )
            </script>

        @endif

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->

      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="div_center">
                    <h2 class="h2_font">Add Food Menu</h2>
                </div>
            <div style="position: relative; top:60px; right:-150px">

                <form action="{{  url('/update_food',$food->id) }}" method="post" enctype="multipart/form-data">
                 @csrf
                    <div class="mt-4">
                        <label for="">Title</label>
                        <input type="text" style="color: black"  name="title" id="" value="{{ $food->title }}" required>
                    </div>
                    <div class="mt-4">
                        <label for="">Price</label>
                        <input type="number" style="color: black"  name="price" id="" value="{{ $food->price }}" required>
                    </div>
                    <div class="mt-4">
                        <label for="">Description</label>
                        <input type="text" style="color: black"  name="desc" id="" value="{{ $food->description }}" required>
                    </div>

                    <div class="mt-4">
                        <label for="">Previous Image</label>
                        <img style="height: 150px; width:150px" src="/foodimage/{{ $food->image }}" alt="">
                    </div>

                    <div class="mt-4">
                        <label for="">Image</label>
                        <input type="file"  name="image" value="{{ $food->image }}">
                    </div>

                    <div class="mt-4">
                        <input type="submit" class="btn btn-primary" placeholder="Save">
                    </div>

                </form>
            </div>
            <br>
            <br>
            <br>

            </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2023</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
     @include('admin.script')
    <!-- End custom js for this page -->
  </body>

</html>
