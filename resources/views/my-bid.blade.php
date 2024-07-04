<!-- resources/views/carrier_testing.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>My Bids</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <div id="app">
        <my-bid></my-bid>
    </div>

    <script type="module">
        import bids from '../pages/myBids.vue';

        new Vue({
            el: '#app',
            components: {
                bids
            }
        });
    </script>
</body>
</html>
