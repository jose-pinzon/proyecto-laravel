<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue Chart.js</title>
    <style>
    body{
        background-color: #212733;
        color: white;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        margin: auto;
        text-align: center !important;
    }
    </style>
</head>
<body>

    <div id="app">
        <h2>@{{ message }}</h2>
    <chart></chart>
    </div>

<!-- Vue js -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>

<!-- Chart par Vue -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>

<!-- Axios -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>

<script>
let url = 'http://localhost/apirest/articulos' // API PHP
//let url = 'http://localhost:3000/api/articulos/' // API Node Js

Vue.component('chart', {
  extends: VueChartJs.Pie,
  data(){
    return{
      etiquetas: [],
      stock: [],
      bgColors: ['#ea80fc','#e040fb', '#d500f9', '#aa00ff', '#f8bbd0', '#f06292', '#ec407a', '#d81b60', '#1de9b6', '#00bfa5', '#e65100']
    }
  },
  mounted () {
    this.mostrar()
    this.renderChart({
        labels: this.etiquetas,
        datasets: [
            {
                label: 'Data One',
                backgroundColor: this.bgColors,
                data: this.stock,
            }
        ]
    }, {responsive: true, maintainAspectRatio: false})
  },
  methods:{
    mostrar() {
         axios
        .get(url)
            .then(response => {
            //console.log(response.data) //traemos todos los datos desde la API
            response.data.forEach(element => {
                this.etiquetas.push(element.descripcion)
                this.stock.push(element.stock)
            })
            //console.log(document.getElementById('line-chart'))//el ID donde se genera el grafico es 'line-chart'
        })
      }
  }
})
var vm = new Vue({
  el: '#app',
  data: {
    message: 'Vue - Chart.js'
  }
})

</script>
</body>
</html>
