<!-- resources/views/carrier_testing.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Carrier Testing</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <div id="app">
        <carrier-testing></carrier-testing>
    </div>

    <script type="module">
        import CarrierTesting from './components/CarrierTesting.vue';

        new Vue({
            el: '#app',
            components: {
                CarrierTesting
            }
        });
    </script>
</body>
</html>
