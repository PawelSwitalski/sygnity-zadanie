<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('currency.Gold last 10 days') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-0 py-2 sm:p-0 md:p-4 lg:p-6 bg-white border-b border-gray-200">
                    <div id="line-chart"></div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    const chartConfig = {
        series: [
            {
                name: "Price PLN",
                data: {!!
                    json_encode(
                        array_map(function($gold) {
                            return $gold->price;
                        }, $goldData)
                    )
                !!},
            },
        ],
        chart: {
            type: "line",
            height: 240,
            toolbar: {
                show: false,
            },
        },
        title: {
            show: "",
        },
        dataLabels: {
            enabled: false,
        },
        colors: ["#020617"],
        stroke: {
            lineCap: "round",
            curve: "smooth",
        },
        markers: {
            size: 0,
        },
        xaxis: {
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
            labels: {
                style: {
                    colors: "#616161",
                    fontSize: "12px",
                    fontFamily: "inherit",
                    fontWeight: 400,
                },
            },

            categories:
                {!!
                    json_encode(
                        array_map(function($gold) {
                            return $gold->data;
                        }, $goldData)
                    )
                !!},
        },
        yaxis: {
            labels: {
                style: {
                    colors: "#616161",
                    fontSize: "12px",
                    fontFamily: "inherit",
                    fontWeight: 400,
                },
            },
        },
        grid: {
            show: true,
            borderColor: "#dddddd",
            strokeDashArray: 5,
            xaxis: {
                lines: {
                    show: true,
                },
            },
            padding: {
                top: 5,
                right: 20,
            },
        },
        fill: {
            opacity: 0.8,
        },
        tooltip: {
            theme: "dark",
        },
    };

    const chart = new ApexCharts(document.querySelector("#line-chart"), chartConfig);

    chart.render();
</script>
