<template>
    <div>
        <form @submit.prevent="editarPersona(persona)" v-if="editarActivo">
        <h3>Editar persona</h3>
            <input type="text" placeholder="Nombre"
            class="form-control mb-2" v-model="persona.nombre">
            <input type="text" placeholder="Apellido Paterno"
            class="form-control mb-2" v-model="persona.ap_paterno">  
            <input type="text" placeholder="Apellido Materno"
            class="form-control mb-2" v-model="persona.ap_materno">
            <input type="number" placeholder="Edad"
            class="form-control mb-2" v-model="persona.edad">
            <input type="text" placeholder="Dirección"
            class="form-control mb-2" v-model="persona.direccion">  
            <input type="text" placeholder="Correo electronico"
            class="form-control mb-2" v-model="persona.correo">
            <input type="text" placeholder="Telefono"
            class="form-control mb-2" v-model="persona.telefono">     
            <button class="btn btn-success" type="submit">Guardar</button>            
        </form>

        <form @submit.prevent="agregar" v-else>
        <h3>Agregar persona</h3>
            <input type="text" placeholder="Nombre"
            class="form-control mb-2" v-model="persona.nombre">
            <input type="text" placeholder="Apellido Paterno"
            class="form-control mb-2" v-model="persona.ap_paterno">  
            <input type="text" placeholder="Apellido Materno"
            class="form-control mb-2" v-model="persona.ap_materno">
            <input type="number" placeholder="Edad"
            class="form-control mb-2" v-model="persona.edad">
            <input type="text" placeholder="Dirección"
            class="form-control mb-2" v-model="persona.direccion">  
            <input type="text" placeholder="Correo electronico"
            class="form-control mb-2" v-model="persona.correo">
            <input type="text" placeholder="Telefono"
            class="form-control mb-2" v-model="persona.telefono">   
            <button class="btn btn-primary" type="submit">Agregar</button>            
        </form>

        <hr class="mt-3">
        <h3>Listado de Personas</h3>
        <ul class="list-group my-2">

            <li class="list-group-item " 
            v-for="(item,index) in personas" :key="index">
            <span class="badge badge-primary float-right">
            {{item.updated_at}}
          </span>
                {{item.nombre}} 
                {{item.ap_paterno}}     
                {{item.ap_materno}} 
                <br>            
                Edad: {{item.edad}}
                <br>               
                Dirección: {{item.direccion}}
                <br>               
                Correo: {{item.correo}}
                <br>               
                Telefono: {{item.telefono}}
                <br>
            <button class="btn btn-danger btn-sm" @click="eliminarPersona(item,index)">Eliminar</button>
            <button class="btn btn-warning btn-sm" @click="editarFormulario(item)">Editar</button>       
            </li>

        </ul>

    </div>
</template>

<script>
export default {
    data() {
        return {
            personas: [],
            persona: {nombre: '',ap_paterno: '',ap_materno: '', edad: '',direccion: '',correo: '',telefono: ''},
            editarActivo: false
        }
    },
    created(){
        axios.get('/personas')
            .then(res => {
                this.personas = res.data;
            })
    },
    methods: {
        editarFormulario(item){
            this.editarActivo = true;
            this.persona.nombre = item.nombre;
            this.persona.ap_paterno = item.ap_paterno;
            this.persona.ap_materno = item.ap_materno;
            this.persona.edad = item.edad;
            this.persona.direccion = item.direccion;
            this.persona.correo = item.correo;
            this.persona.telefono = item.telefono;
            this.persona.id = item.id;
        },
            editarPersona(persona){
            const params = {nombre: persona.nombre, ap_paterno: persona.ap_paterno, 
            ap_materno: persona.ap_materno, edad: persona.edad, direccion: persona.direccion, correo: persona.correo,
            telefono: persona.telefono};
            axios.put(`/personas/${persona.id}`, params)

                .then(res=>{
                this.editarActivo = false;
                const index = this.personas.findIndex(item => item.id === persona.id);
                this.personas[index] = res.data;
                })
            this.persona = {nombre: '', ap_paterno: '', ap_materno: '', edad: '', direccion: '', correo: '', telefono: ''};
        },
        agregar(){
            if(this.persona.nombre.trim() === '' || this.persona.ap_paterno.trim() === '' || 
            this.persona.ap_materno.trim() === '' || this.persona.edad.trim() === '' ||this.persona.direccion.trim() === '' 
            || this.persona.correo.trim() === '' || this.persona.telefono.trim() === ''){
                alert('Debes completar todos los campos antes de guardar');
                return;
            }

            const params = {
            nombre: this.persona.nombre, ap_paterno: this.persona.ap_paterno, 
            ap_materno: this.persona.ap_materno, edad: this.persona.edad, direccion: this.persona.direccion,
            correo: this.persona.correo, telefono: this.persona.telefono}
            this.persona.nombre = '';
            this.persona.ap_paterno = '';
            this.persona.ap_materno = '';
            this.persona.edad = '';
            this.persona.direccion = '';
            this.persona.correo = '';
            this.persona.telefono = '';
            axios.post('/personas', params)
                .then(res => {
                    this.personas.push(res.data)
                })
        },
    eliminarPersona(item,index){
        axios.delete(`/personas/${item.id}`)
            .then(()=>{
                this.personas.splice(index,1);
            })
        }
    }
}
</script>