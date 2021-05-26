// var picker = new Lightpick({ field: document.getElementById('datepicker') });
var picker = new Lightpick({
    field: document.getElementById('datepicker'),
    minDate: moment().startOf('month').add((new Date().getDate()-1), 'day'),
});
// const FECHA = document.querySelector("#datepicker");
// FECHA.addEventListener("onchange", ()=>{
//     console.log("a");
// })
