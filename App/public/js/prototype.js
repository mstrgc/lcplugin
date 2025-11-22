(function(global){
    'use strict';

    function comma_separator(input){
        if(input.length > 3){
            let reversed_result = input.split('').reverse().join('');
            let separated_result = reversed_result.match(/.{1,3}/g);
            return separated_result.join(',').split('').reverse().join('');
        }
        return input;
    };

    //convert numbers to persian numbers
    function to_persian(input){
        let persian_numbers = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        let result = input.replace(/\d/g, num => persian_numbers[num]).replace(/[^\u06F0-\u06F9]/g, '');
        return comma_separator(result);
    };

    if(!String.prototype.to_persian){
        Object.defineProperty(String.prototype, 'to_persian', {'value': function(){return to_persian(this);}});
    }

    if(!Number.prototype.to_persian){
        Object.defineProperty(Number.prototype, 'to_persian', {'value': function(){return to_persian(String(this));}});
    }

    //convert numbers to english numbers
    function to_english(input){
        let english_numbers = {
            '۰': 0,
            '۱': 1,
            '۲': 2,
            '۳': 3,
            '۴': 4,
            '۵': 5,
            '۶': 6,
            '۷': 7,
            '۸': 8,
            '۹': 9
        };

        //second replace method removes commas that came from to_persian method
        let result = input.replace(/[\u06F0-\u06F9]/g, num => english_numbers[num]).replace(/[^\d]/g, '');
        return result;
    };

    if(!String.prototype.to_english){
        Object.defineProperty(String.prototype, 'to_english', {'value': function(){return to_english(this);}});
    }

    if(!Number.prototype.to_english){
        Object.defineProperty(Number.prototype, 'to_english', {'value': function(){return to_english(this);}});
    }
})(window);