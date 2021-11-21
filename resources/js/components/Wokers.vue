<template>
    <div class="d-flex flex-column col-10 container justify-content-center align-content-center mt-5">
        <input type="hidden" name="_token" :value="this.csrfToken">
        <div class="mt-3 p-4">
            <h3 class="text-center text-decoration-underline">Працівники</h3>
            <table class="table mt-4">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ім'я</th>
                    <th scope="col">Прiзвище</th>
                    <th scope="col">Пошта</th>
                    <th scope="col">Позиція</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="worker in this.workersData">
                    <th scope="row">{{ worker.id }}</th>
                    <td>{{ worker.name }}</td>
                    <td>{{ worker.surname }}</td>
                    <td>{{ worker.email }}</td>
                    <td>{{ worker.role }}</td>
<!--                    <td><a class="btn btn-primary" :href=editClient(client.id) >Змінити</a></td>-->
                </tr>
                </tbody>
            </table>
        </div>
        <a class="btn btn-primary" href="/addWorker">Додати нового працівника</a>
    </div>
</template>

<script>
export default {
    name: "Wokers",
    props: {
        workers: []
    },
    data() {
        return {
            workersData: JSON.parse(this.workers),
        }
    },
    computed: {
        csrfToken: function () {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    }
}
</script>

<style scoped>
    h3{
        font-family: 'Montserrat', sans-serif;
        font-size: 30px;
        margin-bottom: 50px;
        text-decoration: none;
    }
    table th{
        font-family: 'Montserrat', sans-serif;
        background: #A0A0A0;
        margin-right: 5px;
        color: white;
        padding: 10px 5px;
    }
    td:first-child {
        background:#A0A0A0;
        font-family: 'Montserrat', sans-serif;
        color: white;
        padding: 10px 5px;
    }
    th, td {
        border-style: solid;
        border-width: 0 1px 1px 0;
        border-color: white;
        font-size: 19px;
        font-family: 'Montserrat', sans-serif;
    }
    th, td:last-child {
        border-width: 0 1px 1px 0;
        border-color: white;
    }
    td {
        background: #E8E8E8;
    }
    th:first-child, td:first-child {
        text-align: center;
    }
    .btn{
        width: 380px;
        position: relative;
        left: 30px;
        border-radius: 20px;
        font-family: 'Montserrat', sans-serif;
        font-size: 24px;
    }
</style>
