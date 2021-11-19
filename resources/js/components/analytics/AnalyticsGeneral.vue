<template>
    <div class="container-fluid">
        <div class="row">
            <analytics-sidebar currentTab="general" />
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Загальна</h1>
<!--                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            This week
                        </button>
                    </div>-->
                </div>

                <canvas class="my-4 w-100 chartjs-render-monitor" ref="canvas" id="myChart"  width="1479" height="624" style="display: block; width: 1479px; height: 624px;"></canvas>

                <h2>Необроблені дані</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Клієнт</th>
                            <th scope="col">Грощі</th>
                            <th scope="col">Дата</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(action, index) in this.actionsData">
                            <td>{{ index }}</td>
                            <td>{{ action.client_id }}</td>
                            <td>{{ action.spend_money }}</td>
                            <td>{{ convertData(action.created_at) }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
import moment from 'moment/moment';
import { Bar } from 'vue-chartjs'

export default {
    name: "AnalyticsGeneral",
    extends: Bar,
    props: {
        actions: [],
    },
    data() {
        return {
            actionsData: JSON.parse(this.actions),
        }
    },
    methods: {
        convertData: function (date) {
            return moment(date).format("MMMM Do YYYY, h:mm:a")
        }
    },
    mounted: function () {
        let actionsData = this.actionsData;
        let monthMoney = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        console.log(monthMoney);

        actionsData.forEach(data => {monthMoney[moment(data.created_at).month()] += data.spend_money})


        let chartData = {
            labels: moment.months(),
            datasets: [{
                label: 'Money',
                data: monthMoney,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(39, 174, 96, 0.5)',
                    'rgba(72, 52, 212, 0.5)',
                    'rgba(253, 121, 168, 0.5)',
                    'rgba(162, 155, 254, 0.5)',
                    'rgba(83, 92, 104, 0.5)',
                    'rgba(186, 220, 88, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(39, 174, 96, 1.0)',
                    'rgba(72, 52, 212, 1.0)',
                    'rgba(253, 121, 168, 1.0)',
                    'rgba(162, 155, 254, 1.0)',
                    'rgba(83, 92, 104, 1.0)',
                    'rgba(186, 220, 88, 1.0)'
                ],
                borderWidth: 2
            }]
        };

        let options = {
            legend: {
                display: false
            }
        }
        this.renderChart(chartData, options);
    }
}
</script>

<style scoped>

</style>
