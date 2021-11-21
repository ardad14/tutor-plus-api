<template>
    <div class="d-flex col-12 form-signin container justify-content-center align-content-center mt-5">
        <form action="/createPlaceService" method="post">
            <input type="hidden" name="_token" :value="this.csrfToken">
            <h1 class="h3 mb-3 fw-normal text-center">Створення закладу</h1>
            <div class="form-group mt-4">
                <label for="name"><h5>Назва</h5></label>
                <input v-model="name" type="text" :class="'form-control ' + this.formErrors.name" id="name" name="name" placeholder="Назва">
            </div>
            <div class="form-group mt-4">
                <label for="address"><h5>Адреса</h5></label>
                <input v-model="address" type="text" :class="'form-control ' + this.formErrors.address" id="address" name="address" placeholder="Адреса">
            </div>
            <div class="form-group mt-4">
                <label for="working_start"><h5>З котрої години працюєте</h5></label>
                <input v-model="working_start" type="time" :class="'form-control ' + this.formErrors.working_start" id="working_start" name="working_start">
            </div>
            <div class="form-group mt-4">
                <label for="working_end"><h5>По котру годину працюєте</h5></label>
                <input v-model="working_end" type="time" :class="'form-control ' + this.formErrors.working_end" id="working_end" name="working_end">
            </div>
            <div class="form-group text-center mt-3">
                <a class="btn " href="/">Повернутись</a>
                <button class="btn btn-primary" type="submit" :disabled="active">Створити</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "CreatePlace",
    data() {
        return {
            name: "",
            address: "",
            working_start: "",
            working_end: "",
            formErrors: {
                name: 'is-invalid',
                address: 'is-invalid',
                working_start: 'is-invalid',
                working_end: 'is-invalid',
            },
            active: true
        }
    },
    updated() {
        let errors = Object.values(this.formErrors);
        this.active = errors.includes("is-invalid")
    },
    computed: {
        csrfToken: function () {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    },
    watch: {
        name() {
            this.formErrors.name = 'is-valid';
            if (this.name.length < 5) {
                this.formErrors.name = 'is-invalid';
            }
        },
        address() {
            this.formErrors.address = 'is-valid';
            if (this.address.length < 6) {
                this.formErrors.address = 'is-invalid';
            }
        },
        working_start() {
            this.formErrors.working_start = 'is-valid';
            if (this.working_start.length === 0) {
                this.formErrors.working_start = 'is-invalid';
            }
        },
        working_end() {
            this.formErrors.working_end = 'is-valid';
            if (this.working_end.length === 0) {
                this.formErrors.working_end = 'is-invalid';
            }
        }
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
        left: 20px;
        border-radius: 10px;
        font-family: 'Montserrat', sans-serif;
        font-size: 20px;
    }
    .form-group label{
        margin-top: 9px;
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
