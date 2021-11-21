<template>
    <div class="d-flex col-12 form-signin container justify-content-center align-content-center mt-5">
        <form action="/addWorkerService" method="post">
            <input type="hidden" name="_token" :value="this.csrfToken">
            <h1 class="h3 mb-3 fw-normal text-center">Додавання працівника</h1>
            <div class="form-group mt-4">
                <label for="email">Пошта</label>
                <input v-model="email" type="email" :class="'form-control ' + formErrors.email" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="form-group mt-4">
                <label for="role">Роль</label>
                <select name="role" id="role" class="form-select">
                    <option value="admin" selected>Адміністратор</option>
                    <option value="manager">Менеджер</option>
                    <option value="worker">Працівник</option>
                </select>
            </div>
            <div class="form-group1 text-center mt-4">
                <button class="btn btn-primary" type="submit" :disabled="active">Створити</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "AddWorker",
    data: () => ({
        email: "",
        formErrors: {
            email: "is-invalid",
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
        email() {
            this.formErrors.email = "is-valid";
            if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))) {
                this.formErrors.email = "is-invalid";
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
    padding: 0px 0 40px 0;
    border-radius: 7px;
    border: 2px solid #ca84dc;
    box-shadow: 15px 15px 0 0 #ca84dc;
    max-width: 600px;
  }
  .form-group{
    margin-bottom: 40px;
    display: flex;
    justify-content: space-between;
  }
  .form-group input{
    margin-left: 50px;
    width:300px;
    position: relative;
    left: 20px;
    border-radius: 10px;
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
  }
  .form-group label{
    margin-top: 6px;
    font-family: 'Montserrat', sans-serif;
    font-size: 22px;
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
    margin: 10px 0 10px 0;
    width: 160px;
    border-radius: 10px;
    font-family: 'Montserrat', sans-serif;
    font-size: 22px;
  }
  .form-select{
    position: relative;
    left: 20px;
    width:300px;
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
    border-radius: 10px;
    margin-bottom: 10px;
  }
</style>
