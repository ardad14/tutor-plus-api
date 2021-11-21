<template>
    <div class="d-flex col-12 form-signin container justify-content-center align-content-center mt-5">
        <form :action=editLink method="post">
            <input type="hidden" name="_token" :value="this.csrfToken">
            <h1 class="h3 mb-3 fw-normal text-center">Змінити клієнта</h1>
            <div class="form-group mt-4">
                <label for="name">Ім'я</label>
                <input v-model="name" type="text" :class="'form-control ' + formErrors.name" id="name" name="name">
            </div>
            <div class="form-group mt-4">
                <label for="surname">Прізвище</label>
                <input v-model="surname" type="text" :class="'form-control ' + formErrors.surname" id="surname" name="surname">
            </div>
            <div class="form-group mt-4">
                <label for="age">Вік</label>
                <input v-model="age" type="number" :class="'form-control ' + formErrors.age" id="age" name="age">
            </div>
            <div class="form-group1 text-center mt-4">
                <button class="btn btn-primary" type="submit" :disabled="active">Змінити</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "EditClient",
    props: {
        client: {}
    },
    data() {
        return {
            clientData: JSON.parse(this.client),
            name: "",
            surname: "",
            age: "",
            formErrors: {
                name: 'is-valid',
                surname: 'is-valid',
                age: 'is-valid',
            },
            active: true
        }
    },
    computed: {
        csrfToken: function () {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
        editLink: function () {
            return `/editClientService/${this.clientData.id}`;
        }
    },
    mounted() {
        this.name = this.clientData.name;
        this.surname = this.clientData.surname;
        this.age = this.clientData.age;
    },
    updated() {
        let errors = Object.values(this.formErrors);
        this.active = errors.includes("is-invalid")
    },
    watch: {
        name() {
            this.formErrors.name = "is-valid";
            if (this.name.length < 3 || this.name.length > 32) {
                this.formErrors.name = "is-invalid";
            }
        },
        surname() {
            this.formErrors.surname = "is-valid";
            if (this.surname.length < 4 || this.surname.length > 32) {
                this.formErrors.surname = "is-invalid";
            }
        },
    }
}
</script>

<style scoped>
    form {
        margin-top: 3em;
    }
    .container{
        padding: 0 0 10px 0;
        border-radius: 7px;
        border: 2px solid #ca84dc;
        box-shadow: 15px 15px 0 0 #ca84dc;
        max-width: 650px;
    }
    .form-group{
        margin-bottom: 40px;
        display: flex;
        justify-content: space-between;
    }
    .form-group input{
        width:300px;
        position: relative;
        left: 60px;
        border-radius: 10px;
        font-family: 'Montserrat', sans-serif;
        font-size: 20px;
    }
    .form-group label{
        margin-top: 5px;
        font-size: 22px;
        font-family: 'Montserrat', sans-serif;
        font-weight: 500;
    }
    h1{
        font-family: 'Montserrat', sans-serif;
        font-size: 38px;
        font-weight: 700;
        position: relative;
        bottom: 10px;
    }
    .btn{
        margin: 0 0 10px 0;
        width: 240px;
        border-radius: 10px;
        font-family: 'Montserrat', sans-serif;
        font-size: 22px;
        color:#fff;
    }
    a{
        background-color: #ca84dc;
        border:#ca84dc;
        color:#fff;
    }
</style>
