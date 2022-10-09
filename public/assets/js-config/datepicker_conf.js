function datepickerShow(class_name = 'date-picker', year = '') {
    var conf = {
        language: 'id',
        autoclose: true,
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        toggleActive: true,
        orientation: 'bottom left',
        // startDate: '0d',
    };
    if (year !== '') {
        conf['startDate'] = '01/01/' + year;
        conf['endDate'] = '31/12/' + year;
    }
    $('.' + class_name).datepicker(conf);
}