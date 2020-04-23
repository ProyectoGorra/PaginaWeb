<template> 
        <ul class="list-group my-2">
            <li class="list-group-item" 
            v-for="response in response.data" :key="response.id">
            <span class="badge badge-primary float-right">
            Fecha: {{response.created_at}}
          </span>
                Distancia proxima de obstaculo: <br> {{response.value}} Centimetros    
            </li>
        </ul>
</template>

<script>
export default {
    data(){
        return{
            response:[],
        }
    },
    created(){
        this.getDistancia();
    },
    methods: {
    getDistancia(){
        let self = this;
        axios({
            method: 'get',
            url: 'https://io.adafruit.com/api/v2/VictorGP/feeds/counter/data',
            params: {
                "X-AIO-Key": "" //aio_Usem85FSuuOS3Ja6DrCWC2BAhSKy <- aqui va el apy key
            },
        })
        .then(function (response) {
            self.response = response;
            console.log(response.data)
        });
    }
  }
}
</script>