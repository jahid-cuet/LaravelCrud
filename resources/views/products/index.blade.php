<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CruD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="/">Products</a>
          <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            </div>
          </div>
        </div>
      </nav>
      <div class="container">
        <form action="" class="m-2">
          <div class="form-group row">
            <div class="col">
              <input type="search" class="form-control" name="search" placeholder="Search by name" value="{{$search}}">
            </div>
            <div class="col">
              <button class="btn btn-primary btn-block">Search</button>
            </div>
          </div>
        </form>
      </div>


        <div class="m-2 mt-4">
          <a href="products/create" class="btn btn-primary mt-2">Add New Product</a>
        </div>
     
      
    <div class="container m-2">

     <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">SI NO </th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $p)
          <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{$p->name}}</td>
            <td>{{$p->description}}</td>
            <td>
              <img src="products/{{$p->image}}" class="rounded-circle" width="30" height="30">
            </td>
           
           <td>
            <a href="products/{{$p->id}}/edit" class="btn btn-secondary">Edit</a>
            <a href="/delete/{{$p->id}}" class="btn btn-danger">Delete</a>
           </td>
          
           
          </tr>
          @endforeach

        </tbody>
      </table>
      <style>
        .pagination-custom .page-link {
            color: #343a40;
            background-color: #fff;
            border: 1px solid #dee2e6;
        }
    
        .pagination-custom .page-link:hover {
            z-index: 2;
            color: #23527c;
            text-decoration: none;
            background-color: #e9ecef;
            border-color: #dee2e6;
        }
    
        .pagination-custom .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
    
        .pagination-custom .page-link:focus {
            z-index: 2;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>
    
    <div class="row">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-custom justify-content-center">
                {{ $products->links() }}
            </ul>
        </nav>
    </div>
    
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>