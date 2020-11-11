@extends('admin.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                   <a href="{{ route('adminProducts.create') }}" class="btn btn-success">Add New Product</a>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>SKE</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($products as $product)   
                        <tr>
                            <td>
                                <img class="img-thumbnail" style="max-width:140px; max-height:140px" src={{asset('storage/'.$product->image)}} alt=""  />
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->SKE}}</td>
                            <td>
                              <div class="row">
                              <a href="products/{{$product->id}}/edit" class="btn btn-primary ml-2">Edit</a>
                              <form action="/admin/products/{{$product->id}}" method="POST">
                                  @method('DELETE')
                                  @csrf
                                  <button class="btn btn-danger ml-2" type="submit">Delete</button>
                              </form>
                              </div>
                             
                            </td>
                        </tr>        
                   @endforeach    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div> 
      </div><!-- /.container-fluid -->
    </section>
</div>

@endsection