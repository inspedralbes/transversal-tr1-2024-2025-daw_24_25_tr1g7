@extends('layouts.master')
@section('page-style') 
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
    }
    #editModal {
        display: none; 
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }
    .modal-content {
        background: white;
        padding: 20px;
        border-radius: 5px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h1>Lista de Productes</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Descripció</th>
                <th>Stock</th>
                <th>Marca</th>
                <th>Preu</th>
                <th>Accions</th>
            </tr>
        </thead>
            <tbody>
                @foreach($producte as $producto)
                    <tr data-id="{{ $producto->id }}">
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->name }}</td>
                        <td>{{ $producto->description }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->brand }}</td>
                        <td>{{ $producto->price }}</td>
                        <td>
                            <button onclick="deleteProduct({{ $producto->id }})">Eliminar</button>
                            <button onclick="editProduct({{ $producto->id }}, '{{ $producto->name }}', '{{ $producto->description }}', {{ $producto->stock }}, '{{ $producto->brand }}', {{ $producto->price }})">Editar</button>
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>
</div>

<div id="editModal">
    <div class="modal-content">
        <h2>Editar Producto</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" name="id" id="productId">
            <div>
                <label>Nombre:</label>
                <input type="text" name="name" id="productName" required>
            </div>
            <div>
                <label>Descripción:</label>
                <textarea name="description" id="productDescription" required></textarea>
            </div>
            <div>
                <label>Stock:</label>
                <input type="number" name="stock" id="productStock" required>
            </div>
            <div>
                <label>Marca:</label>
                <input type="text" name="brand" id="productBrand" required>
            </div>
            <div>
                <label>Precio:</label>
                <input type="number" name="price" id="productPrice" required>
            </div>
            <button type="submit">Guardar Cambios</button>
            <button type="button" onclick="closeModal()">Cerrar</button>
        </form>
    </div>
</div>
@endsection

@section('page-script')
<script>
    function deleteProduct(id) {
        if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
            fetch(`/productedelete/${id}`, {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })

        .then(response => response.json())
        .then(data => {
            if (data.status === 'successful') {
                const row = document.querySelector(`tr[data-id="${id}"]`);
                row.remove();
                }
            })
        }
    }

    function editProduct(id, name, description, stock, brand, price) {
        document.getElementById('productId').value = id;
        document.getElementById('productName').value = name;
        document.getElementById('productDescription').value = description;
        document.getElementById('productStock').value = stock;
        document.getElementById('productBrand').value = brand;
        document.getElementById('productPrice').value = price;
        document.getElementById('editModal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    document.getElementById('editForm').onsubmit = function(event) {
        event.preventDefault();
        const id = document.getElementById('productId').value;
        const formData = new FormData(this);

        fetch(`/producteupdate/${id}`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'successful') {
                alert(data.message);
                const row = document.querySelector(`tr[data-id="${id}"]`);
                row.querySelector('td:nth-child(2)').innerText = formData.get('name');
                row.querySelector('td:nth-child(3)').innerText = formData.get('description');
                row.querySelector('td:nth-child(4)').innerText = formData.get('stock');
                row.querySelector('td:nth-child(5)').innerText = formData.get('brand');
                row.querySelector('td:nth-child(6)').innerText = formData.get('price');

                closeModal(); 
            } else {
                alert(data.message);
            }
        });
    };
</script>

@endsection
