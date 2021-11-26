<template>
    <div class="d-flex flex-column col-10 container justify-content-center align-content-center ">
        <input type="hidden" name="_token" :value="this.csrfToken">
        <div class="mt-3 p-4">
            <h3 class="text-center text-decoration-underline">{{ $t("clients.title") }}</h3>
            <table class="table mt-4">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ $t("clients.table.name") }}</th>
                    <th scope="col">{{ $t("clients.table.surname") }}</th>
                    <th scope="col">{{ $t("clients.table.age") }}</th>
                    <th scope="col">{{ $t("clients.table.spendMoney") }}</th>
                    <th scope="col">.</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="client in this.clientsData">
                    <th scope="row">{{ client.id }}</th>
                    <td>{{ client.name }}</td>
                    <td>{{ client.surname }}</td>
                    <td>{{ client.age }}</td>
                    <td>{{ client.spend_money }} грн</td>
                    <td><a class="btn btn-primary" :href=editClient(client.id) >{{ $t("clients.table.change") }}</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "Clients",
    props: {
        clients: []
    },
    data() {
        return {
            clientsData: JSON.parse(this.clients),
        }
    },
    methods: {
        editClient: function (id) {
            return `/editClient/${id}`;
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
    th:last-child{
        color:#A0A0A0;
    }
    td:last-child{

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
        width: 100px;
        position: relative;
        left: 25px;
        border-radius: 20px;
        font-family: 'Montserrat', sans-serif;
        font-size: 18px;
    }
</style>
