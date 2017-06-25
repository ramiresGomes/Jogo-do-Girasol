"use strict";

function setSectionWindowHeight(section) {
    section.css('min-height', $(window).height());
}

function notyGenerate(type, text, timeout = 5000, icon, layout = 'topRight') {
    new Noty({
        type: type,
        layout: layout,
        theme: 'metroui',
        text: '<div class="activity-item"><i class="fa pull-left '+icon+' text-'+type+'"></i> <div class="activity bold">'+text+'</div>',
        timeout: timeout,
        closeWith: ['click']
    }).show();
}