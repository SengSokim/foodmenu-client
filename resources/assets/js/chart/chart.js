new Vue({
    el: '#chart',
    data: {
        daily_order: daily_order,
        monthly_order: monthly_order,
    },
    methods: {
        alert() {
            alert('123')
        },  
        filterConfirmedOrder(yearAndMonth) {
            showLoading();

            let monthYear = yearAndMonth.split("-");
            let y = monthYear[0];
            let m = monthYear[1];

            axios.get(`/admin/chart/daily_order/${y}/${m}`
            ).then(response => {
                if (response.data.success) {
                    hideLoading();
                    this.OrderChart(response.data.data.total, "confirmed_order");
                    console.log(response.data.data.total);
                } else {
                    showAlertError(response.data.message);
                    hideLoading()
                }
            }).catch(error => {
                hideLoading();
                showAlertError('Cannot get data confirmed order!');
                console.log(error)
            })
        },

        filterPendingOrder(yearAndMonth) {
            showLoading();

            let monthYear = yearAndMonth.split("-");
            let y = monthYear[0];
            let m = monthYear[1];

            axios.get(`/admin/chart/monthly_order/${y}/${m}`
            ).then(response => {
                if (response.data.success) {
                    hideLoading();
                    this.OrderChart(response.data.data.total, "pending_order");
                    console.log(response.data.data.total);
                } else {
                    showAlertError(response.data.message);
                    hideLoading()
                }
            }).catch(error => {
                hideLoading();
                showAlertError('Cannot get data pending order!');
                console.log(error)
            })
        },

        OrderChart(val, check_type) {
            new Chart(check_type, {
                type: "bar",
                data: {
                    labels: _.range(1, val.length + 1),
                    datasets: [{
                        label: '',
                        backgroundColor: 'rgb(18,44,75)',
                        data: val,
                    }, ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                            },
                            scaleLabel: {
                                display: false
                            }
                        }]
                    },
                    legend: {
                        display: false,
                        labels: {
                            fontColor: '#122C4B',
                            fontFamily: "'Muli', sans-serif",
                            padding: 25,
                            boxWidth: 25,
                            fontSize: 14,
                        }
                    },
                }
            });
        }
    },

    mounted() {
        $("#filter_date_confirmed_order").datetimepicker({
            defaultDate: new Date(),
            orientation: 'bottom',
            format: 'yyyy-MM',
            autoclose: true,
            viewMode: 'months',
            dateFormat: 'MM yy',
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
        }),
        $("#filter_date_confirmed_order").on("change.datetimepicker", (e) => {
            this.filterConfirmedOrder($('#filter_date_confirmed_order_input').val());
        });

        $("#filter_date_pending_order").datetimepicker({
            defaultDate: new Date(),
            orientation: 'bottom',
            format: 'yyyy-MM',
            autoclose: true,
            viewMode: 'months',
            dateFormat: 'MM yy',
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
        }),
        $("#filter_date_pending_order").on("change.datetimepicker", (e) => {
            this.filterPendingOrder($('#filter_date_pending_order_input').val());
        });


        new Chart("daily_order", {
            type: "line",
            data: {
                labels: _.range(1, this.daily_order.length + 1),
                datasets: [{
                    label: '',
                    backgroundColor: 'rgb(18,44,75)',
                    data: this.daily_order,
                }, ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        },
                        scaleLabel: {
                            display: false
                        }
                    }]
                },
                legend: {
                    display: false,
                    labels: {
                        fontColor: '#122C4B',
                        fontFamily: "'Muli', sans-serif",
                        padding: 25,
                        boxWidth: 25,
                        fontSize: 14,
                    }
                },
            }
        });

        new Chart("monthly_order", {
            type: "bar",
            data: {
                labels: _.range(1, this.monthly_order.length + 1),
                datasets: [{
                    label: '',
                    backgroundColor: 'rgb(18,44,75)',
                    data: this.monthly_order,
                }, ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        },
                        scaleLabel: {
                            display: false
                        }
                    }]
                },
                legend: {
                    display: false,
                    labels: {
                        fontColor: '#122C4B',
                        fontFamily: "'Muli', sans-serif",
                        padding: 25,
                        boxWidth: 25,
                        fontSize: 14,
                    }
                },
            }
        });
    },
});
