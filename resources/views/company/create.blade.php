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
            <a href="#">{{ __('company.title') }}</a>
          </li>
          <li class="breadcrumb-item active">{{ __('company.add') }}</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>


            {{ __('company.title') }}</div>
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
                    {{ __('company.added_msg') }}
                </div>
            @endif

            <form method="post" action="{{url('company')}}" enctype="multipart/form-data">
                @csrf

              <fieldset>
                <div class="form-group">
                  <label for="name">{{ __('company.name') }}</label>
                  <input type="text" id="Name" name="name" class="form-control" placeholder="{{ __('company.name') }}">
                </div>


                <div class="form-group">
                  <label for="email">{{ __('company.email') }}</label>
                  <input type="text" id="email" class="form-control" name="email" placeholder="{{ __('company.email') }}">
                </div>

                <div class="form-group">
                  <label for="logo">{{ __('company.logo') }}  ( 100x100 )</label>
                  <input type="file" id="logo" class="" name="logo">
                </div>
                
                

                <button type="submit" class="btn btn-primary">{{ __('company.submit') }} </button>
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