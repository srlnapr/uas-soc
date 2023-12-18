<!-- components/admin/symptoms/printData_pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <style>
        /* Gaya CSS untuk PDF Anda */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Diseases Data</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Update At</th>
                <th>Create At</th>
                <th>Diseases Code</th>
                <th>Diseases</th>
                <th>Type</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($diseases as $Disease)
                <tr>
                    <td>{{ $Disease->id }}</td>
                    <td>{{ $Disease->updated_at }}</td>
                    <td>{{ $Disease->created_at }}</td>
                    <td>{{ $Disease->diseases_code }}</td>
                    <td>{{ $Disease->diseases }}</td>
                    <td>{{ $Disease->type }}</td>
                    <td>{{ $Disease->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2>Solution Data</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Diperbarui</th>
                <th>Dibuat</th>
                <th>Kode Penyaki</th>
                <th>Solusi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solutions as $Solution)
                <tr>
                    <td>{{ $Solution->id }}</td>
                    <td>{{ $Solution->updated_at }}</td>
                    <td>{{ $Solution->created_at }}</td>
                    <td>{{ $Solution->disease_id }}</td>
                    <td>{{ $Solution->solution }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
