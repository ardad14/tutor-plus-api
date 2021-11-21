<template>
    <div class="container-fluid">
        <div class="row">
            <analytics-sidebar currentTab="month" />
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="col-5 h2">Місячна</h1>
                    <h2 class="h3">{{ this.month }}</h2>
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
import { Bar, Line } from 'vue-chartjs'

export default {
    name: "AnalyticsMonth",
    extends: Bar,
    props: {
        actions: [],
    },
    data() {
        return {
            actionsData: JSON.parse(this.actions).filter(data => moment(data.created_at).month() === moment().get('month')),
            allMonth: [
                'Лютий',
                'Січень',
                'Березень',
                'Квітень',
                'Травень',
                'Червень',
                'Липень',
                'Серпень',
                'Вересень',
                'Жовтень',
                'Листопад',
                'Грудень',
            ],
            month: Number,
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
        setUpChart: function () {
            let actionsData = this.actionsData.filter(data => moment(data.created_at).month() === moment().get('month'));

            let labels = actionsData.map(data => data.client_id);
            let data = actionsData.map(data => data.spend_money);
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
        this.month = this.allMonth[moment().get('month')];
    }

}
</script>

<style scoped>
    h1{
        font-family: 'Montserrat', sans-serif;
        font-size: 30px;
        font-weight: 500;
    }
    h2{
        font-family: 'Montserrat', sans-serif;
        font-size: 30px;
        font-weight: 500;
        margin: 30px 0;
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
        font-size: 18px;
    }
    td {
        background: #E8E8E8;
    }
    th:first-child, td:first-child {
        text-align: center;
    }
</style>
