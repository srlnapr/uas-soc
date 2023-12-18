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

    <h2>Symptom Data</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Diedit</th>
                <th>Dibuat</th>
                <th>Kode Gejala</th>
                <th>Gejala</th>
            </tr>
        </thead>
        <tbody>
            @foreach($symptoms as $symptom)
                <tr>
                    <td>{{ $symptom->id }}</td>
                    <td>{{ $symptom->updated_at }}</td>
                    <td>{{ $symptom->created_at }}</td>
                    <td>{{ $symptom->symptoms_code }}</td>
                    <td>{{ $symptom->symptoms }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
