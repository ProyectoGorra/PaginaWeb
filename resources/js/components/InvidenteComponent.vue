<template>
    <div>
 
        <form @submit.prevent="editarInvidente(invidente)" v-if="editarActivo">
        <h3>Editar Invidente</h3>
            <input type="text" placeholder="Nombre"
            class="form-control mb-2" v-model="invidente.nombre">
            <input type="text" placeholder="Apellido Paterno"
            class="form-control mb-2" v-model="invidente.ap_paterno">  
            <input type="text" placeholder="Apellido Materno"
            class="form-control mb-2" v-model="invidente.ap_materno">
            <input type="number" placeholder="Edad"
            class="form-control mb-2" v-model="invidente.edad">
            <input type="text" placeholder="Dirección"
            class="form-control mb-2" v-model="invidente.direccion">  
            <input type="text" placeholder="Correo electronico"
            class="form-control mb-2" v-model="invidente.tipo_sangre">
            <input type="text" placeholder="Tipo de Sangre"
            class="form-control mb-2" v-model="invidente.telefono">     
            <button class="btn btn-success" type="submit">Guardar</button>            
        </form>

        <form @submit.prevent="agregar" v-else>
        <h3>Agregar Invidente</h3>
            <input type="text" placeholder="Nombre"
            class="form-control mb-2" v-model="invidente.nombre">
            <input type="text" placeholder="Apellido Paterno"
            class="form-control mb-2" v-model="invidente.ap_paterno">  
            <input type="text" placeholder="Apellido Materno"
            class="form-control mb-2" v-model="invidente.ap_materno">
            <input type="number" placeholder="Edad"
            class="form-control mb-2" v-model="invidente.edad">
            <input type="text" placeholder="Dirección"
            class="form-control mb-2" v-model="invidente.direccion">  
            <input type="text" placeholder="Tipo de Sangre"
            class="form-control mb-2" v-model="invidente.tipo_sangre">
            <input type="text" placeholder="Telefono"
            class="form-control mb-2" v-model="invidente.telefono">   
            <button class="btn btn-primary" type="submit">Agregar</button>            
        </form>

        <hr class="mt-3">
        <h3>Listado de Invidentes</h3>
        <ul class="list-group my-2">

            <li class="list-group-item" 
            v-for="(item,index) in invidentes" :key="index">
            <span class="badge badge-primary float-right">
            {{item.updated_at}}
          </span>
                {{item.nombre}}
                {{item.ap_paterno}}     
                {{item.ap_materno}}    
                <br>           
                Edad: {{item.edad}}  
                <br>             
                Dirrecion: {{item.direccion}}   
                <br>            
                Tipo de Sangre: {{item.tipo_sangre}}   
                <br>            
                Telefono: {{item.telefono}}
                <br>
            <button class="btn btn-danger btn-sm" @click="eliminarInvidente(item,index)">Eliminar</button>
            <button class="btn btn-warning btn-sm" @click="editarFormulario(item)">Editar</button>       
            </li>

        </ul>

    </div>
</template>

<script>
export default {
    data() {
        return {
            invidentes: [],
            invidente: {nombre: '',ap_paterno: '',ap_materno: '', edad: '',direccion: '',tipo_sangre: '',telefono: ''},
            editarActivo: false
        }
    },
    created(){
        axios.get('/invidentes')
            .then(res => {
                this.invidentes = res.data;
            })
    },
    methods: {
        editarFormulario(item){
            this.editarActivo = true;
            this.invidente.nombre = item.nombre;
            this.invidente.ap_paterno = item.ap_paterno;
            this.invidente.ap_materno = item.ap_materno;
            this.invidente.edad = item.edad;
            this.invidente.direccion = item.direccion;
            this.invidente.tipo_sangre = item.tipo_sangre;
            this.invidente.telefono = item.telefono;
            this.invidente.id = item.id;
        },
            editarInvidente(invidente){
            const params = {nombre: invidente.nombre, ap_paterno: invidente.ap_paterno, 
            ap_materno: invidente.ap_materno, edad: invidente.edad, direccion: invidente.direccion, tipo_sangre: invidente.tipo_sangre,
            telefono: invidente.telefono};
            axios.put(`/invidentes/${invidente.id}`, params)

                .then(res=>{
                this.editarActivo = false;
                const index = this.invidentes.findIndex(item => item.id === invidente.id);
                this.invidentes[index] = res.data;
                })
            this.invidente = {nombre: '', ap_paterno: '', ap_materno: '', edad: '', direccion: '', tipo_sangre: '', telefono: ''};
        },
        agregar(){
            if(this.invidente.nombre.trim() === '' || this.invidente.ap_paterno.trim() === '' || 
            this.invidente.ap_materno.trim() === '' || this.invidente.edad.trim() === '' ||this.invidente.direccion.trim() === '' 
            || this.invidente.tipo_sangre.trim() === '' || this.invidente.telefono.trim() === ''){
                alert('Debes completar todos los campos antes de guardar');
                return;
            }

            const params = {
            nombre: this.invidente.nombre, ap_paterno: this.invidente.ap_paterno, 
            ap_materno: this.invidente.ap_materno, edad: this.invidente.edad, direccion: this.invidente.direccion,
            tipo_sangre: this.invidente.tipo_sangre, telefono: this.invidente.telefono}
            this.invidente.nombre = '';
            this.invidente.ap_paterno = '';
            this.invidente.ap_materno = '';
            this.invidente.edad = '';
            this.invidente.direccion = '';
            this.invidente.tipo_sangre = '';
            this.invidente.telefono = '';
            axios.post('/invidentes', params)
                .then(res => {
                    this.invidentes.push(res.data)
                })
        },
    eliminarInvidente(item,index){
        axios.delete(`/invidentes/${item.id}`)
            .then(()=>{
                this.invidentes.splice(index,1);
            })
        }
    }
}
</script>