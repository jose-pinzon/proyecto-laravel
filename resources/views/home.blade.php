@extends('layouts.argon')
@section('header')
@include('include.header',['habitacionesT'=>$habitacionesT,'habitaciones'=>$habitaciones,'habitacion_c'=>$habitacion_c,'usuario'=>$usuario])
@endsection
@section('content')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card bg-gradient-default shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-light ls-1 mb-1">GENERAL</h6>
                            <h2 class="text-white mb-0">Ganancias generadas al dia</h2>
                        </div>
                    </div>
                </div>


                <div class="card bg-default">
                    <div class="card-body">
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="myChart" width="400" height="150"></canvas>
                        </div>
                        <div class="row col-6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4" >

        </div>


    </div>
</div>
@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>

<!-- Chart par Vue -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>

<!-- Axios -->





<script>
    var url = 'http://localhost/Proyecto-estadias/estadias/public/reservaciones/datos';





    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        // labels:response.map(item => item.fecha_entrada),
        data: {
            datasets: [{

                label: 'precios',
                backgroundColor: [

                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [

                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 4
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            legend: {
                position: 'bottom',
            }
        }
    });

    // var

    fetch(url).then(response => response.json())
        .then(datos => mostrar(datos))
        .catch(error => console.log(error));

    const mostrar = (articulos) => {
        articulos.forEach(element => {
            // let dia = element.extras;

            myChart.data['datasets'][0].data.push(element.costo)
        });

        // let meses=['Ene','Feb','Mar','Abr','May','Jun','Jul','Agos','Sept','Oct','Nov','Dic'];
        //
        let articulo = articulos.map(item => item.created_at)

        for (const i in articulo) {
            let mes = nombre_mes(articulo[i]);
            myChart.data['labels'].push(articulo[i])
        }
        // myChart.data['labels'].push(meses[i])

    }


    function formato(texto) {
        return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g, '$1/$2/$3');
    }

    function nombre_mes(fecha) {
        formato(fecha)
        const monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
            "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
        ];
        const d = new Date(fecha);
        return "el nombre de mes es " + monthNames[d.getMonth()];
    }
</script>

@endpush
