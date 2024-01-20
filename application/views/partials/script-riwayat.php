<!-- MyScript -->
<script src="<?= base_url('assets/'); ?>js/index.js"></script>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- Bootstrap JS -->
<script src="<?= base_url('assets/'); ?>bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop:false,
        margin:5,
        nav:true,
        dots:false,
        autoplay:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            992:{
                items:4
            },
            1200:{
                items:5
            }
        }
    });
</script>

<!-- Google Graph -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Tanggal', 'Lingkar Kepala', 'Tinggi Badan', 'Lebar Bahu'],
            ['25 Januari 2023', '15cm', 400, 200],
            ['25 Februari 2023', '17cm', 460, 250],
            ['25 Maret 2023', '20cm', 1120, 300],
            ['25 April 2023', '25cm', 540, 350]
        ]);

        var options = {
            chart: {
                title: 'Riwayat Pertumbuhan Bayi',
                subtitle: '',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
}
</script>

<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php foreach ($pertumbuhan as $key) { ?>
<script>
    const ctx = document.getElementById('<?= $key['nik_anak'] ?>');

    var myChart = new Chart(ctx, {
        type: 'scatter',
        data: {
            datasets: [{
                type: 'line',
                label: 'Lingkar Kepala',
                data: [<?php foreach($pertumbuhan as $key) {$i=0; if($key['nik_ibu']==$this->session->userdata('nik_ibu')){if($i==0){echo $key['lk_lahir'].', ';}echo $key['lk'].', ';}} ?>],
                yAxisID: 'Centimeter'
                }, {
                type: 'line',
                label: 'Tinggi Badan',
                data: [<?php foreach($pertumbuhan as $key) {$i=0; if($key['nik_ibu']==$this->session->userdata('nik_ibu')){if($i==0){echo $key['tb_lahir'].', ';}echo $key['tb'].', ';}} ?>],
                yAxisID: 'Centimeter'
                }, {
                type: 'line',
                label: 'Berat Badan',
                data: [<?php foreach($pertumbuhan as $key) {$i=0; if($key['nik_ibu']==$this->session->userdata('nik_ibu')){if($i==0){echo $key['bb_lahir'].', ';}echo $key['bb'].', ';}} ?>],
                yAxisID: 'Kilogram'
                }],
            labels: [<?php foreach($pertumbuhan as $key) {$i=0; if($key['nik_ibu']==$this->session->userdata('nik_ibu')){if($i==0){$bulan = $this->M_riwayat->tanggal_indo($key["tgl_lahir"]); echo '"'.$bulan.'", ';}$bulan = $this->M_riwayat->tanggal_indo($key["tanggal_periksa"]); echo '"'.$bulan.'", '; }} ?>]
            
        },
        options: {
            responsive: true,
            scales: {
                Centimeter: {
                    max: 50,
                    beginAtZero: true,
                    type: 'linear',
                    position: 'left',
                    ticks: {
                        callback: value => `${value} cm`
                        
                    }
                },
                Kilogram: {
                    max: 50,
                    beginAtZero: true,
                    type: 'linear',
                    position: 'right',
                    ticks: {
                        callback: value => `${value} kg`
                    },
                    grid: {
                        display: false
                    }
                }
                
            }
            },
            plugins: {
                tooltip: {
                    yAlign: 'bottom',
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var label = myChart.data.datasets[tooltipItem.datasetIndex].label;
                            var value = myChart.data.datasets[tooltipItem.datasetIndex].data[tooltipItem.dataIndex];
                            if (label == "Berat Badan") {
                                return label + ' : ' + value + ' kg';
                            }else {
                                return label + ' : ' + value + ' cm';
                            }
                        }
                    }
                }
            }
        }
    );
</script>
<?php } ?>