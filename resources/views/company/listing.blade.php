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
            {{ __('company.title') }}

            <a href="{{ route('company.create') }}" class="btn btn-primary btn-sm pull-right float-right"> {{ __('company.add') }} {{ __('company.title') }}</a>
          </div>
          <div class="card-body">
            @if(session()->has('success'))
                <div class="alert alert-success">
                  

                    {{ __('company.deleted_msg') }}
                    
                </div>
            @endif

            <div class="table-responsive">
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>{{ __('company.name') }}</th>
                    <th>{{ __('company.email') }}</th>
                    <th>{{ __('company.logo') }}</th>
                    <th>{{ __('company.action') }}</th>
                  </tr>
                </thead>
              
                <tbody>

                  @foreach ($companies as $company)

                   <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td> <img src='{{ ($company->logo !="")? URL::To("public/".Storage::url($company->logo))   :"" }}'> </td>
                    <td>
                      <a class="btn btn-primary btn-sm" href="{{route('company.edit',$company->company_id)}}">Edit</a>

                      <form action="{{ route('company.destroy', $company->company_id) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-danger btn-sm">Delete</button>
                      </form>

                      
                    </td>
                  
                  </tr>
                      
                  @endforeach

                  {{ $companies->links() }}
                 
                 
                </tbody>
              </table>
            </div>
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