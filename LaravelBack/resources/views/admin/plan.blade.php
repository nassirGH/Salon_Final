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
                  
                  <h1 class="h3 mb-4 text-gray-800">My plans</h1>

                    <div class="card-body">


                      <div class="field">
                        <label class="mb-7 text-gray-800">Content</label>  
                        <div class="control">
                              <ul>
                                &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                <li>Multi Purpose Booking</li>
                                <li>Easy Appointment Scheduling</li>
                                <li>Powerful Admin Panel</li>
                                <li>Dynamic Schedules and Day-Offs</li>
                                <li>Dynamic Category</li>



                              </ul>
              
                          </div>                         
                        </div>
                      <br/>


               



                      <div class="field">
                        <label class="mb-7 text-gray-800">Service Categories </label>
                        <div class="control">
                            <div class="select">
                                <select name="category" required>
                                    <option value="" disabled selected>Categories</option>
                                    <option value="Brushing" {{ old('category') === 'Brushing' ? 'selected' : null }}>Brushing</option>
                                    <option value="Hair Cut" {{ old('category') === 'Hair Cut' ? 'selected' : null }}>Hair Cut</option>
                                    <option value="Massage" {{ old('category') === 'Massage' ? 'selected' : null }}>Massage</option>
                                    <option value="Make Up" {{ old('category') === 'Make Up' ? 'selected' : null }}>Make Up</option>
                                </select>
                            </div>
                        </div>

                      
                    </div>











                        
                    
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







    