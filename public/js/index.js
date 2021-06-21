var picker = new Lightpick({
    field: document.getElementById('txtDate'),
    minDate: moment().startOf('month').add((new Date().getDate()-1), 'day'),
});

// $(document).ready(function () {
//     calendar();
// })

// function calendar() {
//     if ($('#txtDate').length) {
//         let currentTime = $('#txtTime option:selected').val();
//         $('#txtTime').on('change', function () {
//             currentTime = $('#txtTime').val();
//             LightpickCalendar(currentTime);
//         })
//         LightpickCalendar(currentTime);
//     }
// }
// function LightpickCalendar(currentTime) {
//     let picker = new Lightpick({
//         field: document.getElementById('txtDate'),
//         singleDate: true,
//         format: 'YYYY-MM-DD',
//         hoveringTooltip: false,
//         minDate: currentTime > 17 ? moment().startOf('day').add(1, 'day') : moment().startOf('day'),
//         onSelect: function () {
//             hours(picker.toString('YYYY-MM-DD'))
//         }
//     });
//     picker.setDate(new Date(currentTime > 17 ? moment().startOf('day').add(1, 'day') : moment().startOf('day')));
// }
// function hours(date) {
//     let currentHour = date == moment().format('YYYY-MM-DD').toString() ? moment().hour() + 4 : 7;

//     const array = [
//         [7, '07:00 A.M.'],
//         [8, '08:00 A.M.'],
//         [9, '09:00 A.M.'],
//         [10, '10:00 A.M.'],
//         [11, '11:00 A.M.'],
//         [12, '12:00 M.'],
//         [13, '01:00 P.M.'],
//         [14, '02:00 P.M.'],
//         [15, '03:00 P.M.'],
//         [16, '04:00 P.M.'],
//         [17, '05:00 P.M.'],
//         [18, '06:00 P.M.'],
//         [19, '07:00 P.M.'],
//         [20, '08:00 P.M.']
//     ];

//     let time = document.getElementById('time');
//     let html = '';
//     html += '<select name="txtTime" id="txtTime" class="form-control">';
//     array.forEach(function (e) {
//         if (e[0] >= currentHour)
//             html += '<option value="' + e[0] + '" >' + e[1] + '</option>';
//     });
//     html += '</select>';
//     time.innerHTML = html;
// } codigo del profesor actualizado (este lo mando la segunda vez, pero no funciono tampoco - el calendario no se quita despues de haber seleccionado la fecha)

// function calendar(){
//     if( $('#txtDate').length )
//     {
//             hours( moment().format('YYYY-MM-D') )

//       let currentTime = $('#txtTime option:selected').val()
//       $('#txtTime').on('change', function(){
//         currentTime = $('#txtTime').val();
//         LightpickCalendar( currentTime );
//       })

//       LightpickCalendar( currentTime );
//     }
//   }

// function LightpickCalendar( currentTime ){
//   let picker = new Lightpick({
//     field: document.getElementById('txtDate'),
//     singleDate: true,
//     format:'YYYY-MM-DD',
//     hoveringTooltip:false,
//     minDate: currentTime > 17 ? moment().startOf('day').add(1, 'day') : moment().startOf('day'),
//     onClose:function(){
//       let element = document.getElementById('txtDate');
//     },
//         onSelect:function(){
//             hours( picker.toString('YYYY-MM-DD') )
//         }
//   });
//     picker.setDate(new Date( currentTime > 17 ? moment().startOf('day').add(1, 'day') : moment().startOf('day') ));
// }



// function hours( date ){
//     let currentHour = date == moment().format('YYYY-MM-D') ? moment().add(4, 'hours').hour() : moment().hour();
//     const array = [
//         [7, '07:00 A.M.'],
//         [8, '08:00 A.M.'],
//         [9, '09:00 A.M.'],
//         [10, '10:00 A.M.'],
//         [11, '11:00 A.M.'],
//         [12, '12:00 M.'],
//         [13, '01:00 P.M.'],
//         [14, '02:00 P.M.'],
//         [15, '03:00 P.M.'],
//         [16, '04:00 P.M.'],
//         [17, '05:00 P.M.'],
//         [18, '06:00 P.M.'],
//         [19, '07:00 P.M.'],
//         [20, '08:00 P.M.']
//     ];

//     let txtTime = document.getElementById('txtTime');
//     txtTime.innerHTML = '';
//     array.forEach( function( e ){
//         if( e[0] >= currentHour )
//         {
//             let option = document.createElement("option");
//                 option.value = e[0];
//                 option.text = e[1];
//                 txtTime.add(option);
//         }
//     });
// }
//todo el codigo de la linea 59 a la 123 es el que mandó el profesor la primera vez, este funciona bien pero sin las validaciones de las horas(deberia mostrar solo las horas con 4 horas de anticipacion de la actual - a demas si se cambia el dia actual deberia mstrar las horas de sde las 7 a.m hasta las 8 p.m)
