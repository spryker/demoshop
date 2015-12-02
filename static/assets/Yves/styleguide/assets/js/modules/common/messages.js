import $ from 'jquery';

'use strict';


// singleton instance
let instance = null;

// hide message (fadeout and remove)
function hide ($message) {
    $message.fadeOut(function () {
        $message.remove();
    });
}

function show ($message, delay) {
    setTimeout(function () {
        $message.fadeIn();

        //auto hide after 5s
        setTimeout(function () {
            hide($message);
        }, 5000);
    }, delay);
}

// singleton
export class MessageService {

    // prepare dom, add events
    constructor() {

        // return single instance
        if(!instance){
            instance = this;
        }

        // add message container if not existing
        if (!$('.messages').size()) {
            $('body').append($(`
                <div class="messages"></div>
            `));
        }

        // store in attribute
        this.$messageContainer = $('.messages');


        // event handling
        $(document).on('click', '.messages .message', function () {
            hide($(this));
        });

        return instance;
    }

    // public: add new message (type, content) with
    add (options) {

        var message = window.translator.getTranslation(options.message);

        // create dom object
        var $message = $(`
            <div class="message message--${options.type}">
                ${message}
            </div>
        `);

        // append and fadein
        $message.hide();
        this.$messageContainer.append($message);

        show($message, 0);
    }
}


// show existing messages
$(document).ready(function () {

    // create service instance (for close event handling)
    var messageService = new MessageService();

    // staggered fadein
    $('.messages .message').each(function (index) {
        var $message = $(this);

        show($message, 1000 + index * 200);
    });

});