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

            <a href="{{ route('employee.create') }}" class="btn btn-primary btn-sm pull-right float-right"> {{ __('employee.add') }} {{ __('employee.title') }}</a>
            
          </div>
          <div class="card-body">
            @if(session()->has('success'))
                <div class="alert alert-success">
                   {{ __('employee.deleted_msg') }}
                </div>
            @endif
            <div class="table-responsive">
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th> {{ __('employee.first_name') }}</th>
                    <th> {{ __('employee.last_name') }}</th>
                    <th> {{ __('employee.company') }}</th>
                    <th>Action</th>
                  </tr>
                </thead>
              
                <tbody>

                  @foreach ($employees as $employee)

                   <tr>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->company_name }} </td>
                    <td>
                      <a class="btn btn-primary btn-sm" href="{{route('employee.edit',$employee->employee_id)}}">Edit</a>

                      <form action="{{ route('employee.destroy', $employee->employee_id) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-danger btn-sm">Delete</button>
                      </form>

                      
                    </td>
                  
                  </tr>
                      
                  @endforeach

                  {{ $employees->links() }}
                 
                 
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