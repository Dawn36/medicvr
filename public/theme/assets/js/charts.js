// ==============================================================================================================================================================
// START :: SUPER ADMIN
// ==============================================================================================================================================================

// Chart
var options = {
    series: [{
        name: 'Average Session',
        data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }],
    chart: {
        type: 'bar',
        height: 350
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: ['Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000', 'Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000', 'Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000'],
    },
    fill: {
        colors: ['#007860'],
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function(val) {
                return val + " Hrs"
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

// Chart-1
var options = {
    series: [{
        name: 'Total Session',
        data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }],
    chart: {
        type: 'bar',
        height: 350
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: ['Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000', 'Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000', 'Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000'],
    },
    fill: {
        colors: ['#16ab83'],
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function(val) {
                return val + " Sessions"
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector("#chart1"), options);
chart.render();

// ==============================================================================================================================================================
// END :: SUPER ADMIN
// ==============================================================================================================================================================

// ==============================================================================================================================================================
// START :: ADMIN
// ==============================================================================================================================================================

// Chart
var options = {
    series: [{
        name: 'Average Session',
        data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }],
    chart: {
        type: 'bar',
        height: 350
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: ['Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000', 'Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000', 'Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000'],
    },
    fill: {
        colors: ['#007860'],
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function(val) {
                return val + " Hrs"
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector("#chart2"), options);
chart.render();

// Chart-1
var options = {
    series: [{
        name: 'Total Session',
        data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }],
    chart: {
        type: 'bar',
        height: 350
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: ['Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000', 'Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000', 'Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000'],
    },
    fill: {
        colors: ['#16ab83'],
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function(val) {
                return val + " Sessions"
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector("#chart3"), options);
chart.render();

// ==============================================================================================================================================================
// END :: ADMIN
// ==============================================================================================================================================================

// ==============================================================================================================================================================
// START :: TEACHERS
// ==============================================================================================================================================================

// Chart
var options = {
    series: [{
        name: 'Average Session',
        data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }],
    chart: {
        type: 'bar',
        height: 350
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: ['Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000', 'Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000', 'Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000'],
    },
    fill: {
        colors: ['#007860'],
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function(val) {
                return val + " Hrs"
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector("#chart4"), options);
chart.render();

// Chart-1
var options = {
    series: [{
        name: 'Total Session',
        data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }],
    chart: {
        type: 'bar',
        height: 350
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: ['Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000', 'Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000', 'Mar 16 2017', 'Jan 22 2021', 'Dec 31 2000'],
    },
    fill: {
        colors: ['#16ab83'],
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function(val) {
                return val + " Sessions"
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector("#chart5"), options);
chart.render();

// ==============================================================================================================================================================
// END :: TEACHERS
// ==============================================================================================================================================================

// ==============================================================================================================================================================
// START :: STUDENTS
// ==============================================================================================================================================================

var options = {
    series: [{
        name: 'No. of Sessions',
        data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 2, 7, 5]
    }],
    chart: {
        height: 350,
        type: 'line',
    },
    forecastDataPoints: {
        count: 7
    },
    stroke: {
        width: 5,
        curve: 'smooth'
    },
    xaxis: {
        type: 'datetime',
        categories: ['1/11/2000', '2/11/2000', '3/11/2000', '4/11/2000', '5/11/2000', '6/11/2000', '7/11/2000', '8/11/2000', '9/11/2000', '10/11/2000', '11/11/2000', '12/11/2000', '1/11/2001', '2/11/2001', '3/11/2001', '4/11/2001', '5/11/2001', '6/11/2001'],
        tickAmount: 10,
        labels: {
            formatter: function(value, timestamp, opts) {
                return opts.dateFormatter(new Date(timestamp), 'dd MMM')
            }
        }
    },
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'dark',
            gradientToColors: ['#FDD835'],
            shadeIntensity: 1,
            type: 'horizontal',
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100, 100, 100]
        },
    }
};

var chart = new ApexCharts(document.querySelector("#chart6"), options);
chart.render();

// ==============================================================================================================================================================
// END :: STUDENTS
// ==============================================================================================================================================================