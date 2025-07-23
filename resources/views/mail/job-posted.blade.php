<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Your Job Listing is Live!</title>
</head>

<body>
    <p>Congrats, your job is now live on our website.</p>
    <p>
        <a href="{{ url('jobs/' . $job->id) }}">View your job listing</a>
    </p>
</body>

</html>