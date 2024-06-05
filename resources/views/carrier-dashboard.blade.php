<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrier Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .carrierDashboardPage {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .dashboard {
            width: 100%;
            max-width: 1200px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: white;
            border-radius: 8px;
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
            width: 100%;
            background-color: #f2f2f2;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .item-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .item-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .item-details {
            display: flex;
            flex-direction: column;
            gap: 5px;
            margin-bottom: 10px;
        }

        .item-name {
            font-size: 1.2rem;
            font-weight: bold;
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

        @media only screen and (max-width: 600px) {
    .dashboard {
        padding: 10px;
    }

    .header {
        flex-direction: column;
        align-items: center;
        margin-bottom: 10px;
    }

    .website-name {
        font-size: 1.5rem;
        margin-bottom: 5px;
    }

    .user-welcome {
        font-size: 1rem;
    }

    .item-card {
        width: 100%;
        margin-bottom: 10px;
    }

    .item-image {
        height: 150px; /* Adjust height for smaller screens */
        margin-bottom: 5px;
    }

    .item-details {
        margin-bottom: 5px;
    }

    .item-name {
        font-size: 1rem;
    }

    .bid-btn {
        padding: 8px;
        font-size: 0.9rem;
    }

    @media (min-width: 768px) {
        .item-card {
            width: 45%;
            margin-bottom: 20px;
        }
    }
    @media (min-width: 1024px) {
        .item-card {
            width: 30%;
        }
    }
}
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
                                        <b>To:</b> {{ $item->item_destination }}</div>
                                    <div class="pickup-time"><b>Pickup Time:</b> {{ $item->item_pickup_time }}</div>
                                    <div class="drop-off-time"><b>Drop-off Time:</b> {{ $item->item_dropoff_time }}</div>
                                    <div class="quote"><b>Quote: $</b>{{ $item->item_quote }}</div>
                                </div>
                                <button class="bid-btn" @click="openModal({{ json_encode($item) }})">Bid</button>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <!-- Modal for Item Details -->
        <div class="modal fade" id="bidModal" tabindex="-1" aria-labelledby="bidModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bidModalLabel">Shipping Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Item Name:</strong> @{{ modalItem.item_name }}</p>
                        <p><strong>Order From:</strong> @{{ modalItem.item_client }}</p>
                        <p><strong>Pickup Time:</strong> @{{ modalItem.item_pickup_time }}</p>
                        <p><strong>Status:</strong> @{{ modalItem.item_status }}</p>
                        <p><strong>Destination:</strong> @{{ modalItem.item_destination }}</p>
                        <p><strong>Current Bids:</strong> @{{ modalItem.item_current_bids }}</p>
                        <p><strong>Quote:</strong> $@{{ modalItem.item_quote }}</p>
                        <button class="btn btn-secondary" @click="toggleItemInfo">Show Item Information</button>
                        <div v-if="showItemInfo" class="item-info-card">
                            <div><strong>Description:</strong> @{{ modalItem.description }}</div>
                            <div><strong>Length:</strong> @{{ modalItem.item_length }}</div>
                            <div><strong>Width:</strong> @{{ modalItem.item_width }}</div>
                            <div><strong>Height:</strong> @{{ modalItem.item_height }}</div>
                            <div><strong>Weight:</strong> @{{ modalItem.item_weight }}</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="openBidModal">Submit Bid</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Submitting Bid -->
        <div class="modal fade" id="submitBidModal" tabindex="-1" aria-labelledby="submitBidModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="submitBidModalLabel">Submit Your Bid</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="bidAmount">Bid Amount</label>
                                <input type="number" class="form-control" id="bidAmount" v-model="bidAmount" :min="1" :max="modalItem.item_quote - 1">
                                <small class="form-text text-muted">Bid must be greater than zero and less than the item quote.</small>
                            </div>
                            <div class="form-group">
                                <label for="minBidAmount">Minimum Bid Amount</label>
                                <input type="number" class="form-control" id="minBidAmount" v-model="minBidAmount" :min="1" :max="modalItem.item_quote - 1">
                                <small class="form-text text-muted">Minimum bid must be greater than zero and less than the item quote.</small>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="submitBid">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <NavBarVue />

    <!-- Vue and Axios script -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        new Vue({
            el: '#app',
            data: {
                modalItem: {},
                showItemInfo: false,
                bidAmount: '',
                minBidAmount: ''
            },
            methods: {
                openModal(item) {
                    this.modalItem = item;
                    this.showItemInfo = false;
                    $('#bidModal').modal('show');
                },
                toggleItemInfo() {
                    this.showItemInfo = !this.showItemInfo;
                },
                openBidModal() {
                    $('#bidModal').modal('hide');
                    $('#submitBidModal').modal('show');
                },
                submitBid() {
                    if (this.bidAmount > 0 && this.minBidAmount > 0 && this.bidAmount < this.modalItem.item_quote && this.minBidAmount < this.modalItem.item_quote) {
                        alert('Bid submitted: ' + this.bidAmount + ', Minimum Bid: ' + this.minBidAmount);
                        $('#submitBidModal').modal('hide');
                    } else {
                        alert('Invalid bid amounts. Please ensure they are greater than zero and less than the item quote.');
                    }
                }
            }
        });
    </script>
</body>
</html>
