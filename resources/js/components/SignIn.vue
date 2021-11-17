<template>
    <div class="d-flex col-12 form-signin container justify-content-center align-content-center mt-5">
        <form action="/signInService" method="post">
            <input type="hidden" name="_token" :value="this.csrfToken">
            <h1 class="h3 mb-3 fw-normal text-center">Регістрація</h1>
            <div class="form-group mt-4">
                <label for="name">Ім'я</label>
                <input v-model="name" type="text" :class="'form-control ' + formErrors.name" id="name" name="name" placeholder="Ім'я">
            </div>
            <div class="form-group mt-4">
                <label for="surname">Прізвище</label>
                <input v-model="surname" type="text" :class="'form-control ' + formErrors.surname" id="surname" name="surname" placeholder="Прізвище">
            </div>
            <div class="form-group mt-4">
                <label for="email">Пошта</label>
                <input v-model="email" type="email" :class="'form-control ' + formErrors.email" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="form-group mt-4">
                <label for="password">Пароль</label>
                <input v-model="password" type="password" :class="'form-control ' + formErrors.password" id="password" name="password" placeholder="Пароль">
            </div>
            <div class="form-group mt-4">
                <label for="place">Заклад</label>
                <input v-model="place" type="text" :class="'form-control ' + formErrors.place" id="place" name="place" placeholder="Назва закладу">
            </div>
            <div class="form-group mt-4">
                <label for="role">Роль</label>
                <select name="role" id="role" class="form-select">
                    <option value="admin" selected>Адміністратор</option>
                    <option value="manager">Менеджер</option>
                    <option value="worker">Працівник</option>
                </select>
            </div>
            <div class="form-group text-center mt-4">
                <button class="btn btn-primary" type="submit" :disabled="active">Зареєструватися</button>
            </div>
            <div class="form-group text-center mt-4">
                <h5>Ще не створили свій заклад?</h5>
                <h6><a href="/createPlace" class="text-decoration-none">Створіть заклад</a></h6>
            </div>
            <div class="form-group text-center mt-4">
                <h5>Вже є акаунт?</h5>
                <h6><a href="/signUp" class="text-decoration-none">Увійти</a></h6>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "SignIn",
    props: {
        all_places: []
    },
    data: () => ({
        name: "",
        surname: "",
        email: "",
        password: "",
        place: "",
        formErrors: {
            name: "is-invalid",
            surname: "is-invalid",
            email: "is-invalid",
            password: "is-invalid",
            place: "is-invalid"
        },
        active: true
    }),
    updated() {
        let errors = Object.values(this.formErrors);
        this.active = errors.includes("is-invalid")
    },
    computed: {
        csrfToken: () => {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
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
        email() {
            this.formErrors.email = "is-valid";
            if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))) {
                this.formErrors.email = "is-invalid";
            }
        },
        password() {
            this.formErrors.password = "is-valid";
            if ((this.password.length < 5) || !(/[a-zA-Z0-9]/.test(this.password))) {
                this.formErrors.password = "is-invalid";
            }
        },
        place() {
            this.formErrors.place = "is-valid";
            let flag = this.all_places.filter(place => place.name === this.place)
            if (flag.length === 0) {
                this.formErrors.place = "is-invalid";
            }
        }
    },
}
</script>

<style scoped>
    form {
        margin-top: 3em;
    }
</style>
