<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Calculator </title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('/css/main.css') }}"></link>

    </head>
    <body>
    <h1 class="mx-auto">Laravel Calculator</h1>

    <div id="main-wrapper" style="width:500px" class="form  mx-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if (strlen(session('result')) > 0)
            <div class="alert alert-success">
                {{ session('val1') }}  {{ session('sign') }}  {{ session('val2') }} = {{ session('result') }}
            </div>
        @endif


        
<form  action ="{{route('calculator.process')}}" method="GET" style="width:400px" class=" mx-auto">
@csrf

<div class="mb-3 row">
    <label  for="val1" class="col-sm-3 col-form-label">val1</label>
    <div class="form-group col-md-6">
    <input type="text" class="form-control"  name="val1" value="{{ old('val1', session('val1')) }}" />
    </div>
  </div>

  
  <div class="mb-3 row">
    <label for="operator" class="col-md-3 col-form-label">operator</label>
    <div class="form-group col-md-6">
    <select name="operator" class="form-control">
                <option value="">select</option>
                <option value="add" {{(old('operator', session('operator')) == 'add') ? 'selected' : '' }}>+</option>
                <option value="subtract" {{(old('operator', session('operator')) == 'subtract') ? 'selected' : '' }}>-</option>
                <option value="divide" {{(old('operator', session('operator')) == 'divide') ? 'selected' : '' }}>/</option>
                <option value="multiply" {{(old('operator', session('operator')) == 'multiply') ? 'selected' : '' }}>*</option>

            </select>   
            </div>
    </div>  


  <div class="mb-3 row">
    <label  for="val2" class="col-md-3 col-form-label">val2</label>
    <div class="form-group col-md-6">
    <input type="text" class="form-control"  name="val2" value="{{ old('val1', session('val1')) }}" />
    </div>
  </div>

  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3 mx-auto">Calculate</button>
  </div>

</form>
    
    
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>