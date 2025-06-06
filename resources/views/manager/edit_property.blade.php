<x-manager.layout>
    <h4 class="page-title">Forms</h4>
    <div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Base Form Control</div>
            </div>
            <div class="card-body">
                <form action="{{ route('manager.update',$property->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                <div class="form-group">
                    <label for="">Property Name</label>
                    <input type="text" class="form-control" id="" placeholder="Enter" name="uproperty_name" value="{{old('uproperty_name',$property->property_name)}}">
                    <small id="" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Upload Image</label>
                    <img src="{{Storage::url($property->upload_image) }}"width="50" height="50">
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="upload_image"  onchange="previewImage(event)" value="{{ old($property->upload_image,'upload_image')}}">
                    <img id="image-preview" src="#" alt="" width="50" height="50">
                </div>
            </div>
           
            <div class="card-action">
                <button class="btn btn-success">Submit</button>
                <button class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </form>
                {{-- <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group form-inline">
                    <label for="inlineinput" class="col-md-3 col-form-label">Inline Input</label>
                    <div class="col-md-9 p-0">
                        <input type="text" class="form-control input-full" id="inlineinput" placeholder="Enter Input">
                    </div>
                </div>
                <div class="form-group has-success">
                    <label for="successInput">Success Input</label>
                    <input type="text" id="successInput" value="Success" class="form-control">
                </div>
                <div class="form-group has-error has-feedback">
                    <label for="errorInput">Error Input</label>
                    <input type="text" id="errorInput" value="Error" class="form-control">
                    <small id="emailHelp" class="form-text text-muted">Please provide a valid informations.</small>
                </div>
                <div class="form-group">
                    <label for="disableinput">Disable Input</label>
                    <input type="text" class="form-control" id="disableinput" placeholder="Enter Input" disabled>
                </div>
                <div class="form-check">
                    <label>Gender</label><br/>
                    <label class="form-radio-label">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value=""  checked="">
                        <span class="form-radio-sign">Male</span>
                    </label>
                    <label class="form-radio-label ml-3">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="">
                        <span class="form-radio-sign">Female</span>
                    </label>
                </div>
                <div class="form-group">
                    <label class="control-label">
                        Static
                    </label> <!----> <p class="form-control-static">hello@themekita.com</p> <!---->  <!----></div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Example multiple select</label>
                        <select multiple class="form-control" id="exampleFormControlSelect2">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div> --}}
               
                    {{-- <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea class="form-control" id="comment" rows="5">
    
                        </textarea>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <span class="form-check-sign">Agree with terms and conditions</span>
                        </label>
                    </div> --}}
                    <script>
                        function previewImage(event) {
                            var reader = new FileReader();
                            reader.onload = function(){
                                var output = document.getElementById('image-preview');
                                output.src = reader.result;
                                output.style.display = 'block'; // Make the preview visible
                            }
                            reader.readAsDataURL(event.target.files[0]);
                        }
                    </script>
        </x-manager.layout>