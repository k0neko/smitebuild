$(function(){
    $('#gods').select2({
        templateResult: formatState

    });
    $('select[data-select="true"').select2({
        templateResult: formatState

    });
})
function formatState (state) {
    //if (!state.id) { return state.text; }
    var $state = $(
        '<span><img src="/Smite_Build/web/img/icon/' + state.text.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
    );
    return $state;

};