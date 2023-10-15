<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
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
                    <h1 style="font-size: 40px ; margin-bottom:20px">Add Chef</h1>

                    <form action="{{ url('/uploadchef') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label>Name</label>
                            <input style="color: black; margin-bottom:10px" type="text" name="name" placeholder="Enter Chef Name">
                        </div>

                        <div>
                            <label>Speciality</label>
                            <input style="color: black; margin-bottom:10px" type="text" name="speciality" placeholder="Enter Chef Speciality">
                        </div>

                        <div>

                            <input type="file" name="image" >

                        </div>

                        <div>
                            <input type="submit" class="btn btn-primary btn-lg" style="font-size: 20px; margin-top:10px" value="Save">
                        </div>

                    </form>



                </center>


             <div class="div_center">
                    <h2 class="h2_font">Chef List</h2>
            </div>

            <div class="container">
                    <table class="table table-striped table-dark">
                            <thead>
                                <tr align="center">
                                    <th >Chef Name </th>
                                    <th >Chef's Speciality</th>
                                    <th >Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr align="center">
                                    <td> {{ $item->name }} </td>
                                    <td> {{ $item->speciality }} </td>
                                    <td> <img class="rounded" src="/chefimage/{{ $item->image }}" alt=""> </td>
                                    <td>
                                        <a href="{{ url('/updatechef',$item->id) }}" class="btn btn-inverse-primary">Update</a>
                                        <a onclick="return confirm('Are You Sure To Delete This ?')" href=" {{ url('/delete_chef',$item->id) }}" class="btn btn-inverse-danger">Delete</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                    </table>
            </div>



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
