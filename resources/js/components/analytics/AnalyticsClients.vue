<template>
    <div class="container-fluid">
        <div class="row">
            <analytics-sidebar currentTab="clients" />
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="col-5 h2">Клієнти</h1>
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
    name: "AnalyticsClients",
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
        },
        randRGBNumber: function () {
            return Math.floor(Math.random() * 255);
        },
        generateRGBA: function () {
            let COLORS = [];
            while (COLORS.length < 100) {
                COLORS.push(`rgba(${this.randRGBNumber()}, ${this.randRGBNumber()}, ${this.randRGBNumber()}, `);
            }
            return COLORS;
        },
        calculateMedian: function (array) {
            let half = Math.floor(array.length / 2);
            array.sort(function(a, b) { return a - b;});

            if (array.length % 2) {
                return array[half];
            } else {
                return (array[half] + array[half] + 1) / 2.0;
            }
        },
        setUpChart: function () {
            let actionsData = this.actionsData;

            let children = actionsData.filter(data => data.age >= 10 && data.age <= 14);
            let teenagers = actionsData.filter(data => data.age >= 15 && data.age <= 24);
            let young = actionsData.filter(data => data.age >= 25 && data.age <= 44);
            let mid = actionsData.filter(data => data.age >= 45 && data.age <= 64);
            let old  = actionsData.filter(data => data.age >= 65);

            let childrenMoney = 0;
            let teenagersMoney = 0;
            let youngMoney = 0;
            let midMoney = 0;
            let oldMoney = 0;

            children.forEach(data => {childrenMoney += data.spend_money});
            teenagers.forEach(data => {teenagersMoney += data.spend_money});
            young.forEach(data => {youngMoney += data.spend_money});
            mid.forEach(data => {midMoney += data.spend_money});
            old.forEach(data => {oldMoney += data.spend_money});

            console.log(childrenMoney);

            let labels = ['10-14', '15-24', '25-44', '45-64', '65+']
            let data = [childrenMoney, teenagersMoney, youngMoney, midMoney, oldMoney];
            let colors = this.generateRGBA();

            let chartData = {
                labels: labels,
                datasets: [{
                    label: 'Money',
                    data: data,
                    backgroundColor: colors.map(color => color + '0.5)'),
                    borderColor: colors.map(color => color + '1)'),
                    borderWidth: 2,
                }]
            };

            let options = {
                legend: {
                    display: false
                }
            }
            this.renderChart(chartData, options);
        }


    },
    mounted: function () {
        this.setUpChart();
    }

}
</script>

<style scoped>

</style>
