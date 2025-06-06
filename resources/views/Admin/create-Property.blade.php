<x-admin.layout>
    <h4 class="page-title">Form</h4>
    <div class="row">
    <div class="col-md-6">
        <div class="card">
            
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                    <label for="">Property Name</label>
                    <input type="text" class="form-control" id="" placeholder="Enter " name="property_name" value="sss">
                    <small id="" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Upload Image</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="upload_image">
                </div>
            </div>
           
            <div class="card-action">
                <button class="btn btn-success">Submit</button>
                <button class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </form>
        </x-admin.layout>