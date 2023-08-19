var HELPER = (function () {

    function scrollMaximumOnTop() {
        window.scrollTo(0, 0);
    }

    function initSelect2(element) {
        element.select2({
            language: 'pt-BR'
        });
    }

    function getConfigSPPhoneMask() {
        var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        };
        var spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

        return {SPMaskBehavior, spOptions};
    }

    /**
     * This function is same as PHP's nl2br() with default parameters.
     *
     * @param {string} str Input text
     * @param {boolean} replaceMode Use replace instead of insert
     * @param {boolean} isXhtml Use XHTML 
     * @return {string} Filtered text
     */
    function nl2br(str, replaceMode, isXhtml) {

        var breakTag = (isXhtml) ? '<br />' : '<br>';
        var replaceStr = (replaceMode) ? '$1' + breakTag : '$1' + breakTag + '$2';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, replaceStr);
    }

    function extractDatetimeString(date) {
        dateObject = new Date(date);

        var year = dateObject.getFullYear().toString(),
                month = dateObject.getMonth().toString(),
                day = dateObject.getDate().toString();

        if (month.length == 1) {
            month = '0' + month;
        }
        if (day.length == 1) {
            day = '0' + day;
        }

        dateAsString = year + '-' + month + '-' + day;

        return {dateObject, dateAsString};
    }

    function behaviorOnSubmit(e, form, callback) {

        if (e) {
            e.stopPropagation();
            e.preventDefault();
        }

        var self = form,
                button = self.find('button[type="submit"]'),
                ladda = Ladda.create(button.get(0));

        ladda.start();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: self.attr('action'),
            type: self.attr('method'),
            data: new FormData(self[0]),
            processData: false,
            contentType: false,
            dataType: 'JSON',
            error: function () {
                callback({
                    status: false,
                    response: {
                        message: APP.convertMessageToAlert('Ocorreu um erro no momento do processamento da solicitação, tente novamente!', 'danger')
                    }
                });
            },
            complete: function () {
                ladda.stop();
            },
            success: function (data) {
                if (typeof (callback) == 'function') {
                    return callback(data);
                }
            }
        });
    }

    return {
        behaviorOnSubmit,
        nl2br,
        getConfigSPPhoneMask,
        extractDatetimeString,
        initSelect2,
        scrollMaximumOnTop
    };
})();