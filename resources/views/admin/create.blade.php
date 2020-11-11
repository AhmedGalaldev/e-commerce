@extends('admin.admin')
@section('content')
<div class="content-wrapper">
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form action="{{route('adminProducts.store')}}" method="POST" enctype="multipart/form-data">
                
                
               @include('admin.form')
              </form>
            </div>
          </div>
        </div>
      </div>
</section> 
</div> 
             
 @endsection           