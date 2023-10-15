<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')


  </head>
  <body>
    <div class="container-scroller">

        @if (session()->has('message'))
            <script>
                alert('{{ session()->get('message') }}')
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


                <center>
                    <h1 style="font-size: 40px ; margin-bottom:20px">Update Chef</h1>

                    <form action="{{  url('/update_chef',$chef->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label>Name</label>
                            <input style="color: black; margin-bottom:10px" type="text" name="name" value="{{ $chef->name }}">
                        </div>

                        <div>
                            <label>Speciality</label>
                            <input style="color: black; margin-bottom:10px" type="text" name="speciality" value="{{ $chef->speciality }}">
                        </div>
                        <div>
                            <label for="">Old Image</label>
                            <img class="rounded" height="200" width="200" src="/chefimage/{{ $chef->image }}" alt="">
                        </div>
                        <br>
                        <div>

                            <input type="file" name="image" >

                        </div>

                        <div>
                            <input type="submit" class="btn btn-primary btn-lg" style="font-size: 20px; margin-top:10px" value="Update Info">
                        </div>

                    </form>



                </center>


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
