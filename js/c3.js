// Zoom Chart
c3.generate({
    bindto: '#chart-zoom',
    data: {
        columns: [
            ['Orders', 6, 8, 18, 13, 24, 32, 15, 9, 13, 21, 18, 19, 14, 7, 23, 29]
        ]
    },
    zoom: {
        enabled: true
    }
});
