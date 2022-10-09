function numberInput(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    // alert(charCode);
    if (charCode > 31 && (charCode < 46 || charCode > 57))
        return false;
    return true;
}

function checkNumber(data, event) {
    var jml = $(data).val();
    var min = parseInt($(data).attr('min'));
    var max = parseInt($(data).attr('max'));
    if (parseInt(jml.replaceAll('.', '')) < min) {
        $(data).val(min);
    }
    if (jml == '') {
        if (event.type == 'blur') {
            $(data).val(min);
        }
    }
    if (parseInt(jml.replaceAll('.', '')) > max) {
        $(data).val(max);
    }
}

function changeRupe(data) {
    var val = formatRupiah($(data).val(), 'Rp. ');
    $(data).val(val);
}

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
}

function twoDigitNumber(numb) {
    if (parseInt(numb) < 10) {
        return '0' + numb;
    } else {
        return numb;
    }
}