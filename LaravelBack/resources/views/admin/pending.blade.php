<!DOCTYPE html>
<html lang="en">
    
@include('admin.layout.header')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  @include('admin.layout.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('admin.layout.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Pending Appointments</h1>
          <div class="card-header"><i><span>pending bookings to approve</span></i></div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                              <tr>
                                <th>Client Name</th>
                                <th>Booking ID</th>
                                <th>Booking Date</th>
                                <th>Service Type</th>
                                <th>Actions</th>  

                             </tr>
                            </thead> 
                          
                            @forelse ($bookings as $booking)
                          

                            <tr>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->id }}</td>
                               
                                <td>{{ $booking->date }}</td>
                                <td>{{ $booking->serviceTypes->name}}</td>  
                                       
                                <td>
      
                                  <i class="fa fa-edit" data-toggle="modal" data-target="#editUser-{{$booking->id}}" data-target-id="{{ $booking->id }}"></i>&nbsp;
                                  <a href=""{{ route('deletebooking', $booking->id) }}"" data-toggle="modal" data-target="#DeleteModal-{{$booking->id}}"><i class="fa fa-trash"></i></a>                     




                            <div id="DeleteModal-{{$booking->id}}" class="modal fade" role="dialog">
                              <div class="modal-dialog ">
                                <!-- Modal content-->
                                <form action="" id="deleteForm-{{$booking->id}}" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                           
                                        </div>
                                        <div class="modal-body">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <p class="text-center">Are You Sure Want To Ban This Booking ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <center>
                                              <button type="submit" name="" class="btn btn-primary" data-dismiss="modal" onclick="formSubmit({{$booking->id}})">Yes, Delete</button>
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          </center>
                                      </div>
                                  </div>
                              </form>
                            </div>
                            </div>




                            <div class="modal fade" id="editUser-{{$booking->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Booking</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form>Upon {{$booking->user->name}} request. I would like to accept 
                                      <div class="modal-body">
                                      Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$booking->user->name}}<br/><br/>
                                      Type Of Service &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $booking->serviceTypes->name }}<br/><br/>
                                      Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $booking->created_at }}<br/><br/>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <label class="radio" for="penyakit-0">
                                    <input name="penyakit" id="penyakit-0" value="Asma" type="radio">
                                        Accept
                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label class="radio" for="penyakit-0">
                                        <input name="penyakit" id="penyakit-0" value="Asma" type="radio">
                                            Reject
                                        </label>
                                    <br/><br/><br/><br/>
                                                                       
                                     &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary"  data-dismiss="modal">Save changes</button>
                                     &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                                
                                </td>
                                <td>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No Bookings found.</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
    </div>
    <!-- /.container-fluid -->

    <div class="col-12">
    
      
  </div>
  </div>
  <!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->


@include('admin.layout.footer')

</body>

</html>






<script type="text/javascript">
function deleteData(id)
 {
     var id = id;
     var url = '{{ route("deleteUsers", ":id") }}';
     url = url.replace(':id', id);
     $("#deleteForm-" + id).attr('action', url);
 }

 function formSubmit(id)
 {
      deleteData(id);
     $("#deleteForm-" + id).submit();
 }





</script>


