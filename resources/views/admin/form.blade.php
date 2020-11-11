 <div class="card-body">
                  <div class="form-group">
                    <div class="text-danger">{{$errors->first('name')}}</div>
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" >
                  </div>
                  <div class="form-group">
                      <div class="text-danger">{{$errors->first('description')}}</div>
                    <label for="Description">Description</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter Description" name="description">
                  </div>
                  <div class="form-group">
                    <div class="text-danger">{{$errors->first('SKE')}}</div> 
                    <label for="Description">SKE</label>
                    <input type="text" class="form-control" id="SKE" placeholder="Enter SKE" name="SKE">
                  </div>
                  <div class="form-group">
                    <div class="text-danger">{{$errors->first('price')}}</div> 
                    <label for="Description">Price</label>
                    <input type="number" class="form-control" id="SKE" placeholder="Enter Price" name="price">
                  </div>
                  <div class="form-group">
                    <div class="text-danger">{{$errors->first('image')}}</div>
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                  </div>
                </div>
            <div class="card-footer">
         <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    @csrf