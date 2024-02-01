

        document.addEventListener("DOMContentLoaded", function() {

       
            fetch('your_php_data_script.php')
                .then(response => response.json())
                .then(data => {
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: data,
                        options:{
                        width:400,
                        height:400,
                    },
                    });
                });
        });
        
