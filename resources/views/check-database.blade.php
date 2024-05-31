<!DOCTYPE html>
<html>
<head>
    <title>Check Database Connection</title>
</head>
<body>
    <h1>Database Connection Check</h1>
    <ul>
        @if(count($items) > 0)
            <li>Connected to items database!</li>
            <li>Number of items: {{ count($items) }}</li>
            @foreach ($items as $item)
                <li>{{ $item->item_name }} ({{ $item->item_client }})</li>
            @endforeach
        @else
            <li>No items found in the database.</li>
        @endif
    </ul>
</body>
</html>
