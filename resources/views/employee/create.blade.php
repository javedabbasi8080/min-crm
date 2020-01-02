 <!-- header -->
 @include('layouts.header')

 <div id="wrapper">

    <!-- Sidebar -->
   @include('layouts.sidebar')

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">{{ __('employee.title') }}</a>
          </li>
          <li class="breadcrumb-item active">{{ __('employee.add') }}</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            {{ __('employee.title') }}
            
          </div>
          <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

             @if(session()->has('success'))
                <div class="alert alert-success">
       
                    {{ __('employee.added_msg') }}
                </div>
            @endif

            <form method="post" action="{{url('employee')}}" enctype="multipart/form-data">
                @csrf

              <fieldset>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="">{{ __('employee.first_name') }}</label>
                  <input type="text" id="" name="first_name" class="form-control" placeholder="{{ __('employee.first_name') }}" value="{{ old('first_name') }}">
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                  <label for="lastname">{{ __('employee.last_name') }}</label>
                  <input type="text" id="lastname" class="form-control" name="last_name" placeholder="{{ __('employee.last_name') }}" value="{{ old('last_name') }}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">{{ __('employee.email') }}</label>
                  <input type="text" id="email" class="form-control" name="email" placeholder="{{ __('employee.email') }}" value="{{ old('email') }}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone">{{ __('employee.phone') }}</label>
                  <input type="text" id="phone" class="form-control" name="phone" placeholder="{{ __('employee.phone') }}" value="{{ old('phone') }}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="lastname">{{ __('employee.company') }} </label>
                  <select name="company"  class="form-control">
                    <option value="">Select</option>
                    @foreach($companies as $company)
                      <option value="{{ $company->company_id }}">{{ $company->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
                
              <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </fieldset>
            </form>

          </div>
         
        </div>

       

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->


  @include('layouts.footer')