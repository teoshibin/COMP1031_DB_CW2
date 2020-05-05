function storeValue(value, text, name) {
    if (value != null && value != '') {
        $('select[name$="'+name+'"]').val(value);
    }
}