<!-- resources/views/pdf/preview.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Preview PDF</title>
</head>
<body>
    <h2>Preview PDF</h2>

    <!-- Display PDF using an iframe -->
    <iframe src="{{ asset($pdfPath) }}" width="100%" height="600px"></iframe>
</body>
</html>
