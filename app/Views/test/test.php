<?= $this->extend('layout/app'); ?>

<?= $this->section('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js"></script>
<script>

    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar')
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: <?= $json; ?>,
        })
        calendar.render()
    })

</script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <div id='calendar'></div>
    </div>
</div>
<?= $this->endSection(); ?>