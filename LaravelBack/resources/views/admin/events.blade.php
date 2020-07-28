<!DOCTYPE html>
<html lang="en">

@include('admin.layout.header')
<link rel="stylesheet" href="/css/app.css">

<body id="page-top">

  <div id="wrapper">

  @include('admin.layout.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">

      
      <div id="content">

        @include('admin.layout.topbar')
        

                <div class="container-fluid">


                    <div class="card-body">

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        

                        
                    
                    </div>
        </div>

        <div class="col-12">
        
      </div>
      </div>

    </div>

  </div>


  @include('admin.layout.footer')

</body>

</html>







