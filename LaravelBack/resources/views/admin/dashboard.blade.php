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
          <h1 class="h3 mb-4 text-gray-800">Users</h1>
          <div class="card-header">Users List</div>

                    <div class="card-body">

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Phone number</th>                              
                                <th>Actions</th>                          
                            </tr>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone_number }}</td> 
                                                                    
                                    <td>
                                    <i class="fa fa-eye" data-toggle="modal"  data-target="#viewUser-{{$user->id}}" data-target-id="{{ $user->id }}"></i>&nbsp;
                                      <i class="fa fa-edit" data-toggle="modal" data-target="#editUser-{{$user->id}}" data-target-id="{{ $user->id }}"></i>&nbsp;
                                    
                                                         
                                      <a href="{{ route('deleteUsers', $user->id) }}" data-toggle="modal"
                                data-target="#DeleteModal-{{$user->id}}"><i class="fa fa-trash"></i>
                                      </a>                     

                                <div id="DeleteModal-{{$user->id}}" class="modal fade" role="dialog">
                                  <div class="modal-dialog ">
                                    <!-- Modal content-->
                                    <form action="" id="deleteForm-{{$user->id}}" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                               
                                            </div>
                                            <div class="modal-body">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <p class="text-center">Are You Sure Want To Ban This User ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <center>
                                                  <button type="submit" name="" class="btn btn-primary" data-dismiss="modal" onclick="formSubmit({{$user->id}})">Yes, Delete</button>
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                              </center>
                                          </div>
                                      </div>
                                  </form>
                                </div>
                                </div>
                                <div class="modal fade" id="editUser-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form>Edit {{$user->name}} Informations
                                          <div class="modal-body">
                                         Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <input type="text"><br/><br/>
                                         Phone number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text"><br/><br/>
                                           
                                                                           
                                         &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary"  data-dismiss="modal">Save changes</button>
                                         &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                                    <div class="modal fade" id="viewUser-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">View User </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <form>
                                              username &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$user->name}}<br/><hr/>
                                              Phone number &nbsp;&nbsp;&nbsp;&nbsp;{{$user->phone_number}}<br/><hr/>
                                              Registered At &nbsp;&nbsp;&nbsp;&nbsp;{{$user->created_at}}<br/><hr/>
                                            </form>

                                          </div>

                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                    <td colspan="4">No users found.</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
        </div>
        <!-- /.container-fluid -->

        <div class="col-12">
          {{ $users->links() }}
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


