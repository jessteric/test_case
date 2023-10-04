<?php 
include("classes/Main.php");


?>
<!DOCTYPE html>
<html>
<head>
    <title>Car statistics</title>
</head>
<body>
    <h1>Car statistics</h1>

    <p>Average mileage: <span id="averageMileage"></span></p>

    <h2>TOP-3 countries:</h2>
    <ul id="topCountries"></ul>

    <p>Max power: <span id="maxPowerHP"></span> л.с. (<span id="maxPowerKW"></span> кВт)</p>
    <p>Min power: <span id="minPowerHP"></span> л.с. (<span id="minPowerKW"></span> кВт)</p>

    <h2>Gearboxes:</h2>
    <ul id="gearboxOptions"></ul>

    <h2>Fuel options:</h2>
    <ul id="fuelOptions"></ul>

    <script>
        function loadData() {
            fetch('stats.php') 
                .then(response => response.json())
                .then(data => {
                    document.getElementById('averageMileage').textContent = data.average_mileage;

                    const topCountriesList = document.getElementById('topCountries');
                    topCountriesList.innerHTML = '';
                    data.top_countries.forEach(country => {
                        const listItem = document.createElement('li');
                        listItem.textContent = `${country.country_of_origin}: ${country.car_count} автомобилей`;
                        topCountriesList.appendChild(listItem);
                    });

                    document.getElementById('maxPowerHP').textContent = data.max_min_power.max_power_hp;
                    document.getElementById('maxPowerKW').textContent = data.max_min_power.max_power_kw;
                    document.getElementById('minPowerHP').textContent = data.max_min_power.min_power_hp;
                    document.getElementById('minPowerKW').textContent = data.max_min_power.min_power_kw;

                    const gearboxOptionsList = document.getElementById('gearboxOptions');
                    gearboxOptionsList.innerHTML = '';
                    data.gearbox_options.forEach(option => {
                        const listItem = document.createElement('li');
                        listItem.textContent = option;
                        gearboxOptionsList.appendChild(listItem);
                    });

                    const fuelOptionsList = document.getElementById('fuelOptions');
                    fuelOptionsList.innerHTML = '';
                    data.fuel_options.forEach(option => {
                        const listItem = document.createElement('li');
                        listItem.textContent = option;
                        fuelOptionsList.appendChild(listItem);
                    });
                });
        }
        window.onload = loadData();
    </script>
</body>
</html>