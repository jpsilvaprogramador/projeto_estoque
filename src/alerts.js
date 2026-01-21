<script>
    //Seleciona todos os alerts
    const alerts = document.querySelectorAll('.alert');

    alerts.forEach(alert => {
        //Define o tempo (em ms) para desaparecer
        setTimeout(() => {
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(() => {
                alert.remove();
            }, 500)
        }, 4000)
    });
</script>