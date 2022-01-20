new Vue({
    el: '#barChart',
    data: {
        selected_month_year: null,
        chart: [],
        monthYear: [],
        data: [],
        total_daily: '',
    },
    methods: {
        changeSaleDate() {
            if(!this.selected_month_year) {
                $('#saleDivChart').html(`
                    <canvas id="saleChart" style="width:100%; max-width: 100%"></canvas>
                `);
                return;
            }

            var monthYear = this.selected_month_year.split("-");
            var year = monthYear[0];
            var month = monthYear[1];

            if(this.chart[this.selected_month_year]) {
                this.setChart(this.chart[this.selected_month_year]);
                return;
            }
            showLoading();
            axios.get(`/admin/dashboard/chart/${year}/${month}`)
            .then(response => {
                hideLoading();
                if (response.data.success) {
                    this.chart[this.selected_month_year] = response.data.data;
                    this.setChart(response.data.data);
                } else {
                    showAlertError(response.data.message);
                    hideLoading()
                }
            }).catch(error => {
                hideLoading();
                console.log(error);
                showAlertError('Cannot get data!');
            });
        },

        setChart(data) {
            $('#saleDivChart').html(`
                <canvas id="saleChart" style="width:100%; max-width: 100%"></canvas>
            `);
            
            new Chart("saleChart", {
                type: "bar",
                data: {
                    labels: _.range(1, data.grand_total.length+ 1),
                    datasets: [
                        { 
                            label: 'ទឹកប្រាក់លក់បាន',
                            backgroundColor: 'rgba(23,162,184,1)',
                            fillColor: 'rgba(210, 214, 222, 1)',
                            strokeColor: 'rgba(210, 214, 222, 1)',
                            pointColor: 'rgba(210, 214, 222, 1)',
                            pointStrokeColor: '#c1c7d1',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(220,220,220,1)',
                            data: data.grand_total
                        },
                    ]
                },
                options: {
                legend: {
                    display: true,
                },
                scales: {
                    yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                    }],
                }
                }
            });
        },
    },
    
});