<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .logout {
            float: right;
            margin: 20px;
            padding: 10px 15px;
            background-color: #dc3545; 
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .logout:hover {
            background-color: #c82333; 
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            margin-right: 10px;
        }

        input[type="number"] {
            padding: 8px;
            width: 100px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        p {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Product List</h1>
    <a href="/logout" class="logout">Logout</a>
    <form action="/searchProduct" method="get">
        <label for="from">Price From:</label>
        <input type="number" id="from" name="from" required>
        
        <label for="to">Price To:</label>
        <input type="number" id="to" name="to" required>
        
        <button type="submit">Search</button>
    </form>

    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->code }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->descriptions }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
