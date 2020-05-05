function storeValue(value, name) {
    if (value != null && value != '') {
        $('select[name$="'+name+'"]').val(value);
    }
}