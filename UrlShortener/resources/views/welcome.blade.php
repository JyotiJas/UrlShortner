<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>URL Shortener</h1>
        <form id="shortenForm">
            <input type="text" id="urlInput" placeholder="Enter URL to shorten">
            <button type="submit">Shorten</button>
        </form>
        <p id="result"></p>
    </div>
    <script>
        document.getElementById('shortenForm').addEventListener('submit', async function(event) {
            event.preventDefault();
            let url = document.getElementById('urlInput').value;
            console.log(url);
            let response = await fetch('/api/encode', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'  // Important!
    },
    body: JSON.stringify({ url })
});

            console.log("Response received:", response);
            let data = await response.json();
            document.getElementById('result').innerHTML = `Short URL: <a href="${data.short_url}" target="_blank">${data.short_url}</a>`;
        });
    </script>
</body>
</html>
