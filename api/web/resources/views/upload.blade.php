<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivo CSV</title>
</head>
<body>
    <h2>Upload de Arquivo CSV</h2>
    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="csv_file">Arquivo CSV:</label>
        <input type="file" name="csv_file" id="csv_file" required>
        <br><br>
        <label for="campanha">Campanha:</label>
        <input type="text" name="campanha" id="campanha" required>
        <br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
