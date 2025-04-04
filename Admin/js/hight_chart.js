// Set up the chart
const chart = new Highcharts.Chart({
    chart: {
        renderTo: 'container',
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 15,
            beta: 15,
            depth: 50,
            viewDistance: 25
        }
    },
    xAxis: {
        categories: [
            'ເດືອນມັນງກອນ', 'ເດືອນມັນງກອນ', 'ເດືອນມັນງກອນ', 'ເດືອນມັນງກອນ', 'ເດືອນມັນງກອນ', 'ເດືອນມັນງກອນ',
            'ເດືອນມັນງກອນ', 'ເດືອນມັນງກອນ', 'ເດືອນມັນງກອນ', 'ເດືອນມັນງກອນ', 'ເດືອນມັນງກອນ', 'ເດືອນມັນງກອນ'
        ]
    },
    yAxis: {
        title: {
            enabled: false
        }
    },
    tooltip: {
        headerFormat: '<b>{point.key}</b><br>',
        pointFormat: 'Cars sold: {point.y}'
    },
    title: {
        text: 'ກຣາຟລາຍງານລາຍຈ່າຍ',
        align: 'center',
    },
    legend: {
        enabled: false
    },
    plotOptions: {
        column: {
            depth: 25
        }
    },
    series: [{
        data: [1318, 1073, 1060, 813, 775, 745, 537, 444, 416, 395, 233, 255],
        colorByPoint: true
    }]
});

function showValues() {
    document.getElementById(
        'alpha-value'
    ).innerHTML = chart.options.chart.options3d.alpha;
    document.getElementById(
        'beta-value'
    ).innerHTML = chart.options.chart.options3d.beta;
    document.getElementById(
        'depth-value'
    ).innerHTML = chart.options.chart.options3d.depth;
}

// Activate the sliders
document.querySelectorAll(
    '#sliders input'
).forEach(input => input.addEventListener('input', e => {
    chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
    showValues();
    chart.redraw(false);
}));

showValues();
