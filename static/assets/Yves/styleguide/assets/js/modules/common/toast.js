import $ from 'jquery';

'use strict';


// TODO: delete or add documentation

let instance = null;


function hide ($message) {
    $message.fadeOut(function () {
        $message.remove();
    });
}


export class ToastService {

    constructor() {
        if(!instance){
            instance = this;
        }

        this.$messageContainer = $('<div class="toast">');
        $('body').append(this.$messageContainer);

        $(document).on('click', '.toast__message', function () {
            hide($(this));
        });

        return instance;
    }

    show (options) {
        var $message = $(`
            <div class="toast__message">
                ${options.message}
            </div>
        `);

        $message.hide();

        this.$messageContainer.append($message);

        setTimeout(function () {
            $message.fadeIn();
        });

        setTimeout(function () {
            hide($message);
        }, 5000);
    }
}