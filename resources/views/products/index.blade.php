<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Product</h1>
        <div>
            @if(session()->has('success'))
                <div class="alert alert-success" id="successMessage">
                    {{session('success')}}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <a href="{{route('product.create')}}" class="btn btn-primary">Create a Product</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name }}</td>
                    <td>{{$product->qty}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->description}}</td>
                    <td>
                        <a href="{{route('product.edit', ['product' => $product])}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('product.destroy', ['product' => $product])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Include Bootstrap JS if needed -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script -->
    
    <script>
        // Automatically hide the success message after 4 seconds
        window.addEventListener('load', function() {
            var successMessage = document.getElementById("successMessage");
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = "none";
                }, 3000); // Hide after 3 seconds (3000 milliseconds)
            }
        });
    </script>
</body>
</html>
