<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" rel="stylesheet">
    </head>
    <body>
        {{-- NavBar --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#" style="padding-left:10%;">Image Editor</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="#">New <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Save As</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">View</a>
                </li>
              </ul>
            </div>
          </nav>

        <div class="container" style="margin:100px 200px 0px 200px !important">
            <span class="row">
                <div class="col-3" style="margin-right:10%">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Editor Tools</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                          <a href="{{ route('rotate') }}"><li class="list-group-item">Blur</li></a>
                          <li class="list-group-item">Rotate</li>
                          <li class="list-group-item">Resize</li>
                        </ul>
                      </div>
                </div>
                <div class="col-6">
                 
                      <form action="/upload" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                          <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                          @error('image')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <button class="btn btn-primary">Upload Image Button</button>
                      </form>
                   
                    <img src="/storage/{{ $Imageurl }}" width="100%" height="auto" style="margin-top:10px;"/>
                    
                </div>
            </div>
        </div>
    </body>
</html>
