<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
</head>
<body>
<!-- resources/views/products/categories.blade.php -->
<h1>Categories</h1>
<ul>
    @foreach($categories as $category)
        <li>{{ $category->name }}</li>
    @endforeach
</ul>

</body>
</html>
