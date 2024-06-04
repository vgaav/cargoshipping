<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrier Dashboard</title>
    <link href="{{ mix('css/carrier-dashboard.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .carrierDashboardPage {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .dashboard {
            width: 80%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: white;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .website-name {
            font-size: 2rem;
            font-weight: bold;
        }

        .user-welcome {
            font-size: 1.2rem;
        }

        .items-section {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .item-card {
            width: 30%;
            background-color: #f2f2f2;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .item-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

        .item-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .item-details {
            display: flex;
            flex-direction: column;
            gap: 5px;
            margin-bottom:10px;
        }

        .item-name {
            font-size: 1.2rem;
            font-weight: bold;
            margin:10px;

        }

        .bid-btn {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .bid-btn:hover {
            background-color: #3e8e41;
        }

        /* Responsive styles */
        @media (min-width: 768px)
         { .item-card { width: 45%; } }
         @media (min-width: 1024px)
          { .item-card { width: 30%; } }
    </style>
</head>
<body>
    <div id="app">
        <div class="carrierDashboardPage">
            <div class="dashboard">
                <div class="header">
                    <div class="website-name">BidGo</div>
                    <div class="user-welcome">Welcome, username</div>
                </div>
                <div class="items-section">
                    @if ($items->isEmpty())
                        <p>No items available</p>
                    @else
                        @foreach ($items as $item)
                            <div class="item-card">
                                <img src="{{ $item->item_image }}" alt="{{ $item->item_name }}" class="item-image">
                                <div class="item-details">
                                    <div class="item-name">{{ $item->item_name }}</div>
                                    <div class="client"><b>Client:</b> {{ $item->item_client }}</div>
                                    <div class="weight"><b>Weight:</b> {{ $item->item_weight }}</div>
                                    <div class="from-to">
                                        <b>From:</b> {{ $item->item_from }}
                                        <span class="arrow-symbol">➔</span>
                                        <b>To:</b> {{ $item->item_destination }}
                                    </div>
                                    <div class="pickup-time"><b>Pickup Time:</b> {{ $item->item_pickup_time }}</div>
                                    <div class="drop-off-time"><b>Drop-off Time:</b> {{ $item->item_dropoff_time }}</div>
                                    <div class="quote"><b>Quote: $</b>{{ $item->item_quote }}</div>
                                </div>
                                <button class="bid-btn">Bid</button>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
