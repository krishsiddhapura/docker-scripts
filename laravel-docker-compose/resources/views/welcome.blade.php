<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Docker</title>
    <link rel="stylesheet" href="{{asset('assets/libs/bootstrap/bootstrap.min.css')}}?v{{env('ASSET_VERSION','1.2')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}?v{{env('ASSET_VERSION','1.2')}}" />
</head>
<body>
    <div class="position-absolute top-50 start-50 translate-middle">
        <form class="form" id="fileUpload">
            @csrf
            <div class="col-auto mb-2">
                <h4 class="text-light">File Upload</h4>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <input type="file" name="input_file">
                </div>
                <label id="input_file-error" class="text-danger" for="input_file"></label>
            </div>
            <div class="col-auto mt-2">
                <button type="submit" class="btn button-paper mb-2 w-100">UPLOAD</button>
            </div>
        </form>
    </div>

    <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}?v{{env('ASSET_VERSION','1.2')}}"></script>
    <script src="{{asset('assets/js/jquery.validate.min.js')}}?v{{env('ASSET_VERSION','1.2')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/bootstrap.bundle.min.js')}}?v{{env('ASSET_VERSION','1.2')}}"></script>
    <script src="{{asset('assets/js/app.js')}}?v{{env('ASSET_VERSION','1.2')}}"></script>
    <script>
        $("#fileUpload").validate({
            rules : {
                input_file: {
                    required : true
                }
            },
            messages : {
                input_file: {
                    required: "The file field is required."
                }
            },
            errorClass : "text-danger",
            submitHandler: function (form,e) {
                e.preventDefault();
                formDate = new FormData(form);
                $.ajax({
                    url: "{{ route('upload-file') }}",
                    method: "post",
                    dataType: "json",
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(response) {
                        alert("Uploaded");
                    },
                    error: function(xhr) {
                        data = xhr.responseJSON;
                        if (data.hasOwnProperty('error')) {
                            if (data.error.hasOwnProperty('input_file')) {
                                $("#input_file-error").html(data.error.input_file);
                            }
                        } else {
                            actionError(xhr);
                        }
                    },
                });
            }
        })

    </script>
</body>
</html>
