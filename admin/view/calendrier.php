<div id="about" class="section layout_padding">
         <div class="container">
            
            <div class="row">

                 <div class="col-lg-12 margin_top_10">
               <div class="full margin_top_10"">
                  <h3 class="main_heading _left_side margin_top_10">Liste des rendez-vous</h3>
                
                  <div id='calendar'></div>
                
               </div>
              
            </div>

           

               </div>

         </div>
      </div>
    

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'fr',
            events: function(fetchInfo, successCallback, failureCallback) {
                $.ajax({
                    url: '<?= base_url("calendrier_c/obtenir_reservations") ?>',
                    dataType: 'json',
                    success: function(data) {
                        successCallback(data);
                    },
                    error: function() {
                        failureCallback();
                    }
                });
            },
            dateClick: function(info) {
                var dateStr = info.dateStr;
                window.location.href = '<?= base_url("InsertionCalendrier_c/index?date=") ?>' + dateStr;
            },
            eventDidMount: function(info) {
                if (info.event.extendedProps.description) {
                    tippy(info.el, {
                        content: info.event.extendedProps.description,
                        placement: 'top'
                    });
                }
            }
        });

        calendar.render();
    });
</script>