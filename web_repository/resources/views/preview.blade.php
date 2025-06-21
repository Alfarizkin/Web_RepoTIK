<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pratinjau File PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h1 {
            color: #00796b;
            margin-bottom: 20px;
        }
        .file-info {
            margin-bottom: 20px;
        }
        .file-info p {
            margin: 5px 0;
        }
        .pdf-viewer {
            width: 100%;
            height: 600px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Preview File: {{ $file->file_name }}</h1>
    <div class="file-info">
        <p><strong>Tahun Upload:</strong> {{ $file->upload_date }}</p>
        <p><strong>Keterangan:</strong> {{ $file->description }}</p>
    </div>

    <!-- PDF Viewer -->
    <iframe class="pdf-viewer" src="{{ url($fileUrl) }}" frameborder="0"></iframe>
</div>

</body>
</html>
